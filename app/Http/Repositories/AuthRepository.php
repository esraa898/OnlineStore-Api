<?php
 namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponceTrait;
use App\Http\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Validator;

class AuthRepository implements AuthInterface
{
    use ApiResponceTrait;
    public function register($request)
    {
       $validation = Validator::make($request->all(),[
         'name'=>'required',
           'email'=>'required',
           'password'=> 'required|min:6'  
       ]) ;

       if($validation->fails()){
           return $this->apiResponce(400,'validation error',$validation->errors());
       }
           User::create([
            'name'=>$request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);
        return $this->apiResponce(200,'Account was Created ');
        
    }

    public function login($request)
    {
        
        $validation= validator::make($request->all(),[
            'email' =>'required',
            'password'=> 'required'
        ]);
        
        if($validation->fails()){
            return $this->apiResponce(400,'validation error',$validation->errors());
        }
        $userdata= $request->only('email','password');
        if($token=Auth::attempt($userdata)){
            return $this->respondWithToken($token);
            return $this->apiResponce(200,'login');
        }
        return $this->apiResponce(400,'Not found ');
    }
    protected function respondWithToken($token)
    {
        $array=[
            'access_token' => $token,
         
        ];
        return $this->apiResponce(200,'login',$array);
    }
}