@extends('layouts.app')

@section('content')
<div class="container">
      <h1>Result</h1>
    <br />
    <p>your Today's Point is {{$points}}</p>
    @php
    $q = 1;
    $user_answer= json_decode($answer,true);
    @endphp
    @foreach($user_answer as $key => $ans)
    <div><h5>{{$q}}.{{$question[$key]['question']}}</h5></div>
    @php
    $option = json_decode($question[$key]['options'],true);
    $count = count($option);
    $correct = $question[$key]['answer'];
    $correctanswer = $option[$correct]['options'];
    $design = 12/$count;
    @endphp
    @for ($i=0;$i<$count;$i++)
    <div class="md-{{$design}}">
    <span style="color:{{($option[$i]['options'] == $correctanswer)? 'green' : 'none'}}">{{$option[$i]['options']}}
    </span>
    @endfor
    <p>Your answer :<span style="color:{{($ans['user_answer'] == $correctanswer)? 'green' : 'red'}}"><strong>{{$ans['user_answer']}}</strong></span></p>
    @if($ans['user_answer'] != $correctanswer)
    <p>The correct answer is <span style="color:green"><strong>{{$correctanswer}}</strong></span></p>
    @endif
    @php $q++ @endphp
    @endforeach
    
 
</div>
@endsection