<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['customer_id', 'order_code', 'payment_method', 'order_amount', 'total_tax', 'extra_discount', 'coupon_discount', 'paid_amount', 'collected_amount'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
