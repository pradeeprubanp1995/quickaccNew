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
use Redirect;

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
        $result = Category::select('*')->paginate(4);
        // dd($result);
        return view('category',['cat_data' => $result]);
    }

    public function add()
    {
        //
        // $items = department::all('dept_name', 'id');
        // $cat = Category::get();
        // dd($items);
        return view('categoryadd');
    }
    public function addcat(Request $request)
    {
        // // dd($request);
        // $cat = Category::where('parent_id',$request['parent_category'])
        // ->where('cat_name',$request['category'])
        // ->exists();
        // dd($cat);
         // 'email' => 'required|email|unique:users',
                // 'mobileno' => 'required|numeric',
                // 'password' => 'required|min:3|max:20',
                // 'confirm_password' => 'required|min:3|max:20|same:password',
                // 'details' => 'required'

       
        $this->validate($request,[
                'primeum' => 'required',
                'amt' => 'required',
                'count' => 'required',
                'days' => 'required',
               
            
            ]);

        $cat = Category::where('primeum',$request['primeum'])->exists();
        if($cat == true)
        {
        return redirect('/admin/category')->with('danger', $request['primeum'].' has already exists');
        }
        $add = new Category;
        $add->primeum = $request['primeum'];
        $add->amt = $request['amt'];
        $add->count = $request['count'];
        $add->days = $request['days'];
        $added=$add->save();

        return redirect('/admin/category')->with('success', $request['primeum'].' has been added successfully');
    }
    public function updatecat(Request $request,$id)
    {
        // dd($request);
        // $cat = Category::where('parent_id',$request['parent_category'])
        // ->where('cat_name',$request['category'])
        // ->exists();
        // //dd($cat);

         $this->validate($request,[
                'primeum' => 'required',
                'amt' => 'required',
               'count' => 'required',
               'days' => 'required',
            
            ]);


        // $cat = Category::where('primeum',$request['primeum'])->exists();
        // if($cat == true)
        // {
        //          return redirect('/admin/category')->with('danger', $request['primeum'].' has already exists');
        // }
        $update = Category::find($id);
        $update->primeum = $request['primeum'];
        $update->amt = $request['amt'];
        $update->count = $request['count'];
        $update->days = $request['days'];
        $update->save();

        return redirect('/admin/category')->with('success', $request['primeum'].' has been Updated');
        
    }
   
    public function catdel($id)
    {
        //

        $cat = Category::find($id);
        // dd($id);
        $cat->delete();

        return redirect('/admin/category')->with('success', 'Deleted successfully');
    }

   
    public function edit($id)
    {
        //
        $cat = Category::find($id);
        // dd($cat);
        // $parent = Category::where('parent_id', 0)->get();
        // $sub = category::where('parent_id',$id)->get();
        // dd($sub);
        return view('categoryedit',['cat_data' => $cat ]);
    }

   


    
}
