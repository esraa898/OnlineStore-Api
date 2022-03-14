<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductsInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public $productinterface;
    public function __construct(ProductsInterface $productsInterface)
    {
     $this->productinterface=$productsInterface;   
    }
    public function products(){
        return $this->productinterface->products();
    }

}
