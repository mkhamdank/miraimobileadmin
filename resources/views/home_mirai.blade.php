<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Yamaha Musical Products Indonesia</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ url('logo_mirai_bundar.png')}}" />

	<link rel="stylesheet" type="text/css" href="{{ url('vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('datatable/datatables.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('datatable/buttons.dataTables.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/jquery.gritter.css') }}" >

	<style type="text/css">
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
		th {

		    text-align: center;

		}

		/* Firefox */
		input[type=number] {
			-moz-appearance: textfield;
		}

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




		.radio_box {
			/*display: inline-block;*/
			position: relative;
			padding-left: 35px;
			padding-top: 4px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 14px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			border: 1px solid rgba(0,0,0,0.1);
			height: 30px;
			background-color: #f2f2f2;
		}

		/* Hide the browser's default radio button */
		.radio_box input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		.checkmark_box {
			position: absolute;
			top: 3px;
			left: 8px;
			height: 20px;
			width: 20px;
			background-color: #ccc;
		}


		/* On mouse-over, add a grey background color */
		.radio_box:hover input ~ .checkmark_box {
			background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.radio_box input:checked ~ .checkmark_box {
			background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark_box:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.radio_box input:checked ~ .checkmark_box:after {
			display: block;
		}

		/* Style the indicator (dot/circle) */
		.radio_box .checkmark_box:after {
			top: 6px;
			left: 6px;
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
			<span style="font-size: 20px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
		</p>
	</div>

	<div id="loading2" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(0,191,255); z-index: 30001; opacity: 0.8; display: none">
    <p style="position: absolute; color: White; top: 45%; left: 45%;">
      <span style="font-size: 20px;">Processing...</i></span>
    </p>
  </div>

	<div class="limiter">
		<div class="container-login100" style="background-color: #ebeeef !important">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg2.JPG) !important;">

				</div>
				<br>
				<div>
					<span class="login100-form-title-1" style="color: black" id="laporan_harian">
						<center>LAPORAN HARIAN KESEHATAN KARYAWAN & SURVEY <br> COVID-19 YMPI</center>
					</span>
					<br>
					<span class="login100-form-title-2" style="color: black" id="laporan_harian">
						<center>Dihimbau untuk menggunakan <i style="color: red">Handphone / Smartphone</i> <br>saat mengisi <i style="color: red">Laporan Kesehatan</i>.</center>
					</span>
				</div>

				<div>
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
					</form>

					<div class="login100-form validate-form" id="notification">
						<span><i style="color: red"><b>NOTE:</b></i><br>
							Pengisian Laporan Harian Karyawan YMPI periode <b>30 Juni - 31 Juli 2020</b> dengan ketentuan sebagai berikut.<br>
							<br>
							<b>WOC </b>(Shift 1 / Hanya Cek Suhu Tubuh di Masing-Masing Bagian)
							<br>
							<br>
							<b>SBH </b>(Shift 1 / Suhu Tubuh Opsional)<br>
							Laporan <b>1</b>         : <b>06.00 - 07.00</b> WIB.
							<br>
							Laporan <b>2</b>         : <b>16.00 - 17.00</b> WIB.
							<br>
							Laporan <b>2 (Jumat)</b> : <b>16.30 - 17.30</b> WIB.
							<br>
						</span>
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

						<div class="menu100-form" id="form_menu" style="display: none; width: 100%; padding-left: 40px; padding-right: 10px;">
							<div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(1)" style="text-align: center; width: 100%;">Laporan Kesehatan</button>						
							</div>
							<!-- <div class="row" style="width: 100%; padding-top: 5px;">-->
							<!--	<button class="btn btn-primary" onclick="tab(2)" style="text-align: center; width: 100%;">Informasi Grup Kerja</button>	-->
							<!--</div> -->
							<div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(3)" style="text-align: center; width: 100%;">Pengumuman</button>						
							</div>
							<!--<div class="row" style="width: 100%; padding-top: 5px;">-->
							<!--	<button class="btn btn-primary" onclick="tab(4)" style="text-align: center; width: 100%;">Data Kehadiran</button>						-->
							<!--</div>-->
							<!-- <div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(5)" style="text-align: center; width: 100%;">Survey Penilaian Resiko Covid</button>						
							</div> -->
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

							<label class="label-input1002"><span id="pertanyaan_suhu">Suhu Tubuh</span> ? <span style="color:red">*</span></label>

							<div class="wrap-input100" style="width: 80%" >
								<input class="input100" type="number" name="suhu" id="suhu" placeholder="Suhu (Contoh: 37.5)" required="">
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

							{{-- <label class="label-input1002" style="color: red;font-size: 16px">*Semoga Kita Selalu Diberikan Kesehatan<span style="color:red"></span></label> --}}

							<input type="hidden" id="jml_pertanyaan" value="7">

							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact100-form-btn" type="button" onclick="submitForm()" style="display: inline-block;">
									<span>
										Submit
										<i class="fa fa-arrow-right"></i>
									</span>
								</button>
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_anda')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>
							<input type="hidden" name="latitude" id="latitude">
							<input type="hidden" name="longitude" id="longitude">
						</form>


						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_grup">
							{{ csrf_field() }}

							<h3>Informasi Grup Kerja</h3>

								<label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Masukkan NIK </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="nik_grup" name="nik_grup" placeholder="Nomor Induk Karyawan">
					              </div>
					            </div>

					            <label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Masukkan Kode </label>
								</label>
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					            	<div class="form-group">
					                  <!-- <input type="text" class="form-control pull-right" id="departemen" name="departemen" placeholder="Departemen"> -->
					                  <select class="form-control select2" style="width: 100%;" id="kode_grup" name="kode_grup" data-placeholder="Pilih Kode" required>
					                  	<option value=""></option>
					                  	<option value="0fc">Office</option>
					                  	<option value="AP">Assembly</option>
					                  	<option value="CTN">Canteen</option>
					                  	<option value="Drv">Driver</option>
					                  	<option value="EI">Educational Instrument</option>
					                  	<option value="GS">General Service</option>
					                  	<option value="Jps">Japanese</option>
					                  	<option value="PE">Production Engineering</option>
					                  	<option value="MNTC">Maintenance</option>
					                  	<option value="PP">Part Process</option>
					                  	<option value="QA">Quality Assurance</option>
					                  	<option value="WH">Warehouse</option>
					                  	<option value="WST">Welding Surface Treatment</option>
					                  </select>
					              </div>
					            </div>
								<div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 0">
					                <button class="btn btn-success" type="button" onClick="fillTable()" style="display: inline-block;margin-top: 10px">
										<span>
											Cari
										</span>
									</button>
					            </div>
							
							<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;overflow-x: scroll;">
							 <table id="tableResult" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important">
				              	<thead>
					                <tr>
					                	<th>Nama</th>
					                	<th>Tanggal</th>
					                	<th>Status</th>
					                </tr>
					              </thead>
					              <tbody id="tableBodyResult">
					              </tbody>
					              <!--<tfoot>-->
					              <!--  <tr>-->
					              <!--    <th></th>-->
					              <!--    <th></th>-->
					              <!--    <th></th>-->
					              <!--    <th></th>-->
					              <!--  </tr>-->
					              <!--</tfoot>-->
				            </table>
				            <p style="color: red" id="geser" style="display: none">*Geser ke kanan untuk melihat detail</p> 
				        	</div>

							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_grup')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>

						</form>

						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_pengumuman">
							{{ csrf_field() }}

							<h3>Pengumuman</h3>

							<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;overflow-x: scroll;">
							 <table id="tableResultPengumuman" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important">
				              	<thead>
					                <tr>
					                	<th>Tanggal</th>
					                	<th>Pengumuman</th>
					                </tr>
					              </thead>
					              <tbody id="tableBodyResultPengumuman">
					              </tbody>
				            </table>
				        	</div>

							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_pengumuman')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>
						</form>

						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_kehadiran">
							{{ csrf_field() }}

							<h3>Data Kehadiran</h3>

							<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;overflow-x: scroll;">
							 <table id="tableResultKehadiran" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important">
				              	<thead>
					                <tr>
					                	<th>Tanggal</th>
						                <th>NIK</th>
						                <th>Nama</th>
						                <th>Jam Masuk</th>
						                <th>Location Masuk</th>
						                <th>Jam Keluar</th>
						                <th>Location Keluar</th>
						                <th>Status</th>
					                </tr>
					              </thead>
					              <tbody id="tableBodyResultKehadiran">
					              </tbody>
				            </table>
				        	</div>

							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_kehadiran')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>
						</form>

						<form class="bye-form" id="form_terimakasih" style="display: none" >
						</form>


						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_survey">
							<div id="belum_survey">
								{{ csrf_field() }}
								<label class="label-input1002" style="margin-top: 0">
									<center>
										<label style="color: purple;font-size: 18px;"> NIK : <span id="employee_id_survey"></span></label>
										<label style="color: purple;font-size: 18px;"> Nama : <span id="name_survey" class="name_survey"></span></label><br>
										<input type="hidden" id="department_survey">
										<p style="color: black;font-size: 18px;font-weight: bold"> PENILAIAN RESIKO PRIBADI TERKAIT COVID-19 </p>
									</center>
								</label>
								

								<div class="col-xs-12 col-md-12">

									
									<?php 
					              		$jml_pertanyaan_survey = count($question);
					              	?>

									<input type="hidden" id="jml_pertanyaan_survey" value="<?= $jml_pertanyaan_survey ?>">

									<table id="tableQuestion" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important;width: 100%">
						              	<thead>
							                <tr>
							                	<th>Question</th>
							                </tr>
							              </thead>
							              <tbody id="">

											<?php 
												$no = 0; 
											?>

							              	@foreach($question as $qs)
							              	<tr>
							              		<td>
							              			<label class="label-input1002" style="color: red;margin-top: 0px;text-align: center;font-size: 16px"><span id="pertanyaan_survey<?= $no ?>">{{ $qs->pertanyaan }}</span></label>

													<div class="validate-input" style="position: relative; width: 100%">
														<label class="radio_box" style="margin-top: 5px">Ya
															<input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Ya">
															<span class="checkmark_box"></span>
														</label>

														<label class="radio_box" style="margin-top: 5px">Kadang
															<input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Kadang">
															<span class="checkmark_box"></span>
														</label>

														<label class="radio_box" style="margin-top: 5px">Tidak
															<input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Tidak">
															<span class="checkmark_box"></span>
														</label>
													</div>

													<?php
														$no++;
													?>
							              		</td>
							              	</tr>

											@endforeach

											<tr>
							              		<td>
													<div class="validate-input" style="position: relative; width: 100%">
														<button class="contact100-form-btn" type="button" onclick="submitSurvey()" style="display: inline-block;">
															<span>
																Submit
																<i class="fa fa-arrow-right"></i>
															</span>
														</button>
													</div>

													<?php
														$no++;
													?>
							              		</td>
							              	</tr>


							              	
							              </tbody>
						            </table>
						        </div>
				            </div>
				            <br>
				            <div id="sudah_survey" style="width: 100%">
								<div class="col-xs-12 col-md-12">
				            	<center style="font-size:16px">Terimakasih <span class="name_survey"></span> telah mengisi laporan survey ini <br><br>Hasil : <u><i> <div id="resiko_covid"></div></i></u></center>
				            	</div>
				            </div>
							
							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_survey')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal-maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" style="margin-top: 200px">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" align="center"><b>Your Location</b></h4>
						</div>
						<div class="modal-body">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="iframe">
					          	
					         </div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					          	<div class="modal-footer">
						            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
					         	 </div>
					         </div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal-pengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" style="margin-top: 200px">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" align="center"><b>Pengumuman</b></h4>
						</div>
						<div class="modal-body">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="announcement">
					          	
					         </div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					          	<div class="modal-footer">
						            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
					         	 </div>
					         </div>
						</div>
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
		<!--<script src="{{ url('datatable/dataTables.buttons.min.js')}}"></script>-->
		<script src="{{ url('datatable/jquery.dataTables.min.js')}}"></script>
 		<script src="{{ url('datatable/dataTables.bootstrap.min.js')}}"></script>
		<script>


			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery(document).ready(function() {
				// datatableQuestion();
				$('#username').val('');
				$('#password').val('');
				$('#password_reset').val('');
				$('#password_reset2').val('');


				$(document).on("wheel", "input[type=number]", function (e) {
					$(this).blur();
				});

                $(".select2").select2();

			});

			function tab(index) {
				if (index === 1) {
					$('#form_anda').show();
					$('#form_menu').hide();
					$("#form_login").hide();
					$("#form_survey").hide();
				}

				if (index === 2) {
					$('#form_grup').show();
					$('#form_menu').hide();
					$("#form_login").hide();
					$("#form_survey").hide();
				}

				if (index === 3) {
					fillTablePengumuman();
					$('#form_pengumuman').show();
					$('#form_menu').hide();
					$("#form_login").hide();
					$("#form_survey").hide();
				}

				if (index === 4) {
					fillTableKehadiran();
					$('#form_kehadiran').show();
					$('#form_menu').hide();
					$("#form_login").hide();
					$("#form_survey").hide();
				}

				if (index === 5) {
					// fillTableKehadiran();
					$('#form_kehadiran').hide();
					$('#form_menu').hide();
					$("#form_login").hide();
					$("#form_survey").show();
				}
			}

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
								$("#notification").hide();
								$("#form_login").hide();
								openSuccessGritter("Success","Login Berhasil. Silahkan Reset Password");
							}else{
								$("#form_menu").show();
								$("#form_anda").hide();
								$("#form_login").hide();
								$("#notification").hide();
								openSuccessGritter("Success","Login Berhasil");
							}
							$("#employee_id").text(result.data[0].employee_id);
							$("#employee_id_reset").val(result.data[0].employee_id);
							$("#employee_id_grup").text(result.data[0].employee_id);
							$("#employee_id_survey").text(result.data[0].employee_id);
							$("#emp_name").val(result.data[0].name);
							$("#name").text(result.data[0].name);
							$("#name_grup").text(result.data[0].name);
							$(".name_survey").text(result.data[0].name);
							$("#department").val(result.data[0].department);
							$("#department_survey").val(result.data[0].department);
							if (navigator.geolocation) {
								navigator.geolocation.getCurrentPosition(showPosition);
							} else {
						    // x.innerHTML = "Geolocation is not supported by this browser.";
							}

							if (result.cek_survey.length > 0) {
								$('#belum_survey').hide();
								$('#sudah_survey').show();
								if (result.cek_survey[0].total <= 40) {
									$('#resiko_covid').html('<span style="color:blue;font-weight:bold;">Anda Berisiko Rendah Terkena Dampak Covid-19. Tetap Jaga Kesehatan dan Kebersihan Diri Lingkungan Sekitarmu ya!</span>');
								}
								else if(result.cek_survey[0].total > 40 && result.cek_survey[0].total <= 95){
									$('#resiko_covid').html('<span style="color:orange;font-weight:bold;">Anda Berisiko Sedang Terkena Dampak Covid-19. Tetap Jaga Kesehatan dan Kebersihan Diri Lingkungan Sekitarmu ya!</span>');
								}
								else if(result.cek_survey[0].total > 95){
									$('#resiko_covid').html(' <span style="color:red;font-weight:bold;">Anda Berisiko Tinggi Terkena Dampak Covid-19. Tetap Jaga Kesehatan dan Kebersihan Diri Lingkungan Sekitarmu ya!</span>');	
								}
							}
							else{
								$('#belum_survey').show();
								$('#sudah_survey').hide();
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

		function datatableQuestion() {
			var table = $('#tableQuestion').DataTable({
	          'dom': 'Bfrtip',
	          'responsive':true,
	          // 'lengthMenu': [
	          // [ 5, 10, 25, -1 ],
	          // [ '5 rows', '10 rows', '25 rows', 'Show all' ]
	          // ],
	          // 'buttons': {
	          //   buttons:[
	          //   {
	          //     extend: 'pageLength',
	          //     className: 'btn btn-default',
	          //   },
	          //   ]
	          // },
	          'paging': true,
	          'lengthChange': true,
	          'pageLength': 1,
	          'searching': false,
	          'ordering': true,
	          'order': [],
	          'info': false,
	          'autoWidth': true,
	          "sPaginationType": "full_numbers", //simple
	          "bJQueryUI": true,
	          "bAutoWidth": false,
	          "processing": true
	        });
		}

		function submitForm() {
			$("#loading").show();

			var jumlah_pertanyaan = $("#jml_pertanyaan").val();
			var pertanyaan = [];
			var jawaban = [];
			
			if($("#suhu").val() == "" ){
			    $("#loading").hide();
				openErrorGritter('Error!', 'Suhu Harus Diisi.');
				$("html").scrollTop(0);
				return false;
			}

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

			// if ($('#latitude').val() == "") {
			// 	$("#loading").hide();
			// 	openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
			// 	$("html").scrollTop(0);
			// 	return false;
			// }

			// if ($('#longitude').val() == "") {
			// 	$("#loading").hide();
			// 	openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
			// 	$("html").scrollTop(0);
			// 	return false;
			// }

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
					$("#form_terimakasih").html('<?php date_default_timezone_set('Asia/Jakarta'); ?><center style="font-size:16px">Terimakasih '+$("#name").text()+' telah mengisi laporan pada <br><u><i><span style="color:blue;font-weight:bold;"> <?= date('d F Y') ?> Pukul <?= date('H:i:s') ?></i></u><br>Tetap Jaga Kesehatan dan Sayangi Keluarga Anda.</center><br><br>');
					openSuccessGritter("Success","Berhasil Dibuat");
				}
				else {
					$("#loading").hide();
					openErrorGritter('Error!', result.datas);
				}
			});
		}


		function submitSurvey() {
			$("#loading").show();

			var jumlah_pertanyaan_survey = $("#jml_pertanyaan_survey").val();
			var pertanyaan_survey = [];
			var jawaban_survey = [];

			// console.log($('input[id="jawabansurvey0"]:checked').val());
			// console.log(jumlah_pertanyaan_survey);

			for(var i = 0;i < jumlah_pertanyaan_survey; i++){

				pertanyaan_survey.push($("#pertanyaan_survey"+i).text());

				// console.log($("#pertanyaan_survey"+i).text());
				
				var answer_survey = 'jawabansurvey'+i;

				// console.log($('input[id="'+answer_survey+'"]:checked').val());

				if ($('input[id="'+answer_survey+'"]:checked').val() == null) {
					$("#loading").hide();
					openErrorGritter('Error!', '"'+answer_survey+'" Semua Pertanyaan Survey Harus Diisi');
					return false;
				}

				jawaban_survey.push($('input[id="'+answer_survey+'"]:checked').val());
				
			}

			// console.log(pertanyaan_survey);
			// console.log(jawaban_survey);

			var data = {
				employee_id: $("#employee_id_survey").text(),
				name: $("#name_survey").text(),
				department: $("#department_survey").val(),
				question: pertanyaan_survey,
				answer: jawaban_survey,
				jumlah_pertanyaan_survey : jumlah_pertanyaan_survey
			};



			$.post('{{ url("post/form_survey") }}', data, function(result, status, xhr){
				if(result.status == true){    
					$("#loading").hide();
					$("#form_login").hide();
					$('#belum_survey').hide();
					$('#sudah_survey').show();

					if (result.total_nilai != null) {
						$('#belum_survey').hide();
						$('#sudah_survey').show();
						if (result.total_nilai <= 40) {
							$('#resiko_covid').html('Anda memiliki resiko Rendah');
						}
						else if(result.total_nilai > 40 && result.total_nilai <= 95){
							$('#resiko_covid').html('Anda Memiliki Resiko Sedang');
						}
						else if(result.total_nilai > 95){
							$('#resiko_covid').html('Anda Memiliki Resiko Tinggi');	
						}
					}
				}
				else {
					$("#loading").hide();
					openErrorGritter('Error!', result.datas);
				}
			});
		}

		function fillTable() {

			$('#geser').show();

	      	var data = {
	      		employee_id : $('#nik_grup').val(),
	      		kode : $('#kode_grup').val(),
	    	}

	      $.get('{{ url("index/getGrup") }}', data, function(result, status, xhr){
	      if(result.status){
	        $('#tableResult').DataTable().clear();
	        $('#tableResult').DataTable().destroy();
	        // $('#tableHeadResult').html("");
	        $('#tableBodyResult').html("");
	        // var tableHead = "";
	        var tableData = "";

	        // tableHead += '<tr>';
	        // tableHead += '<th>Nama</th>';
	        // tableHead += '<th>Tanggal</th>';
	        // tableHead += '<th>Status</th>';
	        // tableHead += '</tr>'

	        // $('#tableHeadResult').append(tableHead);

	        $.each(result.datas, function(key, value) {
	          var d = new Date(value.tanggal);
	          var day = d.getDate();
	          var months = ["Januari", "Februari", "Maret", "Apr", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	          var month = months[d.getMonth()];
	          var year = d.getFullYear();

	          var nama = value.name;
	          var nama_singkat = nama.split(' ').slice(0,2).join(' ');

	          tableData += '<tr>';
	          tableData += '<td>'+ value.employee_id +' - '+ nama_singkat +'</td>';
	          tableData += '<td>'+ day +' '+month+' '+year +'</td>';
	          
	          if (value.remark == "OFF" || value.remark == "OFF " || value.remark == " OFF" || value.remark == "Shift_1_OFF" || value.remark == "Shift_2_OFF") {
		          tableData += '<td>SBH</td>';	          	
	          }

	          else if (value.remark == "Shift_1" || value.remark == "Shift_1_Jumat") {
	             tableData += '<td>Masuk (Shift 1)</td>';	          	
	          }

	          else if (value.remark == "Shift_2" || value.remark == "Shift_2_Jumat") {
	             tableData += '<td>Masuk (Shift 2)</td>';	          	
	          }
	          
	          else if (value.remark == "LIBUR") {
	             tableData += '<td>Libur</td>';	          	
	          }
	          
	          else if (value.remark == "WOC" || value.remark == "WOC ") {
	             tableData += '<td>Masuk</td>';	          	
	          }
	          
	          else if (value.remark == "SD") {
	             tableData += '<td>Sakit Dengan Surat Dokter</td>';	          	
	          }

	          else{
	          	 tableData += '<td>Masuk</td>';
	          }
	          
	          tableData += '</tr>';
	        });

	        $('#tableBodyResult').append(tableData);


	       // $('#tableResult tfoot th').each( function () {
	       //   var title = $(this).text();
	       //   $(this).html( '<input style="text-align: center;" type="text" placeholder="Search '+title+'" size="20"/>' );
	       // } );

	        var table = $('#tableResult').DataTable({
	          'dom': 'Bfrtip',
	          'responsive':true,
	          'lengthMenu': [
	          [ 5, 10, 25, -1 ],
	          [ '5 rows', '10 rows', '25 rows', 'Show all' ]
	          ],
	          'buttons': {
	            buttons:[
	            {
	              extend: 'pageLength',
	              className: 'btn btn-default',
	            },
	            ]
	          },
	          'paging': true,
	          'lengthChange': true,
	          'pageLength': 15,
	          'searching': true,
	          'ordering': true,
	          'order': [],
	          'info': true,
	          'autoWidth': true,
	          "sPaginationType": "full_numbers",
	          "bJQueryUI": true,
	          "bAutoWidth": false,
	          "processing": true
	        });
	       // table.columns().every( function () {
    	   //     var that = this;
    
    	   //     $( 'input', this.footer() ).on( 'keyup change', function () {
    	   //       if ( that.search() !== this.value ) {
    	   //         that
    	   //         .search( this.value )
    	   //         .draw();
    	   //       }
    	   //     } );
    	   //   } );
    	   // $('#tableResult tfoot tr').appendTo('#tableResult thead');
	      }
	      else{
	        alert('Attempt to retrieve data failed');
	      }

	    });

	    }

	    function fillTablePengumuman() {

	      $.get('{{ url("index/getPengumuman") }}', function(result, status, xhr){
		      if(result.status){
		        $('#tableResultPengumuman').DataTable().clear();
		        $('#tableResultPengumuman').DataTable().destroy();
		        $('#tableBodyResultPengumuman').html("");
		        var tableData = "";

		        $.each(result.datas, function(key, value) {
		          var d = new Date(value.tanggal);
		          var day = d.getDate();
		          var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		          var month = months[d.getMonth()];
		          var year = d.getFullYear();				

		          tableData += '<tr>';
		          tableData += '<td>'+ day +' '+month+' '+year +'</td>';
		          tableData += '<td><img src="../admin/public/images/' + value.images + '" width="100%" onclick="showAnnouncement(\''+value.images+'\')"></td>';
		          tableData += '</tr>';
		        });

		        $('#tableBodyResultPengumuman').append(tableData);

		        var table = $('#tableResultPengumuman').DataTable({
		          'dom': 'Bfrtip',
		          'responsive':true,
		          'lengthMenu': [
		          [ 5, 10, 25, -1 ],
		          [ '5 rows', '10 rows', '25 rows', 'Show all' ]
		          ],
		          'buttons': {
		            buttons:[
		            {
		              extend: 'pageLength',
		              className: 'btn btn-default',
		            },
		            ]
		          },
		          'paging': true,
		          'lengthChange': true,
		          'pageLength': 5,
		          'searching': true,
		          'ordering': true,
		          'order': [],
		          'info': true,
		          'autoWidth': true,
		          "sPaginationType": "full_numbers",
		          "bJQueryUI": true,
		          "bAutoWidth": false,
		          "processing": true
		        });
		      }
		      else{
		        alert('Attempt to retrieve data failed');
		      }

	      });

	    }

	    function fillTableKehadiran() {
	      $("#loading2").show();

	      var data = {
	      	employee_id:$('#username').val()
	      }

	      $.get('{{ url("index/getKehadiran") }}',data, function(result, status, xhr){
		      if(result.status){
		      	$("#loading2").hide();
		        $('#tableResultKehadiran').DataTable().clear();
		        $('#tableResultKehadiran').DataTable().destroy();
		        $('#tableBodyResultKehadiran').html("");
		        var tableData = "";

		        $.each(result.datas, function(key, value) {
		          var d = new Date(value.answer_date);
		          var day = d.getDate();
		          var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		          var month = months[d.getMonth()];
		          var year = d.getFullYear();

		          tableData += '<tr>';
		          tableData += '<td>'+ day +' '+month+' '+year +'</td>';
		          tableData += "<td>"+value.employee_id+"</td>";
		          tableData += "<td>"+value.name+"</td>";
		          if (value.time_in == null) {
		          	tableData += "<td></td>";
		          	tableData += '<td></td>';
		          }else{
		          	tableData += "<td>"+value.time_in+"</td>";
		          	tableData += '<td><button class="btn btn-warning btn-sm" onclick="mapsSelector(\''+value.lat_in+'\',\''+value.lng_in+'\')">Location</button></td>';
		          }
		          if (value.time_out == null) {
		          	tableData += "<td></td>";
		          	tableData += '<td></td>';
		          }else{
		          	tableData += "<td>"+value.time_out+"</td>";
		          	tableData += '<td><button class="btn btn-warning btn-sm" onclick="mapsSelector(\''+value.lat_out+'\',\''+value.lng_out+'\')">Location</button></td>';
		          }
		          tableData += "<td>"+value.remark+"</td>";
		          tableData += '</tr>';
		        });

		        $('#tableBodyResultKehadiran').append(tableData);

		        var table = $('#tableResultKehadiran').DataTable({
		          'dom': 'Bfrtip',
		          'responsive':true,
		          'lengthMenu': [
		          [ 5, 10, 25, -1 ],
		          [ '5 rows', '10 rows', '25 rows', 'Show all' ]
		          ],
		          'buttons': {
		            buttons:[
		            {
		              extend: 'pageLength',
		              className: 'btn btn-default',
		            },
		            ]
		          },
		          'paging': true,
		          'lengthChange': true,
		          'pageLength': 15,
		          'searching': true,
		          'ordering': true,
		          'order': [],
		          'info': true,
		          'autoWidth': true,
		          "sPaginationType": "full_numbers",
		          "bJQueryUI": true,
		          "bAutoWidth": false,
		          "processing": true
		        });
		      }
		      else{
		      	$("#loading2").hide();
		        alert('Attempt to retrieve data failed');
		      }

	      });

	    }

	    function mapsSelector(lat,lng) {
		  $('#modal-maps').modal('show');
		  $('#iframe').html('');
		  $('#iframe').append('<iframe width="100%" height="640" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=' + lat + ',' + lng + '&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>');

		}

		function showAnnouncement(images) {
		  $('#modal-pengumuman').modal('show');
		  $('#announcement').html('');
		  $('#announcement').append("<img src='../admin/public/images/" + images + "' width='100%'>");

		}

		function cancel(jenis_form) {
			var form = '#'+jenis_form;
			$(form).hide();
			$('#form_menu').show();
		}

	</script>

	</html>