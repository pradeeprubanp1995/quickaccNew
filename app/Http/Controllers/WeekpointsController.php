<?php

namespace App\Http\Controllers;

use App\weekpoints;
use Illuminate\Http\Request;
use App\Upcoming_title;
use App\Department;
use App\Title;

class WeekpointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function status_cron()
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

    }
    public function title_cron()
    {
        $tommorrow =date("Y-m-d", strtotime('tomorrow'));
        $dept=Upcoming_title::select('dept_id')
                ->where('date_of_quiz',$tommorrow)->get();
        $particular_dept=Department::select('id','dept_name')
                ->whereNotIn('id', $dept)->get(); 

        // dd($particular_dept);      
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


     public function userlogin()
    {
        return view('userlogin');
    }













    public function index()
    {
        //
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
     * @param  \App\weekpoints  $weekpoints
     * @return \Illuminate\Http\Response
     */
    public function show(weekpoints $weekpoints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\weekpoints  $weekpoints
     * @return \Illuminate\Http\Response
     */
    public function edit(weekpoints $weekpoints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\weekpoints  $weekpoints
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, weekpoints $weekpoints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\weekpoints  $weekpoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(weekpoints $weekpoints)
    {
        //
    }
}
