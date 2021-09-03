<?php 
	if(isset($_GET["book_id"])){
		$sqlSelectBook = "SELECT * FROM tbl_book WHERE book_id = ".$_GET["book_id"];
		$result = mysqli_query($conn,$sqlSelectBook) or die("Lỗi chi tiết san phẩm");
		$row = mysqli_fetch_row($result);
	}
	if(isset($_GET["book_id"])){
		$book_id = $_GET["book_id"];
		$sqlSelectReview = "SELECT AVG(favorite) AS avg_rate FROM tbl_book_review WHERE status = 1 AND book_id = '$book_id'" ;
		$result2 = mysqli_query($conn, $sqlSelectReview);
		$row2 = mysqli_fetch_assoc($result2);
	}
?>
<div class="container pt-5">
	<div class="row">
		<div class="col-12 book-detail-section">
			<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<img src="<?php echo $row[6] ?>" alt="" width="100%">
			</div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="book-detail-in4" id="book-detail-in4">
					<div class="col-12 d-flex">
						<div class="col-11"><h3><?php echo $row[2] ?></h3></div>
						<div class="col-1 book-avg-rate">
							<div class="stars" align="right">
								<?php echo number_format($row2["avg_rate"], 1); ?>
								<input class="star" type="radio" name="star" checked/>
								<label class="star ml-1"></label>
							</div>	
						</div>
					</div>
					<div class="price">
						<h2><?php echo number_format($row[3],0,",","."); ?>$ </h2>
						<h4 class="old-price"><?php echo number_format($row[4],0,",","."); ?>$</h4>	
					</div>
					<div class="book-storage">
						<p>Storage: <?php echo $row[5] ?></p>
					</div>
					<div class="book-quantity">
						<p>Qty: </p>
						<input type="text" name="book_qty" id="book_qty_<?php echo $row[0] ?>" maxlength="12" value="1" min="0" class="input-text book_qty">
						<div class="quantity-ic">
							<a href="">
								<i class="fas fa-chevron-up" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $row[0] ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"></i>
							</a>
							<a href="">
								<i class="fas fa-chevron-down" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $row[0] ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"></i>
							</a>	
						</div>
						<div class="pl-3">
							<button class="btn btn-sm btn-outline-light"  onclick="addCart(<?php echo $row[0]?>)"><i class="fas fa-cart-plus"></i> Add cart</button>
						</div>
					</div>
					<hr class="light">
					<div class="description">
						<p><?php echo $row[7] ?>Lorem ipsum dolor, sit, amet consectetur adipisicing elit. Quae nisi error, temporibus vero eligendi sequi iusto ullam officia, ducimus eveniet.</p>
					</div>
					<div class="shopping-ic d-flex">
						<a href="book.php?module=shoppingcart" class="">
							<button class="btn btn-sm btn-outline-success"><i class="fas fa-cart-arrow-down" style="font-size:19px"></i> Your cart</button>
						</a>
						<?php
							$book_id = $row[0];
							if($login){
								$client_id = $_SESSION["client_id"];
								$sqlSelectFavor = "SELECT * FROM tbl_book_favorite WHERE book_id = '$book_id' AND client_id = '$client_id'";
								$resultFavor2 = mysqli_query($conn, $sqlSelectFavor);
								$rowFavor2 = mysqli_fetch_assoc($resultFavor2);

								if(isset($_POST["addFavorite"])){
									if($rowFavor2["client_id"] == $client_id){
										$sqlAddFovorite = "UPDATE tbl_book_favorite SET favorite_status = 1 WHERE book_id = '$book_id' AND client_id = '$client_id'";
										mysqli_query($conn, $sqlAddFovorite);
										header("location: book.php?module=book-detail&book_id=$book_id#book-detail-in4");	
									} else{
										$favorite_status = 1;
										$sqlAddFovorite = "INSERT INTO tbl_book_favorite(book_id, client_id, favorite_status)";
										$sqlAddFovorite .= "VALUE('$book_id', '$client_id', '$favorite_status') ";
										mysqli_query($conn, $sqlAddFovorite);
										header("location: book.php?module=book-detail&book_id=$book_id#book-detail-in4");
									}
								}
								if(isset($_POST["removeFavorite"])){
									$sqlRemoveFavorite = "UPDATE tbl_book_favorite SET favorite_status = 0 WHERE book_id = '$book_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlRemoveFavorite);
									header("location: book.php?module=book-detail&book_id=$book_id#book-detail-in4");
								}

							}
							$sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_book_favorite WHERE book_id = '$book_id'";
							$resultFavor = mysqli_query($conn, $sqlCountFavorite);
							$rowFavor = mysqli_fetch_assoc($resultFavor);
						 ?>
						<form action="" method="post">
							<?php 
								if($login){
									$favor_status = $rowFavor2["favorite_status"];
									if($favor_status == 1){
										echo '<button class="btn btn-sm btn-outline-danger mr-2" name="removeFavorite"><i class="fas fa-heart"></i>'.$rowFavor["total_favor"].' </button>	';
									} else{
										echo '<button class="btn btn-sm btn-outline-danger mr-2" name="addFavorite"><i class="far fa-heart"></i>'.$rowFavor["total_favor"].'</button>	';
									}	
								} else{
									echo '<button class="btn btn-sm btn-outline-danger mr-3" "><a href="login.php" class="mr-1"><i class="far fa-heart"></i></a>'.$rowFavor["total_favor"].'</button>';
								}
							 ?>
						</form>
						<a href="book.php" class=""><i class="fas fa-sign-out-alt"></i></a>
					</div>
					<hr class="light">
					<div class="review-box" id="error">
						<?php if(isset($_GET['cmtError'])){ ?>
							<p id="error" class="error"><?php echo $_GET['cmtError']; ?></p>
						<?php } ?>
						<?php 
						    if(isset($_POST["addReview"])){
						    	$book_id = $_GET["book_id"];
						        $reviewer_name = $_SESSION["username"];
						        $review_content = $_POST["review_content"];
						        $client_id = $_SESSION["client_id"];
						        $rate = $_POST["star"];

						        if($review_content == ""){
						    		$book_id = $_GET["book_id"];
          							header("location: book.php?module=book-detail&book_id=$book_id&cmtError=Please fill out your comment!#error");
						        } else{
							        $sqlInsert = "INSERT INTO tbl_book_review(book_id, reviewer_name, review_content, client_id, favorite)";
							        $sqlInsert .= " VALUES('$book_id', '$reviewer_name', '$review_content', '$client_id', '$rate')";
							        mysqli_query($conn,$sqlInsert) or die("error add cat");	
							        header("location: book.php?module=book-detail&book_id=$book_id#client-review");
						        }
						    }
						    if($login){
						    	echo '
						    	<form action="" method="post">
									<h4>Add a review</h4>
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
									<button class="btn btn-md btn-success"><a href="login.php" style="text-decoration: none;">Please login to comment</a>
									</button>
								</div>
								';
						    }
						 ?>
					</div>
			</div>
		</div>
	</div>
	<hr class="light">
	<div class="container">
		<ul class="nav nav-tabs">
		  	<li class="active"><a data-toggle="tab" href="#client-review"><button class="btn btn-sm btn-space btn-success">Book review</button></a></li>
		  	<?php 
		  		if($login){
		  			echo '<li><a data-toggle="tab" href="#your-review"><button class="btn btn-sm btn-outline-success">Your review</button></a></li>';
		  		} else{
		  			echo '<li><a href="login.php"><button class="btn btn-sm btn-outline-success">Please login to see your reviews status!</button></a></li>';
		  		}
		  	 ?>
		  	
		</ul>
		<div class="tab-content">
			<div id="client-review" class="tab-pane active">
				<div class="client-review col-12 col-xs-12 col-sm-12 col-md-10 col-lg-8">
					<?php if(isset($_GET['replyError'])){ ?>
						<p class="error" style="direction: ltr"><?php echo $_GET['replyError']; ?></p>
					<?php } ?>
					<?php 
						$book_id = $_GET["book_id"];
						$sqlCount = "SELECT COUNT(*) AS total_cmt FROM tbl_book_review WHERE status = 1 AND book_id = '$book_id'";
						$resultCount = mysqli_query($conn, $sqlCount);
						$rowCount = mysqli_fetch_assoc($resultCount);

						if($rowCount["total_cmt"] > 1){
							echo '<div class="comment-count" style="direction: ltr">'.$rowCount["total_cmt"].' Commments <i class="far fa-comments"></i></div>';
						} else{
							echo '<div class="comment-count" style="direction: ltr">'.$rowCount["total_cmt"].' Commment <i class="far fa-comments"></i></div>';
						}
					 ?>
					<?php 
						if(isset($_POST["replyReview"])){
							$book_id = $_GET["book_id"];
							$review_id = $_GET["review_id"];
							$client_id = $_SESSION["client_id"];
							$reply_content = $_POST["reply_content"];
							if($reply_content == ""){header("location: book.php?module=book-detail&book_id=$book_id&review_id=$review_id&replyError=Please fill out your reply!#client-review");
							} else{
								$sqlInsert = "INSERT INTO tbl_book_review_reply(review_id, client_id, reply_content)";
								$sqlInsert .= " VALUES('$review_id', '$client_id', '$reply_content')";
								mysqli_query($conn,$sqlInsert) or die("error add reply");
								header("location: book.php?module=book-detail&book_id=$book_id#client-review");
							}
						}
						if(isset($_GET["book_id"])){
							$book_id = $_GET["book_id"];
							$sqlSelectReview = "SELECT * FROM tbl_book_review WHERE status = 1 AND book_id = '$book_id' ORDER BY createdate DESC" ;
							$result = mysqli_query($conn, $sqlSelectReview);
						}
						$i=0;
						while($row = mysqli_fetch_assoc($result)){
							$i++;
			 		?>
					<?php
						$review_id = $row["review_id"];
						if($login){
							$client_id = $_SESSION["client_id"];
							$sqlSelectLike = "SELECT * FROM tbl_book_review_like WHERE review_id = '$review_id' AND client_id = '$client_id'";
							$resultLike2 = mysqli_query($conn, $sqlSelectLike);
							$rowLike2 = mysqli_fetch_assoc($resultLike2);

							if(isset($_POST["addLike-$i"])){
								if($rowLike2["client_id"] == $client_id){
									$sqlAddLike = "UPDATE tbl_book_review_like SET like_status = 1 WHERE review_id = '$review_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlAddLike);
									header("Location: book.php?module=book-detail&book_id=$book_id#comments-$i");
								} else{
									$like_status = 1;
									$sqlAddLike = "INSERT INTO tbl_book_review_like(review_id, client_id, like_status)";
									$sqlAddLike .= "VALUE('$review_id', '$client_id', '$like_status') ";
									mysqli_query($conn, $sqlAddLike);
									header("Location: book.php?module=book-detail&book_id=$book_id#comments-$i");
								}
							}
							if(isset($_POST["removeLike-$i"])){
								$sqlRemoveLike = "UPDATE tbl_book_review_like SET like_status = 0 WHERE review_id = '$review_id' AND client_id = '$client_id'";
								mysqli_query($conn, $sqlRemoveLike);
								header("Location: book.php?module=book-detail&book_id=$book_id#comments-$i");
							}	
						}

						$sqlCountLike = "SELECT SUM(like_status) AS total_like FROM tbl_book_review_like WHERE review_id = '$review_id'";
						$resultLike = mysqli_query($conn, $sqlCountLike);
						$rowLike = mysqli_fetch_assoc($resultLike);
					 ?>
			 		<div class="comments col-12" id="comments-<?php echo $i ?>">
						<div class="commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<img src="<?php echo $row["img"] ?>" alt="" class="">
						</div>
						<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
							<div class="commenter-content">
								<div class="d-flex">
									<p><?php echo $row["reviewer_name"] ?> . <i class="fa fa-clock-o"></i> <?php echo $row["createdate"] ?></p>
									<?php 
										if($login){
											$client_id = $_SESSION["client_id"];
											$review_id = $row["review_id"];
											$sql = "SELECT * FROM tbl_book_review WHERE review_id = '$review_id'";
											$resultSelect = mysqli_query($conn, $sql);
											$rowSelect = mysqli_fetch_assoc($resultSelect);
											if($client_id == $rowSelect["client_id"]){
												echo '<button class="btn btn-sm btn-outline-success dropdown dropdown-toggle ml-2 pt-0 pb-0" style="height:25px" data-toggle="dropdown"></button>
												';
											}	
										} 
									 ?>	
									<ul class="dropdown-menu" style="padding: 4px 15px; width: 50px">
										<li><a href="post.php?module=remove-action&book_id=<?php echo $rowSelect["book_id"] ?>&review_id=<?php echo $rowSelect["review_id"] ?>" onclick="return confirm('Are your sure to remove this review!'" style="color:green">Remove</a></li>
									</ul>
								</div>					
								<div class="col-12 d-flex">
									<div>
										<div class="stars">
											<?php echo $row["favorite"] ?> 
											<input class="star" type="radio" name="star" checked/>
											<label class="star ml-1"></label>
										</div>	
										<div class="d-flex"><h6><?php echo $row["review_content"] ?></h6></div>
										<div class="col-12 d-flex">
											<div class="col-6"></div>
											<?php 
												$total_like = $rowLike["total_like"];
												if($total_like > 0){
													echo '<div class="col-6" align="right">
															<span class="like">'.$rowLike["total_like"].'<i class="ml-1 far fa-hand-peace"></i></span>
														</div>';
												} else{
													echo '';
												}
											?>
										</div>
									</div>
								</div>
							</div>	
							<div class="sub-commenter d-flex">
								<form action="" method="post">
									<?php 
										if($login){
											$like_status = $rowLike2["like_status"];
											if($like_status == 0){
												echo '<small class="mr-2"><button class="like-btn" type="submit" name="addLike-'.$i.'">Like</button></small>';
											} else{
												echo '<small class="mr-2"><button class="like-btn" type="submit" name="removeLike-'.$i.'">Unlike</button></small>';
											}			
										} else{
											echo '<small class="mr-2"><a href="login.php">Like</a></small>';
										}
									 ?>	
								</form>		
								<?php 
									if($login){
										echo '
											<small style="margin-top:5px"><button data-toggle="collapse" data-target="#reply-form-'.$i.'" style="background:none; border:none;"><a href="book.php?module=book-detail&book_id='.$row["book_id"].'&review_id='.$row["review_id"].'#client-review">Reply</a></button></small>
										';
									} else{
										echo '
											<small style="margin-top:5px"><a href="login.php">Reply</a></small>
										';
									}
								 ?>
							</div>
						</div>
					</div>	
					<?php 
						$review_id = $row["review_id"];
						$selectCountRep = "SELECT COUNT(*) AS total_rep FROM tbl_book_review_reply WHERE review_id = '$review_id'";
						$resultCount2 = mysqli_query($conn, $selectCountRep);
						$rowCount2 = mysqli_fetch_assoc($resultCount2);

						$total_rep = $rowCount2["total_rep"];
						if($total_rep > 1){
							echo '<div class="display-review text-center mt-2" data-toggle="collapse" data-target="#reply-review-'.$i.'">
									<h6>See more '.$rowCount2["total_rep"].' replies</h6>
								</div>';
						} elseif($total_rep == 1){
							echo '<div class="display-review text-center mt-2" data-toggle="collapse" data-target="#reply-review-'.$i.'">
									<h6>See more '.$rowCount2["total_rep"].' reply</h6>
								</div>';
						} else{
							echo '';
						}
					 ?>	
					<div class="collapse" id="reply-review-<?php echo $i ?>">
						<?php 
							$review_id = $row["review_id"];
							$sqlSelectRep = "SELECT * FROM tbl_book_review_reply INNER JOIN tbl_client ON tbl_book_review_reply.client_id = tbl_client.client_id WHERE review_id = '$review_id'";
							$resultRep = mysqli_query($conn, $sqlSelectRep);
								while($rowRep = mysqli_fetch_assoc($resultRep)){
						 ?>
				 		<div class="reply-comments col-12">
							<div class="reply-commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
								<img src="<?php echo $rowRep["client_img"] ?>" alt="" class="">
							</div>
							<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
								<div class="reply-commenter-content">
									<p><?php echo $rowRep["username"] ?> . <i class="fa fa-clock-o"></i> <?php echo $rowRep["createdate"] ?></p>
									<h6><?php echo $rowRep["reply_content"] ?></h6>
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
					<?php } ?>
				</div>
			</div>
			<div id="your-review" class="tab-pane fade">
				<div class="client-review col-12 col-xs-12 col-sm-12 col-md-10 col-lg-8">
					<?php 
						if(isset($_GET["book_id"])){
							$client_id = $_SESSION["client_id"];
							$book_id = $_GET["book_id"];
							$sqlSelectUrReview = "SELECT * FROM tbl_book_review WHERE  book_id = '$book_id' AND client_id = '$client_id' ORDER BY createdate DESC ";
							$result1 = mysqli_query($conn, $sqlSelectUrReview);
						}
						$i=0;
						while($row1 = mysqli_fetch_assoc($result1)){
							$i++;
			 		?>
					<?php 
						$review_id = $row1["review_id"];
						$sqlCountLike = "SELECT SUM(like_status) AS total_like FROM tbl_book_review_like WHERE review_id = '$review_id'";
						$resultLike = mysqli_query($conn, $sqlCountLike);
						$rowLike = mysqli_fetch_assoc($resultLike);
					  ?>
			 		<div class="comments col-12">
						<div class="commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<img src="<?php echo $row1["img"] ?>" alt="" class="">
						</div>
						<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
							<div class="commenter-content">
								<p><?php echo $row1["reviewer_name"] ?> . <i class="fa fa-clock-o"></i> <?php echo $row1["createdate"] ?></p>
								<div>
									<div class="stars">
										<?php echo $row1["favorite"] ?> 
										<input class="star" type="radio" name="star" checked/>
										<label class="star ml-1"></label>
									</div>	
									<div><h6><?php echo $row1["review_content"] ?></h6></div>
									<div class="col-12 d-flex">
										<div class="col-6"></div>
										<?php 
											$total_like = $rowLike["total_like"];
											if($total_like > 0){
												echo '<div class="col-6" align="right">
														<span class="like">'.$rowLike["total_like"].'<i class="ml-1 far fa-hand-peace"></i></span>
													</div>';
											} else{
												echo '';
											}
										?>
									</div>
								</div>
							</div>
					 		<?php 
					 			$status = $row1["status"];
					 			if($status == 0){
					 				echo '<p style="color:#ff7066">Review are waiting for confirm *</p>';
					 			} else{
					 				echo '';
					 			}
					 		 ?>	
						</div>
					</div>
					<?php 
						$review_id = $row1["review_id"];
						$sqlSelectRep = "SELECT * FROM tbl_book_review_reply INNER JOIN tbl_client ON tbl_book_review_reply.client_id = tbl_client.client_id WHERE review_id = '$review_id'";
						$resultRep = mysqli_query($conn, $sqlSelectRep);
							while($rowRep = mysqli_fetch_assoc($resultRep)){
					 ?>
			 		<div class="reply-comments col-12">
						<div class="reply-commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<img src="<?php echo $rowRep["client_img"] ?>" alt="" class="">
						</div>
						<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
							<div class="reply-commenter-content">
								<p><?php echo $rowRep["username"] ?> . <i class="fa fa-clock-o"></i> <?php echo $rowRep["createdate"] ?></p>
								<h6><?php echo $rowRep["reply_content"] ?></h6>
							</div>	
						</div>
					</div>
					<?php } ?>
					<?php 
						$review_id = $row["review_id"];
						$sqlSelectRep = "SELECT * FROM tbl_book_review_reply INNER JOIN tbl_client ON tbl_book_review_reply.client_id = tbl_client.client_id WHERE review_id = '$review_id'";
						$resultRep = mysqli_query($conn, $sqlSelectRep);
							while($rowRep = mysqli_fetch_assoc($resultRep)){
					 ?>
			 		<div class="reply-comments col-12">
						<div class="reply-commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
							<img src="<?php echo $rowRep["client_img"] ?>" alt="" class="">
						</div>
						<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
							<div class="reply-commenter-content">
								<p><?php echo $rowRep["username"] ?> . <i class="fa fa-clock-o"></i> <?php echo $rowRep["createdate"] ?></p>
								<h6><?php echo $rowRep["reply_content"] ?></h6>
							</div>	
						</div>
					</div>
					<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<hr class="light pb-5">
	<div class="other-book-section pt-4">
		<?php 
			if(isset($_GET["book_id"])){
				$sqlSelectBook = "SELECT * FROM tbl_book WHERE book_id = ".$_GET["book_id"];
				$result = mysqli_query($conn,$sqlSelectBook) or die("Lỗi chi tiết sản phẩm");
				$row = mysqli_fetch_row($result);
			}
		 ?>
		<h3>Other book</h3>
		<div class="col-12 d-flex pt-4">
			<?php 
				$OtherBook = "SELECT * FROM tbl_book WHERE book_cat_id = $row[1] ORDER BY RAND() limit 3";
				$resultOtherBook = mysqli_query($conn,$OtherBook);
				while ($rowOtherBook = mysqli_fetch_assoc($resultOtherBook)) {
			?>
			<div class="col-4 pb-0">
				<a href="book.php?module=book-detail&book_id=<?php echo $rowOtherBook["book_id"] ?>">
					<img src="<?php echo $rowOtherBook["book_img"] ?>" href="" alt="" width="100%" height="90%">	
				</a>
			</div>
			<?php } ?>
		</div>	
	</div>
</div>
