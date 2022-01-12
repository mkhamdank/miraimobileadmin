<?php
// header("refresh: 3; http://36.94.7.202:887/miraimobile/public/");
header("refresh: 3; http://10.109.33.10/miraimobileadmin/public/");
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>YMPI</title>
		<link rel="shortcut icon" type="image/x-icon" href="public/logo_mirai_bundar.png" />
		
		<link rel="stylesheet" type="text/css" href="public/css/main.css">
		<script src="public/jquery.min.js"></script>
		<style>
			#myProgress {
			  width: 100%;
			  background-color: #ddd;
			}

			#myBar {
			  width: 1%;
			  height: 6px;
			  background-color: #555299;
			}
		</style>
	</head>
	<body>

		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div style="text-align: center;padding: 20px">
						<img src="public/logo_mirai.png" style="width: 200px" alt="">
					</div>
					<div id="myProgress">
						  <div id="myBar"></div>
						</div>
					<div class="login100-form-title" style="background-color: #605CA8;">
						<span class="login100-form-title-1">
							SELAMAT DATANG DI MIRAI PT. YMPI
						</span>
					</div>
					<div style="background: #605CA8;text-align: center;">
						<span style="color: white;font-size: 12px">
							Created By : YMPI-MIS
						</span>
					</div>
				</div>
			</div>
		</div>

	</body>
	<script>
		    $( document ).ready(function() {
		    	var i = 0;
		        if (i == 0) {
				    i = 1;
				    var elem = document.getElementById("myBar");
				    var width = 1;
				    var id = setInterval(frame, 30);
				    function frame() {
				      if (width >= 100) {
				        clearInterval(id);
				        i = 0;
				      } else {
				        width++;
				        elem.style.width = width + "%";
				      }
				    }
				  }
		    });
	</script>
</html>