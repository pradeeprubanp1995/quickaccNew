<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Quick Acc</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="{{asset('asset/user_dashboard/favicon.ico') }}" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('asset/admin/css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container">

@if (\Session::has('danger'))
  <div class="alert alert-danger">
  <p>{{ \Session::get('danger') }}</p>
  </div><br />
  @endif
  
<!-- @if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif  -->
        
            <div class="login-box animated fadeInDown">
                <!-- <div class="login-logo"></div> -->
                <div style="color: white;font-weight: 100px;font-size: 40px;text-align: center;">ADMIN</div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form method="post" action="{{ route('login') }}">
                      @csrf

                      <input type="hidden" name="type" value="admin" />
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" value="{{old('email')}}" required /><br/>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red !important;">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="*********">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert" >
                                    <strong style="color: red !important;">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                           
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- <div class="login-footer">
                    <div class="pull-left">
                        <a class="btn btn-link txt1" href="{{ url('/register') }}">
                            Register Here 
                        </a>
                    </div>
                    <div class="pull-right">
                        
                         @if (Route::has('password.request'))
                                    <a class="btn btn-link txt1" href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </div>
                </div> -->
            </div>
            
        </div>
        
    </body>
</html>




