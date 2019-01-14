@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
	<div class="card-body">
     <h4 class="card-title" style="padding-left: 80px;">Change Password</h4>
     @if (\Session::has('success'))
  <div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
  </div><br />
  @endif
                   
                    <div style="margin: 20px 120px;padding: 10px 120px;">
                    <form class="forms-sample" method="post" 
                      action="{{ route('userchangedpassword') }}">
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
                        <div class="form-group">
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
@include('dashboard.userfooter')
@endsection