<?php 

    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_client WHERE code = $otp_code";
        $code_reset = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_reset) > 0){
            $fetch_data = mysqli_fetch_assoc($code_reset);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: login.php?module=new-password');
            exit();
        }else{
            header("location: login.php?module=reset-code&error=You've entered incorrect code!");
        }
    }

 ?>
 <div class="col-10 col-xs-9 col-sm-9 col-md-7 col-lg-5 col-xl-4 row-container" style="margin-top: 144px">
    <form method="post">
        <h2 class=" text-center">Code Verification</h2>
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
            <input type="text" class="form-control" id="input" name="otp" placeholder="Enter code verify *" required>
            <i class="fas fa-mail-bulk" id="input_img"></i>
        </div>
        <div class="form-group">
            <button type="submit" name="check-reset-otp" class="btn btn-md btn-success btn-block">Submit</button>
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