<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   use Exportable;

    protected $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function headings(): array
    {
        return $this->columns;
    }

    public function query()
    {
        return Product::query()->select($this->columns);
    }
}
