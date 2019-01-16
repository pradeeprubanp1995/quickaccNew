<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Auth;
use App\Upcoming_title;
use App\Title;
use App\Result;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));
        $result = array();

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$tomorrow)->where('status','1')->where('dept_id', $dept)->get();


        // echo "<pre>";print_r($upcoming[0]);exit;

        if(isset($upcoming[0]))
        {
             $question = Question::select('*')->where('user_id',$userid)->where('upcomingtitle_id',$upcoming[0]->id)->get();

             if(isset($question[0]))
             {
            // echo "<pre>";print_r($question);exit;
            
                return view('quizview',[ 'post_data' => $question[0]]);
            }
            else
            {
                return view('quizview');
            }
            

            
        }
       
            return view('quizview');
       
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
        if($dept_id == ''){
                
            return view('testquestion',['empty' => '']);
            }
        // dd($dept_id);
        $upcoming_id=Upcoming_title::where('dept_id',$dept_id)->where('date_of_quiz',$date)->get();
         if($upcoming_id->isEmpty()){
                
            return view('testquestion',['empty' => '']);
            }
        $id=$upcoming_id[0]['id'];
        // echo $id;exit;
        $question = Question::where('upcomingtitle_id',$id)->get();
        // dd($question);

        return view('testquestion',['ques' => $question,'id' => $id]);
    }



     public function updatequestioninput()
    {   
        $userid = Auth::user()->id;
        $dept = Auth::user()->dept_id;
        $tomorrow = date("Y-m-d", strtotime('tomorrow'));
        $result = array();

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$tomorrow)->where('status','2')->where('dept_id', $dept)->get();

        if(isset($upcoming[0]))
        {
            
            
            
                $title = Title::select('*')->where('id',$upcoming[0]->title_id)->get();

                $result['title_name'] = $title[0]->title_name;
                $result['id'] = $upcoming[0]->id;

                
                
                return view('updatequestion',['post_data' => $result]);
            

            
        }
        else
        {
            echo "something went wrong";exit;
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
        // echo"<pre>";print_r($getcount);exit;
        if($getquescount <= 2)
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
}
