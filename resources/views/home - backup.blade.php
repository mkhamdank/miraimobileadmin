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
	<link rel="stylesheet" type="text/css" href="{{ url('css/jquery.gritter.css') }}" >

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
	<body>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	    <div id="loading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(0,191,255); z-index: 30001; opacity: 0.8; display: none">
	    	<p style="position: absolute; color: White; top: 45%; left: 35%;">
	      		<span style="font-size: 40px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
		    </p>
		 </div>

		<div class="limiter">
			<div class="container-login100" style="background-color: #ebeeef !important">
				<div class="wrap-login100">
					<div class="login100-form-title" style="background-image: url(images/bg2.JPG) !important;">
						
					</div>
					<br>
					<div>
						<span class="login100-form-title-1" style="color: black">
							<center>LAPORAN HARIAN KARYAWAN YMPI</center>
						</span>
					</div>
					<hr>
					<form class="login100-form validate-form" id="form_login" >
						{{ csrf_field() }}
						<div class="wrap-input100 validate-input m-b-26" data-validate="Username Harus Diisi.">
							<span class="label-input100 {{ $errors->has('username') ? ' has-error' : '' }}">Nomor Induk Karyawan</span>
							<input class="input100" type="text" name="username" id="username" placeholder="Masukkan Nomor Induk Karyawan" required="">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="Password Harus Diisi.">
							<span class="label-input100 {{ $errors->has('password') ? ' has-error' : '' }}">Password</span>
							<input class="input100" type="password" name="password" id="password" placeholder="Masukkan Password" required="">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn" style="color: red; display: none" id="notif">
							<i class="fa fa-close"></i> &nbsp; Username atau Password Salah.
						</div>
						<button class="contact100-form-btn" onclick="login()" style="display: inline-block;">
							<span>
								Login
								<i class="fa fa-arrow-right"></i>
							</span>
						</button>
						<!-- <div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="login()">
								Login
							</button>
						</div> -->
					</form>
					
					<div class="login100-form validate-form" id="notification">
						<span><i style="color: red"><b>NOTE:</b></i><br>
						Pengisian Laporan Harian Kesehatan Karyawan YMPI mulai tanggal <b>13 April 2020</b> dengan ketentuan sebagai berikut.<br>
						Absen <b>Masuk</b> : antara pukul <b>06.00 - 07.00</b> WIB.<br>
						Absen <b>Pulang</b> : antara pukul <b>16.00 - 17.00</b> WIB.</span>
					</div>

					<div class="login100-form validate-form" id="form_reset" style="display: none">
						{{ csrf_field() }}
						<input type="hidden" id="employee_id_reset">

						<div class="wrap-input100 validate-input m-b-26">
							<span class="label-input100">Nama Karyawan</span>
							<input class="input100" type="text" name="emp_name" id="emp_name" placeholder="" required="" readonly>
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26">
							<span class="label-input100">Password Baru</span>
							<input class="input100" type="password" name="password_reset" id="password_reset" placeholder="Masukkan Password Baru" required="">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26">
							<span class="label-input100">Ulangi Password Baru</span>
							<input class="input100" type="password" name="password_reset2" id="password_reset2" placeholder="Ulangi Password Baru" required="">
							<span class="focus-input100"></span>
						</div>

						<div class="container-login100-form-btn" style="color: red; display: none" id="notif_reset">
							<i class="fa fa-close"></i> &nbsp; Password Tidak Sama.
						</div>
						<br>
						<br>
						<button class="contact100-form-btn" onclick="reset()" style="display: inline-block;">
							<span>
								Confirm
								<i class="fa fa-arrow-right"></i>
							</span>
						</button>
						<button class="contact1002-form-btn" type="button" onClick="window.location.reload();" style="display: inline-block;">
							<span>
								Cancel
								<i class="fa fa-times"></i>
							</span>
						</button>
					</div>

					<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_anda">
						{{ csrf_field() }}
						<label class="label-input1002">
							<label style="color: purple"> NIK : <span id="employee_id"></span></label>
							<label style="color: purple"> Nama : <span id="name"></span></label><br>
							<input type="hidden" id="department">
							<p style="color: black;font-size: 100%;font-weight: bold"> Bagaimana Kondisi ANDA Hari Ini? </p>
						</label>

						<label class="label-input1002"><span id="pertanyaan0">Demam</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban0" name="jawaban0" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban0" name="jawaban0" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002"><span id="pertanyaan_suhu">Suhu Tubuh</span> ? <span style="color:purple">(Opsional)</span></label>

						<div class="wrap-input100" style="width: 80%" >
							<input class="input100" type="number" name="suhu" id="suhu" placeholder="Suhu (Contoh: 37.5)">
							<span class="label-inputspecial" style="left: 200px;bottom: 10px">&deg; C</span>
						</div>

						<label class="label-input1002"><span id="pertanyaan1">Batuk</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban1" name="jawaban1" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban1" name="jawaban1" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>
						<label class="label-input1002"><span id="pertanyaan2">Pusing</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban2" name="jawaban2" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban2" name="jawaban2" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>
						<label class="label-input1002"><span id="pertanyaan3">Tenggorokan Sakit</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban3" name="jawaban3" value="Iya"  required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban3" name="jawaban3" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002"><span id="pertanyaan4">Sesak Nafas</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban4" name="jawaban4" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban4" name="jawaban4" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002"><span id="pertanyaan5">Indera Perasa & Penciuman Terganggu</span> ? <span style="color:red">*</span></label>

						<div class="validate-input" style="position: relative; width: 100%">
							<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
								<input type="radio" id="jawaban5" name="jawaban5" value="Iya" required="">
								<span class="checkmark"></span>
							</label>
							&nbsp;&nbsp;
							<label class="radio" style="margin-top: 5px">Tidak
								<input type="radio" id="jawaban5" name="jawaban5" value="Tidak">
								<span class="checkmark"></span>
							</label>
						</div>

						<label class="label-input1002"><span id="pertanyaan6">Pernah Berinteraksi dengan Suspect / Positif COVID-19</span> ? <span style="color:red">*</span></label>

							<div class="validate-input" style="position: relative; width: 100%">
								<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
									<input type="radio" id="jawaban6" name="jawaban6" value="Iya" required="">
									<span class="checkmark"></span>
								</label>
								&nbsp;&nbsp;
								<label class="radio" style="margin-top: 5px">Tidak
									<input type="radio" id="jawaban6" name="jawaban6" value="Tidak">
									<span class="checkmark"></span>
								</label>
							</div>

							<input type="hidden" id="jml_pertanyaan" value="7">

						<div class="container-contact100-form-btn" style="margin-top: 30px;">
							<button class="contact100-form-btn" type="button" onclick="submitForm()" style="display: inline-block;">
								<span>
									Submit
									<i class="fa fa-arrow-right"></i>
								</span>
							</button>
							<button class="contact1002-form-btn" type="button" onClick="window.location.reload();" style="display: inline-block;">
								<span>
									Cancel
									<i class="fa fa-times"></i>
								</span>
							</button>
						</div>
						<input type="hidden" name="latitude" id="latitude">
						<input type="hidden" name="longitude" id="longitude">
					</form>

					<form class="bye-form" id="form_terimakasih" style="display: none" >
					</form>
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
	<script src="{{ url('js/jquery.gritter.min.js') }}"></script>

	<script>


		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		
		jQuery(document).ready(function() {
			$('#username').val('');
			$('#password').val('');
			$('#password_reset').val('');
			$('#password_reset2').val('');
			$('#suhu').val('');
		});

		function openSuccessGritter(title, message){
			jQuery.gritter.add({
				title: title,
				text: message,
				class_name: 'growl-success',
				image: '{{ url("images/image-screen.png") }}',
				sticky: false,
				time: '2000'
			});
		}

		function openErrorGritter(title, message) {
			jQuery.gritter.add({
				title: title,
				text: message,
				class_name: 'growl-danger',
				image: '{{ url("images/image-stop.png") }}',
				sticky: false,
				time: '2000'
			});
		}

		function login() {
			var data = {
				employee_id : $('#username').val(),
				password : $('#password').val(),
			}
			$.get('{{ url("check/employee_id") }}', data, function(result, status, xhr){
				if (result.status) {
					if (result.data.length > 0) {
						if (result.data[0].password == '123456') {
							$("#form_reset").show();
							$("#form_login").hide();
							$("#notification").hide();
							openSuccessGritter("Success","Login Berhasil. Silahkan Reset Password");
						}else{
							$("#form_anda").show();
							$("#form_login").hide();
							$("#notification").hide();
							openSuccessGritter("Success","Login Berhasil");
						}
						$("#employee_id").text(result.data[0].employee_id);
						$("#employee_id_reset").val(result.data[0].employee_id);
						$("#emp_name").val(result.data[0].name);
						$("#name").text(result.data[0].name);
						$("#department").val(result.data[0].department);
						if (navigator.geolocation) {
						    navigator.geolocation.getCurrentPosition(showPosition);
						  } else {
						    // x.innerHTML = "Geolocation is not supported by this browser.";
						  }
					} else {
						$("#notif").show();
					}
				} else {
					$("#notif").show();
				}
			})
		}

		function showPosition(position) {
			// console.log("Latitude: " + position.coords.latitude +
		 //  "<br>Longitude: " + position.coords.longitude);
			$("#latitude").val(position.coords.latitude);
			$("#longitude").val(position.coords.longitude);
		  // x.innerHTML = ;
		}

		function reset() {
			var pass_reset = $('#password_reset').val();
			var pass_reset2 = $('#password_reset2').val();
			var employee_id = $('#employee_id_reset').val();

			var data = {
				password : pass_reset,
				password2 : pass_reset2,
				employee_id : employee_id
			}

			if (pass_reset == "" || pass_reset2 == "") {
				openErrorGritter('Error!', 'Password Baru Harus Diisi.');
			}else{
				$.post('{{ url("post/reset_password") }}', data, function(result, status, xhr){
					if (result.status) {
							// $("#form_login").show();
							// $("#form_reset").hide();
							openSuccessGritter("Success","Reset Password Berhasil. Silahkan Login Kembali");
							location.reload();
					} else {
						$("#notif_reset").show();
					}
				})
			}
		}

		function submitForm() {
			$("#loading").show();

			var jumlah_pertanyaan = $("#jml_pertanyaan").val();
			var pertanyaan = [];
			var jawaban = [];

			for(var i = 0;i<jumlah_pertanyaan; i++){
				var question = '#pertanyaan'+i;
				pertanyaan.push($(question).text());

				var answer = 'jawaban'+i;

				if ($('input[id="'+answer+'"]:checked').val() == null) {
			        $("#loading").hide();
			        openErrorGritter('Error!', 'Semua Kolom Bertanda Bintang (<b>*</b>) Harus Diisi.');
			        $("html").scrollTop(0);
			        return false;
			    }

				jawaban.push($('input[id="'+answer+'"]:checked').val());
				
			}

			pertanyaan.push($('#pertanyaan_suhu').text());
			jawaban.push($('#suhu').val());

			if ($('#latitude').val() == "") {
		        $("#loading").hide();
		        openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
		        $("html").scrollTop(0);
		        return false;
		    }

		    if ($('#latitude').val() == "") {
		        $("#loading").hide();
		        openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
		        $("html").scrollTop(0);
		        return false;
		    }

			// console.log(pertanyaan);
			// console.log(jawaban);

			var data = {
		        employee_id: $("#employee_id").text(),
		        name: $("#name").text(),
		        department: $("#department").val(),
		        question: pertanyaan,
		        answer: jawaban,
	        	jumlah_pertanyaan : jumlah_pertanyaan,
	        	latitude : $("#latitude").val(),
	        	longitude : $("#longitude").val(),
	        };

		    $.post('{{ url("post/form") }}', data, function(result, status, xhr){
		        if(result.status == true){    
		          $("#loading").hide();
		          $("#form_anda").hide();
				  $("#form_login").hide();
				  $("#form_terimakasih").show();
				  $("#form_terimakasih").html('<center>Terimakasih '+$("#name").text()+' sudah mengisi laporan hari ini.<br>Tetap Jaga Kesehatan dan Sayangi Keluarga Anda.</center><br><br>');
		          openSuccessGritter("Success","Berhasil Dibuat");
		        }
		        else {
		          $("#loading").hide();
		          openErrorGritter('Error!', result.datas);
		        }
		    });
		
			

			function reload() {
				location.reload();
			}


		}

	</script>

	</html>