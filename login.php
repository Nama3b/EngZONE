	<?php
    ob_start();
    session_start();
    include("connection.php");

    //Include Google Client Library for PHP autoload file
    require_once 'vendor/autoload.php';

    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('231714279049-jjs55qgll3o2l30ddmm12p842q0gk1jh.apps.googleusercontent.com');

    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('vwzuqNXMgUJ2VtA3GZ3Lskro');

    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('http://localhost/bootstrap%20project/login.php');

    // to get the email and profile 
    $google_client->addScope('email');

    $google_client->addScope('profile');


$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
     
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];

 



  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

  $_SESSION["login"] = 1;  

  if(!empty($data['given_name']))
  {
   $_SESSION['username'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['fullname'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['email'] = $data['email'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['client_img'] = $data['picture'];
  }
    
  header("Location:index.php"); 
 }
}


if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-danger " data-onsuccess="onSignIn"><i class="fab fa-google-plus-g"></i></a>';
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<link href="images/204362082_1241767646277919_4473932285118109597_n.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/login.css">
	<link rel="stylesheet" href="css/fontawesome/css/all.css">
	<link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

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
					include("module/login-main.php");
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


	<!-- JS -->
	<script defer src="css/fontawesome/js/fontawesome.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
	<script>
	 	$.ajax({
		type: 'GET',
		url: 'http://engzone.great-site.net/posts/1',
		success: data => {
			console.log(data);
		},
		error: () => {
			console.log('Error');
		}
	})
	</script>
</body>
</html>