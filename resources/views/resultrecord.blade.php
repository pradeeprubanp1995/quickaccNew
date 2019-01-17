@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
	<div class="card-body">
		<center><h3>Result Record on {{$date}}</h3></center>
    <br />
    <div class="card border border-success">
       <div class="card-header" style="text-align: center;font-size: 20px;">
                                <strong class="card-title">Your {{$date}}'s Point</strong>
      </div>
    	<p class="card-text" style="text-align: center;font-size: 20px;color: green;padding:20px;"><span style="font-size: 25px;color: green;font-weight:bold;">{{$points}} </span><span style="color:black;font-size: 25px;font-weight:bold;"> Out of {{$totalanswered}}</span></p>
    </div>
     <div style="padding: 30px;">
	    @php
		    $q = 1;
		    $user_answer= json_decode($answer,true);
	    @endphp
	    @foreach($user_answer as $key => $ans)
	    <div style="padding-bottom: 10px;">
		    <div class="question" style="padding-bottom: 10px;"><span style="font-size: 18px;">{{$q}} .</span><span style="font-size: 20px;"> {{$question[$key]['question']}}</span> <span class="check{{$q}}"></span></div>
			    @php
				    $option = json_decode($question[$key]['options'],true);
				    $count = count($option);
				    $correct = $question[$key]['answer'];
				    $correctanswer = $option[$correct]['options'];
				    $design = $count;
				    $no = ['a)','b)','c)','d)','e)','f)'];
			    @endphp
			    <div class='row' style="padding-left: 10px;">
			    @for ($i=0;$i<$count;$i++)
			    	<div style="float:left;width:{{100/$design}}%;padding:10px;font-size: 16px;padding-top: 10px;">
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
		    		<p style="font-size: 16px;padding-top: 10px;float:none;">Your answer :<span style="color: Blue;"><strong> {{$no[$y]}} {{$ans['user_answer']}}</strong></span></p>
			    @if($ans['user_answer'] != $correctanswer)
			    	<p style="font-size: 16px;">The correct answer was <span style="color:green"><strong> {{$no[$n]}} {{$correctanswer}}</strong></span></p>
			    @endif
			    @if($ans['user_answer'] == $correctanswer)
				<script type="text/javascript">
					$(function() { 
						var mark = " <span class='badge badge-success' style='color: #fff;background-color: #28a745;''> <i class='fa fa-check'></i></span>"
						$('.check'+value).html(mark);
						 value++;
						});
				</script>
				@else
				<script type="text/javascript">
					$(function() { 
						var mark = " <span class='badge badge-danger' style='color: #fff;background-color: #dc3545;''> <i class='fa fa-times'></i></span>"
						$('.check'+value).html(mark);
						value++;
						});
				</script>
				@endif
		   		 @php $q++ @endphp
		   		</div>
		   		<hr>
	    @endforeach
	</div>
</div>

@include('dashboard.userfooter')
@endsection