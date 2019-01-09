<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Department;
use App\Category;
use DB;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $result = array();
        //$result = Title::select('*')->get();
        $result[0] = Title::with('category','subcategory')->get();
// echo "<pre>";print_r($result);exit;
        $result[1] = \DB::table("titles")
        ->select("titles.*",\DB::raw("GROUP_CONCAT(departments.dept_name) as deptname"))
        ->leftjoin("departments",\DB::raw("FIND_IN_SET(departments.id,titles.dept_id)"),">",\DB::raw("'0'"))
        ->groupBy("titles.id")  
        ->get();
        

               // dd($result);
        return view('titlelist',['post_data' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtitleinput()
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->get();
        // dd($result);
         return view('addtitle',['post_data' => $result]);
    }
    public function edittitleinput($id)
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->get();
        $result[2] = Title::select('*')->where('id' , $id)->first();
        // dd($result[2]);
         return view('edittitle',['post_data' => $result]);
    }
    public function createtitle(Request $request)
    {
        
        $title = new Title();
        $data = $this->validate($request, [
            'title'=>'required',
            'category'=>'required',
            
            'dept'=> 'required',
            
        ]);
        if(!isset($request['subcategory']))
        {
            $data['subcategory'] = '0';
        }

//         
            $title->title_name = $data['title'];
            $title->cat_id = $data['category'];
            $title->subcat_id = $data['subcategory'];
            $title->dept_id = implode(",", $data['dept']);
            $title->save();

            return redirect()->route('title')->with('success','Insert Successfully');

        // print_r($_POST);exit;
    }
    public function edittitle(Request $request)
    {
        $id = $request['titleid'];
        // print_r($id);exit;

         // $title = new Title();
        $data = $this->validate($request, [
            'title'=>'required',
            'category'=>'required',
            'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);

        $title = Title::find($id);
        $title->title_name = $data['title'];
        $title->cat_id = $data['category'];
        $title->subcat_id = $data['subcategory'];
        $title->dept_id = implode(",", $data['dept']);
        $title->save();

       
        return redirect()->route('title')->with('success','Updated Successfully');

    }
    public function deletetitle($id)
    {

        $title = Title::find($id);
        $title->delete();
        return redirect('/title')->with('danger', 'Deleted successfully');
    }

    public function getsubcategory()
    {
        $cat=$_REQUEST['category'];
        $data=Category::select("*")->where('parent_id',$cat)->get();
        echo json_encode($data);
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
       


        $data = $this->validate($request, [
            'titleauto'=>'required',
            'category'=>'required',
            'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);

         DB::table('upcoming_title_tbl')->insert(['title_id'=>$data['titleauto'],
'dept_id'=>$data['dept'],'date_of_quiz'=>$tomorrow,'status'=>'2']);
         
           

            return redirect()->route('addupcomminginput')->with('success','Insert Successfully');

        // print_r($_POST);exit;
    }





    public function titleautosearch() {

        // $title=$_REQUEST['title'];
        $cat=$_REQUEST['cat'];
        $subcat=$_REQUEST['subcat'];
        $dept=$_REQUEST['dept'];

        //  $cat=1;
        // $subcat=3;
        // $dept=2;
        // print_r($_POST); exit;
        
        $getdata=Title::select('*')->where('cat_id',$cat)->where('subcat_id',$subcat)
        ->whereRaw('FIND_IN_SET(?,dept_id)', [$dept])
        ->get();
        echo json_encode($getdata);

        // echo "<pre>";print_r($getdata);exit;
        
    }


     public function upcominglist()
    {

        
        $result = array();
        //$result = Title::select('*')->get();
        $result[0] = DB::table('upcoming_title_tbl')->with('department','title')->get();
echo "<pre>";print_r($result);exit;
        $result[1] = \DB::table("titles")
        ->select("titles.*",\DB::raw("GROUP_CONCAT(departments.dept_name) as deptname"))
        ->leftjoin("departments",\DB::raw("FIND_IN_SET(departments.id,titles.dept_id)"),">",\DB::raw("'0'"))
        ->groupBy("titles.id")  
        ->get();
        

               // dd($result);
        return view('titlelist',['post_data' => $result]);
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
     * @param  \App\title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, title $title)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(title $title)
    {
        //
    }
}
