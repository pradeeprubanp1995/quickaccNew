@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
      <center><h1>Question</h1></center>
    <br />
    @php $error="No Question Found"; @endphp
    @if(isset($empty) && $empty == '') <center><p>{{$error}}</p></center> @else
    <div style="padding-bottom: 10px;margin: 20px;">
<form method="post" action="{{route('result')}}">
	{{ csrf_field() }}
	@php $q = 1; $no = ['a)','b)','c)','d)','e)','f)'];@endphp
	<input type="hidden" name="upcomingtitle_id" value="{{$id}}">
	@foreach($ques as $quiz)
	<div class="form-group">
		<div style="padding-bottom: 10px;"><span style="font-size: 18px;">{{$q}} .</span><span style="font-size: 20px;"> {{$quiz->question}}</span> </div>

@php

$array = $quiz['options'];
$options = json_decode($array, true);
$count = count($options);
@endphp
<div class='row' style="padding-left: 10px;">
@for ($i=0;$i<$count;$i++)
<div style="float:left;width:{{100/$count}}%;padding:10px;font-size: 16px;">
<input type="radio" name="{{$quiz->id}}" value="{{$options[$i]['options']}}" required /> {{$no[$i]}} {{$options[$i]['options']}}
</div>
@endfor
</div>
@php $q++ @endphp
</div>
<hr>
@endforeach
<input type="submit" value="submit" class="btn btn-primary" style="float:right;" name="submit">
</form>
</div>
@endif
</div>

@include('dashboard.userfooter')
@endsection