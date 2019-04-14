<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;


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
    // protected $redirectTo = '/home';

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

        // dd($request);
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // if(Auth::user()->status==0)
            // { 
                
            //     return redirect()->route('userlogin')->withErrors('Please select any PREMIUM','errors');
            // }
        // print_r($_POST);exit();
        Session::put('password', $request['password']);

        $credentials = $request->only('email', 'password');


        
        // $remember = (Input::has('remember')) ? true : false;

        // dd($remember);
        if (Auth::attempt($credentials)) {
            // Session::set('userid',Auth::user()->user_type);
            // Authentication passed...
// echo Auth::user()->status;exit;
            
            if(Auth::user()->user_type==1 && $_POST['type']=="admin")
            {
                return redirect()->route('admin.department');
            }
            else if(Auth::user()->user_type==0 && $_POST['type']=="user" && Auth::user()->status==1)
            {
                return redirect()->route('usergenerates');
            }

            else{
                
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->flash('danger', 'Please update your PREMIUM. Thank you!');
                if($_POST == 'admin')
                    return redirect('/admin/login');
                else
                    return redirect()->route('userlogin');
                
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
            // $usertype = Auth::user()->user_type;
            // echo $usertype;exit;
            $this->guard()->logout();

            $request->session()->invalidate();
            
            // if($usertype == 1)
            // return $this->loggedOut($request) ?: redirect('/admin/login');
            // else
            return $this->loggedOut($request) ?: redirect('/userlogin');
        }

    


    

}
