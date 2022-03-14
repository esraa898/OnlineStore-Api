<?php
 namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponceTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Interfaces\ProductsInterface;
use App\Models\Product;

class ProductsRepository implements ProductsInterface
{
    use ApiResponceTrait;
public function products()
{
    $products = Product::get();
    return $this->apiResponce(200,'Products',null,$products);
}
}