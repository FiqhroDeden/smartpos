<?php

namespace App\Http\Controllers\Product;

use App\Models\Unit;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
   
    public function list(){
        return Inertia::render('Product/ListProduct');
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
