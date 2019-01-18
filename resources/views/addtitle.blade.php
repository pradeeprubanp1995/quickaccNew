
@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">

@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br />
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




<h2>Add Title</h2> <br/>

<form action="{{ route('admin.addtitle') }}" method="post" name="addtitle_form">
{{ csrf_field() }} 




<div class="form-group">
<div class="form-row">
<div class="col-md-12">
<label ><b>Title</b></label>
<textarea id="title" name="title" class="form-control"></textarea>    
</div>
<span class="text-danger"></span>
</div>
</div>

<!-- <?php //echo "<pre>";print_r($post_data[0]); exit; ?> -->

<div class="form-group">
<div class="form-row">
<div class="col-md-12">
<label ><b>Category</b></label>
<!-- <input type="text" id="category" name="category" class="form-control" autofocus="autofocus" >  -->
<select id="category" name="category" class="form-control category" >
  <option value="">Select Category</option>
  @foreach ($post_data[1] as $key => $data)
  <option value="{{ $data->id }}">{{ $data->cat_name }}</option>
 
  @endforeach
</select>
</div>
<span class="text-danger"></span>
</div>
</div>

<div class="form-group subcategorydiv">
<div class="form-row">
<div class="col-md-12">
<label ><b>Sub Category</b></label>
<!-- <input type="text" id="sub_cat" name="sub_cat" class="form-control" autofocus="autofocus" >  -->
<select id="subcategory" name="subcategory" class="form-control subcategory" >
 <option value="0">Select</option> 
  
</select>
</div>
<span class="text-danger"></span>
</div>
</div>


<div class="form-group">
<div class="form-row">
<div class="col-md-12">


<label ><b>Department</b></label>
<!-- <input type="text" id="dept" name="dept" class="form-control" autofocus="autofocus" >  -->
<select id="dept" name="dept[]" class="form-control" multiple="multiple">
  
  @foreach ($post_data[0] as $key => $data)
  <option value="{{ $data->id }}">{{ $data->dept_name }}</option>
 
  @endforeach
</select>

</div>
<span class="text-danger"></span>
</div>
</div>






<input type="submit" name="submit" class="btn btn-primary btn-block" >
</form> 
 </div>
</div>
</div>
</div>




  @include('dashboard.footer')
@endsection
