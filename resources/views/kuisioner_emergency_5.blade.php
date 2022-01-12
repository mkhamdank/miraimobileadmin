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

		@font-face {
			font-family: Raleway-SemiBold;
			src: url('../fonts/raleway/Raleway-SemiBold.ttf'); 
		}

		@font-face {
			font-family: Raleway-Bold;
			src: url('../fonts/raleway/Raleway-Bold.ttf'); 
		}

		@font-face {
			font-family: Raleway-Black;
			src: url('../fonts/raleway/Raleway-Black.ttf'); 
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
			<span style="font-size: 20px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
		</p>
	</div>

	<div class="container-contact100">
		<div class="wrap-contact100">
				<span class="contact100-form-title" style="padding-bottom: 20px;text-align: left">
					SURVEY KONDISI EMERGENCY
				</span>

				<br>

				Form ini merupakan media untuk mengumpulkan data dari karyawan YMPI ketika terjadi suatu peristiwa emergency.

      			<input type="hidden" value="{{csrf_token()}}" name="_token" />
				<label class="label-input1002">Nomor Induk Karyawan (NIK) <span style="color:red">*</span></label>

				<input type="text" class="form-control" id="employee_id" name="employee_id" onkeyup="checkEmp(this.value)">

				<label class="label-input1002" id="labelnama">Nama</label>

				<input type="text" class="form-control" id="name" name="name" readonly>

				<label class="label-input1002" id="labeldept">Department</label>

				<input type="text" class="form-control" id="department" name="department" readonly>

				<label class="label-input1002">Apakah ada anggota keluarga anda yang terlibat di kejadian tersebut ? <span style="color:red">*</span></label>

				<div class="validate-input" style="position: relative; width: 100%">
					<label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
						<input type="radio"  id="jawaban" name="jawaban" value="Iya">
						<span class="checkmark"></span>
					</label>
					&nbsp;&nbsp;
					<label class="radio" style="margin-top: 5px">Tidak
						<input type="radio" id="jawaban" name="jawaban" value="Tidak">
						<span class="checkmark"></span>
					</label>
				</div>


				<input type="hidden" class="form-control" id="keterangan" name="keterangan" value="Emergency 5">
				
				<!-- demam, batuk, kejadian, tenggorokan sakit, sesak nafas, indera perasa & penciuman terganggu,  -->
			
				<div class="container-contact100-form-btn" style="margin-top: 20px">
					<button class="contact100-form-btn" onclick="save()">
						<span>
							Submit
							<i class="fa fa-save"></i>
						</span>
					</button>
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
<script src="{{ url('js/jquery.gritter.min.js') }}"></script>
<script src="{{ url('js/main.js')}}"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('#labelnama').hide();
		$('#name').hide();
		$('#labeldept').hide();
		$('#department').hide();
	});
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

	function checkEmp(value) {
		if (value.length == 9) {
			var data = {
		      	employee_id:$('#employee_id').val()
		      }

		      $.get('{{ url("get_employee") }}',data, function(result, status, xhr){
			      if(result.status){
			      	$('#labelnama').show();
					$('#name').show();
					$('#labeldept').show();
					$('#department').show();
					$.each(result.employee, function(key, value) {
						$('#name').val(value.name);
						$('#department').val(value.department);
					});
			      }
			      else{
			        alert('NIK Tidak ditemukan');
			      }

		      });
		}else{
			$('#labelnama').hide();
			$('#name').hide();
			$('#labeldept').hide();
			$('#department').hide();
		}
	}

	function save() {
		$("#loading").show();

		if($("#employee_id").val() == "" || $("#name").val() == ""){
		    $("#loading").hide();
			openErrorGritter('Error!', 'NIK Karyawan Harus Diisi. Pastikan NIK Tertulis Dengan Benar');
			return false;
		}

		if ($('input[id="jawaban"]:checked').val() == null) {
			$("#loading").hide();
			openErrorGritter('Error!', 'Jawaban Harus Diisi.');
			return false;
		}

		var data = {
			employee_id : $('#employee_id').val(),
			name : $('#name').val(),
			department : $('#department').val(),
			jawaban : $('input[id="jawaban"]:checked').val(),
			keterangan : $('#keterangan').val()
		}

		$.post('{{ url("post/kuisioner_emergency") }}', data, function(result, status, xhr){
			if(result.status == true){    
				$("#loading").hide();
				openSuccessGritter("Success","Berhasil Dibuat");
				location.reload();
			}
			else {
				$("#loading").hide();
				openErrorGritter('Error!', result.datas);
			}
		})
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
</script>

</html>