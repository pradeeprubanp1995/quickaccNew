@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Service Edit</h1>
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
        <form method='post' action="{{url('/admin/update_dept/'.$dept_data['id'] )}}" enctype='multipart/form-data'>
        	{{ csrf_field() }}
          
      <div class="form-group">
      <lael>Premium</label>


         <select style="width:100%" name="premium">
            <option value="0" >--- Select Premium ---</option>
              @foreach($premium as $data)

              <option value="{{$data['id']}}" {{($dept_data['pre_id'] == $data['id']) ? 'selected' : ''}}>{{$data->primeum}}</option>
              @endforeach
            </select>
        </div> 

        	<div class="form-group">
                <label>Service Name</label>
                  <input type="text" name="service_name" placehoder="Service" id="cat" style="width:100%;" value="{{$dept_data['service_name']}}"/>
          </div>

          <div class="form-group">
                <label>Service Image</label>
                <img src="{{asset('uploads/'.$dept_data['image'])}}" width="100px"  />
                 <input type="hidden" name="service_imgbackup"   value="{{$dept_data['service_name']}}"/>
          </div>
          <div class="form-group">
                <label>Change Service Image</label>
                
                <input type="file" name="service_img" style="width:100%;"   />
          </div>
               <hr>
               <a href="{{route('admin.department')}}"><button type="button" class="btn btn-primary btn-danger" style="float:left;">Back To Premium</button></a>
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

