<?php

namespace App\Rules;

use App\Models\Cart;
use Illuminate\Contracts\Validation\Rule;

class CartStockVBalidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       
        $cartitems= Cart::where('user_id',auth()->user()->id)->with('products')->get();
        if(count($cartitems) == 0){
            return false ;
        }
        foreach($cartitems as $cartitem ){
            if( $cartitem->products->stock < $cartitem->count){
            return   false;
            }
           
        }
    
        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'stock error ';
    }
}
