<?php 
	ob_start();
	session_start();
	include("connection.php");   	
	if(!isset($_SESSION["loggedIn"])){
	    header("location:login.php");
	}

	if(isset($_POST["registerAdminUser"])){
		function validate($data){
	       $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}

    	$user_name = validate($_POST["user_name"]);
		$password = validate($_POST["password"]);
    	$email = validate($_POST["email"]);
		$birthday = validate($_POST["birthday"]);
    	$fullname = validate($_POST["fullname"]);
    	$phonenumber = validate($_POST["phonenumber"]);
		$address = validate($_POST["address"]);

		$user_data = 'user_name='. $user_name. '&email='. $email. '&fullname='. $fullname. '&phonenumber='. $phonenumber. '&address='. $address;

		if (empty($user_name)) {
			header("Location: register.php?error=User Name is required&$user_data");
		    exit();
		} else if(empty($password)){
			header("Location: register.php?error=Password is required&$user_data");
		    exit();
		} else if(empty($email)){
			header("Location: register.php?error=Email is required&$user_data");
		    exit();
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: register.php?error=Invalid email format&$user_data");
		    exit();
		} else if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
			header("Location: register.php?error=Name's only letters and white space allowed&$user_data");
		    exit();
		}
		else{
			$password = password_hash($password, PASSWORD_DEFAULT);
			$sql = "SELECT * FROM tbl_admin WHERE user_name = '$user_name'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				header("Location: register.php?error=The username is taken try another user&$user_data");
		        exit();
			} else{
				$sqlInsertAdminUser = "INSERT INTO tbl_admin(user_name, password, fullname, email, birthday, phonenumber, address)";
				$sqlInsertAdminUser .= "VALUES('$user_name', '$password', '$fullname', '$email', '$birthday', '$phonenumber', '$address')";
				$result2 = mysqli_query($conn, $sqlInsertAdminUser);
				if($result2){
		           	header("Location: register.php?success=Your account has been created successfully!");
			        exit();
				} else{
		           	header("Location: register.php?error=unknown error occurred!&$user_data");
			        exit();
				}
			}
		}
	}	
	    
	
 ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<link href="../images/35493994-36e2c50e-04d9-11e8-8b38-890caea01850.png" rel="icon" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/fontawesome/css/fontawesome.min.css">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Register</title>
</head>
<body>
		<div class="co-12">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-11 col-xs-11 col-sm-10 col-md-8 col-lg-6 row-container" style="padding: 10px 44px; margin-top: 44px; margin-bottom: 44px;">
				          <?php if (isset($_GET['error'])) { ?>
				               <p class="error"><?php echo $_GET['error']; ?></p>
				          <?php } ?>
				          <?php if (isset($_GET['success'])) { ?>
				               <p class="success"><?php echo $_GET['success']; ?></p>
				          <?php } ?>
						<form method="post" action="register.php">
          					<?php if (isset($_GET['user_name'])) { ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="user_name" placeholder="Enter User name *" value="<?php echo $_GET['user_name']; ?>">
      							<i class="fas fa-user-circle" id="input_img"></i>
							</div>
          					<?php }else{ ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="user_name" placeholder="Enter User name *">
      							<i class="fas fa-user-circle" id="input_img"></i>
							</div>
          					<?php }?>
							<div class="form-group">
								<input type="password" class="form-control" id="input" name="password" placeholder="Password *">
      							<i class="fas fa-lock" id="input_img"></i>
							</div>
          					<?php if (isset($_GET['email'])) { ?>
							<div class="form-group">
								<input type="email" name="email" class="form-control" id="input" placeholder="Email *" value="<?php echo $_GET['email']; ?>">
      							<i class="fas fa-mail-bulk" id="input_img"></i>
							</div>
          					<?php }else{ ?>
							<div class="form-group">
								<input type="email" name="email" class="form-control" id="input" placeholder="Email *">
      							<i class="fas fa-mail-bulk" id="input_img"></i>
							</div>
          					<?php }?>
          					<?php if (isset($_GET['fullname'])) { ?>
							<div class="form-group">
								<input type="full_name" class="form-control" id="input" name="fullname" placeholder="Full name *" value="<?php echo $_GET['fullname']; ?>">
      							<i class="fas fa-clipboard-list" id="input_img"></i>
							</div>
          					<?php }else{ ?>
							<div class="form-group">
								<input type="full_name" class="form-control" id="input" name="fullname" placeholder="Full name *">
      							<i class="fas fa-clipboard-list" id="input_img"></i>
							</div>
          					<?php }?>
							<div class="form-group">
								<input type="datetime-local" id="input" name="birthday">
							</div>
          					<?php if (isset($_GET['phonenumber'])) { ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="phonenumber" placeholder="Enter phone number" value="<?php echo $_GET['phonenumber']; ?>">
      							<i class="fas fa-phone-alt" id="input_img"></i>
							</div>
          					<?php }else{ ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="phonenumber" placeholder="Enter phone number">
      							<i class="fas fa-phone-alt" id="input_img"></i>
							</div>
          					<?php }?>
          					<?php if (isset($_GET['address'])) { ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="address" placeholder="Address" value="<?php echo $_GET['address']; ?>">
      							<i class="fas fa-home" id="input_img"></i>
							</div>
          					<?php }else{ ?>
							<div class="form-group">
								<input type="text" class="form-control" id="input" name="address" placeholder="Address">
      							<i class="fas fa-home" id="input_img"></i>
							</div>
          					<?php }?>
							<button type="submit"name="registerAdminUser" class="btn btn-md btn-success btn-space">Create</button>
						</form>
					</div>	
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

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>