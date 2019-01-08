@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Category Edit</h1>
        <br />
        @if (\Session::has('success'))
          <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
          </div><br />
          @endif
          @if (\Session::has('warning'))
          <div class="alert alert-warning">
          <p>{{ \Session::get('warning') }}</p>
          </div><br />
          @endif
          @if (\Session::has('danger'))
          <div class="alert alert-danger">
          <p>{{ \Session::get('danger') }}</p>
          </div><br />
          @endif
          <div class="row justify-content-center">
           <div class="col-md-6">
        <form method='post' action="{{url('/update_cat/'.$cat_data['id'])}}">
        	{{ csrf_field() }}
          <div class="form-group">
            <label>Parent-Category</label>
                 <select style="width:100%" name="parent_category">
                    <!-- <option value="{{$cat_data->parent_id}}" selected></option> -->
                    <option value="0" {{($cat_data['parent_id'] == 0) ? 'selected' : ''}}>Top</option>
                      @foreach($parent_data as $data)
                      <option value="{{$data->id}}" {{($cat_data['parent_id'] == $data['id']) ? 'selected' : ''}}>{{$data->cat_name}}</option>
                      @endforeach
                    </select>
                </div>
        	<div class="form-group">
                <label>Category</label>
                  <input type="text" name="category" placehoder="Category" id="cat" style="width:100%;" value="{{$cat_data->cat_name}}"/>
                </div>
               <hr>
               <a href="{{route('category')}}"><button type="button" class="btn btn-primary btn-danger" style="float:left;">Back To Category</button></a>
                <button type="submit" class="btn btn-primary" style="float:right;">Update</button>
        </form>
      </div>
    </div>
      </div>
    </div>
  </div>
    </div>
@include('dashboard.footer')
@endsection