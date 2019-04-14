@include('dashboard.header')
@extends('dashboard.leftpanel')
@section('content')
  <div class="row">
    <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
       <h1>Accounts Edit</h1>
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
        <form method='get' action="{{url('/admin/update_acc/'.$acc_data['id'] )}}">
          {{ csrf_field() }}
          
      <div class="form-group">
      <lael>Services</label>


         <select style="width:100%" name="services">
            <option value="0" >--- Select Service ---</option>
              @foreach($service as $data)

              <option value="{{$data['id']}}" {{($acc_data['service_id'] == $data['id']) ? 'selected' : ''}}>{{$data->service_name}}</option>
              @endforeach 
            </select>
        </div> 

          <div class="form-group">
                <label>Account</label>
                  <input type="text" name="acc_name" placehoder="Account" id="cat" style="width:100%;" value="{{$acc_data['acc_name']}}"/>
                </div>
               <hr>
               <a href="{{route('admin.accounts')}}"><button type="button" class="btn btn-primary btn-danger" style="float:left;">Back To Account</button></a>
                <button type="submit" class="btn btn-primary" style="float:right;">Update</button>
        </form>
      </div>
    </div>
      </div>
    </div>
  </div>
    </div>
@include('dashboard.footer')
@endsection

