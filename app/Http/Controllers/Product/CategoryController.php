<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoriesResource;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        
        return Inertia::render('Category/ListCategory', [
            'numbers'   => Category::count(),
            'categories' => Category::query()->when($request->search, function($query, $search){
                $query->where('name', 'like', '%'.$search.'%');
            })->paginate(10)->withQueryString(),
            
            
        ]);
    }
    public function subCategory(Request $request)
    {
        return Inertia::render('Category/SubCategory', [
            'numbers'   => SubCategory::count(),
            'categories'    => Category::where('status', 1)->get(),
            'subCategories' => SubCategory::query()->when($request->search, function($query, $search){
                $query->where('name', 'like', '%'.$search.'%');
            })->with('categories')->paginate(10)->withQueryString(),
        ]);
    }
    public function store(Request $request)
    {
        // $data = $request->all();
        if($request->hasFile('image')){
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $data['image'] = 'storage/files/' . $path ;
        }
        Category::create($data);        
       return Redirect::route('category.list')->with('message', 'Category Created.');
    }

    public function subCategoryStore(Request $request)
    {
        $data = $request->all();
        SubCategory::create($data);
        return Redirect::route('category.subCategory')->with('message', 'Sub Category Created.');
    }

    public function update(Request $request)
    {
        // dd($request->id);
        $category = Category::find($request->id);
        $category->name =  $request->name;
        if($request->hasFile('image')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $category->image = 'storage/files/' . $path ;
        }
        $category->update();
        return Redirect::route('category.list')->with('message', 'Category Update.');
    }

    public function subCategoryUpdate(Request $request)
    {
        $subCategory = SubCategory::find($request->id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->update();
    }

    public function updateStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->update();
        return Redirect::route('category.list')->with('message', 'Category Update.');
    }

    public function delete($id)
    {
        
        $category = Category::findOrFail($id);
        if($category->image != null){
            if(file_exists($category->image)){
                unlink($category->image);
            }
        };
        $category->delete();       
    }

    public function subCategoryDelete($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
    }
       
}
