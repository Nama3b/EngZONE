
	<!-- Carousel -->
	<div id="slides" class="carousel slide carousel-fade" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#slides" data-slide-to="0" class="active"></li>
			<li data-target="#slides" data-slide-to="1"></li>
			<li data-target="#slides" data-slide-to="2"></li>
			<li data-target="#slides" data-slide-to="3"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/carousel01.jpg" alt="" alt="First slide">
				<div class="carousel-caption">
					<h1 class="display-2">Welcome to EngZone</h1>
					<h3>Become a global citizen!</h3>
					<?php 
						if($login){
							echo '
							<div class="pt-3 display-3">
								<h1><u>Hellou '.$row["username"].'</u>! </h1>
							</div>
							';
						} else{
							echo '
							<div class="pt-3">
								<button type="button" class="btn btn-success btn-lg"><a href="login.php?module=login-main">Get started</a></button>
							</div>
							';
						}
					 ?>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/carousel02.jpg" alt="" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img src="images/carousel03.jpg" alt="" alt="Third slide">
			</div>
			<div class="carousel-item">
				<img src="images/carousel04.jpg" alt="" alt="Second slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
    		<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
    		<span class="sr-only">Next</span>
		</a>
	</div>

	<!-- jombotron -->
	<div class="jumbotron-content">
		<div class="container-fluid">
			<div class="jumbotron">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
					<h3>Why should you join us?</h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, ducimus modi excepturi voluptas reprehenderit numquam ipsam velit blanditiis dolor mollitia quod ut recusandae, fugit ipsa minus temporibus iure, cum sunt.</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
					<a href="login.php?module=register-user">
						<button type="button" class="btn btn-outline-success">Register for advice</button>
					</a>
				</div>
			</div>
		</div>	
	</div>

	<div id="Service">
		<div class="container-fluid padding">
			<div class="row welcome text-center">
				<div class="col-12">
					<h1>LET'S BUILD YOUR SKILLS</h1>
				</div>
				<div class="col-12">
					<p>Don't talk too much. Let's show it off</p>
				</div>
				<hr>
			</div>
		</div>
		<div class="container-fluid padding">
			<div class="row text-center padding">
				<div class="col-xs-12 col-sm-12 col-md-4 services">
					<i class="fas fa-calendar-check"></i>
					<h3>CHECK YOUR LEVEL</h3>
					<p>Feel free to show off your skills</p>
					<a href="">
						<button type="button" class="btn btn-outline-success">Let's try it</button>
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 services">
					<i class="far fa-lightbulb"></i>
					<h3>NEW APPROACH</h3>
					<p>Refreshing thinking approach to learning English</p>
					<a href="">
						<button type="button" class="btn btn-outline-warning">Let's find out</button>
					</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 services">
					<i class="fas fa-hands-helping"></i>
					<h3>ANY TIME YOU NEED</h3>
					<p>We'll take care the rest of all</p>
					<a href="">
						<button type="button" class="btn btn-outline-danger">Contact us</button>
					</a>
				</div>
			</div>
		</div>
		<div class="container pt-5">
			<div class="row text-center feature">
				<div class="col-12">
					<h2>MODERN TEACHING METHODOLOGY</h2>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<img src="images/artboard-1-copy-20210422100829.png" alt="" width="100%">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<img src="images/artboard-1-20210422100829.png" alt="" width="100%">
				</div>
			</div>
		</div>
	</div>
	
	<div class="container pt-5 text-center padding teacher" id="About">
		<h2>TEAM OF TEACHERS AT ENGZONE</h2>
		<hr>
		<div class="row padding">
			<div id="slides02" class="carousel slide carousel-fade" data-ride="carousel">
				<ul class="carousel-indicators mb-0">
					<li data-target="#slides02" data-slide-to="0" class="active"></li>
					<li data-target="#slides02" data-slide-to="1"></li>
					<li data-target="#slides02" data-slide-to="2"></li>
					<li data-target="#slides02" data-slide-to="3"></li>
				</ul>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="col-10 col-xs-8 col-sm-8 col-md-8 col-lg-8 teach-in4">
							<h2>deSuck FACE</h2>
							<p>Lorem ipsum dolor sit, amet consectetur, adipisicing elit. Velit placeat unde possimus praesentium, dolorem at.</p>
						</div>
						<div class="col-2 col-xs-4 col-sm-4 col-md-4 col-lg-4 teach-img">
							<img src="images/187148852_830262001225501_5767608676718114594_n.jpg" alt="" class="d-block h-auto w-auto mx-auto" align="right">
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-10 col-xs-8 col-sm-8 col-md-8 col-lg-8 teach-in4">
							<h2>Henry Charles Albert David</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, nam quod illum neque. Provident, voluptas.</p>
						</div>
						<div class="col-2 col-xs-4 col-sm-4 col-md-4 col-lg-4  teach-img">
							<img src="images/default-user.png" alt="" class="d-block h-auto w-auto mx-auto" align="right">
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-10 col-xs-8 col-sm-8 col-md-8 col-lg-8 teach-in4">
							<h2>Marshall Bruce Mathers III</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, nam quod illum neque. Provident, voluptas.</p>
						</div>
						<div class="col-2 col-xs-4 col-sm-4 col-md-4 col-lg-4  teach-img">
							<img src="images/admin-icon.png" alt="" class="d-block h-auto w-auto mx-auto" align="right">
						</div>
					</div>
					<div class="carousel-item">
						<div class="col-10 col-xs-8 col-sm-8 col-md-8 col-lg-8 teach-in4">
							<h2>Brave DOG</h2>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, nam quod illum neque. Provident, voluptas.</p>
						</div>
						<div class="col-2 col-xs-4 col-sm-4 col-md-4 col-lg-4 teach-img">
							<img src="images/admin-settings.png" alt="" class="d-block h-auto w-auto mx-auto" align="right">
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#slides02" data-slide="prev">
				</a>
				<a class="carousel-control-next" href="#slides02" data-slide="next">
				</a>
			</div>
		</div>
	</div>
	<div class="container padding pt-5" id="Contact">
		<div class="row text-center padding">
			<div class="col-md-12">
				<h2>CONTACT US</h2>
				<div class="mapnso" >
					<div class="col-12 col-xs-12 col-sm-12 col-md-10 col-lg-10 map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14899.362294757368!2d105.81729955!3d20.99902685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1563781037215!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 social-media padding">
						<a href="https://www.facebook.com/EZEnglishZoneKids/" target="_blank"><i class="fa fa-facebook-square"></i></a>
						<a href="https://www.youtube.com/channel/UCp3l3o3UwhyWYKdqKLuA99Q"><i class="fab fa-youtube" target="_blank"></i></a>
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="container mt-5" id="Client">
		<div class="row client">
			<div class="col-12 text-center">
				<h2>What clients say?</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cumque, ut.</p>
			</div>
			<hr>
			<div class="col-12 col-xs-12 col-md-5 col-lg-6">
				<div class="review-web">
					<?php 
						if(isset($_POST["addReview"])){	
						    $reviewer_name = $_SESSION["username"];
						    $review_content = $_POST["review_content"];
						    $rating = $_POST["star"];

						    if($review_content == ""){
						    	header("location: index.php?reviewError=Please fill out your review!#Client");
						    } else{
							    $sqlInsert = "INSERT INTO tbl_review_web(reviewer_name, review_content, rating)";
							    $sqlInsert .= " VALUES('$reviewer_name', '$review_content', '$rating')";
							    mysqli_query($conn,$sqlInsert) or die("error add comment");
							    header("location:index.php#Client");	
						    }
						}
					?>
					<div class="col-12 img-cont">
						<img src="./images/maxresdefault.jpg" alt="" width="100%">
					</div>
					<?php if(isset($_GET['reviewError'])){ ?>
						<p class="error"><?php echo $_GET['reviewError']; ?></p>
					<?php } ?>
					<?php 
						if($login){
							echo '
							<form action="" method="post">
								<div class="rate">
									<p>Lets rate:</p>
									<div class="stars">
										<input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
										<label class="star star-5" for="star-5"></label>
										<input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
										<label class="star star-4" for="star-4"></label>
										<input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
										<label class="star star-3" for="star-3"></label>
										<input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
										<label class="star star-2" for="star-2"></label>
										<input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
										<label class="star star-1" for="star-1"></label>
									</div>	
								</div>
								<div class="form-group">
									<textarea class="form-control" name="review_content" id="review_content" rows="3" placeholder="Your review"></textarea>
								</div>
								<div class="col-md-12 text-right">
									<button class="btn btn-md btn-outline-success" name="addReview" type="submit">Rate</button>
								</div>
							</form>	
							';
						} else{
							echo '
								<div class="nav-item" align="center">
									<button class="btn btn-md btn-success"><a href="login.php" style="text-decoration: none;">Please login to review</a>
									</button>
								</div>
							';
						}
					 ?>
					
				</div>	
			</div>
			<div class="col-11 col-xs-11 col-md-7 col-lg-6 client-review">
				<?php if(isset($_GET['replyError'])){ ?>
					<p class="error"><?php echo $_GET['replyError']; ?></p>
				<?php } ?>
				<div class="d-flex">
					<?php 
						$sqlCount = "SELECT COUNT(*) AS total_cmt FROM tbl_review_web WHERE status = 1";
						$resultCount = mysqli_query($conn, $sqlCount);
						$rowCount = mysqli_fetch_assoc($resultCount);

						if($rowCount["total_cmt"] > 1){
							echo '<div class="comment-count mb-2" style="direction: ltr"><u>'.$rowCount["total_cmt"].' Reviews</u> <i class="far fa-comments"></i></div>';
						} else{
							echo '<div class="comment-count" style="direction: ltr">'.$rowCount["total_cmt"].' Review</div> <i class="far fa-comment-alt"></i>';
						}
					 ?>
					 <?php 
					 	$sqlCountRate = "SELECT AVG(rating) AS avg_rate FROM tbl_review_web WHERE status = 1" ;
						$resultRate = mysqli_query($conn, $sqlCountRate);
						$rowRate = mysqli_fetch_assoc($resultRate);
					  ?>
					<div class="avg-rate ml-3">
						<div class="stars">
							<u>Rating:</u> <?php echo number_format($rowRate["avg_rate"], 1); ?>
							<input class="star" type="radio" name="star" checked/>
							<label class="star ml-1"></label>
						</div>	
					</div>	
				</div>
				<?php 
					if(isset($_POST["replyReview"])){
						$review_id = $_GET["review_id"];
						$client_id = $_SESSION["client_id"];
						$reply_content = $_POST["reply_content"];
						if($reply_content == ""){
          					header("location: index.php?replyError=Please fill out your reply!");
						} else{
							$sqlInsert = "INSERT INTO tbl_review_web_reply(review_id, client_id, reply_content)";
							$sqlInsert .= " VALUES('$review_id', '$client_id', '$reply_content')";
							mysqli_query($conn,$sqlInsert) or die("error add reply");
							header("location: index.php#Client");	
						}
					}
					$sqlSelectReview = "SELECT * FROM tbl_review_web WHERE status = 1";
					$result = mysqli_query($conn, $sqlSelectReview);
					$i=0;
					while($row = mysqli_fetch_assoc($result)){
						$i++;
		 		?>
				<div class="col-xs-12 col-sm-12 col-md-12 client-profile" id="client-profile-<?php echo $i ?>">
					<?php
						$review_id = $row["review_id"];
						if($login){
							$client_id = $_SESSION["client_id"];
							$sqlSelectLike = "SELECT * FROM tbl_review_web_like WHERE review_id = '$review_id' AND client_id = '$client_id'";
							$resultLike2 = mysqli_query($conn, $sqlSelectLike);
							$rowLike2 = mysqli_fetch_assoc($resultLike2);

							if(isset($_POST["addLike-$i"])){
								if($rowLike2["client_id"] == $client_id){
									$sqlAddLike = "UPDATE tbl_review_web_like SET like_status = 1 WHERE review_id = '$review_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlAddLike);
									header("Location: index.php#client-profile-$i");
								} else{
									$like_status = 1;
									$sqlAddLike = "INSERT INTO tbl_review_web_like(review_id, client_id, like_status)";
									$sqlAddLike .= "VALUE('$review_id', '$client_id', '$like_status') ";
									mysqli_query($conn, $sqlAddLike);
									header("Location: index.php#client-profile-$i");
								}
							}
							if(isset($_POST["removeLike-$i"])){
								$sqlRemoveLike = "UPDATE tbl_review_web_like SET like_status = 0 WHERE review_id = '$review_id' AND client_id = '$client_id'";
								mysqli_query($conn, $sqlRemoveLike);
								header("Location: index.php#client-profile-$i");
							}	
						}

						$sqlCountLike = "SELECT SUM(like_status) AS total_like FROM tbl_review_web_like WHERE review_id = '$review_id'";
						$resultLike = mysqli_query($conn, $sqlCountLike);
						$rowLike = mysqli_fetch_assoc($resultLike);
					 ?>
					 <div class="d-flex">
					 	<div class="rv-content">
							<p><?php echo $row["review_content"] ?></p>
							<div class="col-12 d-flex">
								<div class="col-6"></div>
								<div class="col-6" align="right">
									<?php 
										$total_like = $rowLike["total_like"];
										if($total_like > 0){
											echo '<span class="like">'.$rowLike["total_like"].'<i class="ml-1 far fa-hand-peace"></i></span>';
										} else{
											echo '';
										}
									 ?>
								</div>
							</div>
						</div>
						<?php 
							if($login){
								$client_id = $_SESSION["client_id"];
								$review_id = $row["review_id"];
								$sql = "SELECT * FROM tbl_review_web WHERE review_id = '$review_id'";
								$resultSelect = mysqli_query($conn, $sql);
								$rowSelect = mysqli_fetch_assoc($resultSelect);
								if($client_id == $rowSelect["client_id"]){
									echo '<button class="btn btn-sm btn-outline-success dropdown dropdown-toggle ml-2 pt-0 pb-0" style="height:25px" data-toggle="dropdown"></button>
									';
								}	
							} 
						 ?>	
						<ul class="dropdown-menu">
							<li><a href="post.php?module=remove-action&review_id=<?php echo $rowSelect["review_id"] ?>" onclick="return confirm('Are your sure to remove this review!'">Remove</a></li>
						</ul>
					 </div>
					<div class="client-in4">
						<div class="arrow"></div>
						<a href="index.php?module=other-client&client_id=<?php echo $row["client_id"] ?>"><img src="<?php echo $row["img"] ?>" alt="" class="w-auto h-auto img-client"></a>
						<div class="client-s d-flex">
							<div class="col-5" align="left">
								<h6><a href="index.php?module=other-client&client_id=<?php echo $row["client_id"] ?>"><?php echo $row["reviewer_name"] ?></a></h6>
								<i class="material-icons date-range" style="font-size:13px">date_range</i> <?php echo $row["createdate"] ?>	
							</div>
							<div class="col-3">
								<div class="stars">
									<?php echo $row["rating"] ?> 
									<input class="star" type="radio" name="star" checked/>
									<label class="star ml-1"></label>
								</div>	
							</div>
							<div class="sub-review-content d-flex col-4">
								<form action="" method="post">
									<?php 
										if($login){
											$like_status = $rowLike2["like_status"];
											if($like_status == 0){
												echo '<small><button type="submit" class="btn bnt-sm btn-outline-primary" name="addLike-'.$i.'">Like</button></small>';
											} else{
												echo '<small><button type="submit" class="btn bnt-sm btn-outline-primary" name="removeLike-'.$i.'">Unlike</button></small>';
											}
										} else{
											echo '';
										}
									 ?>	
								</form>
								<?php 
									if($login){
										echo '
											<small><button class="btn btn-outline-success ml-2" data-toggle="collapse" data-target="#reply-form-'.$i.'"><a href="index.php?module=home&review_id='.$row["review_id"].'#Client">Reply</a></button></small>
										';
									} else{
										echo '
											<button class="btn btn-outline-success ml-2" ><a href="login.php">Login to reply</a></button>
										';
									}
								 ?>
							</div>
						</div>
					</div>
					<?php 
						$review_id = $row["review_id"];
						$selectCountRep = "SELECT COUNT(*) AS total_rep FROM tbl_review_web_reply WHERE review_id = '$review_id'";
						$resultCount = mysqli_query($conn, $selectCountRep);
						$rowCount = mysqli_fetch_assoc($resultCount);

						$total_rep = $rowCount["total_rep"];
						if($total_rep > 1){
							echo '<div class="display-review text-center mt-2" data-toggle="collapse" data-target="#reply-review-'.$i.'">
									<h6>See more '.$rowCount["total_rep"].' replies</h6>
								</div>';
						} elseif($total_rep == 1){
							echo '<div class="display-review text-center mt-2" data-toggle="collapse" data-target="#reply-review-'.$i.'">
									<h6>See more '.$rowCount["total_rep"].' reply</h6>
								</div>';
						} else{
							echo '';
						}
					 ?>		
					<div class="collapse" id="reply-review-<?php echo $i ?>">	
						<?php 
							$review_id = $row["review_id"];
							$sqlSelectRep = "SELECT * FROM tbl_review_web_reply INNER JOIN tbl_client ON tbl_review_web_reply.client_id = tbl_client.client_id WHERE review_id = '$review_id'";
							$resultRep = mysqli_query($conn, $sqlSelectRep);
							while($rowRep = mysqli_fetch_assoc($resultRep)){
						 ?>
						<div class="reply-review">
							<p><?php echo $rowRep["reply_content"] ?></p>
							<div class="reply-client-in4">
								<div class="arrow"></div>
								<img src="<?php echo $rowRep["client_img"] ?>" alt="" class="w-auto h-auto img-client">
								<div class="reply-client-s d-flex">
									<div class="col-8" align="left">
										<h6><?php echo $rowRep["username"] ?></h6>
										<i class="material-icons date-range" style="font-size:13px">date_range</i> <?php echo $rowRep["createdate"] ?>	
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>	
					<div class="reply-form collapse text-center mt-3" id="reply-form-<?php echo $i ?>">
						<form action="" method="post">
							<img src="<?php echo $row["img"] ?>" alt="">
							<input type="text" name="reply_content">
							<button class="btn btn-outline-success" type="submit" name="replyReview">Submit</button>
						</form>
					</div>
					<hr>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>


	