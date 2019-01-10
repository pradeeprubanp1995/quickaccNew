@extends('layouts.app')

@section('content')
 <div class="container">
 	<div class="card-body">
      <h1>Result History</h1>
    <br />
    <ul>
    	@foreach($history as $his)
    	@if(date("Y-m-d") == $his['today_date'])
    	<a href="{{url('/result/'.$his['today_date'])}}"><li>Today</li></a>
    	@else
    	<li>{{$his->today_date}}</li>
    	@endif
    	@endforeach
    </ul>
</div>
	</div>
@endsection