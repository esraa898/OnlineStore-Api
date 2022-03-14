<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CartInterface;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public $cartinterface ;
    public function __construct(CartInterface $cartInterface)
    {
        $this->cartinterface=$cartInterface;
    }

    public function addToCart(Request $request){
     return   $this->cartinterface->addToCart($request);
    }
    public function deleteFromCart($id){
      return $this->cartinterface->deleteFromCart($id);
    }
    public function updateCart(Request $request,$id){
        return $this->cartinterface->UpdateCart($request,$id);
    }
    public function userCart( Request $request){
        return $this->cartinterface->userCart($request);
    }

}
