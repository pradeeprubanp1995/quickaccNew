@extends('layouts.app')

@section('content')
 <div class="container">
      <h1>question</h1>
    <br />
<form method="post" action="{{route('result')}}">
	{{ csrf_field() }}
	@php $q = 1; @endphp
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
<input type="radio" name="{{$quiz->id}}" value="{{$options[$i]['options']}}" required />{{$options[$i]['options']}}
@endfor
@php $q++ @endphp
</div>
@endforeach
<input type="submit" value="submit" name="submit">
</form>
</div>
@endsection