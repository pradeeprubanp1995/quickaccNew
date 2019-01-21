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
  @if (\Session::has('danger'))
  <div class="alert alert-danger">
  <p>{{ \Session::get('danger') }}</p>
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
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            @if(Auth::user()->images == '') <i class="fa fa-user" style="font-size: 20px;"></i>@else
                             <img src="{{URL('/')}}/uploads/{{$data['images']}}" width="100px" height="100px"/></img>@endif
                            
                            <input type="file" class="form-control" value="" name="img" />
                            <span style="color:red">*Note: Image should not exceed 2MB</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h3>Actions</h3><br/>
                    <div class="col-sm-12">
                        
                             <input type="submit" name="" value="Save Changes" class="btn btn-primary mr-2">
                              <input type="reset" name="" value="Reset" class="btn btn-success mr-2">
                       
                        
                    </div>
                   
                  </form>
</div>

@include('dashboard.userfooter')
@endsection