<?php
  ob_start();
  session_start();
  include("connection.php");      

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<link href="../images/35493994-36e2c50e-04d9-11e8-8b38-890caea01850.png" rel="icon" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/fontawesome/css/fontawesome.min.css">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Login</title>
</head>
<body>
	<div class="co-12">
		<div class="container-fluid bg">
			<div class="row justify-content-center">
				<?php 
					if (isset($_GET["module"])) {
						$file = "module/".$_GET["module"].".php";
							include($file);
						} else{
							include("module/login-admin-body.php");
						}
					?>
					<?php 
					if (isset($_GET["module"])) {
				 		$file="module/".$_GET["module"].".php";
				 	}
				?>			
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="container sticky-bottom">
			<div class="row text-center">
				<div class="col-6"><p>Designed by Namaeb</p></div>
				<div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o"></i></p></div>
			</div>
		</div>			
	</div>

  	<!-- ICON -->
  	<script defer src="../css/fontawesome/js/fontawesome.js"></script>
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>