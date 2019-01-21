<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Department;
use App\Category;
use DB;
use App\Upcoming_title;

class TitleController extends Controller
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

        
        $result = array();
        
        $title = \DB::table("titles")
        ->select("titles.*",\DB::raw("GROUP_CONCAT(departments.dept_name) as deptname"))
        ->leftjoin("departments",\DB::raw("FIND_IN_SET(departments.id,titles.dept_id)"),">",\DB::raw("'0'"))
        ->groupBy("titles.id")  
        ->paginate(10);
        
        
        

        // foreach ($title as $key => $value) 
        // {

        //     $category = Category::select('*')->where('id',$value->cat_id)->get();
        //     if($value->subcat_id == 0 )
        //     {
        //         $result[$key]['subcat_name'] = 'None';
        //     }
        //     else
        //     {
        //         $subcategory = Category::select('*')->where('id',$value->subcat_id)->get();
        //         $result[$key]['subcat_name'] = $subcategory[0]->cat_name;

        //     }
            

        //         $result[$key]['id'] = $value->id;
        //         $result[$key]['deptname'] = $value->deptname;
        //         $result[$key]['title_name'] = $value->title_name;
        //         $result[$key]['cat_name'] = $category[0]->cat_name;
                
        // }


// echo "<pre>";print_r($result);exit();
        
       
        return view('titlelist',['post_data' => $title]);
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
        $result[1] = Category::select('*')->where('parent_id','0')->get();
        // dd($result);
         return view('addtitle',['post_data' => $result]);
    }
    public function edittitleinput($id)
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->where('parent_id','0')->get();
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
            // echo "dsfdsf";exit;
            $request['subcategory'] = '0';
        }
        // print_r(implode(",", $data['dept']));exit;
        // exit;
            $title->title_name = $data['title'];
            $title->cat_id = $data['category'];
            $title->subcat_id = $request['subcategory'];
            $title->dept_id = implode(",", $data['dept']);
            $title->save();

            return redirect()->route('admin.title')->with('success','Insert Successfully');

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
            // 'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);

        if(!isset($request['subcategory']))
        {
            $request['subcategory'] = '0';
        }

        $title = Title::find($id);
        $title->title_name = $data['title'];
        $title->cat_id = $data['category'];
        $title->subcat_id = $request['subcategory'];
        $title->dept_id = implode(",", $data['dept']);
        $title->save();

       
        return redirect()->route('admin.title')->with('success','Updated Successfully');

    }
    public function deletetitle($id)
    {
        $upcoming = Upcoming_title::select('id')->where('title_id',$id)->where('status','1' || '2')->get();
        // dd($upcoming);
        if($upcoming->isEmpty())
        {
            $title = Title::find($id);
            $title->delete();
            return redirect('/admin/title')->with('danger', 'Deleted successfully');
        }
        else
        {
            return redirect()->back()->with('danger', 'This Title still using in Upcoming Table. So you can not delete this.' );
        }
        
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




    





    public function titleautosearch() {
       

        // $title=$_REQUEST['title'];
        $cat=$_REQUEST['cat'];
        $subcat=$_REQUEST['subcat'];
        $dept=$_REQUEST['dept'];

        // echo $subcat; exit;
        //  $cat=1;
        // $subcat=3;
        // $dept=2;
        // print_r($_POST); exit;
        if($subcat == '')
        {
            
             $getdata=Title::select('*')->where('cat_id',$cat)->where('subcat_id',NULL)
            ->whereRaw('FIND_IN_SET(?,dept_id)', [$dept])
            ->get();
             // print_r($_REQUEST);
            echo json_encode($getdata);
        }
        else
        {
            $getdata=Title::select('*')->where('cat_id',$cat)->where('subcat_id',$subcat)
                ->whereRaw('FIND_IN_SET(?,dept_id)', [$dept])
                ->get();
                echo json_encode($getdata);
        }
        

        // echo "<pre>";print_r($getdata);exit;
        
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
