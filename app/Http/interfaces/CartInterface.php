<?php
namespace App\Http\Interfaces;


interface CartInterface
{
    public function addToCart($request);
    public function  deleteFromCart($id);
    public function  updateCart($request,$id);
    public function   userCart($request);
}