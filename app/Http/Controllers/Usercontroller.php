<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generate;
use App\Department;
use App\Category;
use Auth;
use Hash;
use App\User;
use Validator;
use Redirect;
use Session;
class Usercontroller extends Controller
{
    //

      public function __construct()
    {
        $this->middleware('is_user');
    }
     public function usergenerates()
    {

    	$preid = Auth::user()->premium_id;
    	// echo $preid;exit;
       
     //    $data = array();$service_id = array();
    	$result = Department::select('*')->where('pre_id',$preid)->get();
        $pre = Category::select('*')->where('id',$preid)->first();
    	// foreach ($result as $key => $value) {
    	// 	$service_id[$key]=$value->id;
    	// }
            // echo "<pre>";print_r($pre['primeum']);exit;
         // foreach ($result as $key => $value) {
         	// $data[$key] = Generate::select('*')->where('service_id', $value->id)->get();

        //  	$data = \DB::table('generates')
        // ->leftJoin('departments', 'departments.id' , '=',  'generates.service_id')
        // ->select('generates.id as gen_id','generates.service_id','generates.gname','generates.username','generates.password','departments.*')
        // // ->where('departments.pre_id' ,'=',$value->id)
        // ->whereIn('generates.service_id',$service_id)
        // ->paginate(10);


       
            // echo "<pre>"; print_r($result);exit;
            // $premium = Category::get();
            

            return view('usergenerate',['dept_data' => $result , 'pre' => $pre]);
    }
    public function generatelink($serviceid)
    {
      $id = Auth::user()->id;

      $getuserinfo = \DB::table('users')->select('current_cnt','count','expiredate')->where('id',$id)->first();

      $cnt = $getuserinfo->current_cnt;
      $totalcnt = $getuserinfo->count;
      $exdate = $getuserinfo->expiredate;
      $todaydate = date('Y-m-d');
// echo $todaydate ;exit;

            $cnt = $cnt-1;
            $updateuser = \DB::table('users')->where('id',$id)->update(array('current_cnt' =>$cnt));

      if($cnt <= 0)
      {
        // echo "ok";exit;
          $updateuser = \DB::table('users')->where('id',$id)->update(array('count' =>'0','expiredate' => '','premium_id' => '0','status' => '0'   ));          
          // session_unset();
             Auth::logout();
          Session::flush();
          return redirect('/')->with('danger', 'Your premium Available is completed. Please Update Your PREMIUM');
      }

      if(strtotime($todaydate) > strtotime($exdate))
      {

        $updateuser = \DB::table('users')->where('id',$id)->update(array('count' =>'0','expiredate' => '','premium_id' => '0','status' => '0','current_cnt' =>'0'   ));     

          Auth::logout();
          Session::flush();
          return redirect('/')->with('danger', 'Your premium Expired. Please Update Your PREMIUM');
      }



    	$service = Department::select('service_name')->where('id','=',$serviceid)->first();
    	$getgenerate = Generate::where('service_id','=',$serviceid)->first();
    	// echo "<pre>";print_r($service);exit;

    	return view('usergeneratelist',['list' => $getgenerate, 'service' => $service]);
    }
   



    //profile

    public function userprofile()
    {       

        $preid = Auth::user()->premium_id;
        
        $pre = Category::select('*')->where('id',$preid)->first();
        $id = Auth::user()->id;
        $user = \DB::table('users')->select('*')->where('id',$id)->first();
         // echo "<pre>";print_r($pre['primeum']);exit;
        
          
        return view('userprofile',['data' => $user, 'pre' => $pre]);
        
        
       
    }
     public function userprofileview()
    {       


        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $today = date('Y-m-d');
        $result = array();

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$today)->where('status','1')->whereRaw('FIND_IN_SET(?,dept_id)', [$dept])->get();

        if(isset($upcoming[0]))
        {
            
            
            
                $title = Title::select('*')->where('id',$upcoming[0]->title_id)->get();

                $result['title_name'] = $title[0]->title_name;
                $result['id'] = $upcoming[0]->id;

                
                // echo "<pre>";print_r($upcoming);exit();
                 $data[0] = User::find( Auth::user()->id); 
              // dd($data['dept_id']);
              $data[1] = Department::find($data[0]['dept_id']);

                // return view('updatequestion',['post_data' => $result]);
                return view('userprofileview',['data' => $data, 'post_data' => $result]);
            

            
        }
        else
        {
              $data[0] = User::find( Auth::user()->id); 
              // dd($data['dept_id']);
              $data[1] = Department::find($data[0]['dept_id']);
              // dd()
            return view('userprofileview',['data' => $data]);
        }
        
       
    }
    public function usereditprofile(Request $request)
    {

        // // dd($request->file('img'));
        // $upload_image=$request->file('img');
        // $size = $request->file('img')->getClientSize();
        // if(!$size)
        // {
        //   return redirect()->back()->with('danger','Profile image should be less than 2MB');
        // }
        // if(!empty($upload_image)){         
        // $image=$upload_image->getClientOriginalName();
        // $upload_image->move(public_path().'/uploads/', $image); 
        //  $data = User::find( $request['id']);
        
        // $data->name=$request['name'];
        // $data->phone=$request['phone'];
        // $data->images=$image;
        // $data->save();          
        // } 
        // $data = User::find( $request['id']);
        
        // $data->name=$request['name'];
        // $data->phone=$request['phone'];
        // $data->save();
        // return redirect()->back()->with('success','Updated successfully');






         $file = $request->file('img');

          // Build the input for validation
          $fileArray = array('img' => $file);

           $rulesbefore = array(
            'img' => 'required' // max 10000kb
          );
            $validatorbefore = Validator::make($fileArray, $rulesbefore);

           if ($validatorbefore->fails() )
          { 
            
          // Tell the validator that this file should be an image


                          $data = User::find( $request['id']);
        
                        $data->name=$request['name'];
                        $data->phone=$request['phone'];
                        
                        $data->save();        
                          // return view('/department');
                          return Redirect::back()->with('success', 'Updated successfully');
              
                       
              }
              else
              {
                        $rules = array(
                      'img' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
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
                          $upload_image=$request->file('img');
                          
                          
                          
                          if(!empty($upload_image)){


                              $image=md5($upload_image->getClientOriginalName() . time()) . "." . $upload_image->getClientOriginalExtension();
                              $upload_image->move(public_path().'/uploads/', $image); 

                              // echo $image;exit;
                                  $data = User::find( $request['id']);
        
                                    $data->name=$request['name'];
                                    $data->phone=$request['phone'];
                                    $data->images=$image;
                                    $data->save();        
                                  // return view('/department');
                                  return Redirect::back()->with('Updated successfully', 'errors');
                              };


                }   
            }
          
        // return view('profile',compact('data'));
       
    }
    
    public function userchangepassword()
    {       
          
        return view('userchangepassword');
       
    }
    public function userchangedpassword(Request $request)
    {
        // dd($request);exit();
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
        return redirect('/userlogin');}
        else{
        return redirect()->back()->with('danger', 'Please Give correct oldpassword');}      
    }


     public function pay()
    {
        
    }



    
}
