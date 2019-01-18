<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
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

        /**
        * Checks if user is Admin
        */
        if(!$this->CheckAdmin()){

        //redirect to admin login
            // return redirect('/home');
            return redirect()->back();

        }

        /**
        * Prodceed to next request
        */
        return $next($request);

        }

        /**
        * Checks if user is logged in as an admin
        */
        private function CheckAdmin(){

        /**
        * Check If User Is Logged In
        */
        if (!Auth::check()) {

        // echo 'hau';exit;
            return false;

        }
       // echo Auth::user()->user_type;exit;

       if(Auth::user()->user_type == '0')
       {
            return false;
       }
        /**
        * Check If User has administrator role
        */
        // if (!Auth::user()->isAdmin()) {

        // // return false;
        //      echo 'hau';exit;

        // }

        //passed Admin rules
        return true;

    }


}
