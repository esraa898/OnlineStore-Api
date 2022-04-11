<?php

namespace App\Models;

use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['name', 'price' ,'stock'];


    public static function sheetRules(){


        return [
            'name'=> 'required|min:3',
            'price'=>'required',
            'stock'=>'required',
        ];
    }


    public function details(){

       return  $this->hasMany(ProductDetail::class, 'product_id','id');
    }
    protected $hidden = ['created_at','updated_at'];
}
