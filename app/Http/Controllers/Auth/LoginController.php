<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Session;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        Session::put('password', $request['password']);

        $credentials = $request->only('email', 'password');
        

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            // Session::set('userid',Auth::user()->user_type);
            // Authentication passed...
            if(Auth::user()->user_type==1){
            return redirect()->route('adminindex');}
            else{
                
                $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->flash('errors', 'You are logged out!');
        return redirect('/');
                // $this->guard()->logout();

                // $request->session()->invalidate();

                // return $this->loggedOut($request) ?: redirect('/')->withMessages('warning','error');
                }
            
        }
        else{
           // $psw=Hash::make('admin123'); 
           // echo $psw;exit;
          throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }



    

}
