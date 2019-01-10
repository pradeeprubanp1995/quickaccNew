@extends('layouts.app')

@section('content')
<div class="container">
	<div class="card-body">
		<h1>Result Record on {{$date}}</h1>
    <br />
    <p>your {{$date}}'s Point was {{$points}}</p>
    <div class="md-8">
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
				    $no = ['a)','b)','c)','d)','e)','f)'];
			    @endphp
			    <div class='row' style="padding-left: 10px;">
			    @for ($i=0;$i<$count;$i++)
			    	<div class="md-{{$design}}" style="padding:10px;">
				    	@if($option[$i]['options'] == $ans['user_answer'] )
					    	 <span style="color:{{($option[$i]['options'] == $correctanswer)? 'green;font-weight:bold;' : 'red;font-weight:bold; text-decoration: line-through;'}}">{{$no[$i]}}{{$option[$i]['options']}}
					    		</span>
				    	@else
							    <span style="color:{{($option[$i]['options'] == $correctanswer)? 'green;font-weight:bold;' : 'none'}}">{{$no[$i]}}{{$option[$i]['options']}}
							    </span>
				    	@endif
				    </div>
			    @endfor
			    			</div>
		    		<p>Your answer :<span style="color: Blue;"><strong>{{$ans['user_answer']}}</strong></span></p>
			    @if($ans['user_answer'] != $correctanswer)
			    	<p>The correct answer is <span style="color:green"><strong>{{$correctanswer}}</strong></span></p>
			    @endif
		   		 @php $q++ @endphp
	    @endforeach
	</div>
</div>
</div>
@endsection