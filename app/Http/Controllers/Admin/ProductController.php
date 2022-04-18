<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ProductInterface;

class ProductController extends Controller
{
    protected $ProductInterface;

    public function __construct(ProductInterface $productInterface )
    {
        $this->ProductInterface=$productInterface;
    }
    public function index(){
        return $this->ProductInterface->index();
    }

    public function upload(){
        return $this->ProductInterface->Upload();
    }
    public function uploadStore(Request $request){
        return $this->ProductInterface->uploadStore($request);
    }
    public function uploadStoreDetail( Request $request){
        return $this->ProductInterface->uploadStoreDetail($request);
    }
    public function testNotification(){
        return $this->ProductInterface->testNotification();
    }

}
