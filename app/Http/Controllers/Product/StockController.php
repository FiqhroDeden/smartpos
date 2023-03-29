<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Stock/StockLimit', [
            'totalProducts'   => Product::where('quantity', '<', 50)->count(),
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
            })->with('category')->orderBy('id', 'desc')->where('quantity' , '<', 50)->paginate(10)->withQueryString(),
        ]);
    }
}
