<?php 
namespace App\Http\Interfaces\Admin;


interface ProductInterface {
    public function index();
    public function upload();
    public function uploadStore($request);
    public function uploadStoreDetail($request);
}