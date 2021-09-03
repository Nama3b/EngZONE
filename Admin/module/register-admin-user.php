<!-- <?php 
	if(isset($_POST["registerAdminUser"])){
		$user_name = $_POST["user_name"];
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$email = $_POST["email"];
		$address = $_POST["address"];
		$fullname = $_POST["fullname"];
		$phonenumber = $_POST["phonenumber"];
		$birthday = $_POST["birthday"];

		$sqlInsertAdminUser = "INSERT INTO tbl_admin(user_name, password, email, address, fullname, phonenumber, birthday)";
		$sqlInsertAdminUser .= "VALUES('$user_name', '$password', '$email', '$address', '$fullname', '$phonenumber', '$birthday')";
		mysqli_query($conn, $sqlInsertAdminUser) or die("error register admin user");
		header("location: login.php");
	}		
 ?>
<div class="container">
	<div class="col-12 row-container-register" style="">
		<h2 style="text-align: center;">FORM REGISTER ADMIN USER</h2>
		<form method="post" class="pt-2">
			<div class="form-group">
				<input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User name *">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="password" name="password" placeholder="Password *">
			</div>
			<div class="form-group">
				<input type="full_name" class="form-control" id="fullname" name="fullname" placeholder="Full name *">
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" id="email" placeholder="Email *">
			</div>
			<div class="form-group">
				<input type="datetime-local" class="form-control" id="birthday" name="birthday">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter phone number">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" id="address" name="address" placeholder="Address">
			</div>
			<button type="submit"name="registerAdminUser" class="btn btn-md btn-success btn-block">Register</button>
		</form>
	</div>	
</div>
 -->


 <?php 	

	if(isset($_POST["registerAdminUser"])){
		function validate($data){
	       $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}

    	$username = validate($_POST["username"]);
		$password = validate($_POST["password"]);
    	$email = validate($_POST["email"]);
		$birthday = validate($_POST["birthday"]);
    	$fullname = validate($_POST["fullname"]);
    	$phonenumber = validate($_POST["phonenumber"]);
		$address = validate($_POST["address"]);


		if (empty($username)) {
			header("Location: admin.php?module=register-admin-user?userErr=User Name is required");
		    exit();
		} else if(empty($password)){
			header("Location: admin.php?module=register-admin-user?passErr=Password is required");
		    exit();
		} else if(empty($email)){
			header("Location: admin.php?module=register-admin-user?emailErr=Email is required");
		    exit();
		} 
		else{
			$password = md5($password);
			$sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0){
				header("Location: admin.php?module=register-admin-user?error=The username is taken try another user");
		        exit();
			} else{
				$sqlInsertAdminUser = "INSERT INTO tbl_admin(username, password, fullname, email, birthday, phonenumber, address)";
				$sqlInsertAdminUser .= "VALUES('$username', '$password', '$fullname', '$email', '$birthday', '$phonenumber', '$address')";
				$result2 = mysqli_query($conn, $sqlInsertAdminUser) or die("error register admin user");
				if($result2){
		           	header("Location: admin.php?module=register-admin-user?success=Your account has been created successfully");
			        exit();
				} else{
		           	header("Location: admin.php?module=register-admin-user?error=unknown error occurred");
			        exit();
				}
			}
		}



		// if (empty($_POST["email"])) {
		// 	header("Location: register.php?emailErr=Email is required");
		//     exit();
		// } else {
		//     // check if e-mail address is well-formed
		//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //     			$emailErr = "Invalid email format";
		//     }
		// }
		// if (empty($_POST["password"])) {
		// 	header("Location: register.php?emailErr=Email is required");
		//     exit();
		// } else{
		// }
		// if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
		//     $nameErr = "Only letters and white space allowed";
		// }
		// if (!preg_match("/^[0-9]{10,13}*$/",$phonenumber)) {
		//     $numErr = "Number length from 10 to 13 characters";
		// }
	}	
	    
	
 ?>
				<div class="container">	
					<div class="col-12 row-container" >
						<form method="post" >
						    <?php if(isset($_GET['userErr'])){ ?>
						      <p class="error"><?php echo $_GET['userErr']; ?></p>
						    <?php } ?>
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter User name *">
							</div>
						    <?php if(isset($_GET['passErr'])){ ?>
						      <p class="error"><?php echo $_GET['passErr']; ?></p>
						    <?php } ?>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password *">
							</div>
						    <?php if(isset($_GET['nameErr'])){ ?>
						      <p class="error"><?php echo $_GET['nameErr']; ?></p>
						    <?php } ?>
							<div class="form-group">
								<input type="full_name" class="form-control" id="fullname" name="fullname" placeholder="Full name *">
							</div>
						    <?php if(isset($_GET['emailErr'])){ ?>
						      <p class="error"><?php echo $_GET['emailErr']; ?></p>
						    <?php } ?>
							<div class="form-group">
								<input type="email" name="email" class="form-control" id="email" placeholder="Email *">
							</div>
							<div class="form-group">
								<input type="datetime" id="birthday" name="birthday">
							</div>
						    <?php if(isset($_GET['numErr'])){ ?>
						      <p class="error"><?php echo $_GET['numErr']; ?></p>
						    <?php } ?>
							<div class="form-group">
								<input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter phone number">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="address" name="address" placeholder="Address">
							</div>
							<button type="submit"name="registerAdminUser" class="btn btn-md btn-success btn-space">Create</button>
						</form>
					</div>	
				</div>