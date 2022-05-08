<?php 
namespace App\Http\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\Redis;

trait ProductredisTrait {

  private function setProductToRedis(){
      $redis =Redis::connection();
      $data=Product::get();
      $redis->set('products',$data);
      return true;
      
  }


  private function getProductFromRedis()
{
    $redis =Redis::connection();
    $data=json_decode($redis->get('products'));
    if(empty($data)){
        $data=Product::get();
    }
    return $data;
}
}