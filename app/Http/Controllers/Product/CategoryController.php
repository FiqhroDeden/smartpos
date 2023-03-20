<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function subCategory()
    {
        return Inertia::render('Category/AddSubCategory');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $request->file('image')->store('public/files');
            $path = $request->file('image')->hashName();            
            $data['image'] = 'storage/files/' . $path ;
        }
        Category::create($data);        
       return Redirect::route('category.list')->with('message', 'Category Created.');
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

}
