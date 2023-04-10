<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/AddAccount');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'account_number'    => 'required'
        ]);
        $data = $request->all();
        Account::create($data);
        return Redirect::route('account.list');
    }
    public function list(){
        return Inertia::render('Account/ListAccount', [
            'accounts'  => Account::orderBy('id', 'desc')->get()
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Account/EditAccount', [
            'account'   => Account::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'account_number'   => 'required'
        ]);
        $account = Account::findOrFail($request->id);
        $account['title'] = $request->title;
        $account['description'] = $request->description;
        $account['account_number'] = $request->account_number;
        $account->update();
        return Redirect::route('account.list');
    }

    public function delete($id)
    {        
        $account = Account::findOrFail($id);
        $account->delete();
    }

    public function addExpense()
    {
        return Inertia::render('Account/AddExpense');
    }
    public function addIncome()
    {
        return Inertia::render('Account/AddIncome', [
            'incomes'  => Transaction::where('type', 'Income')->with('account')->orderBy('id', 'desc')->get()
        ]);
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
