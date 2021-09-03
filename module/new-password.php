<?php 
     if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
        if($password !== $repassword){
            header("location: login.php?module=new-password&error=Confirm password not matched!");
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = $password;
            $update_pass = "UPDATE tbl_client SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: login.php');
            }else{
                header("location: login.php?module=new-password&error=Failed to change your password!");
            }
        }
    }

 ?>
 <div class="col-10 col-xs-9 col-sm-9 col-md-7 col-lg-5 col-xl-4 row-container" style="margin-top: 144px">
    <form method="post">
        <h2 class=" text-center">New Password</h2>
        <?php if(isset($_SESSION['info'])){ ?>
            <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                <?php echo $_SESSION['info']; ?>
            </div>
        <?php
            }
        ?>
        <?php if(isset($_GET['error'])){ ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="form-group">
            <input type="password" class="form-control" id="input" name="password" placeholder="Create new password *" required>
            <i class="fas fa-unlock" id="input_img"></i>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="input" name="repassword" placeholder="Confirm your password *" required>
            <i class="fas fa-lock" id="input_img"></i>
        </div>
        <div class="form-group">
            <button type="submit" name="change-password" class="btn btn-md btn-success btn-block">Change</button>
        </div>
    </form>
    </div>
    <div class="col-12" style="margin-bottom: 12vh">
        <div class="row justify-content-center mt-2">
          <div class="register-user">
            <a href="register.php" class="text-light" align="right"><small><u>Register</u></small></a>
          </div>
        </div>
    </div>
</div>