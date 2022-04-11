<?php

namespace App\Imports;

use App\Models\product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow , WithValidation 
{ 
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        return new product([
            
            'name' =>$row['name'],
            'price'=>$row['price'],
            'stock'=>$row['stock'],
             
        ]);
    }

    public function rules(): array
    {

        return product::sheetRules();
    }
       
}
