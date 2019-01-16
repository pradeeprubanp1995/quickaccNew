<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Upcoming_title;
use App\Department;
use App\Title;

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
        // print_r($_POST);exit();
        Session::put('password', $request['password']);

        $credentials = $request->only('email', 'password');
        

        //dd($credentials);
        if (Auth::attempt($credentials)) {
            // Session::set('userid',Auth::user()->user_type);
            // Authentication passed...
            if(Auth::user()->user_type==1 && $_POST['type']=="admin")
            {
                return redirect()->route('adminindex');
            }
            else if(Auth::user()->user_type==0 && $_POST['type']=="user")
            {
                return redirect()->route('home');
            }

            else{
                
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->flash('errors', 'You are logged out!');
                if($_POST == 'admin')
                    return redirect('/');
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
            $usertype = Auth::user()->user_type;
            // echo $usertype;exit;
            $this->guard()->logout();

            $request->session()->invalidate();

            if($usertype == 1)
            return $this->loggedOut($request) ?: redirect('/');
            else
            return $this->loggedOut($request) ?: redirect('/user/login');
        }

         public function cron()
    {        
        $status_data=Upcoming_title::select('id')
                ->where('status','1')->get();
        foreach ($status_data as $data)
         {
            $id=$data['id'];
            $status_data1=Upcoming_title::find($id);
            $status_data1->status="0";
            $status_data1->save();
        }

        $date= date("Y-m-d");
        $tommorrow =date("Y-m-d", strtotime('tomorrow'));
        $data=Upcoming_title::select('id')->where('status','2')->where('date_of_quiz','<=',$date)->get();
        foreach ($data as $value)
         {
            $id=$value['id'];            
            $data=Upcoming_title::find($id);
            $data->status="1";
            $data->save();
           
        }


        $dept=Upcoming_title::select('dept_id')
                ->where('date_of_quiz',$date)->get();
        $particular_dept=Department::select('id','dept_name')
                ->whereNotIn('id', $dept)->get();  
        // echo$particular_dept;      
        $dept=json_decode($particular_dept);               
        $title_assign=[];
        $forrand = array();
        foreach ($dept as $key=> $value) {
          $title_assign[$key] =Title::select('id')
          ->whereRaw('FIND_IN_SET(?,dept_id)', [$value->id])->get();
                       
        }

        foreach ($title_assign as $key => $value) 
        {
                foreach ($value as $keydata => $val) {
                    
                     $forrand[$dept[$key]->id][$val->id] =  $dept[$key]->dept_name;
                }
           
            
        }
        $randvalues =[];
        foreach($forrand as $key => $row) {

            $randvalues[$key] =array_rand($row,1);
             
            
             
        }
       // echo'<pre>';
       //      print_r($randvalues);exit();

        // $tot_title=count($randvalues); 
                
        foreach($randvalues as $key => $settitle){ 
            // print_r($settitle[]);key
        $title = new Upcoming_title();   
        $title->title_id = $settitle;
        $title->date_of_quiz = $tommorrow;
        $title->status = '2';
        $title->dept_id = $key;
        $title->save();
        }
        
 

        
        
    }



    

}
