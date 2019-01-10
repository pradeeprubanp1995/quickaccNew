@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
      <center><h3>Quiz Result History</h3></center>
    <br />
    <div style="padding: 30px;">
    <ul>
    	@foreach($history as $his)
    	@if(date("Y-m-d") == $his['today_date'])
    	<li><div style="padding:10px;"><a href="{{url('/result/'.$his['today_date'])}}">Today</a></div></li>
    	@else
    	<li><div style="padding:10px;"><a href="{{url('/result/'.$his['today_date'])}}">{{$his->today_date}}</a></div></li>
    	@endif
    	@endforeach
    </ul>
</div>
</div>
	</div>
@include('dashboard.userfooter')
@endsection