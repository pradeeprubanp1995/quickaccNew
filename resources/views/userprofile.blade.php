@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
<h4 class="card-title">Myprofile</h4>
   <form class="form-sample" action="{{route('usereditprofile')}}" method="post"  enctype="multipart/form-data">
                  @csrf
                  @if (\Session::has('success'))
  <div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
  </div><br />
  @endif
                    <p class="card-description">
                      Personal info
                    </p>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $data['id'];?>" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">UserID</label>
                          <div class="col-sm-9">
                            <input type="text" name="userid" class="form-control" value="<?php echo $data['user_id'];?>"  required/>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $data['name'];?>"  name="name" required />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control"  name="gender">
                              <option><?php echo $data['gender'];?></option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Department</label>
                          <div class="col-sm-9">
                            <select style="width:100%" name="dept_id">
                    <!-- <option value="" selected disabled hidden>Choose here</option> -->
                    <option value="0" selected>None</option>
                      @foreach($department as $dept)
                      <option value="{{$dept->id}}" {{($dept['id'] == $data['dept_id']) ? 'selected' : ''}}>{{$dept->dept_name}}</option>
                      @endforeach
                    </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email Address</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" value="<?php echo $data['email'];?>" name="email"  required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                             <img src="{{URL('/')}}/uploads/{{$data['images']}}"/></img>
                            
                            <input type="file" class="form-control" value="" name="img" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" name="" value="Save Changes" class="btn btn-primary mr-2">
                    <input type="reset" name="" value="Reset" class="btn btn-success mr-2">
                  </form>
</div>
	</div>
@include('dashboard.userfooter')
@endsection