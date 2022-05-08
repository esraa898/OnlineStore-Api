<?php
namespace App\Http\Repositories\Admin;

use App\Models\User;
use App\Mail\TestEmail;
use App\Models\Product;

use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsSDetailsImport;
use App\Notifications\testnotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Interfaces\Admin\ProductInterface;

class ProductRepository implements ProductInterface{

    public function index(){

$color= request('color');
$discount= request('discount');
        //  $products= product::withCount('details')->get();
        $query= Product::where('stock','>=',1);
        $query->when(request('color'),function() use($color,$query)
        {

          $query->whereHas('details',function($q) use($color)
          {
            return $q->where('color',$color);
        });  
        });

        $query->when(request('discount'),function() use($discount,$query)
        {

            $query->whereHas('details',function($qu) use($discount)
            {
                if($discount == "yes"){
                       return $qu->where('discount','>',0);
                }else{
                    return $qu;
                }
             

            });

        });
        
       
       $products = $query->get();
        return view('product',compact('products'));
    }

    public function upload()
    {
        return view('productupload');
    }
    public function uploadStore($request)
    {
      Excel::import(new ProductsImport ,$request->sheet);
      return redirect()->back();
    }
    public function uploadStoreDetail($request){
        Excel::import(new ProductsSDetailsImport ,$request->sheet);
        return redirect()->back();
    }
    public function testNotification(){
      Mail::to('essomohamed121@gmail.com')->send(new TestEmail);
        $user =User::first();
    // dd($user->notifications);
    // dd($user->unreadnotifications->markAsRead( ));
        // $data= [
        //     'title'=> 'hello'.$user->name,
        //     'body'=> 'your email is:'.$user->email
        // ];
        // Notification::send($user,new testnotification($data));
    }
}