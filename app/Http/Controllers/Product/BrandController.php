<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Brand/BrandList', [
            'numbers'   => Brand::count(),
            'brands' => Brand::query()->when($request->search, function($query, $search){
                $query->where('name', 'like', '%'.$search.'%');
            })->paginate(10)->withQueryString(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $data['image'] = 'storage/files/' . $path ;
        }
        Brand::create($data);        
    //    return Redirect::route('brand.list')->with('message', 'Brand Created.');
    }
    public function update(Request $request)
    {
        // dd($request->id);
        $brand = Brand::find($request->id);
        $brand->name =  $request->name;
        if($request->hasFile('image')){
            if(file_exists($brand->image)){
                unlink($brand->image);
            }
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $brand->image = 'storage/files/' . $path ;
        }
        $brand->update();
        // return Redirect::route('category.list')->with('message', 'Category Update.');
    }
    public function delete($id)
    {
        
        $brand = Brand::findOrFail($id);
        if($brand->image != null){
            if(file_exists($brand->image)){
                unlink($brand->image);
            }
        };
        $brand->delete();       
    }
}
