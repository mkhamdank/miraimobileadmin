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
	<link rel="stylesheet" type="text/css" href="{{ url('datatable/dataTables.bootstrap.min.css')}}">
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
					<span class="login100-form-title-1" style="color: black" id="laporan_harian">
						<center>HALAMAN ADMIN MIRAI YMPI</center>
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
							<i class="fa fa-close"></i> &nbsp; Username Salah,  Password Salah, atau Anda Tidak Memiliki Otoritas.
						</div>
						<button class="contact100-form-btn" onclick="login()" style="display: inline-block;">
							<span>
								Login
								<i class="fa fa-arrow-right"></i>
							</span>
						</button>
					</form>

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
							<!--<div class="row" style="width: 100%; padding-top: 5px;">-->
							<!--	<button class="btn btn-primary" onclick="tab(1)" style="text-align: center; width: 100%;">Laporan Kesehatan</button>						-->
							<!--</div>-->
							<!-- <div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(2)" style="text-align: center; width: 100%;">Informasi Grup Kerja</button>
							</div> -->
							<div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(4)" style="text-align: center; width: 100%;">Informasi Employee</button>
							</div>
							<div class="row" style="width: 100%; padding-top: 5px;">
								<button class="btn btn-primary" onclick="tab(3)" style="text-align: center; width: 100%;">Pengumuman</button>						
							</div>
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
						
						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_employee">
							{{ csrf_field() }}

							<h3>Informasi Karyawan</h3>

								<label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Masukkan NIK </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="nik_employee" name="nik_employee" placeholder="Nomor Induk Karyawan">
					              </div>

					              
					            </div>
								<div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 0">
					                <button class="btn btn-sm btn-success" type="button" onClick="fillTableEmployee()" style="display: inline-block;margin-top: 10px">
										<span>
											Cari
										</span>
									</button>
					            </div>
							<br><br>
							<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;overflow-x: scroll;">
							 <table id="tableResultEmployee" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important">
				              	<thead>
					                <tr>
					                    <th>NIK / Nama</th>
					                	<th>Department</th>
					                	<th>Section</th>
					                	<th>Group</th>
					                	<th>Password</th>
					                	<th>Role</th>
					                	<th>Action</th>
					                </tr>
					              </thead>
					              <tbody id="tableBodyResultEmployee">
					              </tbody>
				            </table>
				            <p style="color: red" id="geserEmployee" style="display: none">*Geser ke kanan untuk melihat detail</p> 
				        	</div>

							<div class="container-contact100-form-btn" style="margin-top: 30px;">
								<button class="contact1002-form-btn" type="button" onclick="cancel('form_employee')" style="display: inline-block;">
									<span>
										<i class="fa fa-arrow-left"></i>
										Back
									</span>
								</button>
							</div>
						</form>

						<form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_edit_employee">
							{{ csrf_field() }}

							<h3>Edit Karyawan</h3>

								<label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Nomor Induk Karyawan </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="nik_name_edit" name="nik_name_edit" placeholder="Nomor Induk Karyawan" readonly>
					                  <input type="text" class="form-control pull-right" id="nik_edit" name="nik_edit" placeholder="Nomor Induk Karyawan" hidden>
					                  <input type="text" class="form-control pull-right" id="url_edit_emp" name="url_edit_emp" placeholder="url" hidden>
					              </div>
					            </div>

					            <label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Password </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="password_edit" name="password_edit" placeholder="Nomor Induk Karyawan">
					              </div>
					            </div>

					            <label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Role </label>
								</label>
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					            	<div class="form-group">
					                  <select class="form-control select2" style="width: 100%;" id="role" name="role" data-placeholder="Pilih Role" required>
					                  	<option value="ADMIN">ADMIN</option>
					                  	<option value="EMP">EMP</option>
					                  </select>
					              </div>
					            </div>
								<div class="container-contact100-form-btn" style="margin-top: 30px;">
									<button class="contact100-form-btn" type="button" onclick="updateEmp()" style="display: inline-block;">
										<span>
											Update
											<i class="fa fa-arrow-right"></i>
										</span>
									</button>
									<button class="contact1002-form-btn" type="button" onclick="cancel('form_edit_employee')" style="display: inline-block;">
										<span>
											<i class="fa fa-arrow-left"></i>
											Back
										</span>
									</button>
								</div>
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
					                  	<option value="PM">Maintenance</option>
					                  	<option value="PP">Part Process</option>
					                  	<option value="QA">Quality Assurance</option>
					                  	<option value="WH">Warehouse</option>
					                  	<option value="WST">Welding Surface Treatment</option>
					                  </select>
					              </div>
					            </div>
								<div class="col-md-3 col-sm-3 col-xs-3" style="padding-left: 0">
					                <button class="btn btn-sm btn-success" type="button" onClick="fillTable()" style="display: inline-block;margin-top: 10px">
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
							<button class="btn btn-sm btn-primary" onclick="addPengumuman()">
								<i class="fa fa-plus"></i>
								Tambah Pengumuman
							</button>

							<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left: 0;overflow-x: scroll;">
							 <table id="tableResultPengumuman" class="table table-bordered table-striped table-hover" style="overflow-x: scroll;border-collapse: collapse !important">
				              	<thead>
					                <tr>
					                	<th>Tanggal</th>
					                	<th>Pengumuman</th>
					                	<th>Action</th>
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

						<form class="contact100-form validate-form" method="post" enctype="multipart/form-data" style="padding: 0px 25px 58px 25px;display: none" id="form_tambah_pengumuman">
							{{ csrf_field() }}

							<h3>Tambah Pengumuman</h3>

								<label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Di Upload Oleh </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="nik_pengumuman" name="nik_pengumuman" readonly>
					              </div>
					            </div>

					            <label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Tanggal </label>
								</label>

								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="text" class="form-control pull-right" id="tanggal_pengumuman" name="tanggal_pengumuman" placeholder="Tanggal" value="{{date('Y-m-d')}}">
					              </div>
					            </div>

					            <label class="label-input1002">
									<label style="font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif"> Gambar Pengumuman
								<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
					              <div class="form-group">
					                  <input type="file" class="form-control pull-right" id="file" name="file" onchange="readURL(this);">
					                  <img width="200px" id="blah" src="" style="display: none" alt="your image" />
					              </div>
					            </div>

								<div class="container-contact100-form-btn" style="margin-top: 30px;">
									<button class="contact100-form-btn" type="submit" style="display: inline-block;">
										<span>
											Tambah
											<i class="fa fa-arrow-right"></i>
										</span>
									</button>
									<button class="contact1002-form-btn" type="button" onclick="cancel('form_tambah_pengumuman')" style="display: inline-block;">
										<span>
											<i class="fa fa-arrow-left"></i>
											Back
										</span>
									</button>
								</div>
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
		<script src="{{ url('datatable/dataTables.buttons.min.js')}}"></script>
		<script src="{{ url('datatable/jquery.dataTables.min.js')}}"></script>
 		<script src="{{ url('datatable/dataTables.bootstrap.min.js')}}"></script>
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


				$(document).on("wheel", "input[type=number]", function (e) {
					$(this).blur();
				});



			});

			function tab(index) {
				if (index === 1) {
					$('#form_anda').show();
					$('#form_menu').hide();
					$("#form_login").hide();
				}

				if (index === 2) {
					$('#form_grup').show();
					$('#form_menu').hide();
					$("#form_login").hide();
				}

				if (index === 3) {
					fillTablePengumuman();
					$('#form_pengumuman').show();
					$('#form_menu').hide();
					$("#form_login").hide();
				}
				
				if (index === 4) {
					$('#form_employee').show();
					$('#form_menu').hide();
					$("#form_login").hide();
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
								// $("#notification").hide();
								$("#form_login").hide();
								openSuccessGritter("Success","Login Berhasil. Silahkan Reset Password");
							}else{
								$("#form_menu").show();
								$("#form_anda").hide();
								$("#form_login").hide();
								// $("#notification").hide();
								openSuccessGritter("Success","Login Berhasil");
							}
							$("#nik_pengumuman").val(result.data[0].employee_id);
							$("#employee_id").text(result.data[0].employee_id);
							$("#employee_id_reset").val(result.data[0].employee_id);
							$("#employee_id_grup").text(result.data[0].employee_id);
							$("#emp_name").val(result.data[0].name);
							$("#name").text(result.data[0].name);
							$("#name_grup").text(result.data[0].name);
							$("#department").val(result.data[0].department);
					} else {
						$("#notif").show();
					}
				} else {
					$("#notif").show();
				}
			})
			}

			function showPosition(position) {
			 $("#latitude").val(position.coords.latitude);
			 $("#longitude").val(position.coords.longitude);
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
	        $('#tableBodyResult').html("");
	        var tableData = "";

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
	          
	          if (value.remark == "OFF") {
		          tableData += '<td>SBH</td>';	          	
	          }

	          else if (value.remark == "Shift_1" || value.remark == "Shift_1_Jumat") {
	             tableData += '<td>Masuk (Shift 1)</td>';	          	
	          }

	          else if (value.remark == "Shift_2" || value.remark == "Shift_2_Jumat") {
	             tableData += '<td>Masuk (Shift 2)</td>';	          	
	          }

	          else{
	          	 tableData += '<td>Masuk</td>';
	          }
	          
	          tableData += '</tr>';
	        });

	        $('#tableBodyResult').append(tableData);

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
	      }
	      else{
	        alert('Attempt to retrieve data failed');
	      }
	    });

	    }
	    
	    function fillTableEmployee() {

			$('#geserEmployee').show();

	      	var data = {
	      		employee_id : $('#nik_employee').val()
	    	}

	      $.get('{{ url("index/getEmployee") }}', data, function(result, status, xhr){
		      if(result.status){
		        $('#tableResultEmployee').DataTable().clear();
		        $('#tableResultEmployee').DataTable().destroy();
		        $('#tableBodyResultEmployee').html("");
		        var tableData = "";

		        var url = 'index/update/';

		        $.each(result.datas, function(key, value) {

		          var nama = value.name;
		          var nama_singkat = nama.split(' ').slice(0,2).join(' ');

		          tableData += '<tr>';
		          tableData += '<td>'+ value.employee_id +' - '+ nama_singkat +'</td>';
		          tableData += '<td>'+value.department+'</td>';
		          tableData += '<td>'+value.section+'</td>';
		          tableData += '<td>'+value.groupes+'</td>';
		          tableData += '<td>'+value.password+'</td>';
		          tableData += '<td>'+value.role+'</td>';
		          tableData += '<td><button class="btn btn-warning" onclick="editEmp(\''+value.employee_id+'\',\''+url+'\')">Edit</button></td>';
		          
		          tableData += '</tr>';
		        });

		        $('#tableBodyResultEmployee').append(tableData);

		        var table = $('#tableResultEmployee').DataTable({
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
		          tableData += "<td><a href='images/" + value.images + "' target='_blank'><img src='images/" + value.images + "' width='100%'></a></td>";
		          tableData += '<td><button class="btn btn-danger" onclick="deleteAnnouncement(\''+value.id+'\')">Delete</button></td>';
		          
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
		        alert('Attempt to retrieve data failed');
		      }

	      });

	    }

	    function editEmp(employee_id,url) {
	    	$('#form_edit_employee').show();
	    	$('#form_employee').hide();
	    	var data = {
	      		employee_id : employee_id
	    	}

	      $.get('{{ url("index/getEmployee") }}', data, function(result, status, xhr){
		      if(result.status){

		        $.each(result.datas, function(key, value) {
		          var nama = value.name;
		          var nama_singkat = nama.split(' ').slice(0,2).join(' ');

		          $('#url_edit_emp').val(url);

		          $('#nik_name_edit').val(value.employee_id +' - '+ nama_singkat);
		          $('#nik_edit').val(value.employee_id);
		          $('#password_edit').val(value.password);
		          $('#role').val(value.role).trigger('change.select2');
		        });
		      }
		      else{
		        alert('Attempt to retrieve data failed');
		      }
	      });
	    }

	    function updateEmp() {
	    	var employee_id = $('#nik_edit').val();
	    	var password = $('#password_edit').val();
	    	var role = $('#role').val();

	    	var data = {
	      		employee_id : employee_id,
	      		password : password,
	      		role : role
	    	}

			$.post('{{ url("post/update_emp") }}', data, function(result, status, xhr){
				if (result.status) {
					openSuccessGritter("Success","Update Berhasil");
					cancel('form_edit_employee');
					fillTableEmployee();
				} else {
					openErrorGritter("Error!","Update Gagal");
				}
			});
	    }

	    function addPengumuman() {
	    	$('#form_pengumuman').hide();
	    	$('#form_tambah_pengumuman').show();
	    }

	    
		$(document).ready(function(){
		 $('#form_tambah_pengumuman').on('submit', function(event){
		  event.preventDefault();
		  $.ajax({
		   url:"{{ url('post/add_announcement') }}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data)
		   {
		   		openSuccessGritter('Success','Tambah Pengumuman Berhasil');
		   		cancel('form_tambah_pengumuman');
		   		fillTablePengumuman();
		   }
		  })
		 });

		});

		function deleteAnnouncement(id) {
			var x = confirm("Are you sure you want to delete?");
			if (x){
				var data = {
	      			id : id
		    	}

			      $.get('{{ url("index/delete_announcement") }}', data, function(result, status, xhr){
				      if(result.status){
				      	openSuccessGritter('Success','Sukses Hapus Data');
				      	fillTablePengumuman();
				      }
				      else{
				        openErrorGritter('Error!','Gagal Hapus Data');
				      }
			      });
			}
	    }


		function cancel(jenis_form) {
			if (jenis_form === 'form_edit_employee') {
				var form = '#'+jenis_form;
				$(form).hide();
				$('#form_employee').show();
			}else if (jenis_form === 'form_tambah_pengumuman') {
				var form = '#'+jenis_form;
				$(form).hide();
				$('#form_pengumuman').show();
			}else{
				var form = '#'+jenis_form;
				$(form).hide();
				$('#form_menu').show();
			}
		}

		function readURL(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                    $('#blah').show();
                      $('#blah')
                          .attr('src', e.target.result);
                  };
                  reader.readAsDataURL(input.files[0]);
              }
          }

	</script>

	</html>