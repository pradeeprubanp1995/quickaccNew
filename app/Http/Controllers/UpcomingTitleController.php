<?php

namespace App\Http\Controllers;

use App\Upcoming_title;
use Illuminate\Http\Request;
use App\Department;
use App\Category;

class UpcomingTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Upcoming_title  $upcoming_title
     * @return \Illuminate\Http\Response
     */
    public function show(Upcoming_title $upcoming_title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upcoming_title  $upcoming_title
     * @return \Illuminate\Http\Response
     */
    public function edit(Upcoming_title $upcoming_title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upcoming_title  $upcoming_title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upcoming_title $upcoming_title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upcoming_title  $upcoming_title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upcoming_title $upcoming_title)
    {
        //
    }
    public function addupcomminginput()
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->get();
        // dd($result);
         return view('addupcomming',['post_data' => $result]);
    }




    public function createupcomming(Request $request)
    {
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        // dd($request);exit;
       

        $title = new Upcoming_title();
        $data = $this->validate($request, [
            'titleauto'=>'required',
            'category'=>'required',
            'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);

        $title->title_id = $data['titleauto'];
        $title->date_of_quiz = $tomorrow;
        $title->status = '2';
        $title->dept_id = $data['dept'];
        $title->save();

//          DB::table('upcoming_title_tbl')->insert(['title_id'=>$data['titleauto'],
// 'dept_id'=>$data['dept'],'date_of_quiz'=>$tomorrow,'status'=>'2']);
         
           

            return redirect()->route('upcomming')->with('success','Insert Successfully');

        // print_r($_POST);exit;
    }
    public function upcominglist()
    {

        
        $result= Upcoming_title::with('department','title')->get();
        // echo "<pre>";print_r($result);exit;

               // dd($result);
        return view('upcominglist',['post_data' => $result]);
    }

    // public function editupcominginput($id)
    // {
    //     $result = array();
    //     $result[0] = Department::select('*')->get();
    //     $result[1] = Category::select('*')->get();
    //     $result[2] = Upcoming_title::select('*')->where('id' , $id)->first();
    //     // dd($result[2]);
    //      return view('editupcoming',['post_data' => $result]);
    // }
    // public function editupcoming(Request $request)
    // {
    //     $id = $request['upcomingid'];
    //     // print_r($id);exit;

    //      // $title = new Title();
    //     $data = $this->validate($request, [
    //         'titleauto'=>'required',
    //         'category'=>'required',
    //         'subcategory'=> 'required',
    //         'dept'=> 'required',
            
    //     ]);
       

        // $title = Upcoming_title::find($id);
        // $title->title_id = $data['titleauto'];
        // $title->date_of_quiz = $date_of_quiz;
        // $title->status = $data['status'];
        // $title->dept_id = $data['dept'];
        // $title->save();

       
    //     return redirect()->route('upcomming')->with('success','Updated Successfully');

    // }
    public function deleteupcoming($id)
    {

        $title = Upcoming_title::find($id);
        $title->delete();
        return redirect('/upcominglist')->with('danger', 'Deleted successfully');
    }


}
