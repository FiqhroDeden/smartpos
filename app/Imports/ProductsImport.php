<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'  => $row['name'],
            'code'  => str_pad(rand(0, 999999), 6, '0'),
            'brand_id'  => $row['brand_id'],
            'quantity'  => $row['quantity'],
            'unit_id'  => $row['unit_id'],
            'unit_value'  => $row['unit_value'],
            'category_id'  => $row['category_id'],
            'subcategory_id'  => $row['subcategory_id'],
            'selling_price'  => $row['selling_price'],
            'purchase_price'  => $row['purchase_price'],
            'discount_type'  => $row['discount_type'],
            'tax'  => $row['tax'],
            'supplier_id'  => $row['supplier_id'],
        ]);
    }
     public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'numeric',
            ],
            'code'  => [
                'numeric',
                'unique:products'

            ]
        ];
    }
    
}
