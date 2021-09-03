<?php 


	  $email = '';
      if(isset($_POST["enterEmail"])){
        $email = $_POST["email"];
        //login here
        if ($email == "") {
          header("location: login.php?error=Please enter email!");
          exit();
        }else{
          $sqlLogin = "SELECT * FROM tbl_client WHERE email = '$email'";
          $result = mysqli_query($conn,$sqlLogin);
          $num_rows = mysqli_num_rows($result);
          if($num_rows==0){
            header("location: login.php?module=forgot-password&error=Email is incorrect!");
            exit();
          } else{
            while($data = mysqli_fetch_array($result)){ 
           		$code = rand(999999, 111111);
            	$insert_code = "UPDATE tbl_client SET code = $code WHERE email = '$email'";
           		$run_query = mysqli_query($conn, $insert_code);
           		if($run_query){	
           			include("./phpmailer/PHPMailer.php");
					include("./phpmailer/Exception.php");
					include("./phpmailer/OAuth.php");
					include("./phpmailer/POP3.php");
					include("./phpmailer/SMTP.php");

		           	$mail = new PHPMailer\PHPMailer\PHPMailer();
			    	$mail->IsSMTP(); 
			    	try{
				    	$mail->SMTPDebug  = 1;
						$mail->CharSet 	  = 'UTF-8';
						$mail->isSMTP();

						$mail->Host       = 'smtp.gmail.com';
						$mail->SMTPAuth   = true; 

						$mail->Username   = 'engzoneez@gmail.com';
						$mail->Password   = 'engzon3@gmail.com';

						$mail->SMTPSecure = 'tls';
						$mail->Port       = 587;    

						$email = $_SESSION['email'];
						$mail->setFrom('engzoneez@gmail.com', 'EngZone verify');

						$mail->addAddress($email);

						$mail->isHTML(true);      
						$mail->Subject = 'Hellou! This is your password reset code form EngZone!';
						$mail->Body = "Your password reset code is $code."; 
						$mail->send();

		                $info = "We've sent a password reset otp to your email - $email";
		                $_SESSION['info'] = $info; 
	                    $_SESSION['email'] = $email;
	            		header("location: login.php?module=reset-code");	
	            	} catch (Exception $e) {
						echo "Mail Error: {$mail->ErrorInfo}";
					}  
				$mail->smtpClose();         
           		} else{
            		header("location: login.php?module=forgot-password&error=Failed while sending code!");
	                }
            }
          }
        }
      }

 ?>
<div class="col-10 col-xs-9 col-sm-9 col-md-7 col-lg-5 col-xl-4 row-container" style="margin-top: 144px">
	<form method="post">
		<h2 class=" text-center">Find your account</h2>
		<?php if(isset($_GET['success'])){ ?>
	      <p class="success"><?php echo $_GET['success']; ?></p>
	    <?php } ?>
		<?php if(isset($_GET['error'])){ ?>
	      <p class="error"><?php echo $_GET['error']; ?></p>
	    <?php } ?>
		<div class="form-group">
			<label for="">Enter your email address</label>
			<input type="text" class="form-control" id="input" name="email" placeholder="Email address *" required value="<?php echo $email ?>">
      		<i class="fas fa-mail-bulk" id="input_img"></i>
		</div>
	    <div class="form-group">
			<button type="submit" name="enterEmail" class="btn btn-md btn-success btn-block">Continue</button>
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