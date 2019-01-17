<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            // $usertype = Auth::user()->user_type;
            // // $holduser = \DB::table('users')
            // echo "<pre>";print_r(Auth::user());exit;

            
            // if($usertype == 1)
            //     return route('login');
            // else
            //     return route('userlogin');


            return route('userlogin');


        }
    }
}
