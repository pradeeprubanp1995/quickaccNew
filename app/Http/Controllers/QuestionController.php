<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Auth;
use App\Upcoming_title;
use App\Title;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $question = Question::where('upcomingtitle_id',$id)->get();


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
        $dept_id = Auth::user()->dept_id;
        $today = date('Y-m-d');

        $upcoming = Upcoming_title::select('*')->where('date_of_quiz',$today)->where('status','1')->get();

        foreach ($upcoming as $key => $value) {
            
            
            $title = Title::select('*')->where('id',$value->title_id)->get();

            

            echo "<pre>";print_r($title[0]->title_name);exit();
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
