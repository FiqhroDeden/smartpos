<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\SubCategoriesResource;

class ProductController extends Controller
{
    public function index(){
        return Inertia::render('Product/AddProduct', [
            'brands'    => Brand::all(),
            'units'     => Unit::all(),
            'categories'    => Category::where('status', 1)->get(),                        
        ]);
    }
   public function store(Request $request)
   {
        $request->validate(
            [
            'name'  =>  'required|max:50|min:5',
            'code'  =>  'required|numeric|min:6|unique:products',
            'quantity' => 'required|numeric',
            'unit_id'   => 'required|numeric',
            'unit_value'    => 'required|numeric',
            'category_id'   =>'required|numeric',
            'selling_price'     => 'required|numeric',
            'purchase_price'    => 'required|numeric',
            'discount_type'    => 'boolean',
            'image' => 'required|image|max:512'                        
            ],
            [
                'unit_id.required' => 'Unit type is required',
                'category_id.required'  => 'Category is required'
            ]
        );
        $data = $request->all();
        if($request->hasFile('image')){
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $data['image'] = 'storage/files/' . $path ;
        }
        Product::create($data);        
        return Redirect::route('product.list')->with('message', 'Product Created.');
   }
    public function list(){
        return Inertia::render('Product/ListProduct', [
            'products'  => Product::with('category')->get()
        ]);
    }

    public function quantityUpdate(Request $request)
    {
        $request->validate(
            [
                'id'    => 'required',
                'quantity'  => 'required'
            ]
        );
        $product = Product::findOrFail($request->id);
        $product['quantity'] = $product['quantity'] + $request->quantity ;
        $product->update();
    }

    public function edit($id)
    {
        
        return Inertia::render('Product/EditProduct', [
            'brands'    => Brand::all(),
            'units'     => Unit::all(),
            'categories'    => Category::where('status', 1)->get(), 
            'product'  => Product::find($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $product = Product::findOrFail($request->id);
        $product['name']            = $request->name;
        $product['code']            = $request->code;
        $product['brand_id']        = $request->brand_id;
        $product['quantity']        = $request->quantity;
        $product['unit_id']         = $request->unit_id;
        $product['unit_value']      = $request->unit_value;
        $product['category_id']     = $request->category_id;
        $product['subcategory_id']  = $request->subcategory_id;
        $product['selling_price']   = $request->selling_price;
        $product['purchase_price']  = $request->purchase_price;
        $product['discount_type']   = $request->discount_type;
        $product['discount_value']  = $request->discount_value;
        $product['tax']             = $request->tax;
        $product['supplier_id']     = $request->supplier_id;
        if($request->hasFile('image')){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $product->image = 'storage/files/' . $path ;
        }
        $product->update();
        return Redirect::route('product.list')->with('success', 'Product Updated');
    }

    public function bulkImport()
    {
        return Inertia::render('Product/BulkImport');
    }

     public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();        
        return SubCategoriesResource::collection($subCategories);
    }
}
