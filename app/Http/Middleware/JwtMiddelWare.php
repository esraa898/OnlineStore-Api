<?php

namespace App\Http\Middleware;

use App\Http\Traits\ApiResponceTrait;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddelWare
{
    use ApiResponceTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            $user =JWTAuth::ParseToken()->authenticate();
        }catch(Exception $e){
            if($e instanceof TokenInvalidException){
                return $this->apiResponce(422,'token invalid');
            }elseif($e instanceof TokenExpiredException){
                return $this->apiResponce(422,'token is Expired');
            }else{
                return $this->apiResponce(422 , "Authorization Token not found" );
            }
        }
        return $next($request);
    }
}
