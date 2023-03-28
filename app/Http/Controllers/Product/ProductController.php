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
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;

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
    public function list(Request $request){
        return Inertia::render('Product/ListProduct', [
            'totalProducts'   => Product::count(),
            'products'  => Product::query()->when($request->search, function($query, $search){
                $query->where('name', 'like', '%'.$search.'%');
            })->when($request->sort, function($query, $sort){
                if($sort == 'default'){
                    $query->orderBy('id', 'desc');
                }else if($sort == 'quantity_asc'){
                    $query->orderBy('quantity', 'asc');
                }else if($sort == 'quantity_desc'){
                    $query->orderBy('quantity', 'desc');
                }
            })->with('category')->orderBy('id', 'desc')->paginate(10)->withQueryString(),
            
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

     public function delete($id)
    {
        
        $product = Product::findOrFail($id);
        if($product->image != null){
            if(file_exists($product->image)){
                unlink($product->image);
            }
        };
        $product->delete();       
    }
 
    public function bulkImport(){
        return Inertia::render('Product/BulkImport');
    }

    public function import(Request $request){
        // dd($request->all());
        $request->validate([
            'import_file'  => 'required'
        ]);

        try {
            Excel::import(new ProductsImport, request()->file('import_file'));
            return Redirect::route('product.list')->with('success', 'Products Imported');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
     
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }            
            // dd($failures);
            return back()->withErrors(['errors' => 'My data is missing.']);
        }
        
    }

    public function bulkExport()
    {
        $columns = ['name', 'code', 'brand_id', 'quantity', 'unit_id', 'unit_value', 'category_id', 'subcategory_id', 'selling_price',      
                 'purchase_price', 'discount_type', 'discount_value', 'tax', 'supplier_id'];
         return Excel::download(new ProductsExport($columns), 'products-list.xlsx');
    }

     public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();        
        return SubCategoriesResource::collection($subCategories);
    }

    public function barcodeGenerate($id)
    {
        $product = Product::find($id);
        $barcode = DNS1D::getBarcodeSVG("$product->code", "PHARMA",2,60);
        
        return Inertia::render('Product/ProductBarcode',[
            'product'   => $product,
            'barcode'   => $barcode
        ]);
        
    }
}
