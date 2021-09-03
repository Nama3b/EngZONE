<?php
  ob_start();
  session_start();
  include("connection.php");
  header("Access-Control-Allow-Origin: *");

  $login = false;
  $username = false;
  if(isset($_SESSION['login'])){
  	$login = true;
  	$username = true;
  }
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<link href="images/204362082_1241767646277919_4473932285118109597_n.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="css/fontawesome/css/all.css">
	<link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

	<title>EngZONE</title>
</head>
<body>
	<!-- navigation -->
	<nav class="navbar navbar-expand-md sticky-top">
		<div class="container-fluid">
			<a href="index.php" class="navbar-branch nav-link">
				<img src="images/204362082_1241767646277919_4473932285118109597_n.png" alt="" width="50px">
			</a>
			<button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#navbarResponsive" style="border:2px solid white;">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<div class="navbar-nav ml-auto d-flex">
					<a href="index.php?module=logToAdmin" style="margin-right: 17px;"><i class="fa fa-user-secret"></i></a>
					<a href="book.php" style="margin-right: 17px;"><i class="fas fa-book"></i></a>
					<a class="home-ic" href="index.php"><i class="fas fa-home"></i></a>
					<div class="home-item d-flex">
						<div class="nav-item"><a href="#About" class="nav-link">About</a></div>
						<div class="nav-item"><a href="#Service" class="nav-link">Service</a></div>
						<div class="nav-item"><a href="#Contact" class="nav-link">Contact</a></div>
						<div class="nav-item"><a href="#Client" class="nav-link">Client</a></div>	
					</div>
					<div class="nav-item"><a href="course.php" class="nav-link">Course</a></div>
					<div class="nav-item"><a href="post.php" class="nav-link">Post</a></div>
				</div>
			</div>
 			<?php 
	 			if($username){
	 				$currentUser = $_SESSION["username"];	
					$selectClient = "SELECT * FROM tbl_client WHERE username ='$currentUser'";
					$result = mysqli_query($conn, $selectClient);
					$row = mysqli_fetch_assoc($result);
	 			}

				if($login){
					echo '
						<div class="admin-profile">
							<ul class=" navbar-nav align-items-center d-none d-md-flex">
					          <li class="nav-item dropdown">
					            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					              <div class="media align-items-center">
					                <span class="avatar avatar-sm rounded-circle">
					                  <img alt="" src="'.$row["client_img"].'" width="50px">
					                </span>
					                <div class="media-body ml-2 d-none d-lg-block" style="margin-top: 15px;">
					                    <p>'.$row["username"].'</p>
					                </div>
					              </div>
					            </a>
					            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					              <div class=" dropdown-header noti-title">
					                <h6 class="text-overflow m-0">Hellou !</h6>
					              </div>
					              <a href="index.php?module=client-profile&client_id='.$row["client_id"].'" class="dropdown-item">
					                <i class="ni ni-single-02"></i>
					                <span>My profile</span>
					              </a>
					              <a href="book.php?module=shoppingcart" class="dropdown-item">
					                <i class="ni ni-calendar-grid-58"></i>
					                <span>My cart</span>
					              </a>
					              <a href="facebook.com" class="dropdown-item">
					                <i class="ni ni-support-16"></i>
					                <span>Help</span>
					              </a>
					              <div class="dropdown-divider"></div>
					              <a href="index.php?module=logout" class="dropdown-item">
					                <i class="ni ni-user-run"></i>
					                <span>Log out</span>
					              </a>
					            </div>
					          </li>
					        </ul>	
						</div>		
					';
				} else{
					echo '
						<div class="nav-item">
							<button class="btn btn-outline-light btn-md"><a href="login.php" style="text-decoration: none;">Try it for free!</a></button>
						</div>
					';
				}
			 ?>
			
		</div>
	</nav>
	<?php 
	if (isset($_GET["module"])) {
		$file = "module/".$_GET["module"].".php";
			include($file);
		} else{
			include("module/home.php");
		}
	?>
	<?php 
	if (isset($_GET["module"])) {
 		$file="module/".$_GET["module"].".php";
 	}
	?>
	<footer>
		<div class="container-fluid pl-5">
			<div class="row text-center">
				<div class="col-md-4">
					<img src="images/53278904_2601150810111427_5858780672478412800_n.jpg" alt="" width="50px">
					<hr class="dark">
					<p class="text-left">
						<i class="material-icons">phone_iphone</i>  999-8888-666<br>
						<i class="material-icons">mail_outline</i>  leedragon@gmail.com<br>
						<i class="far fa-address-card"></i>  Neue Mainzer Str. 52-58, 60311 Frankfurt am Main, Germany.
					</p>
				</div>
				<div class="col-md-4 business-time">
					<h4>Business Time</h4>
					<hr class="dark">
					<p class="text-left">
						<i class="fas fa-clock"></i>  Monday-Friday: 8am - 7pm<br>
						<i class="fas fa-clock"></i>  Weekend: 9am - 1pm
					</p>
				</div>
				<div class="col-md-4 servicce">
					<h4>Services</h4>
					<hr class="dark">
					<p class="text-left">
						- Lorem ipsum, dolor sit amet.<br>
						- Lorem, ipsum dolor sit.<br>
						- Lorem ipsum dolor, sit amet consectetur.
					</p>
				</div>
				<hr class="dark">
				<div class="col-6"><p>Designed by Namaeb</p></div>
				<div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o"></i></p></div>	
			</div>
		</div>
	</footer>


	<!-- ICON -->
	<script defer src="css/fontawesome/js/fontawesome.js"></script>
	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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