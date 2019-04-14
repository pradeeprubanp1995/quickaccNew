@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Premium Edit</h1>
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
          <div class="row justify-content-center">
           <div class="col-md-6">
        <form method='post' action="{{url('/admin/update_cat/'.$cat_data['id'])}}">
        	{{ csrf_field() }}
          
        	<div class="form-group">
                <label>Premium</label>
                  <input type="text" name="primeum" placehoder="Premium" id="cat" style="width:100%;" value="{{$cat_data->primeum}}"/>
          </div>
          <div class="form-group">
                <label>Amout</label>
                  <input type="text" name="amt" placehoder="Premium" id="amt" style="width:100%;" value="{{$cat_data->amt}}"/>
          </div>
           <div class="form-group">
                <label>Count</label>
                  <input type="text" name="count" placehoder="count" id="count" style="width:100%;" value="{{$cat_data->count}}"/>
          </div>
           <div class="form-group">
                <label>Validity Days</label>
                  <input type="text" name="days" placehoder="days" id="days" style="width:100%;" value="{{$cat_data->days}}"/>
          </div>
               <hr>
               <a href="{{route('admin.category')}}"><button type="button" class="btn btn-primary btn-danger" style="float:left;">Back To Premium</button></a>
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

