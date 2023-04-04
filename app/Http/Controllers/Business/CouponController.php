<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CouponController extends Controller
{
    public function index()
    {
        return Inertia::render('Coupon/AddCoupon', [
            'coupons'   => Coupon::all()
        ]);
    }

    public function store(Request $request)
    
    {
        // dd($request->all());
        $request->validate([
            'title'             => 'required',
            'code'              => 'required|unique:coupons',
            'discount_value'    => 'required'
        ]);

        $data = $request->all();        
        Coupon::create($data);
        return Redirect::back();
    }

    public function edit($id)
    {
        return Inertia::render('Coupon/EditCoupon',[
            'coupon'    => Coupon::findOrFail($id)
        ]);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'             => 'required',
            'code'              => 'required',
            'discount_value'    => 'required'
        ]);
        $coupon = Coupon::findOrFail($request->id);
        $coupon['title'] = $request->title;
        $coupon['code'] = $request->code;
        $coupon['coupon_type'] = $request->coupon_type;
        $coupon['limit'] = $request->limit;
        $coupon['start_date'] = $request->start_date;
        $coupon['expire_date'] = $request->expire_date;
        $coupon['min_purchase'] = $request->min_purchase;
        $coupon['max_discount'] = $request->max_discount;
        $coupon['discount_type'] = $request->discount_type;
        $coupon['discount_value'] = $request->discount_value;

        $coupon->update();
        return Redirect::route('coupon.add');
    }

    public function statusUpdate($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon['active'] = !$coupon['active'];
        $coupon->update();
    }

    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
    }
}
