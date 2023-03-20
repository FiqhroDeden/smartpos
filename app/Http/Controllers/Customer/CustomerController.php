<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index()
    {
        return Inertia::render('Customer/AddCustomer');
    }

    public function list()
    {
        return Inertia::render('Customer/ListCustomer');
    }
}
