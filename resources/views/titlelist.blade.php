@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">

          <!-- Page Content -->
          <h2>Title List</h2> <br/>

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


          <div align="right"><a href="{{ route('addtitleinput') }}" class="btn btn-primary">Add Title</a></div>
          
          <hr>
          <!-- <p>This is a great starting point for new custom pages.</p> -->

           <!-- DataTables Example -->
           

              <!-- <form method="get" action="#" >
                {{ csrf_field() }}
                <div align="left">
                    <label>Title Id : </label><input type="text" name="s_projid" id="s_projid" value="<?php //echo (isset($_GET['s_projid'])) ?  $_GET['s_projid']  : '' ;  ?>" />
                    <label>Title name : </label><input type="text" name="s_projname" id="s_projname" value="<?php //echo (isset($_GET['s_projname'])) ?  $_GET['s_projname']  : '' ;  ?>" />
                    <label>Date : </label><input type="text" name="s_from" value="<?php //echo (isset($_GET['s_from'])) ?  $_GET['s_from']  : '' ;  ?>" />
                    
                    <input type="submit" name="s_submit" value="submit" class="btn btn-primary" />
                </div>
              <br/>
                <div align="right"><input type="button" name="s_export" value="Export" class="btn btn-success" /></div> -->
              <!-- </form> -->
            
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      
                      <th>Department</th>
                      <th>Category </th>
                      <th>Subcategory</th>
                      <th>Title Name</th>
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <!-- <?php //echo "<pre>"; print_r($post_data); exit; ?>   -->

                  @foreach ($post_data[1] as $key => $data)


                    <tr>
                    <td>{{ $key+1 }}</td>
                      
                      <td> {{ $data->deptname }}</td>
                      <td> {{ $post_data[0][$key]->category->cat_name }}</td>
                      <td> {{ $post_data[0][$key]->subcategory->cat_name }}</td>
                      <td> {{ $data->title_name }}</td>
                      <td><a href="{{ url('edittitlepage/'.$data->id ) }}" class="btn btn-secondary">Edit</a></td>
                      
                      <td>
                          <form action="{{ url('/deletetitle/'.$data->id ) }}" method="get">
                          <button class="btn  btn-danger" type="submit" name="remove_levels" value="delete" data-toggle="modal" data-target="#deleteModal" data-deptname="{{$data->title_name}}">Delete</span>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>


<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<!-- <div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Delete Notification</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div> -->
<div class="modal-body">Do you want to delete <span id='data'><span></div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" type="button" data-dismiss="modal" id="delete">Delete</a>
</div>
</div>
</div>
</div>
        


@include('dashboard.footer')
@endsection