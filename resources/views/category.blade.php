@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')


<style type="text/css">
	.table thead th 
	{
		font-weight: bolder !important;
	}
</style>
	<div class="row">
		<div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Premium</h1>
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
		<a href="{{route('admin.addcategory')}}"><button type="button" class="btn btn-primary" style="float:right;margin:10px;">+ ADD premium</button></a>
     <table class="table datatable_simple" style="clear:both;float:none;">
		<thead>
			<tr>
				<th>S.No</th>
		    	<th>premium</th>
		    	<th>Amout</th>
		    	<th>Count</th>
		    	<th>Validity Days</th>
		    	<th colspan="2">Action</th>
            </tr>
		</thead>
		<tbody>
			@foreach($cat_data as $key => $data)
				
				<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ ucfirst($data->primeum) }}</td>
				<td>{{ ucfirst($data->amt) }}</td>
				<td>{{ ucfirst($data->count) }}</td>
				<td>{{ ucfirst($data->days) }}</td>
                
				  <td><a href="{{ url('/admin/edit_cat/'.$data['id']) }}" type="button" class="btn btn-warning edit"><i class="fa fa-edit"></i>Edit</a></td>
				  <!-- <td>
					<form action="{{ url('/admin/delete_cat/'.$data['id']) }}" method="get">
						<button class="btn  btn-danger" type="submit" name="remove_levels" value="delete" data-toggle="modal" data-target="#deleteModal" data-deptname="{{$data->cat_name}}"><i class="fa fa-trash-o"></i>Delete</span>
						</button>
					</form>
				</td> -->
				  </tr>
			@endforeach
		</tbody>
	</table>
	{{ $cat_data->links() }}
     </div>
	
	
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
    <script type="text/javascript">
    	$(document).ready(function () {
    		// delete modal
		    $('button[name="remove_levels"]').on('click', function(e) 
		    {
		    	var department = $(this).data('deptname');
		    	var data = '"'+department+'" ?';
		    	 $('#data').html(data);
			      var $form = $(this).closest('form');
			      e.preventDefault();
			      $('#deleteModal').one('click', '#delete', function(e) 
			      {
			          $form.trigger('submit');
			       });
		    });
		});
    </script>
@include('dashboard.footer')
@endsection