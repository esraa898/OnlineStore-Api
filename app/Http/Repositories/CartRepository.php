<?php
 namespace App\Http\Repositories;

use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\CartInterface;
use App\Models\Cart;
use App\Rules\StockValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class  CartRepository implements CartInterface
{
    use ApiResponceTrait;

    public function addToCart($request)

    {
        $validations =Validator::make($request->all(),[
            'product_id'=> 'required|exists:products,id',
            'count'=>['required',new StockValidation($request->product_id)]
        ]);
        if($validations->fails()){
           return $this->apiResponce(400,'validation error ', $validations->errors());
        }
        $cart= Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
        if($cart){
            
           $cart->update([
                'count'=> ($cart->count + $request->count)
            ]);
        }else{
        Cart::Create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'count'=>$request->count
        ]);
    }
        return $this->apiResponce(200,'added to cart');
    }
    public function deleteFromCart($id)
    {
       
        $cart= Cart::find($id);
        if(is_null($cart)){
            return $this->apiResponce(400,' cart not found');
        }
        $cart->delete();
        return $this->apiResponce(200,'cart deleted');
        
    }
     public function updateCart($request,$id)
    { 
        $cart_id=Cart::find($id);
       
        $validations=validator::make($request->all(),[
            'count'=>['required',new StockValidation($cart_id->product_id)]
        ]);
        if($validations->fails()){
            return $this->apiResponce(400,'validation error ', $validations->errors());
         }
       
         $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$cart_id->product_id]])->first();
        
        if(is_null($cart)){
            return $this->apiResponce(400,' cart not found');
        }

        $cart->update([
            'count' =>  $request->count
        ]);
        return $this->apiResponce(200,'cart updated');
     }
    public function userCart($request)
    {
       
     
        $carts= Cart::with('products:id,name,price')->select('user_id','count','id','product_id')->where('user_id',Auth::user()->id)->get();

        return $this->apiResponce(200,'user Cart',null,$carts);
        
    }
} 