@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
      <center><h1>Question</h1></center>
    <br />
    @php $error="No Question Found"; @endphp
    @if(isset($empty) && $empty == '') {{$error}} @else
    <div style="padding-bottom: 10px;margin: 20px;">
<form method="post" action="{{route('result')}}">
	{{ csrf_field() }}
	@php $q = 1; $no = ['a)','b)','c)','d)','e)','f)'];@endphp
	<input type="hidden" name="upcomingtitle_id" value="{{$id}}">
	@foreach($ques as $quiz)
	<div class="form-group">
<label>{{$q}}.{{$quiz->question}}</label>
@php

$array = $quiz['options'];
$options = json_decode($array, true);
$count = count($options);
@endphp
@for ($i=0;$i<$count;$i++)
<br />
<input type="radio" name="{{$quiz->id}}" value="{{$options[$i]['options']}}" required /> {{$no[$i]}} {{$options[$i]['options']}}
@endfor
@php $q++ @endphp
</div>
@endforeach
<input type="submit" value="submit" class="btn btn-primary" style="float:right;" name="submit">
</form>
</div>
@endif
</div>
</div>
@include('dashboard.userfooter')
@endsection