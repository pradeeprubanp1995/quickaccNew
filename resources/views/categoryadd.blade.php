@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
	<div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Add Premium</h1>
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
           <form method="post" action="{{route('admin.category_add')}}">
            {{ csrf_field() }}
            <!-- <table class="categorytable">
              <tbody  id="addon"> -->
                
               <div class="form-group">
                <label>Premium</label>
                  <input type="text" name="primeum" placehoder="Premium" id="cat" style="width:100%;" required />
                </div>
                <div class="form-group">
                 <label>Amount</label>
                  <input type="text" name="amt" placehoder="Amout" id="amt" style="width:100%;" required />
                </div>
                <div class="form-group">
                <label>Count</label>
                  <input type="text" name="count" placehoder="Count" id="count" style="width:100%;" required />
                </div>
                <div class="form-group">
                <label>Validity Days</label>
                  <input type="text" name="days" placehoder="days" id="days" style="width:100%;" required />
                </div>
                
                <!--
             </tbody>
            </table> -->
            <hr>
            <button type="submit" class="btn btn-primary" style="float:right;">Add Premium</button>
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