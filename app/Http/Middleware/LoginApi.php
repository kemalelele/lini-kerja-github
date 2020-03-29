<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try{
            $email = Session::get('email');
            if($email != null){
                return $next($request);
            }else{
                return 'error tes:'.$email;
            }
        }catch(\Exception $e){
            return 'Error, karena: '.$e;
        }

        
    }
}
