  <?php   
      $username = '';
      $password = '';
      $check = false;
      if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        if(isset($_POST["rememberMe"])){
          //thiết lập cookie
          setcookie('username',$username);
          setcookie('password',$password);
          $check = true;
        }
        //login here
        if ($username == "" || $password == "") {
          header("location: login.php?error=Please fill all field!");
          exit();
        }else{
          $sqlLogin = "SELECT * FROM tbl_client WHERE username ='$username' AND password = '$password' || email = '$username' AND password = '$password'";
          $result = mysqli_query($conn,$sqlLogin);
          $num_rows = mysqli_num_rows($result);
          if($num_rows==0){
            header("location: login.php?error=username or password is incorrect!");
            exit();
          } else{
            while($data = mysqli_fetch_array($result)){ 
              $_SESSION["login"] = 1;
              $_SESSION["client_id"] = $data["client_id"];
              $_SESSION['username'] = $data["username"];
              $_SESSION["email"] = $data["email"];
              $_SESSION["fullname"] = $data["fullname"];
              $_SESSION["address"] = $data["address"];
              $_SESSION["phonenumber"] = $data["phonenumber"];
              $_SESSION["client_img"] = $data["client_img"];
            }
            header("location:index.php");
          }
        }
      }
      //kiểm tra tồn tại cookie
      if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        $check = true;
      }
 ?>  

<div class="col-10 col-xs-9 col-sm-9 col-md-7 col-lg-5 col-xl-4 row-container">
	<form method="post">
		<h2 class=" text-center">Login with </h2>
		<div class="login-with text-center">
      <?php 
        echo $login_button;
       ?>
			
			<a href="" class="btn btn-info"><i class="fab fa-facebook"></i></a>
		</div>
    <?php if(isset($_SESSION['info'])){ ?>
      <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
        <?php echo $_SESSION['info']; ?>
      </div>
    <?php } ?>
    <?php if(isset($_GET['error'])){ ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="username" placeholder="User name *">
      <i class="fas fa-user-circle" id="input_img"></i>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" id="input" name="password" placeholder="Password*">
      <i class="fas fa-lock" id="input_img"></i>
		</div>
		<div class="form-check">
			<input <?php echo isset($check)?"checked":"" ?> type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
			<label for="form-check-label" for="rememberMe">Check me out</label>
		</div>
    <div class="form-group">
		  <button type="submit" name="login" class="btn btn-md btn-success btn-block">Login</button>
    </div>
	</form>
	</div>
	<div class="col-12" style="margin-bottom: 12vh">
		<div class="row justify-content-center mt-2">
  		<div class="forgot-pass">
  			<a href="login.php?module=forgot-password" class="text-light" align="left"><small>Forgot password?</small></a>
  		</div>
      <div class="register-user">
      	<a href="register.php" class="text-light" align="right"><small><u>Register</u></small></a>
      </div>
    </div>
</div>
		 <!-- 
 <?php  
      $username = '';
      $password = '';
      $check = false;
      if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(isset($_POST["rememberMe"])){
          //thiết lập cookie
          setcookie('username',$username);
          setcookie('password',$password);
          $check = true;
        }
        //login here
        $sqlLogin = "SELECT * FROM tbl_client WHERE username ='$username'";
        $result = mysqli_query($conn,$sqlLogin);
        if(count($result)){
          $row = mysqli_fetch_row($result);
          if(password_verify($password, $row[2])) {
            $_SESSION["login"] = $row;
          }
            $_SESSION["loggedIn"] = 1;
            header("location:index.php");
        }
      }
      //kiểm tra tồn tại cookie
      if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];
        $check = true;
      }
?>  -->