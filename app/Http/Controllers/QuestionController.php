<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Auth;
use App\Upcoming_title;
use App\Title;
use App\Result;
use App\User;
use App\Department;
use Session;
use Hash;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('is_user');
    }

    public function index()
    {
        
        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));
        $today = date("Y-m-d");
        $result = array();
        $title = array();
        $question = Upcoming_title::select('*')->where('date_of_quiz',$tomorrow)->where('status','2')->where('dept_id', $dept)->get();
        $quiz = Upcoming_title::select('*')->where('date_of_quiz',$today)->where('status','1')->where('dept_id', $dept)->get();

        // echo "<pre>";print_r(isset($question));exit;
        if(isset($question[0]))
        { 
            // echo "1";exit;
            $title[0] = Title::select('*')->where('id',$question[0]->title_id)->get();    
        }
        if(isset($quiz[0]))
        {
            // echo "2";exit;
            $title[1] = Title::select('*')->where('id',$quiz[0]->title_id)->get();    
        }
        // echo "<pre>";print_r($title);exit;
        return view('quizview',[ 'post_data' => $title , 'showerror' => '1']);
        
        // echo "<pre>";print_r($upcoming[0]->title_id);exit;

       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function attendquiz()
    {
        $user_id = Auth::id();
        // check for user already attended result
        $resultcheck = Result::where('user_id',$user_id)->where('today_date',date("Y-m-d"))->exists();
// dd($resultcheck);
        if($resultcheck == true)
        {
            // echo "sdfds";exit;  
            return redirect('/result')->with('danger','Already submitted');
        }

        $date=date("Y-m-d");
        $dept_id=Auth::user()->dept_id;
        
        
        $upcoming_id=Upcoming_title::where('dept_id',$dept_id)->where('date_of_quiz',$date)->where('status','1')->get();
        // dd($upcoming_id);
         if($upcoming_id->isEmpty()){
                
            return view('testquestion',['empty' => '']);
            }
        $id=$upcoming_id[0]['id'];
        // echo $id;exit;
        $question = Question::where('upcomingtitle_id',$id)->get();
        // dd($question);
        if($question->isEmpty()){
                
            return view('testquestion',['empty' => '']);
            }

        return view('testquestion',['ques' => $question,'id' => $id]);
    }



     public function updatequestioninput()
    {   
        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));
        $result = array();

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$tomorrow)->where('status','2')->where('dept_id', $dept)->get();

        $title = Title::select('*')->where('id',$upcoming[0]->title_id)->get();

            $result['title_name'] = $title[0]->title_name;
            $result['id'] = $upcoming[0]->id;


         if(isset($upcoming[0]))
        {
             $question = Question::select('*')->where('user_id',$userid)->where('upcomingtitle_id',$upcoming[0]->id)->get();

             // echo "<pre>";print_r($question[0]);exit;

             if(isset($question[0]))
             {
            
            
                return view('viewupdatequiz',[ 'post_data' => $question[0] ,'result' => $result ]);
            }
            
       
            return view('updatequestion',['post_data' => $result]);
            

            
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatequestion(Request $request)
    { 
        $hold =array();
        if(isset($_POST['keys']))
        {
            foreach ($_POST['keys'] as $key => $value) {
                $hold[$key] = array('options' => $value);
            }
        }
        $options = json_encode($hold);
        // print_r($_POST);exit;
        $question = new Question();
        $data = $this->validate($request, [
            'ques'=>'required',
           
            'keys_radio'=> 'required',
            
        ]);


        $getquescount = Question::select('id')->where('upcomingtitle_id' , $_POST['upcomingid'])->count();
        // echo"<pre>";print_r($_POST['upcomingid']);exit;
        if($getquescount <= 4)
        {
            
            $question->user_id = Auth::user()->id;
            $question->upcomingtitle_id = $_POST['upcomingid'];
            $question->question = $data['ques'];
            $question->options = $options;
            $question->answer = $data['keys_radio'];
            $question->save();


            $userid = Auth::user()->id;
            $dept = Auth::user()->dept_id;
            $today = date('Y-m-d');
            

        // $upcoming = Upcoming_title::find($_POST['upcomingid']);
        // $upcoming->status = '1';
        // $upcoming->save();

            // echo '1';

            return redirect()->route('quiz')->with('success','Your question posted Successfully');
        }
        else
        {
            return redirect()->back()->with('danger','That title already have 20 questions.Thank you..');
        }
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
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }


    // for HomeController
   
    public function userprofile()
    {       
          $data = User::find( Auth::user()->id); 
          $department = Department::select('*')->get();
          
        return view('userprofile',['data' => $data, 'department' => $department]);
        
       
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

        // dd($request->file('img'));
        $upload_image=$request->file('img');
        if(!empty($upload_image)){         
        $image=$upload_image->getClientOriginalName();
        $upload_image->move(public_path().'/uploads/', $image); 
         $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->images=$image;
        $data->save();          
        } 
        $data = User::find( $request['id']);
        $data->user_id=$request['userid'];
        $data->name=$request['name'];
        $data->gender=$request['gender'];
        $data->save();
        return redirect()->back()->with('success','Updated successfully');
          
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
        return redirect('/login');}
        else{
        return redirect()->back()->with('warning', 'Please Give correct oldpassword');}      
    }

}
