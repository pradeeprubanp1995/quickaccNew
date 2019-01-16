<!DOCTYPE html> 
<html lang="en">
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
	<link rel="icon" type="image/png" href="{{asset('asset/user/images/favicon.ico')}}" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/bootstrap/css/bootstrap.min.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/fonts/iconic/css/material-design-iconic-font.min.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/animate/animate.css')}}">

<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/css-hamburgers/hamburgers.min.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/animsition/css/animsition.min.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/select2/select2.min.css')}}">

<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/vendor/daterangepicker/daterangepicker.css')}}">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('asset/user/css/main.css')}}">

<!--===============================================================================================-->
</head>
<body>

	
                       
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('asset/user/images/bg-01.jpg')}}');">

			<div class="wrap-login100">
				<form method="POST" action="{{ route('login.request') }}">
				 @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="display: block;color: white;">
                                        <strong> <i class="fa fa-warning"></i> {{ $errors->first('email') }} </strong>
                                    </span>
                                @endif

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" id="email" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					
                     @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <input type="hidden" name="type" value="user">
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						
						<a class="txt1" href="{{ url('/register') }}">
							Register Here
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('asset/user/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('asset/user/vendor/animsition/js/animsition.min.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('asset/user/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('asset/user/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!--===============================================================================================-->
	<script src="`"></script>

<!--===============================================================================================-->
	<script src="{{asset('asset/user/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('asset/user/vendor/daterangepicker/daterangepicker.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('asset/user/vendor/countdowntime/countdowntime.js')}}"></script>

<!--===============================================================================================-->
	<script src="{{asset('asset/user/js/main.js')}}"></script>


</body>
</html>