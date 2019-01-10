<?php

namespace App\Http\Controllers;

use App\Result;
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
        //
        $resultcheck = Result::where('user_id',2)->where('today_date',date("Y-m-d"))->exists();
        // dd($resultcheck);
         // dd($request);
        if($resultcheck == true){
           return redirect('/result')->with('success','Already submitted');
        }
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
            // $count = count($options);
         }
         $user_answer= json_encode($jarray);
         $result = new Result;
         $result->user_id = 2;
         $result->dept_id = 2;
         $result->today_date = $date;
         $result->user_answer = $user_answer;
         $result->points = $points;
         $result->save();
         // echo "done";
         // exit;
         // echo $user_answer;
         // exit;
         // dd($points);
         return redirect()->route('resultview');
    }
    public function indexx()
    {
        $result = Result::where('user_id',2)->where('today_date',date("Y-m-d"))->get();
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
        $result = Result::where('user_id',2)->where('today_date',$date)->get();
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
        $result = Result::where('user_id',2)->get();
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
