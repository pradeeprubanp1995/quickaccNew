@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Add Category</h1>
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
         <div class="row justify-content-center">
           <div class="col-md-6">
           <form method="post" action="{{route('category_add')}}">
            {{ csrf_field() }}
            <!-- <table class="categorytable">
              <tbody  id="addon"> -->
                <div class="form-group">
                  <label>Parent</label>
                  <select style="width:100%" name="parent_category">
                    <!-- <option value="" selected disabled hidden>Choose here</option> -->
                    <option value="0" selected>Top</option>
                      @foreach($cat as $data)
                      <option value="{{$data->id}}">{{$data->cat_name}}</option>
                      @endforeach
                    </select>
                  </div>
               <div class="form-group">
                <label>Category</label>
                  <input type="text" name="category" placehoder="Category" id="cat" style="width:100%;"/>
                </div>
                <!--
             </tbody>
            </table> -->
            <hr>
            <button type="submit" class="btn btn-primary" style="float:right;">Add category</button>
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