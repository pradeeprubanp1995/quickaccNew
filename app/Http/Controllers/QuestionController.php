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
        $user_id = Auth::id();
        // check for user already attended result
        $resultcheck = Result::where('user_id',$user_id)->where('today_date',date("Y-m-d"))->exists();

        if($resultcheck == true)
        {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function updatequestioninput()
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
        // print_r(json_encode($hold));exit;
        $question = new Question();
        $data = $this->validate($request, [
            'ques'=>'required',
            // 'keys'=>'required',
            'answer'=> 'required',
            
        ]);
        
            $question->upcomingtitle_id = $_POST['upcomingid'];
            $question->question = $data['ques'];
            $question->options = $options;
            $question->answer = $data['answer'];
            $question->save();


            $userid = Auth::user()->id;
            $dept = Auth::user()->dept_id;
            $today = date('Y-m-d');
            

        $upcoming = Upcoming_title::find($_POST['upcomingid']);
        $upcoming->status = '0';
        $upcoming->save();

            echo '1';

            // return redirect()->route('updatequestioninput')->with('success','Insert Successfully');
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
