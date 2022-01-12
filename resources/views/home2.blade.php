<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YMPI</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ url('logo_mirai_bundar.png')}}" />

	<link rel="stylesheet" type="text/css" href="{{ url('vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/main.css')}}">

	<style type="text/css">
		.radio {
			display: inline-block;
			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 16px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default radio button */
		.radio input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
			background-color: #ccc;
			border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.radio:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.radio input:checked ~ .checkmark {
			background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.radio input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the indicator (dot/circle) */
		.radio .checkmark:after {
			top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}


	</style>
</head>

	<!-- <body  class="hold-transition login-page">
		<div class="login-box" style="margin:7% auto">
		  <div class="login-logo">
		    <a href="../../index2.html"><b>YMPI</b></a>
		  </div>
		  <div class="login-box-body">
		    <p class="login-box-msg">Login Untuk Absensi</p>

		    <form action="" method="post">
		      <div class="form-group has-feedback">
		        <input type="email" class="form-control" placeholder="Email">
		        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		      </div>
		      <div class="form-group has-feedback">
		        <input type="password" class="form-control" placeholder="Password">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      </div>
		      <div class="row">
		        <div class="col-xs-8">
		          <div class="checkbox icheck">
		            <label class="">
		              <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Remember Me
		            </label>
		          </div>
		        </div>
		        <div class="col-xs-4">
		          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		        </div>
		      </div>
		    </form>

		    <div class="social-auth-links text-center">
		      <p>- OR -</p>
		      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
		        Facebook</a>
		      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
		        Google+</a>
		    </div>

		    <a href="#">I forgot my password</a><br>
		    <a href="register.html" class="text-center">Register a new membership</a>

		  </div>
		</div>

		<script src="{{ url("jquery.min.js")}}"></script>
		<script src="{{ url("bootstrap.min.js")}}"></script>
		<script src="{{ url("adminlte.min.js")}}"></script>

	</body> -->
	<body>

		<div class="limiter">
			<div class="container-login100" style="background-color: #ebeeef !important">
				<div class="wrap-login100">
					<div class="login100-form-title" style="background-image: url(images/bg2.JPG) !important;">
						
					</div>
					<br>
					<div>
						<span class="login100-form-title-1" style="color: black">
							<center>LAPORAN HARIAN KESEHATAN KARYAWAN YMPI</center>
						</span>
					</div>
					<hr>
					<form class="login100-form validate-form" method="post" action="{{url('auth')}}" enctype="multipart/form-data" id="form_login">
						{{ csrf_field() }}
						<div class="wrap-input100 validate-input m-b-26" data-validate="Nomor Induk Karyawan is required">
							<span class="label-input100 {{ $errors->has('username') ? ' has-error' : '' }}">Nomor Induk Karyawan</span>
							<input class="input100" type="text" name="nik" id="nik" placeholder="Masukkan Nomor Induk Karyawan" required="">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn" style="color: red; display: none" id="notif">
							<i class="fa fa-close"></i> &nbsp; NIK Tidak Terdaftar
						</div>

						<div class="container-login100-form-btn" style="display: none">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</form>

					<form class="contact100-form validate-form" style="padding: 0px 95px 58px 25px; display: none" id="form_anda">
						<label class="label-input1002">
							<label style="color: purple"> NIK : <span id="employee_id"></span></label>
							<label style="color: purple"> Nama : <span id="name"></span></label><br>
							<p style="color: black;font-size: 100%;font-weight: bold"> Bagaimana Kondisi ANDA Hari Ini? </p>
						</label>
						<label class="label-input1002" for="demam">Demam ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="demam" name="demam" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="demam" name="demam" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002">Batuk ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="batuk" name="batuk" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="batuk" name="batuk" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>
						<label class="label-input1002">Pusing ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="pusing" name="pusing" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="pusing" name="pusing" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>
						<label class="label-input1002">Tenggorokan Sakit ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="tenggorokan" name="tenggorokan" value="Iya"  required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="tenggorokan" name="tenggorokan" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002">Sesak Nafas ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="sesak" name="sesak" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="sesak" name="sesak" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002">Indera Perasa & Penciuman Terganggu ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="indera" name="indera" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="indera" name="indera" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002" style="color: red;font-size: 16px">*Semoga Kita Selalu Diberikan Kesehatan<span style="color:red"></span></label>
   

						<div class="container-contact100-form-btn" style="margin-top: 30px">
							<button class="contact100-form-btn">
								<span>
									Submit
									<i class="fa fa-arrow-right"></i>
								</span>
							</button>
						</div>
					</form>
					<!-- <p style="color:red;margin-bottom: 20px;">*Username dan password sama dengan mirai</p> -->
				</div>
			</div>
		</div>
	</body>

	<script src="{{ url('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{ url('vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{ url('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ url('vendor/select2/select2.min.js')}}"></script>
	<script src="{{ url('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{ url('vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ url('vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{ url('js/main.js')}}"></script>

	<script>
		
		$(function() {

			// $("#form_anda").hide();
		})

		$('#nik').on('change keyup input paste', function() {
			var tombol = false;
			if (event.keyCode >= 48 && event.keyCode <= 57) {
				tombol = true;
			} else if (event.keyCode >= 65 && event.keyCode <= 90) {
				tombol = true;
			} else if (event.keyCode >= 97 && event.keyCode <= 122) {
				tombol = true;
			} else if(event.keyCode == 13) {
				tombol = true;
			}

			if ($(this).val().length == 9 && tombol) {
				var data = {
					employee_id : $(this).val()
				}
				$.get('{{ url("check/employee_id") }}', data, function(result, status, xhr){
					if (result.status) {
						if (result.data.length > 0) {
							$("#form_anda").show();
							$("#form_login").hide();
							$("#employee_id").text(result.data[0].employee_id);
							$("#name").text(result.data[0].name);
						} else {
							$("#notif").show();
						}
					} else {
						$("#notif").show();
					}
				})
			}
		});

		$("#form_login").submit(function(){
			var data = {
				employee_id : $("#nik").val()
			}
			$.get('{{ url("check/employee_id") }}', data, function(result, status, xhr){
				if (result.status) {
					if (result.data.length > 0) {
						$("#form_anda").show();
						$("#form_login").hide();
						$("#name").text(result.data[0].name);
					} else {
						$("#notif").show();
					}
				} else {
					$("#notif").show();
				}
			})
			return false;
		});

	</script>

	</html>