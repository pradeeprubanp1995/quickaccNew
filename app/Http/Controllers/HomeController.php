<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Upcoming_title;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Image;
use App\Title;
use App\Department;
use App\Result;
use DateTime;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getLastWeekDates()
    {
        $lastWeek = array();
     
        $prevMon = abs(strtotime("previous monday"));
        $currentDate = abs(strtotime("today"));
        $seconds = 86400; //86400 seconds in a day
     
        $dayDiff = ceil( ($currentDate-$prevMon)/$seconds ); 
     
        if( $dayDiff < 7 )
        {
            $dayDiff += 1; //if it's monday the difference will be 0, thus add 1 to it
            $prevMon = strtotime( "previous monday", strtotime("-$dayDiff day") );
        }
     
        $prevMon = date("Y-m-d",$prevMon);
     
        // create the dates from Monday to Sunday
        for($i=0; $i<7; $i++)
        {
            $d = date("Y-m-d", strtotime( $prevMon." + $i day") );
            $lastWeek[]=$d;
        }
     
        return $lastWeek;
    }


    public function index()
    {

        // $week = $this->getLastWeekDates();
         $date = date('Y-m-d');
        $weekfirst = date('Y-m-d',strtotime('-1 Monday'));
        $firstmon  = date('Y-m-01'); 
        $tommorrow = date("Y-m-d", strtotime('tomorrow'));

// $month_ini = new DateTime("first day of last month");
// $month_end = new DateTime("last day of last month");

// $firstmon = $month_ini->format('Y-m-d'); // 2012-02-01
// $lastmon = $month_end->format('Y-m-d'); // 2012-02-29


    // exit;
        // print_r($tommorrow);exit;


       
        $dept_id = Auth::user()->dept_id;
        $data[0] = Result::select('*')->where('today_date',$date)->where('dept_id',$dept_id)->orderBy('points', 'desc')->first();

        $data[1] = Result::select('*')->selectRaw('sum(points) as weekpoints')->whereBetween('today_date', array($weekfirst, $tommorrow))->first();

        $data[2] = Result::select('*')->selectRaw('sum(points) as monthpoints')->whereBetween('today_date', array($firstmon, $tommorrow))->where('dept_id',$dept_id)->groupBy('user_id')->orderBy('monthpoints', 'desc')->first();

        // dd($data[2]);
        $user['today'] = User::find($data[0]['user_id']);

        $user['week'] = User::find($data[1]['user_id']);

        $user['month'] = User::find($data[2]['user_id']);
        


        return view('userdashboard',['post_data'=>$data , 'user' => $user]);
    }
    public function adminindex()
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->where('parent_id','0')->get();
        // dd($result);
         return view('addupcomming',['post_data' => $result]);
    }
    public function profile()
    {
        $data = User::find( Auth::user()->id); 
          
        return view('profile',compact('data'));
       
    }
    public function editprofile(Request $request)
    {

        // dd($request->file('img'));
        $upload_image=$request->file('img');
        if(!empty($upload_image)){         
        $image=$upload_image->getClientOriginalName();
        $upload_image->move(public_path().'/uploads/', $image); 
         $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->doj=$request['doj'];
        $data->images=$image;
        $data->email=$request['email'];
        $data->save();          
        } 
        $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->doj=$request['doj'];       
        $data->email=$request['email'];
        $data->save();
        return redirect()->back()->with('success','Updated successfully');
          
        // return view('profile',compact('data'));
       
    }

     
    
    public function changedpassword(Request $request)
    {
        // dd($request);exit();;;
        // echo Auth::user()->password;
        // dd(Session::get('password'));exit();
        $request->validate([
            
            'oldpassword' => 'required',
            'password' => 'min:5|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required|min:5',
        ]);
        
        if($request['oldpassword']==Session::get('password'))
        {
        $store = User::find(Auth::user()->id); 
        $store->password =Hash::make($request['password']);      
        $store->save();
         Auth::logout();        
        $request->session()->invalidate();
        $request->session()->flash('errors', 'You are logged out!');
        return redirect('/');}
        else{
        return redirect()->back()->with('warning', 'Please Give correct oldpassword');}      
    }
    public function changepassword()
    {       
          
        return view('changepassword');
       
    }
   
    public function userprofile()
    {       
          $data = User::find( Auth::user()->id); 
          $department = Department::select('*')->get();
          
        return view('userprofile',['data' => $data, 'department' => $department]);
        
       
    }
     public function userprofileview()
    {       


        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $today = date('Y-m-d');
        $result = array();

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$today)->where('status','1')->whereRaw('FIND_IN_SET(?,dept_id)', [$dept])->get();

        if(isset($upcoming[0]))
        {
            
            
            
                $title = Title::select('*')->where('id',$upcoming[0]->title_id)->get();

                $result['title_name'] = $title[0]->title_name;
                $result['id'] = $upcoming[0]->id;

                
                // echo "<pre>";print_r($upcoming);exit();
                 $data[0] = User::find( Auth::user()->id); 
              // dd($data['dept_id']);
              $data[1] = Department::find($data[0]['dept_id']);

                // return view('updatequestion',['post_data' => $result]);
                return view('userprofileview',['data' => $data, 'post_data' => $result]);
            

            
        }
        else
        {
              $data[0] = User::find( Auth::user()->id); 
              // dd($data['dept_id']);
              $data[1] = Department::find($data[0]['dept_id']);
              // dd()
            return view('userprofileview',['data' => $data]);
        }
        
       
    }
    public function usereditprofile(Request $request)
    {

        // dd($request->file('img'));
        $upload_image=$request->file('img');
        if(!empty($upload_image)){         
        $image=$upload_image->getClientOriginalName();
        $upload_image->move(public_path().'/uploads/', $image); 
         $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->images=$image;
        $data->save();          
        } 
        $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->save();
        return redirect()->back()->with('success','Updated successfully');
          
        // return view('profile',compact('data'));
       
    }
    
    public function userchangepassword()
    {       
          
        return view('userchangepassword');
       
    }
    public function userchangedpassword(Request $request)
    {
        // dd($request);exit();;;
        // echo Auth::user()->password;
        // dd(Session::get('password'));exit();
        $request->validate([
            
            'oldpassword' => 'required',
            'password' => 'min:5|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required|min:5',
        ]);
        
        if($request['oldpassword']==Session::get('password'))
        {
        $store = User::find(Auth::user()->id); 
        $store->password =Hash::make($request['password']);      
        $store->save();
         Auth::logout();        
        $request->session()->invalidate();
        $request->session()->flash('errors', 'You are logged out!');
        return redirect('/user/login');}
        else{
        return redirect()->back()->with('warning', 'Please Give correct oldpassword');}      
    }
    
    
    
}
