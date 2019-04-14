<?php 

namespace App\Http\Controllers;

use App\Department;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Hash;
use DB;
use Redirect;
use Illuminate\Support\Facades\Validator;
use Image;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


        public function __construct()
        {
          
          
          // print_r(Auth::user()->id);exit;
            $this->middleware('is_admin');
        }

        public function index()
        {
          // echo Auth::user()->id;exit;
            
           $result = \DB::table('departments')
        ->leftJoin('categories', 'categories.id' , '=',  'departments.pre_id')
        ->select('departments.id as dept_id','departments.pre_id','departments.service_name','departments.image','categories.*')
        ->paginate(10);

            // echo "<pre>"; print_r($result);exit;
            // $premium = Category::get();
            

            return view('department',['dept_data' => $result]);
        }
        public function add()
        {

                $pre = Category::get();

                return view('deptadd' , ['pre' => $pre]);

            //
           

        }
          public function adddept (Request $request)
        {
            // echo $request['service_name']; exit;
             if($request['premium'] == 0 || !isset($request['premium']))
            {
                return Redirect::back()->withErrors(['Please select Premium', 'errors']);
            }
            if($request['service_name'] == '' || !isset($request['service_name']))
            {
                return Redirect::back()->withErrors(['Please Enter Service Premium', 'errors']);
            }
           

            $check = Department::where('service_name',$request['service_name'])->exists();
            if($check == true)
            {
                return Redirect::back()->withErrors([ 'Service Name has already exists', 'errors']);
            }
            // dd($check);




            // $postData = $request->only('file');
    $file = $request->file('service_img');

    // Build the input for validation
    $fileArray = array('service_img' => $file);

    // Tell the validator that this file should be an image
    $rules = array(
      'service_img' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
    );

    // Now pass the input and rules into the validator
    $validator = Validator::make($fileArray, $rules);

    // Check to see if validation fails or passes
    if ($validator->fails())
    { 
      // echo "not";exit;
          // Redirect or return json to frontend with a helpful message to inform the user 
          // that the provided file was not an adequate type
          return response()->json(['error' => $validator->errors()->getMessages()], 400);
    } else
    {
      // echo "ok";exit;
        // Store the File Now
        // read image from temporary file
        $upload_image=$request->file('service_img');
        $size = $request->file('service_img')->getClientSize();
        
        if(!$size)
        {
          return redirect()->back()->with('danger','Profile image should be less than 2MB');
        }
        if(!empty($upload_image)){


            $image=md5($upload_image->getClientOriginalName() . time()) . "." . $upload_image->getClientOriginalExtension();
            $upload_image->move(public_path().'/uploads/', $image); 

            // echo $image;exit;
                $add = new Department;
                $add->pre_id = $request['premium'];
                $add->service_name = $request['service_name'];
                $add->image = $image;
                $added=$add->save();
                // return view('/department');
                return redirect('/admin/department')->with('success', $request['service_name'].' has been added successfully');
            };



        
        }
      }
        public function deptedit($id)
        {
            // echo $id;exit;  
             $dept = Department::find($id);
         // echo "<pre>";print_r($dept);exit; 
        $primeum = Category::select('id','primeum')->get();
        // $sub = category::where('parent_id',$id)->get();
        // echo "<pre>";print_r($dept['id']); echo "<pre>";print_r($primeum[0]['id']);exit;
        return view('deptedit',['dept_data' => $dept , 'premium' => $primeum]);
            
        }
        public function updatedept(Request $request,$id)
        {
             // dd($request['premium']);
            // echo "<pre>";print_r($request['premium']);exit;

            if($request['premium'] == 0 || !isset($request['premium']))
            {
                return Redirect::back()->withErrors(['Please select Premium', 'errors']);
            }
            if($request['service_name'] == '' || !isset($request['service_name']))
            {
                return Redirect::back()->withErrors(['Please Enter Service Premium', 'errors']);
            }
           
             $file = $request->file('service_img');

          // Build the input for validation
          $fileArray = array('service_img' => $file);

           $rulesbefore = array(
            'service_img' => 'required' // max 10000kb
          );
            $validatorbefore = Validator::make($fileArray, $rulesbefore);

           if ($validatorbefore->fails() || $request['service_imgbackup'] != '')
          { 
            
          // Tell the validator that this file should be an image
                    $rules = array(
                      'service_img' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
                    );

                    // Now pass the input and rules into the validator
                    $validator = Validator::make($fileArray, $rules);

                    // Check to see if validation fails or passes
                    if ($validator->fails() )
                    { 
                      // echo "not";exit;
                          // Redirect or return json to frontend with a helpful message to inform the user 
                          // that the provided file was not an adequate type
                          return Redirect::back()->withErrors(['File not Acceptable', 'errors']);
                    }
                    else
                    {
                        
                          // Store the File Now
                          // read image from temporary file
                          $upload_image=$request->file('service_img');
                          
                          
                          
                          if(!empty($upload_image)){


                              $image=md5($upload_image->getClientOriginalName() . time()) . "." . $upload_image->getClientOriginalExtension();
                              $upload_image->move(public_path().'/uploads/', $image); 

                              // echo $image;exit;
                                  $add =  Department::find($id);
                                  $add->pre_id = $request['premium'];
                                  $add->service_name = $request['service_name'];
                                  $add->image = $image;
                                  $added=$add->save();
                                  // return view('/department');
                                  return redirect('/admin/department')->with('success', $request['service_name'].' has been added successfully');
                              };


                }      
              }
              else
              {

                      // echo "ok";exit;
                          $add =  Department::find($id);
                          $add->pre_id = $request['premium'];
                          $add->service_name = $request['service_name'];
                          $add->image = $request['service_imgbackup'];
                          $added=$add->save();
                          // return view('/department');
                          return redirect('/admin/department')->with('success', $request['service_name'].' has been added successfully');
              }


                     
              
        }
        public function deptdelete($id)
        {

            // print_r($id);exit;
            //
            $dept = Department::find($id);
            $dept->delete();
            return redirect('/admin/department')->with('success', 'Deleted successfully');
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


    // for adminHomecontroller

    
    public function profile()
    {
        $data = User::find( Auth::user()->id); 
          
        return view('profile',compact('data'));
       
    }
    public function editprofile(Request $request)
    {

        // dd($request->file('img'));
        $upload_image=$request->file('img');
        $size = $request->file('img')->getClientSize();
        if(!$size)
        {
          return redirect()->back()->with('danger','Profile image should be less than 2MB');
        }
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
        return redirect('/admin/login');}
        else{
        return redirect()->back()->with('warning', 'Please Give correct oldpassword');}      
    }
    public function changepassword()
    {       
          
        return view('changepassword');
       
    }
}
