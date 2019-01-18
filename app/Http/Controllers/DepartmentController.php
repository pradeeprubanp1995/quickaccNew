<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Hash;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


        public function __construct()
        {
            $this->middleware('is_admin');
        }

        public function index()
        {
            //
            $result = Department::select('*')->paginate(4);
            // dd($result[0]);

            return view('department',['dept_data' => $result]);
        }
        public function add(Request $request)
        {
            //
            $check = Department::where('dept_name',$request['dept_name'])->exists();
            if($check == true)
            {
                return redirect('/department')->with('danger', $request['dept_name'].' department has already exists');
            }
            // dd($check);
            $add = new Department;
            $add->dept_name = $request['dept_name'];
            $added=$add->save();
            // return view('/department');
            return redirect('/department')->with('success', $request['dept_name'].' has been added successfully');

        }

        public function deptedit($id,Request $request)
        {
            //
            $dept = Department::find($id);
            $dept->dept_name = $request['dept_name'];
            $dept->save();
            return redirect('/department')->with('warning', $request['dept_name'].' has been updated successfully');
        }

        public function deptdel($id)
        {
            //
            $dept = Department::find($id);
            $dept->delete();
            return redirect('/department')->with('success', 'Deleted successfully');
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }


    // for adminHomecontroller

    
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
         Session::flush();     
        // $request->session()->invalidate();
        // $request->session()->flash('errors', 'You are logged out!');
        return redirect('/login');}
        else{
        return redirect()->back()->with('warning', 'Please Give correct oldpassword');}      
    }
    public function changepassword()
    {       
          
        return view('changepassword');
       
    }
}
