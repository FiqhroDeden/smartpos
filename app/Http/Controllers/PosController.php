<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PosController extends Controller
{
    public function index(Request $request){
        $active_cart = Cart::where('active', 1)->first();
        return Inertia::render('Pos/Pos',[
            'categories'    => Category::where('status', 1)->get(),
            'products'      => Product::query()->when($request->category, function($query, $category){
                $query->where('category_id', $category);
            })->get(),
            'carts'          => Cart::orderBy('code', 'asc')->get(),
            'active_cart'   =>Cart::where('active', 1)->first(),
            'cart_items'     => CartItem::where('cart_id', $active_cart->id)->with('product')->get(),  
            'last_order'    => Order::orderBy('id', 'desc')->with('orderItems')->first()         
            // 'last_order'    => Order::orderBy('id', 'desc')->with('orderItems')->first()         
        ]);
    }
    public function orders(Request $request){
        return Inertia::render('Pos/Orders', [
            'orders'    => Order::query()->when($request->search, function($query, $search){
                $query->where('order_code', 'like', '%'.$search.'%');
            })->with('orderItems.product')->orderBy('id', 'desc')->paginate(10)->withQueryString(),
            'numbers'   => Order::count()
        ]);
    }

    public function selectCustomer(Request $request)
    {
        $active_cart = Cart::where('active', 1)->first();
        $active_cart['customer_id'] = $request->id;
        $active_cart->update();
    }

    public function changeCart(Request $request)
    {
        $active_cart = Cart::where('active', 1)->first();
        $active_cart['active'] = 0;
        $active_cart->update();
        $current_cart = Cart::findOrFail($request->id);
        $current_cart['active'] = 1;
        $current_cart->update();
        return Redirect::back();
    }

    public function clearCart()
    {
        // dd('works');
        $active_cart = Cart::where('active', 1)->first();
        if($active_cart->code == 'Cart-1'){
            $active_cart->delete();
            $data['code'] = 'Cart-1';
            $data['active'] = 1;
            Cart::create($data);
        }else{
            $active_cart->delete();
            $cart = Cart::first();
            $cart['active'] = 1;
            $cart->update();
        }
        
    }
    public function newOrder()
    {

        $active_cart = Cart::where('active', 1)->first();
        $active_cart['active'] = 0;
        $active_cart->update();
        $last_cart = Cart::orderBy('code', 'desc')->first();
        $last_cart_code = intval(substr($last_cart->code, strlen("Cart-")));
        $data['code'] = 'Cart-' . $last_cart_code + 1;
        $data['active'] = 1;
        Cart::create($data);
        return Redirect::back();
    }

    public function checkProduct($code)
    {
        // return response()->json(['message' => 'Product code received and processed successfully.']);   
        $product = Product::where('code', $code)->first();
        if($product)
        {
            return response()->json($product);
        }else{
            return response(['error' => 'Product not found']);
        }
    }

    public function addToCart($code)
    {
        $product = Product::where('code', $code)->first();
        $active_cart = Cart::where('active', 1)->first();
        $cart_item = CartItem::where('product_id', $product->id)->where('cart_id', $active_cart->id)->first();
        // dd($cart_item);
        if($cart_item){
            $cart_item['quantity'] += 1;
            $cart_item->update();
        }else{            
            $data['cart_id'] = $active_cart->id;
            $data['product_id'] = $product->id;
            $data['quantity'] = 1; 
            CartItem::create($data);
        }
        
    }

    public function updateQuantity(Request $request)
    {
        
        $cart_item = CartItem::findOrFail($request->id);
        $product = Product::findOrFail($request->product_id);
        if($request->quantity <= "0")
        {
            return back()->withErrors(['errors' => 'Quantity can not be zero or minus']);

        }else if($request->quantity > $product->quantity){
            return back()->withErrors(['errors' => 'Product Quantity is not enough']); 
        }else{
            $cart_item['quantity'] = $request->quantity;
            $cart_item->update();
        }
        
    }

    public function submitOrder(Request $request)
    {
        
        // dd($request->all());
        $active_cart = Cart::where('active', 1)->first();
        $cartItems = CartItem::where('cart_id', $active_cart->id)->with('product')->get();
        $orderItems = [];
        foreach ($cartItems as $cartItem){
            if($cartItem->product->discount_value){
                if($cartItem->product->discount_type){
                    $price = $cartItem->product->selling_price - $cartItem->product->selling_price * ($cartItem->product->discount_value / 100);
                }else{
                    $price = $cartItem->product->selling_price - $cartItem->product->discount_value;
                }
            }else{
                $price = $cartItem->product->selling_price;
            }
            
            $orderItem = new OrderItem([                
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $price,
            ]);
            $orderItems[] = $orderItem;
            // Decrease product stock
            $product = Product::findOrFail($cartItem->product_id);
            $product->decrement('quantity', $cartItem->quantity);
        }

        $order = new Order([
            'customer_id'       => $request->customer_id,
            'order_code'        => str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT),
            'payment_method'    => $request->payment_method,
            'order_amount'      => $request->order_amount,
            'total_tax'         => $request->total_tax,
            'extra_discount'    => $request->extra_discount,
            'coupon_discount'   => $request->coupon_discount,
            'paid_amount'       => $request->paid_amount,
            'collected_amount'  => $request->collected_amount,
        ]);
        $order->save();
        $order->orderItems()->saveMany($orderItems);
        
        $cart = Cart::where('active', 1)->first();       
            if($cart->code == 'Cart-1'){
                $cart->delete();
                $data['code'] = 'Cart-1';
                $data['active'] = 1;
                Cart::create($data);
            }else{
                $cart->delete();
                $cart = Cart::first();
                $cart['active'] = 1;
                $cart->update();
            }        
        
        return Redirect::back();
    }

    public function deleteItem($id)
    {
        // dd($id);
        $cart_item = CartItem::findOrFail($id);
        $cart_item->delete();
    }

    public function cancelOrder(Request $request)
    {
        CartItem::where('cart_id', $request->id)->delete();
    }
}
