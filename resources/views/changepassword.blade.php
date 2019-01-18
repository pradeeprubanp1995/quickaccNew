

@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
           
<div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    <div>
                      <h3>Change Password</h3> <br/>
                      <!-- <a class="btn btn-light" href="{{ url('/') }}"> -->
                      <?php echo "<div align=\"right\"> <a class=\"btn btn-primary\" href=\"javascript:history.go(-1)\">GO BACK</a> </div>"; ?>
                    </div>
                      <!-- <p class="card-description">
                        Change Password Old Password
                      </p> -->
                      <form class="forms-sample" method="post" 
                      action="{{ route('admin.changedpassword') }}">
                       @csrf
                        @if (session()->has('warning'))
    <div class="alert alert-danger text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('warning') !!}
        </strong>
    </div>
@endif
                        <div class="form-group ">
                          <label for="oldpassword">Old Password</label>
                          <input type="password" name="oldpassword" class="form-control {{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" id="oldpassword" placeholder="Password" value="{{old('oldpassword')}}">
                          
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                     
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">New Password</label>
                          <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" id="password">
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="confirmpassword">Confirm Password</label>
                          <input type="password" name="confirmpassword" class="form-control {{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}" id="confirmpassword" placeholder="Password">
                          <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('confirmpassword') }}</strong>
                          </span>
                        </div>

                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
@include('dashboard.footer')
@endsection