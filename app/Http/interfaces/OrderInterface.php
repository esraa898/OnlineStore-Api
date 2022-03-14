<?php
namespace App\Http\Interfaces;


interface OrderInterface
{
    public function checkOut($request);
    
}