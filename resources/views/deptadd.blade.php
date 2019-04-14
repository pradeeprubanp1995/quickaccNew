@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Add Services</h1>
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
           <form method="post" action="{{route('admin.adddepartment')}}" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <!-- <table class="categorytable">
              <tbody  id="addon"> -->

                <div class="form-group">
                  <label>Premium</label>
                  <select style="width:100%" name="premium">
                    <!-- <option value="" selected disabled hidden>Choose here</option> -->

                    <option value="0" selected>--- Select Premium ---</option>
                      @foreach($pre as $data)
                      <option value="{{$data->id}}">{{$data->primeum}}</option>
                      @endforeach
                    </select>
                  </div>
               <div class="form-group">
                <label>Services</label>
                  <input type="text" name="service_name" placehoder="Services" id="cat" style="width:100%;" required />
                </div>

                <div class="form-group">
                <label>Services Image</label>
                  <input type="file" name="service_img" style="width:100%;" required />
                </div>
                <!--
             </tbody>
            </table> -->
            <hr>
            <button type="submit" class="btn btn-primary" style="float:right;">Add Service</button>
           </form>
        </div>
       </div>
     </div>
   </div>
 </div>
	</div>
 <!--  <script type="text/javascript">
    $(document).ready(function () {
      // $(document).on('change', 'select', function(){
        // alert('hai');
        var value = $('select').val();
        // alert(value);
        if(value == null)
        {
          // alert('hai');
           $("#cat").prop('disabled', true);
        }
         $(document).on('change', 'select', function(){
          var value = $('select').val();
          if(value != null)
        {
          // alert('hai');
           $("#cat").prop('disabled', false);
        }
        });
      });
  </script> -->
@include('dashboard.footer')
@endsection



