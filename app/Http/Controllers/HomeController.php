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

        $data[1] = Result::select('*')->selectRaw('sum(points) as weekpoints')->whereBetween('today_date', array($weekfirst, $tommorrow))->where('dept_id',$dept_id)->groupBy('user_id')->orderBy('weekpoints', 'desc')->first();

        $data[2] = Result::select('*')->selectRaw('sum(points) as monthpoints')->whereBetween('today_date', array($firstmon, $tommorrow))->where('dept_id',$dept_id)->groupBy('user_id')->orderBy('monthpoints', 'desc')->first();

        // dd($data[1]);
        $user['today'] = User::find($data[0]['user_id']);

        $user['week'] = User::find($data[1]['user_id']);

        $user['month'] = User::find($data[2]['user_id']);
        


        return view('userdashboard',['post_data'=>$data , 'user' => $user]);
    }
   
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
        
    
    
}
