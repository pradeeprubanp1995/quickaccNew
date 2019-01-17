@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
 <div class="content">
 	<div class="card-body">
<h4 class="card-title">Myprofile</h4>
                  @if (\Session::has('success'))
  <div class="alert alert-success">
  <p>{{ \Session::get('success') }}</p>
  </div><br />
  @endif
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">UserID</label>
                          <div class="col-sm-9">
                            <?php echo ucfirst($data[0]['user_id']);?>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Name</label>
                          <div class="col-sm-9"> <?php echo ucfirst($data[0]['name']);?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Gender</label>
                          <div class="col-sm-9">
                            <?php echo ucfirst($data[0]['gender']);?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Department</label>
                          <div class="col-sm-9">
                        {{ucfirst($data[1]->dept_name)}}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Email Address</label>
                          <div class="col-sm-9">
                           <?php echo $data[0]['email'];?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Image</label>
                          <div class="col-sm-9">
                            @if(Auth::user()->images == '') <i class="fa fa-user" style="font-size: 20px;"></i>@else
                             <img src="{{URL('/')}}/uploads/{{$data[0]['images']}}" width="100px" height="100px"/></img>@endif
                            
                          </div>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 ">Total Points</label>
                          <div class="col-sm-9">
                           {{ Auth::user()->points }}
                          </div>
                        </div>
                      </div>
                     
                    </div>
                    <hr/>
                    <h3>Actions</h3><br/>
                    <div class="col-sm-12">
                        
                            <a href="{{route('userprofile')}}" class="btn btn-primary" style="float:left">Edit</a>
                       
                        
                    </div>

</div>

@include('dashboard.userfooter')
@endsection