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

        $week = $this->getLastWeekDates();


$month_ini = new DateTime("first day of last month");
$month_end = new DateTime("last day of last month");

$firstmon = $month_ini->format('Y-m-d'); // 2012-02-01
$lastmon = $month_end->format('Y-m-d'); // 2012-02-29
    // exit;
    //     print_r($revenueMonth);


        $date = date('Y-m-d');
        $dept_id = Auth::user()->dept_id;
        $data[0] = Result::select('*')->where('today_date',$date)->where('dept_id',$dept_id)->orderBy('points', 'desc')->first();

        $data[1] = Result::select('*')->selectRaw('sum(points) as weekpoints')->whereBetween('created_at', array($week[0], $week[4]))->where('dept_id',$dept_id)->groupBy('user_id')->orderBy('weekpoints', 'desc')->first();

        $data[2] = Result::select('*')->selectRaw('sum(points) as monthpoints')->whereBetween('created_at', array($firstmon, $lastmon))->where('dept_id',$dept_id)->groupBy('user_id')->orderBy('monthpoints', 'desc')->first();

        // dd($getmonth);


        return view('userdashboard',['post_data'=>$data]);
    }
    public function adminindex()
    {
        return view('welcome');
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

        $date=date("Y-m-d");
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
        $title->date_of_quiz = $date;
        $title->status = '1';
        $title->dept_id = $key;
        $title->save();
        }
        
 

        
        
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
        $data->dept_id=$request['dept_id'];
        $data->images=$image;
        $data->email=$request['email'];
        $data->save();          
        } 
        $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->dept_id=$request['dept_id'];       
        $data->email=$request['email'];
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
