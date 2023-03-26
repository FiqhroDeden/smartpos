<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'code', 'brand_id', 'quantity', 'unit_id', 'unit_value', 'category_id', 'subcategory_id', 'selling_price', 'purchase_price', 'discount_type', 'discount_value', 'tax', 'supplier_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
