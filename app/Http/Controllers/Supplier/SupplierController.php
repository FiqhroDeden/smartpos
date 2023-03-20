<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function index()
    {
        return Inertia::render('Supplier/AddSupplier');
    }

    public function list()
    {
        return Inertia::render('Supplier/ListSupplier');
    }
}
