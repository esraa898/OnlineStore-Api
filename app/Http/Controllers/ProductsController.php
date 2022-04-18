<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\testnotification;
use App\Http\Interfaces\ProductsInterface;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class ProductsController extends Controller
{


    public function testNotification(){
         $user= User::first();
        Notification::send($user,new testnotification());
    }
    public $productinterface;
    public function __construct(ProductsInterface $productsInterface)
    {
     $this->productinterface=$productsInterface;   
    }
    public function products(){
        return $this->productinterface->products();
    }

}
