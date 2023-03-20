<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/AddAccount');
    }
    public function list(){
        return Inertia::render('Account/ListAccount');
    }
    public function addExpense()
    {
        return Inertia::render('Account/AddExpense');
    }
    public function addIncome()
    {
        return Inertia::render('Account/AddIncome');
    }
    public function addTransfer()
    {
        return Inertia::render('Account/AddTransfer');
    }
    public function listTransaction()
    {
        return Inertia::render('Account/ListTransaction');
    }
}
