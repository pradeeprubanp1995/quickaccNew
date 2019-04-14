@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
<!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add Generate</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap"> 
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="panel-body">
       
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
           <form method="post" action="{{route('admin.addgenerate')}}">
            {{ csrf_field() }}
            <!-- <table class="categorytable">
              <tbody  id="addon"> -->

                <div class="form-group">
                  <label>Service</label>
                  <select style="width:100%" name="service_name">
                    <!-- <option value="" selected disabled hidden>Choose here</option> -->

                    <option value="0" selected>--- Select Service ---</option>
                      @foreach($service as $data)
                      <option value="{{$data->id}}">{{$data->service_name}}</option>
                      @endforeach
                    </select>
                  </div>
               <div class="form-group">
                <label>Name</label>
                  <input type="text" name="gname" placehoder="Name" id="cat" style="width:100%;" required />
                </div>
                <div class="form-group">
                <label>User Name</label>
                  <input type="text" name="username" placehoder="User Name" id="uname" style="width:100%;" required />
                </div>
                <div class="form-group">
                <label>Password</label>
                  <input type="Password" name="password" placehoder="Password"  style="width:100%;" required />
                </div>
               
            <hr>
            <button type="submit" class="btn btn-primary" style="float:right;">Add Generate</button>  
           </form>
        </div>
       </div>
     </div>
   </div>
 </div>
	</div>
 
@include('dashboard.footer')
@endsection



