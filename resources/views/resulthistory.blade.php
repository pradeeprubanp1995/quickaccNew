@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
      <center><h3>Quiz Result History</h3></center>
    <br />
    @php $n=0; $error="No Data Found" @endphp
    @if(isset($empty) && $empty == '') <center><p>{{$error}}</p></center> @else
    <div style="padding: 30px;">
        <p style="float:right;font-weight:bold;">Your Total Points: {{$points}}</p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Date</th>
                <th>Title</th>
                <th>Points</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    	@foreach($history as $key => $his)
        <tr>
            <td>{{++$n}}</td>
    	@if(date("Y-m-d") == $his['today_date'])
    	<td>Today</td>
    	@else
    	<td>{{$his->today_date}}</td>
    	@endif

        @if($title[$key] != '')
<td>{{$title[$key]}}</td>@else<td><i>Title Not found</i></td>@endif

        <td>{{$his->points}}</td>
        <td><a href="{{url('/result/'.$his['today_date'])}}" class="btn btn-primary">View</a></td>
        </tr>
    	@endforeach
        @endif
      </tbody>
    </table>
        
</div>

	
@include('dashboard.userfooter')
@endsection