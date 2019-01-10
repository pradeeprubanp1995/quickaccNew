@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
	<div class="card-body">
		<center><h3>Result Record on {{$date}}</h3></center>
    <br />
    <p style="text-align: center;font-size: 20px;color: green;">your {{$date}}'s Point was {{$points}}</p>
     <div style="padding: 30px;">
	    @php
		    $q = 1;
		    $user_answer= json_decode($answer,true);
	    @endphp
	    @foreach($user_answer as $key => $ans)
	    <div style="padding-bottom: 10px;">
		    <div>{{$q}}.<span style="font-size: 18px;">{{$question[$key]['question']}}</span></div>
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
					    	 <span style="color:{{($option[$i]['options'] == $correctanswer)? 'green;font-weight:bold;' : 'red;font-weight:bold; text-decoration: line-through;'}}">{{$no[$i]}} {{$option[$i]['options']}}
					    	 	@php $y = $i; @endphp
					    		</span>
				    	@else
							    <span style="color:{{($option[$i]['options'] == $correctanswer)? 'green;font-weight:bold;' : 'none'}}">{{$no[$i]}} {{$option[$i]['options']}}
							    </span>
							    @php if($option[$i]['options'] == $correctanswer){$n = $i;}@endphp
				    	@endif
				    </div>
			    @endfor
			    			</div>
		    		<p>Your answer :<span style="color: Blue;"><strong> {{$no[$y]}} {{$ans['user_answer']}}</strong></span></p>
			    @if($ans['user_answer'] != $correctanswer)
			    	<p>The correct answer is <span style="color:green"><strong> {{$no[$n]}} {{$correctanswer}}</strong></span></p>
			    @endif
		   		 @php $q++ @endphp
		   		</div>
	    @endforeach
	</div>
</div>
</div>
@include('dashboard.userfooter')
@endsection