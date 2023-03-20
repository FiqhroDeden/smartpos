<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        return Inertia::render('Product/AddProduct');
    }

    public function list(){
        return Inertia::render('Product/ListProduct');
    }

    public function bulkImport()
    {
        return Inertia::render('Product/BulkImport');
    }
}
