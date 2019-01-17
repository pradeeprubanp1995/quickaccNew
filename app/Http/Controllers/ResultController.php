<?php

namespace App\Http\Controllers;

use App\Result;
use Auth;
use DB;
use App\Question;
use App\Title;
use App\Upcoming_title;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Get loggedin User data
        $user_id = Auth::id();
        $dept_id = Auth::user()->dept_id;

        // check for user already attended result
        $resultcheck = Result::where('user_id',$user_id)->where('today_date',date("Y-m-d"))->exists();
        
        if($resultcheck == true)
        {
           return redirect('/result')->with('danger','Already submitted');
        }

        // Submitted data processing for result and points
         $utid=$request->upcomingtitle_id;
         $points = 0;
         $date = date("Y-m-d");
         $question = Question::where('upcomingtitle_id',$utid)->get();
         foreach($question as $q)
         {
           $qno = $q['id'];
           $correct = $q['answer'];
           $array = $q['options'];
            $options = json_decode($array, true);
            $correctanswer = $options[$correct]['options'];
            if($request[$qno] == $correctanswer){
                  $points++;
            }
            $jarray[]=[
                    'question_id'=>$qno,
                    'user_answer' => $request[$qno]
                ];
         }
         $user_answer= json_encode($jarray);

         // stores result table with values 
         $result = new Result;
         $result->user_id = $user_id;
         $result->dept_id = $dept_id;
         $result->today_date = $date;
         $result->user_answer = $user_answer;
         $result->points = $points;
         $result->save();
         
         // stores result point in user table
         $user = Auth::user();
         $user->points=$user['points']+$points;
         $user->save();

         // redirect to view result
         return redirect()->route('resultview');
    }
    public function indexx()
    {
        // instant view for result
        $user_id = Auth::id();
        // dd($user_id);
        $dept_id = Auth::user()->dept_id;

        $result = Result::where('user_id', $user_id)->where('today_date',date("Y-m-d"))->get();
        // dd($result);
        if($result->isEmpty()){
                
            return view('result',['empty' => '']);
            }
        $user_answer = $result[0]['user_answer'];
        $points = $result[0]['points'];
        $options = json_decode($user_answer, true);
        $total = count($options);
        $question_id = $options[0]['question_id'];
         // dd($question_id);
        $quest = Question::find($question_id);
        $upcoming_id = $quest->upcomingtitle_id;
        // dd($upcoming_id);
        $question = Question::where('upcomingtitle_id',$upcoming_id)->get();
        return view('result',['answer' => $user_answer,'question' => $question,'points' => $points,'totalanswered' => $total]);
    }

    public function highscore()
    {
     $todate=date('Y-m-d');
     $today = date("D"); 

    if($today=="Fri")
     {
        $days_ago = date('Y-m-d', strtotime('-5 days', strtotime($todate)));

     } 
     $users = Result::groupBy('user_id')
             ->selectRaw('*, sum(points) as sum')
            ->whereBetween('today_date', [$days_ago,$todate])

            ->get();
//              echo'<pre>';
// print_r($users);exit();
    
    foreach ($users as $value) {
//     echo'<pre>';
// print_r($value['user_id']); 
        $weekpoints = User::find($value['user_id']);
        $weekpoints->weekpoints=$value['sum'];
        $weekpoints->save();

        $store_weekpoints=new weekpoints;      
        $store_weekpoints->userid=$value['user_id'];
        $store_weekpoints->dept_id=$value['dept_id'];
        $store_weekpoints->date=$todate;
        $store_weekpoints->total_points=$value['sum'];
        $store_weekpoints->save();
    }
    


     
     
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
    public function view($date)
    {
        //
        // dd($date);
        $user_id = Auth::id();
        $dept_id = Auth::user()->dept_id;
        if($dept_id == '')
        {
            return view('testquestion',['empty' => '']);

        }
        $result = Result::where('user_id', $user_id)->where('today_date',$date)->get();
        // dd($result);
        $user_answer = $result[0]['user_answer'];
        $points = $result[0]['points'];
        $options = json_decode($user_answer, true);
        $total = count($options);
        // dd($total);
        $question_id = $options[0]['question_id'];
         // dd($question_id);
        $quest = Question::find($question_id);
        $upcoming_id = $quest->upcomingtitle_id;
        // dd($upcoming_id);
        $question = Question::where('upcomingtitle_id',$upcoming_id)->get();
        return view('resultrecord',['answer' => $user_answer,'question' => $question,'points' => $points,'date' => $date,'totalanswered' => $total]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
         $firstmon  = date('Y-m-01'); 
        $tommorrow = date("Y-m-d", strtotime('tomorrow'));
         $user_id = Auth::id();
        $dept_id = Auth::user()->dept_id;
        $titles = array();

        $data = Result::select('*')->selectRaw('sum(points) as monthpoints')->whereBetween('today_date', array($firstmon, $tommorrow))->where('dept_id',$dept_id)->where('user_id',$user_id)->get();


        $total_points = $data[0]['monthpoints'];

       
        $result = Result::where('user_id',$user_id)->paginate(10);
        if($result->isEmpty()){
            return view('resulthistory',['empty' => '']);

        }
        // dd($result);
        foreach($result as $key => $res)
        {
            $quiz_date = $res->today_date;
            //dd($quiz_date);
            $upcoming_id = Upcoming_title::where('dept_id',$dept_id)->where('date_of_quiz',$quiz_date)->get();
            // dd($upcoming_id);
            if($upcoming_id->isEmpty()){
            $titles[] = '';
            // return view('resulthistory',['empty' => '']);
            }else{
            // dd($upcoming_id);
            $title_id = $upcoming_id[0]['title_id'];
            // dd($title_id);
            $title = Title::find($title_id);
            //dd($title->title_name);
            $tile = $title->title_name;
            $titles[] = $tile;
            }
             

        }
        // echo "<pre>";
        // print_r($titles);
        // exit;
        return view('resulthistory',['history' => $result,'title' => $titles, 'points' => $total_points]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
