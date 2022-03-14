<?php
 namespace App\Http\Repositories;

use auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use App\Rules\CartStockVBalidation;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Requests\CheckoutRequest;
use App\Http\Interfaces\OrderInterface;
use Illuminate\Support\Facades\Validator;

class  OrderRepository implements OrderInterface
{
    use ApiResponceTrait;
 
    
    public function checkOut( $request)
    {
       $validation = Validator::make($request->header(),[
           'authorization' => new CartStockVBalidation()
       ]);
       if($validation->fails()){
        return $this->apiResponce(400,'VAlidation error', $validation->errors());
       }
        $cartitems= Cart::where('user_id',auth()->user()->id)->with('products')->get();
          $totalprice= 0;
       
          $totalprice=$cartitems->sum(function($item){
              return $item->count * $item->products->price;
          });
        
        DB::transaction(function() use($totalprice,$cartitems,){           
             $order= Order::create([
                'user_id'=> auth()->user()->id,
                'totalprice'=> $totalprice,
            ]);

            foreach($cartitems as $cartitem ){
                OrderItem::create([
                    'order_id'=> $order->id,
                    'product_id'=> $cartitem->products->id,
                    'count'=> $cartitem->count,
                    'unit_price'=> $cartitem->products->price,
                    'net_price'=> $cartitem->count *$cartitem->products->price
                ]);
                $product =Product::find($cartitem->products->id);
                $product->update(['stock'  => $product->stock - $cartitem->count]);
               $cartitem->delete();
            }
        });

        return $this->apiResponce(200,'Order was created');
    }
}