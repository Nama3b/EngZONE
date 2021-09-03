<?php 
if(isset($_POST["registerUser"])){
		function validate($data){
	       $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}

    	$username = validate($_POST["username"]);
		$password = validate($_POST["password"]);
    	$email = validate($_POST["email"]);
    	$fullname = validate($_POST["fullname"]);
    	$phonenumber = validate($_POST["phonenumber"]);
		$address = validate($_POST["address"]);

		$user_data = 'username='. $username. '&email='. $email. '&fullname='. $fullname. '&phonenumber='. $phonenumber. '&address='. $address;

		if (empty($username)) {
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
			$sql = "SELECT * FROM tbl_client WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				header("Location: register.php?error=The username is taken try another user&$user_data");
		        exit();
			} else{
				$sqlInsertUser = "INSERT INTO tbl_client(username, password, fullname, email, phonenumber, address)";
				$sqlInsertUser .= "VALUES('$username', '$password', '$fullname', '$email', '$phonenumber', '$address')";
				$result2 = mysqli_query($conn, $sqlInsertUser);
				if($result2){
		           	header("Location: register.php?success=Your account has been created successfully!");
			        exit();
				} else{
		           	header("Location: register.php?error=unknown error occurred!");
			        exit();
				}
				header("Location: login.php");
			}
		}
	}	
 ?>

<div class="col-10 col-xs-9 col-sm-9 col-md-7 col-lg-6 col-xl-5 row-container" style="margin-bottom: 88px; margin-top: 77px">
	<?php if (isset($_GET['error'])) { ?>
		<p class="error"><?php echo $_GET['error']; ?></p>
	<?php } ?>
	<?php if (isset($_GET['success'])) { ?>
			<p class="success"><?php echo $_GET['success']; ?></p>
	<?php } ?>
	<form action="register.php?module=register-user" method="post">
        <?php if (isset($_GET['username'])) { ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="username" placeholder="User name at least've 6 character *" value="<?php echo $_GET['username']; ?>">
      		<i class="fas fa-user-circle" id="input_img"></i>
		</div>
        <?php }else{ ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="username" placeholder="User name at least've 6 character *">
      		<i class="fas fa-user-circle" id="input_img"></i>
		</div>
        <?php }?>
		<div class="form-group">
			<input type="password" class="form-control" id="input" name="password" placeholder="Password at least've 6 character *">
      		<i class="fas fa-lock" id="input_img"></i>
		</div>
        <?php if (isset($_GET['email'])) { ?>
		<div class="form-group">
			<input type="email" name="email" class="form-control" id="input" placeholder="Your address email *" value="<?php echo $_GET['email']; ?>">
      		<i class="fas fa-mail-bulk" id="input_img"></i>
		</div>
        <?php }else{ ?>
		<div class="form-group">
			<input type="email" name="email" class="form-control" id="input" placeholder="Your address email *">
      		<i class="fas fa-mail-bulk" id="input_img"></i>
		</div>
        <?php }?>	
        <?php if (isset($_GET['fullname'])) { ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="fullname" placeholder="Full name" value="<?php echo $_GET['fullname']; ?>">
      		<i class="fas fa-clipboard-list" id="input_img"></i>
		</div>
        <?php }else{ ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="fullname" placeholder="Full name">
			<i class="fas fa-clipboard-list" id="input_img"></i>
		</div>
        <?php }?>
        <?php if (isset($_GET['address'])) { ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="address" placeholder="Your home address" value="<?php echo $_GET['address']; ?>">
      		<i class="fas fa-home" id="input_img"></i>
		</div>
        <?php }else{ ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="address" placeholder="Your home address">
      		<i class="fas fa-home" id="input_img"></i>
		</div>
        <?php }?>
        <?php if (isset($_GET['phonenumber'])) { ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="phonenumber" placeholder="Phone number to contact us" value="<?php echo $_GET['phonenumber']; ?>">
      		<i class="fas fa-phone-alt" id="input_img"></i>
		</div>
        <?php }else{ ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="phonenumber" placeholder="Phone number to contact us">
      		<i class="fas fa-phone-alt" id="input_img"></i>
		</div>
        <?php }?>
		<button type="submit"name="registerUser" class="btn btn-md btn-success btn-block">Create</button>
	</form>
</div>