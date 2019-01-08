@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
<div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Change Password</h4>
                      <!-- <p class="card-description">
                        Change Password Old Password
                      </p> -->
                      <form class="forms-sample" method="post" 
                      action="{{ route('changedpassword') }}">
                       @csrf
                        <!-- <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div> -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">New Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>
@include('dashboard.footer')
@endsection