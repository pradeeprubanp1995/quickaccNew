
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




<form action="{{ route('admin.edittitle') }}" method="post" name="edittitle_form">
{{ csrf_field() }} 




<div class="form-group">
<div class="form-row">
<div class="col-md-12">
<label ><b>Title</b></label>
<input type="hidden" id="titleid" name="titleid" value="{{ $post_data[2]['id'] }}">
<input type="hidden" id="holdsubcat" name="holdsubcat" value="{{ $post_data[2]['subcat_id'] }}">
<textarea id="title" name="title" class="form-control">{{ $post_data[2]['title_name'] }}</textarea>    
</div>
<span class="text-danger"></span>
</div>
</div>


 <?php 

 $holddept=array(); $holddept=explode(",", $post_data[2]['dept_id']); 
   
 // print_r($holddept);exit;
 ?>
<div class="form-group">
<div class="form-row">
<div class="col-md-12">
<label ><b>Category</b></label>
<!-- <input type="text" id="category" name="category" class="form-control" autofocus="autofocus" >  -->
<select id="category" name="category" class="form-control category" >
  <option value="0">----    Select Category    ----</option>
  @foreach ($post_data[1] as $key => $data)
  <option value="{{ $data->id }}" <?=( $data['id'] == $post_data[2]['cat_id'] ) ? "selected": ""?> >{{ $data->cat_name }}</option>
 
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
  
  if (in_array("Glenn", $people))

  @foreach ($post_data[0] as $key => $data)
    
  <?php  if(in_array( $data['id'], $holddept) )  
            $selected = 'selected="selected"'; 
          else  $selected =''; 
  ?>
  <option value="{{ $data->id }}" <?php echo $selected; ?> >{{ $data->dept_name }}</option>
    

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
        
        




  @include('dashboard.footer')
@endsection
h