<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'code', 'coupon_type', 'limit', 'start_date', 'expire_date', 'min_purchase', 'max_discount', 'discount_type',   
                          'discount_value', 'active'];
}
