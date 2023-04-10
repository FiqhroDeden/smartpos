<?php

namespace App\Http\Controllers\Customer;

use Inertia\Inertia;
use App\Models\Order;
use App\Models\Account;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index()
    {
        return Inertia::render('Customer/AddCustomer');
    }

    public function list(Request $request)
    {
        return Inertia::render('Customer/ListCustomer', [
            'customers' => Customer::query()->when($request->search, function($query, $search){
                $query->where('name', 'like', '%'.$search.'%')->orWhere('phone', 'like', '%'.$search.'%');
            })->orderBy('id', 'desc')->paginate(10)->withQueryString(),
            'accounts'  => Account::where('title', 'Cash')->orWhere('default', false)->get(),
            'numbers'   => Customer::count()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        $data = $request->all();
        Customer::create($data);
        return Redirect::route('customer.list');
    } 

    public function edit($id)
    {
        return Inertia::render('Customer/EditCustomer',[
            'customer'  => Customer::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);
        $customer = Customer::findOrFail($request->id);
        $customer['name'] = $request->name;
        $customer['phone'] = $request->phone;
        $customer['email'] = $request->email;
        $customer['state'] = $request->state;
        $customer['city'] = $request->city;
        $customer['zipcode'] = $request->zipcode;
        $customer['address'] = $request->address;
        $customer->update();
        
        return Redirect::route('customer.list');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
    }

    public function addBalance(Request $request)
    {
        // dd($request->all());
        $payableAccount = Account::where('title', 'Payable')->first();
        $payableAccount['balance'] += $request->amount;
        $payableAccount['in']   = $request->amount;
        $payableAccount->update();
        

        $account = Account::findOrFail($request->account_id);
        $account['balance'] += $request->amount;
        $account['in']  = $request->amount;
        $account->update();
        
        

        $income = $request->all();
        $income['type'] = 'Income';
        $income['credit'] = $request->amount;
        $income['balance'] = $account['balance'];
        Transaction::create($income);

        $payable = $request->all();
        $payable['account_id'] = 2;
        $payable['type'] = 'Payable';
        $payable['credit'] = $request->amount;
        $payable['balance'] = $payableAccount['balance'];
        Transaction::create($payable);

        $customer = Customer::findOrFail($request->customer_id);
        $customer['balance'] += $request->amount;
        $customer->update();

        
    }

    public function view(Request $request,$id)
    {
        
        return Inertia::render('Customer/ViewCustomer', [
            'customer'  => Customer::where('id', $id)->first(),            
            'transactions'   => Transaction::where('customer_id', $id)->with('account')->get(),
            'orders'    => Order::query()->when($request->search, function($query, $search){
                $query->where('order_code', 'like', '%'.$search.'%');
            })->where('customer_id', $id)->orderBy('id', 'desc')->get()
        ]);
    }
}
