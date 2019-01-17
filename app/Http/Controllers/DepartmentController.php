<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

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
}
