<?php  
      $user_name = '';
      $password = '';
      $check = false;
      if(isset($_POST["login"])){
        $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        if(isset($_POST["rememberMe"])){
          //thiết lập cookie
          setcookie('user_name',$user_name);
          setcookie('password',$password);
          $check = true;
        }
        //login here
        $sqlLogin = "SELECT * FROM tbl_admin WHERE user_name ='$user_name'";
        $result = mysqli_query($conn,$sqlLogin);
        if(count($result)){
          $row = mysqli_fetch_row($result);
          if(password_verify($password, $row[2])) {
            $_SESSION["loggedIn"] = $row;
          }
            header("location:admin.php");
        }
      }
      //kiểm tra tồn tại cookie
      if(isset($_COOKIE["user_name"]) && isset($_COOKIE["password"])){
        $user_name = $_COOKIE["user_name"];
        $password = $_COOKIE["password"];
        $check = true;
      }
?>

<div class="col-8 col-xs-10 col-sm-8 col-md-6 col-lg-4 row-container">
	<form method="post" action="">
		<h2 class=" text-center">Login user admin </h2>
    <?php if(isset($_GET['error'])){ ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
		<div class="form-group">
      <input type="text" class="form-control" id="input" name="user_name" placeholder="User name *">
      <i class="fas fa-user-circle" id="input_img"></i>
		</div>
		<div class="form-group">
      <input type="password" class="form-control" id="input" name="password" placeholder="Password*">
      <i class="fas fa-lock" id="input_img"></i>
		</div>
    <div class="form-group">
      <button type="submit" name="login" class="btn btn-md btn-success btn-block btn-space">Login</button>  
    </div>
	</form>
	</div>
	<div class="col-12" style="margin-bottom: 17vh">
		<div class="row justify-content-center mt-2 ml-3">
			<div class="forgot-pass">
				<a href="#" class="text-light"><small>Forgot password?</small></a>
			</div>
	   </div>
    </div>
</div>
		