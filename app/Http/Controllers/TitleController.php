<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Department;
use App\Category;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$result = Title::select('*')->get();
        $result = Title::with('department','category','subcategory')->get();
        //$result = title::find(1)->department();
// echo "<pre>";print_r($result);exit;
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
            'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);
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
        return redirect('/title')->with('success', 'Deleted successfully');
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
        print_r($request);exit;
        $title = new Title();
        $data = $this->validate($request, [
            'title'=>'required',
            'category'=>'required',
            'subcategory'=> 'required',
            'dept'=> 'required',
            
        ]);
//         
            $title->title_name = $data['title'];
            $title->cat_id = $data['category'];
            $title->subcat_id = $data['subcategory'];
            $title->dept_id = implode(",", $data['dept']);
            $title->save();

            return redirect()->route('index')->with('success','Insert Successfully');

        // print_r($_POST);exit;
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
