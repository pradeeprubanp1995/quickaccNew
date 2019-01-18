<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Title;
use App\User;
use Auth;
use Session;
use Hash;
use App\Category;

class AdminHomeController extends Controller
{
    //
    // for admin Controller

	 public function __construct()
    {
        $this->middleware('auth');
    }


     public function adminindex()
    {
        $result = array();
        $result[0] = Department::select('*')->get();
        $result[1] = Category::select('*')->where('parent_id','0')->get();
        // dd($result);
         return view('addupcomming',['post_data' => $result]);
    }
    
}
