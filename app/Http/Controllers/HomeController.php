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
        return view('userdashboard');
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

    public function cron(){
        $date=date("Y-m-d");
        $data=Upcoming_title::get()->where('status','2')->where('date_of_quiz','<=',$date);
        foreach ($data as $value) {
            $id=$value['id'];
            $title=$value['title_id'];
            if($title=="0"){
            $newtitle=Title::all()->random(1);
            $randomtitle=json_decode($newtitle);
            // echo '<pre>';print_r($randomtitle);
            $data=Upcoming_title::find($id);
            $data->status="1";                       
            $data->title_id=$randomtitle[0]->id;
            $data->save();
            // echo $newtitle;
            }
        }
       
        

        // $data->status="1";
        // $data->save();
        // echo"ok";


    }



    
    
}
