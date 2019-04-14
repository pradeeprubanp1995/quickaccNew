<?php

namespace App\Http\Controllers;

use App\weekpoints;
use Illuminate\Http\Request;
use App\Upcoming_title;
use App\Department;
use App\Category;
use App\User;
use App\Title;
use DB;
use Hash;
use Auth;
use Session;

class WeekpointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function status_cron()
    {        
        

    }
    public function title_cron()
    {
     
    }


     public function userdash()
    {
        return view('userdashboard');
    }
     public function userlogin()
    {
         

        return view('userlogin');
    }

     public function paymentpage()
    {
            $userid = Auth::user()->id;
            $premiumid = User::select('premium_id')->where('id',$userid)->first();
            $premium = Category::where('id' ,$premiumid->premium_id)->first();
            $user=array();
            $user['id']=$userid;
            $user['uname'] = Auth::user()->email;
        // echo "<pre>";print_r($premium);exit;
        return view('paymentpage' , ['premium' => $premium ,'user' => $user]);
    }
    public function getamount()
    {
        $id =$_POST['premium'];
        $data = \DB::table('categories')->select('*')->where('id',$id)->first();
        echo json_encode($data);
        // print_r($data);
    }



    public function paypalerror()
    {
      // echo "<pre>";print_r($_POST);print_r($_REQUEST);print_r($_GET); exit;
        return view('paypalerror');
    }
    public function paypalsuccess()
    {

      // Auth::logout();
      // session::flush();

      // echo "<pre>";print_r($_POST['item_name']); exit;

      $preid = $_POST['item_number'];
      $userid = $_POST['item_name'];
      $amt = $_POST['payment_gross'];
      // $preid = 4;
      // $mail = 'pradeepruban.p1995@gmail.com';
      $getpre = \DB::table('categories')->select('*')->where('id',$preid)->first(); 
      $count = $getpre->count;
      $days = $getpre->days;
      $exdate = date('Y-m-d',strtotime("+".$days." day"));


      $payrecords = array('userid' => $userid ,'premium_id' => $preid , 'amount' =>$amt);
      $paymentinsert = \DB::table('payments')->insert($payrecords);


      
      $statuschange =  \DB::table('users')->where('id',$userid)->update(array('status' =>'1','count' => $count, 'expiredate' => $exdate , 'current_cnt' => $count ));
        // echo "<pre>";print_r($data->status);exit;
        return view('paypalsuccess');
    }



   

   

}
