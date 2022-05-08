<?php
 namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponceTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Interfaces\ProductsInterface;
use App\Http\Traits\ProductredisTrait;
use App\Models\Product;

class ProductsRepository implements ProductsInterface
{
    use ApiResponceTrait;
    use ProductredisTrait;
public function products()
{
    $products = $this->getProductFromRedis();
    return $this->apiResponce(200,'Products',null,$products);
}
}