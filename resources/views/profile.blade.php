@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')

<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Myprofile</h4>
                  <form class="form-sample" action="{{route('admin.editprofile')}}" method="post"  enctype="multipart/form-data">
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
                          <label class="col-sm-3 col-form-label">Date of Join</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" value="<?php echo $data['doj'];?>"  name="doj" required/>
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
                            @if(Auth::user()->images == '')<i class="fa fa-user" style="font-size: 20px;"></i>@else
                             <img src="{{URL('/')}}/uploads/{{$data['images']}}" width="100px" /></img>
                            @endif
                            <input type="file" class="form-control" value="" name="img" />
                            <span style="color:red">*Note: Image should not exceed 2MB</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>Category1</option>
                              <option>Category2</option>
                              <option>Category3</option>
                              <option>Category4</option> 
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Membership</label>
                          <div class="col-sm-4">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-radio">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->                    <!-- <p class="card-description">
                      Address
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>America</option>
                              <option>Italy</option>
                              <option>Russia</option>
                              <option>Britain</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <input type="submit" name="" value="Edit" class="btn btn-primary mr-2">
                    <input type="reset" name="" value="Reset" class="btn btn-success mr-2">
                  </form>
                </div>
              </div>
            </div>
@include('dashboard.footer')
@endsection