<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Http\Interfaces\OrderInterface;

class OrderController extends Controller
{
    protected $orderinterface;

    public function __construct(OrderInterface $orderinterface)
    {
        $this->orderinterface=$orderinterface;
    }

    public function checkOut( Request $request){

       return  $this->orderinterface->checkOut($request);
    }

}
