<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Department;
use App\Title;
use App\User;
use Auth;
use Session;
use Hash;

class CategoryController extends Controller
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
        $result = Category::select('*')->paginate(10);
        // dd($result);
        return view('category',['cat_data' => $result]);
    }

    public function add()
    {
        //
        // $items = department::all('dept_name', 'id');
        $cat = Category::where('parent_id', 0)->get();
        // dd($items);
        return view('categoryadd',['cat' => $cat]);
    }
    public function addcat(Request $request)
    {
        // dd($request);
        $cat = Category::where('parent_id',$request['parent_category'])
        ->where('cat_name',$request['category'])
        ->exists();
        // dd($cat);
        if($cat == true)
        {
        return redirect('/category')->with('danger', $request['category'].' has already exists');
        }
        $add = new Category;
        $add->cat_name = $request['category'];
        $add->parent_id = $request['parent_category'];
        $added=$add->save();

        return redirect('/category')->with('success', $request['category'].' has been added successfully');
    }
    public function updatecat(Request $request,$id)
    {
        // dd($request);
        $cat = Category::where('parent_id',$request['parent_category'])
        ->where('cat_name',$request['category'])
        ->exists();
        //dd($cat);
        if($cat == true)
        {
        return redirect('/category')->with('danger', $request['category'].' has already exists');
        }
        $update = Category::find($id);
        $update->cat_name = $request['category'];
        $update->parent_id = $request['parent_category'];
        $update->save();

        return redirect('/category')->with('success', $request['category'].' has been Updated');
    }
   
    public function catdel($id)
    {
        //

        $cat = Category::find($id);
        // dd($id);
        $cat->delete();

        return redirect('/category')->with('success', 'Deleted successfully');
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $cat = Category::find($id);
        // dd($cat);
        $parent = Category::where('parent_id', 0)->get();
        // $sub = category::where('parent_id',$id)->get();
        // dd($sub);
        return view('categoryedit',['cat_data' => $cat , 'parent_data' => $parent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }




    // for admin Controller




     public function adminindex()
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->where('parent_id','0')->get();
        // dd($result);
         return view('addupcomming',['post_data' => $result]);
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
