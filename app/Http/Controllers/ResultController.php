<?php

namespace App\Http\Controllers;

use App\Result;
use Auth;
use DB;
use App\Question;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $user_answer = $result[0]['user_answer'];
        $points = $result[0]['points'];
        $options = json_decode($user_answer, true);
        $question_id = $options[0]['question_id'];
         // dd($question_id);
        $quest = Question::find($question_id);
        $upcoming_id = $quest->upcomingtitle_id;
        // dd($upcoming_id);
        $question = Question::where('upcomingtitle_id',$upcoming_id)->get();
        return view('result',['answer' => $user_answer,'question' => $question,'points' => $points]);
    }

    public function highscore()
    {
        //
        $dept_id = Auth::user()->dept_id;
        // dd($dept_id);
        $resulttoday = Result::where('dept_id', $dept_id)->where('today_date',date("Y-m-d"))->max('points');
        $result = Result::where('dept_id', $dept_id)->where('today_date',date("Y-m-d"))->where('points',$resulttoday)->get();
    // dd($result);
    // dd($rt);
    //     dd($resulttoday);
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
        $result = Result::where('user_id', $user_id)->where('today_date',$date)->get();
        // dd($result);
        $user_answer = $result[0]['user_answer'];
        $points = $result[0]['points'];
        $options = json_decode($user_answer, true);
        $question_id = $options[0]['question_id'];
         // dd($question_id);
        $quest = Question::find($question_id);
        $upcoming_id = $quest->upcomingtitle_id;
        // dd($upcoming_id);
        $question = Question::where('upcomingtitle_id',$upcoming_id)->get();
        return view('resultrecord',['answer' => $user_answer,'question' => $question,'points' => $points,'date' => $date]);
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
        $user_id = Auth::id();
        $result = Result::where('user_id',$user_id)->get();
        return view('resulthistory',['history' => $result]);
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
