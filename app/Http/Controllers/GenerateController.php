<?php

namespace App\Http\Controllers;

use App\Generate;
use Illuminate\Http\Request;
use App\Department;
use Redirect;

class GenerateController extends Controller
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
            
           $result = \DB::table('generates')
        ->leftJoin('departments', 'departments.id' , '=',  'generates.service_id')
        ->select('generates.id as gen_id','generates.service_id','generates.gname','generates.username','generates.password','departments.*')
        ->paginate(10);

            // echo "<pre>"; print_r($result);exit;
            // $premium = Category::get();
            

            return view('generate',['dept_data' => $result]);
        }
        public function add()
        {

                $service = Department::get();

                return view('addgenerate' , ['service' => $service]);

            //
           

        }
          public function adddept (Request $request)
        {
            // echo "<pre>";print_r($_REQUEST);exit;
            // echo $request['service_name']; exit;
             if($request['service_name'] == 0 || !isset($request['service_name']))
            {
                return Redirect::back()->withErrors(['Please select Premium', 'errors']);
            }
            $this->validate($request,[
                'service_name' => 'required',
                'gname' => 'required',
               'username' => 'required|min:6',
               'password' => 'min:6|required',
               // 'password_confirmation' => 'min:6|required',
               // 'created_at' => date('Y-m-d H:i:s'),
                // 'updated_by' => date('Y-m-d H:i:s')
            
            ]);

           

            $check = Generate::where('username',$request['username'])->exists();
            if($check == true)
            {
                return Redirect::back()->withErrors([ 'User Name has already exists', 'errors']);
            }
            // dd($check);
            $add = new Generate;
            $add->service_id = $request['service_name'];
            $add->gname = $request['gname'];
            $add->username = $request['username'];
            $add->password = $request['password'];
            $added=$add->save();
            // return view('/department');
            return redirect('/admin/generate')->with('success', $request['username'].' has been added successfully');
        }
        // public function deptedit($id)
        // {
        //     // echo $id;exit;  
        //      $dept = Department::find($id);
        //  // echo "<pre>";print_r($dept);exit; 
        // $primeum = Category::select('id','primeum')->get();
        // // $sub = category::where('parent_id',$id)->get();
        // // echo "<pre>";print_r($dept['id']); echo "<pre>";print_r($primeum[0]['id']);exit;
        // return view('deptedit',['dept_data' => $dept , 'premium' => $primeum]);
            
        // }
        // public function updatedept(Request $request,$id)
        // {
        //      // dd($request['premium']);
        //     // echo "<pre>";print_r($request['premium']);exit;

        //     if($request['premium'] == 0 || !isset($request['premium']))
        //     {
        //         return Redirect::back()->withErrors(['Please select Premium', 'errors']);
        //     }
        //     if($request['service_name'] == '' || !isset($request['service_name']))
        //     {
        //         return Redirect::back()->withErrors(['Please Enter Service Premium', 'errors']);
        //     }
           

        //     // $check = Department::where('service_name',$request['service_name'])->exists();
        //     // if($check == true)
        //     // {
        //     //     return Redirect::back()->withErrors([ 'Service Name has already exists', 'errors']);
        //     // }


        //     $dept = Department::find($id);
        //     $dept->service_name = $request['service_name'];
        //     $dept->save();
        //     return redirect('/admin/department')->with('warning', $request['service_name'].' has been updated successfully');
        // }
        // public function deptdelete($id)
        // {

        //     // print_r($id);exit;
        //     //
        //     $dept = Department::find($id);
        //     $dept->delete();
        //     return redirect('/admin/department')->with('success', 'Deleted successfully');
        // }



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
     * @param  \App\Generate  $generate
     * @return \Illuminate\Http\Response
     */
    public function show(Generate $generate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generate  $generate
     * @return \Illuminate\Http\Response
     */
    public function edit(Generate $generate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generate  $generate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generate $generate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generate  $generate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generate $generate)
    {
        //
    }
}
