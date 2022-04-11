<?php

namespace App\Imports;

use App\Models\productDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsSDetailsImport implements ToModel, WithHeadingRow 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new productDetail([
            'discount' =>$row['discount'],
            'color' =>$row['color'],
            'product_id'=>$row['product_id'],
        ]);
    }
}
