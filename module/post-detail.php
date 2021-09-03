<?php
	// Set your timezone
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// Get prev & next month
	if (isset($_GET['ym'])) {
	    $ym = $_GET['ym'];
	} else {
	    // This month
	    $ym = date('Y-m');
	}

	// Check format
	$timestamp = strtotime($ym . '-01');
	if ($timestamp === false) {
	    $ym = date('Y-m');
	    $timestamp = strtotime($ym . '-01');
	}

	// Today
	$today = date('Y-m-j', time());

	// For H3 title
	$html_title = date('Y / m', $timestamp);

	// Create prev & next month link     mktime(hour,minute,second,month,day,year)
	$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
	$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

	// Number of days in the month
	$day_count = date('t', $timestamp);
	 
	// 0:Sun 1:Mon 2:Tue ...
	$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
	//$str = date('w', $timestamp);

	// Create Calendar!!
	$weeks = array();
	$week = '';

	// Add empty cell
	$week .= str_repeat('<td></td>', $str);
	for ( $day = 1; $day <= $day_count; $day++, $str++) {
	    $date = $ym . '-' . $day;
	    if ($today == $date) {
	        $week .= '<td class="today">' . $day;
	    } else {
	        $week .= '<td>' . $day;
	    }
	    $week .= '</td>';
	    // End of the week OR End of the month
	    if ($str % 7 == 6 || $day == $day_count) {
	        if ($day == $day_count) {
	            // Add empty cell
	            $week .= str_repeat('<td></td>', 6 - ($str % 7));
	        }
	        $weeks[] = '<tr>' . $week . '</tr>';

	        // Prepare for new week
	        $week = '';
	    }

	}
?>
<div class="container pt-5 padding">
	<div class="row padding">
		<div class="col-12">
			<?php 
				if(isset($_GET["id"])){
					$sqlSelectPost = "SELECT * FROM tbl_blog WHERE post_id =" .$_GET["id"];
					$result = mysqli_query($conn, $sqlSelectPost);
				}
				$i=0;
				while($row = mysqli_fetch_assoc($result)){
					$i++;
 			?>
			<div class="head-blog-post pt-4">
				<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 body-left">
					<h1 class="text-center"><u><?php echo $row["title"] ?></u></h1>
					<div class="author-in4">
						<img src="./upload/default-user.png"lf alt="" class="d-block h-auto w-auto mx-auto" width="80px">
						<p>
							<?php echo $row["author"] ?><br><i class="material-icons">date_range</i> <?php echo $row["createdate"] ?> 
						</p>
					</div>
					<hr class="light" style="margin-top: 145px">
					<p class="blog-post-content">
						<?php echo $row["post_content"] ?>
					----------------------------------------------------------------------------------
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo et accusantium, iure voluptates sapiente suscipit, non. Odio animi distinctio earum nesciunt quia vero facere id adipisci! Voluptas atque sunt molestiae natus autem totam officiis temporibus, distinctio esse minima sint vero saepe magnam vel repellat culpa cum. Magni voluptas tempora esse aut neque suscipit sunt vero, illum facilis cumque tempore at repudiandae distinctio iusto modi soluta cum itaque repellendus libero hic quod id quae. Dignissimos vero mollitia officiis distinctio soluta numquam natus velit possimus voluptates ullam, eligendi laudantium nihil atque in ipsum deserunt neque, minima qui fugit autem accusantium et fuga! Quis assumenda modi, officia natus magnam? Dolore, tempore, facilis asperiores ab doloribus deleniti! Voluptatum nulla a quia ipsa laboriosam neceslaudantium id quod asperiores ipsam. Repellendus quae facilis nulla, officia rem aliquam amet laudantium et quia magni perspiciatis accusantium reiciendis modi non sit quos tempora id omnis ipsam sunt doloribus. Numquam, dicta quam corporis pariatur quas accusamus adipisci mollitia ipsum consectetur officia soluta rerum nesciunt, nobis repellat distinctio commodi ullam aliquam sequi. Voluptatum atque, porro, dolorum sunt officia provident fugiat laborum esse ea impedit libero ad! Repellat debitis, necessitatibus facilis aperiam mollitia totam ab fugit veroque iure veritatis hic nisi exercitationem illum. Tenetur officia, delectus impedit pariatur corporis minima consequatur ipsam repellat perspiciatis cum, quis adipisci iure, dolorem? Magni placeat provident necessitatibus non omnis, unde nemo saepe ipsum hic eos porro soluta voluptates consectetur sed voluptas, error mollitia cupiditate quam tempora commodi voluptatem a optio, ducimus. Vero voluptatibus atque, officia veritatis dignissimos sit ipsam, dolores minima quisquam ad temporibus ullam sapiente nam quos optio deleniti molestiae perspiciatis beatae blanditiis numquam! Veritatis, voluptates nemo possimus excepturi eius obcaecati, facilis provident nam. Facere itaque fugit consequuntur harum voluptate eum vel distinctio exercitationem amet unde omnis magni vitae ab delectus culpa sequi, quos perspiciatis quasi alias. Excepturi cumque repudiandae distinctio, atque adipisci iste a quasi exercitationem cum minima commodi voluptate eligendi, animi repellat consectetur et aliquam necessitatibus! Inventore laudantium dolor nostrum ut quibusdam sint ducimus voluptatem quisquam non perferendis ipsam nam dicta dolorem aperiam assumenda ipsum omnis labore, fugit totam autem. Reprehenderit nobis voluptates, voluptate illum dolores asperiores, iusto a magnam neque pariatur quaerat sequi, unde?</p>
					<h4 id="author"><?php echo $row["author"] ?>.</h4>
					<?php 
						$sql = "SELECT * FROM tbl_tag INNER JOIN tbl_blog ON tbl_tag.tag_id = tbl_blog.tag_id";
						$result2 = mysqli_query($conn, $sql);
						$row2 = mysqli_fetch_assoc($result2);
					 ?>
					<div class="tag-content d-flex">
						<a href="" class="mr-2"><?php echo $row2["tag_name"] ?></a>
						<div class="share-save"><a href=""><i class="fa fa-share-alt"></i></a></div>
							<?php 
								if($login){
									$post_id = $row["post_id"];
									$client_id = $_SESSION["client_id"];

									$sqlSelectSave = "SELECT * FROM tbl_post_save WHERE client_id = '$client_id' AND post_id = '$post_id'";
									$resultSelectSave = mysqli_query($conn, $sqlSelectSave);
									$rowSelectSave = mysqli_fetch_assoc($resultSelectSave);
									if(isset($_POST["savePost"])){
										if($client_id == $rowSelectSave["client_id"]){
											$sqlSavePost = "UPDATE tbl_post_save SET save_status = 1 WHERE client_id = '$client_id' AND post_id = '$post_id'";
											mysqli_query($conn, $sqlSavePost);
											header("location: post.php?module=post-detail&id=$post_id#author");
										} else{
											$save_status = 1;
											$sqlSavePost = "INSERT INTO tbl_post_save(post_id, client_id, save_status)";
											$sqlSavePost .= "VALUES('$post_id', '$client_id', '$save_status')";
											mysqli_query($conn, $sqlSavePost);
											header("location: post.php?module=post-detail&id=$post_id#author");
										}	
									}
									if(isset($_POST["removeSavePost"])){
										$sqlSavePost = "UPDATE tbl_post_save SET save_status = 0 WHERE client_id = '$client_id' AND post_id = '$post_id'";
										mysqli_query($conn, $sqlSavePost);
										header("location: post.php?module=post-detail&id=$post_id#author");
									} 
								}
							 ?>
							<form action="" method="post">
								<?php 
									$post_id = $row["post_id"];
									$sql2 = "SELECT * FROM tbl_post_save WHERE post_id = '$post_id'";
									$resultSave = mysqli_query($conn, $sql2);
									$rowSave = mysqli_fetch_assoc($resultSave);
									$savePost = $rowSave["save_status"];

									if($savePost == 0){
										echo '<button class="btn btn-sm btn-outline-success ml-2" name="savePost" type="submit"><i class="fas fa-save"></i></button>';
									} else{
										echo '<button class="btn btn-sm btn-outline-success ml-2" name="removeSavePost" type="submit"><i class="fas fa-save">v</i></button>';
									}
								 ?>
							 </form>
						<?php
							$post_id = $row["post_id"];
							if($login){
								$client_id = $_SESSION["client_id"];
								$sqlSelectFavor = "SELECT * FROM tbl_post_favorite WHERE post_id = '$post_id' AND client_id = '$client_id'";
								$resultFavor2 = mysqli_query($conn, $sqlSelectFavor);
								$rowFavor2 = mysqli_fetch_assoc($resultFavor2);

								if(isset($_POST["addFavorite-$i"])){
									if($rowFavor2["client_id"] == $client_id){
										$sqlAddFovorite = "UPDATE tbl_post_favorite SET favorite_status = 1 WHERE post_id = '$post_id' AND client_id = '$client_id'";
										mysqli_query($conn, $sqlAddFovorite);
										header("location: post.php?module=post-detail&id=$post_id#author");
									} else{
										$favorite_status = 1;
										$sqlAddFovorite = "INSERT INTO tbl_post_favorite(post_id, client_id, favorite_status)";
										$sqlAddFovorite .= "VALUE('$post_id', '$client_id', '$favorite_status') ";
										mysqli_query($conn, $sqlAddFovorite);
										header("location: post.php?module=post-detail&id=$post_id#author");
									}
								}
								if(isset($_POST["removeFavorite-$i"])){
									$sqlRemoveFavorite = "UPDATE tbl_post_favorite SET favorite_status = 0 WHERE post_id = '$post_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlRemoveFavorite);
									header("location: post.php?module=post-detail&id=$post_id#author");
								}	
							}

							$sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_post_favorite WHERE post_id = '$post_id'";
							$resultFavor = mysqli_query($conn, $sqlCountFavorite);
							$rowFavor = mysqli_fetch_assoc($resultFavor);
						 ?>
						<form action="" method="post">
							<?php 
								if($login){
									$favor_status = $rowFavor2["favorite_status"];
									if($favor_status == 1){
										echo '<button class="btn btn-sm btn-outline-danger ml-3" name="removeFavorite-'.$i.'"><i class="fas fa-heart mr-1"></i>'.$rowFavor["total_favor"].' </button>	';
									} else{
										echo '<button class="btn btn-sm btn-outline-danger ml-3" name="addFavorite-'.$i.'"><i class="far fa-heart mr-1"></i>'.$rowFavor["total_favor"].'</button>';
									}	
								} else{
									echo '<button class="btn btn-sm btn-outline-danger ml-3" "><i class="far fa-heart mr-1"></i>'.$rowFavor["total_favor"].'</button>';
								}
							 ?>
						</form>
					</div>
					<?php } ?>
					<hr class="light">
					<?php if(isset($_GET['replyError'])){ ?>
						<p class="error" style="direction: ltr"><?php echo $_GET['replyError']; ?></p>
					<?php } ?>
					<?php 
						if(isset($_POST["addCmt"])){
							$post_id = $_GET["id"];
							$cmter_name = $_SESSION["username"];
							$cmt_content = $_POST["cmt_content"];
							$client_id = $_SESSION["client_id"];

						    $sqlAddCmt = "INSERT INTO tbl_post_comment(post_id, cmter_name, cmt_content, client_id)";
						    $sqlAddCmt .= " VALUES('$post_id', '$cmter_name', '$cmt_content', '$client_id')";
							mysqli_query($conn, $sqlAddCmt) or die("error add cmt");
						} 

					 	if($login){
					 		echo '
								<form action="" method="post" class="form-cmt" id="form-cmt">
									<div class="comment-form">
										<i class="fa fa-comment-o"></i>
					                    <textarea class="form-control" id="cmt_content" name="cmt_content" rows="3" col="50" placeholder="Lets share your opinions"></textarea>
					                    <br>
										<span class="emoji-box-toggle"></span>
										<button class="btn btn-outline-success" name="addCmt" type="submit"><i class="fa fa-chevron-right"></i></button>
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
					<?php
						$sqlNumComments = "SELECT COUNT(cmt_id) AS total_cmt FROM tbl_post_comment WHERE post_id =".$_GET["id"];
						$numComments = mysqli_query($conn, $sqlNumComments);
						$rowNum = mysqli_fetch_assoc($numComments);

						if($rowNum["total_cmt"]>1){
							echo '<div class="comment-count" id="numComments">
								'.$rowNum["total_cmt"].' Commments <i class="far fa-comments"></i>
							</div>';
						} else{
							echo '<div class="comment-count" id="numComments">
								'.$rowNum["total_cmt"].' Commment <i class="far fa-comments"></i>
							</div>';
						}
					?> 
					
					<div class="comment-section col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" id="comment-section">
						<?php  
							if(isset($_POST["replyCmt"])){
								$post_id = $_GET["id"];
								$cmt_id = $_GET["cmt_id"];
								$client_id = $_SESSION["client_id"];
								$reply_content = $_POST["reply_content"];
								if($reply_content == ""){
									header("location: post.php?module=post-detail&id=$post_id&cmt_id=$cmt_id&replyError=Please fill out your reply!#form-cmt");
								} else{
									$sqlInsert = "INSERT INTO tbl_post_comment_reply(cmt_id, client_id, reply_content)";
									$sqlInsert .= " VALUES('$cmt_id', '$client_id', '$reply_content')";
									mysqli_query($conn,$sqlInsert) or die("error add reply");
									header("location: post.php?module=post-detail&id=$post_id#form-cmt");
								}
							}

							$post_id = $_GET["id"];
							$query = "SELECT * FROM tbl_post_comment WHERE post_id = '$post_id' ORDER BY cmt_id DESC ";
							$result = mysqli_query($conn, $query);
							$i=0;
							while($row = mysqli_fetch_assoc($result)){
								$i++;
						?>
						<?php
							$cmt_id = $row["cmt_id"];
							if($login){
								$client_id = $_SESSION["client_id"];
								$sqlSelectLike = "SELECT * FROM tbl_post_comment_like WHERE cmt_id = '$cmt_id' AND client_id = '$client_id'";
								$resultLike2 = mysqli_query($conn, $sqlSelectLike);
								$rowLike2 = mysqli_fetch_assoc($resultLike2);

								if(isset($_POST["addLike-$i"])){
									if($rowLike2["client_id"] == $client_id){
										$sqlAddLike = "UPDATE tbl_post_comment_like SET like_status = 1 WHERE cmt_id = '$cmt_id' AND client_id = '$client_id'";
										mysqli_query($conn, $sqlAddLike);
										header("Location: post.php?module=post-detail&id=$post_id#comments-$i");
									} else{
										$like_status = 1;
										$sqlAddLike = "INSERT INTO tbl_post_comment_like(cmt_id, client_id, like_status)";
										$sqlAddLike .= "VALUE('$cmt_id', '$client_id', '$like_status') ";
										mysqli_query($conn, $sqlAddLike);
										header("Location: post.php?module=post-detail&id=$post_id#comments-$i");
									}
								}
								if(isset($_POST["removeLike-$i"])){
									$sqlRemoveLike = "UPDATE tbl_post_comment_like SET like_status = 0 WHERE cmt_id = '$cmt_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlRemoveLike);
									header("Location: post.php?module=post-detail&id=$post_id#comments-$i");
								}	
							}

							$sqlCountLike = "SELECT SUM(like_status) AS total_like FROM tbl_post_comment_like WHERE cmt_id = '$cmt_id'";
							$resultLike = mysqli_query($conn, $sqlCountLike);
							$rowLike = mysqli_fetch_assoc($resultLike);
						 ?>
						<div class="comments col-12" id="comments-<?php echo $i ?>">
							<div class="commenter-in4 col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
								<img src="<?php echo $row["image"] ?>" alt="" class="">
							</div>
							<div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
								<div class="commenter-content">
									<div class="d-flex">
									<p><?php echo $row["cmter_name"] ?> . <i class="fa fa-clock-o"></i> <?php echo $row["createdate"] ?></p>
										<?php 
											if($login){
												$cmt_id = $row["cmt_id"];
												$sql2 = "SELECT * FROM tbl_post_comment WHERE cmt_id = '$cmt_id'";
												$resultSelect = mysqli_query($conn, $sql2);
												$rowSelect = mysqli_fetch_assoc($resultSelect);

												if($rowSelect["client_id"] == $_SESSION["client_id"]){
													echo '<button class="btn btn-sm btn-outline-success dropdown dropdown-toggle ml-2 pt-0 pb-0" style="height:25px" data-toggle="dropdown"></button>
													';
												}	
											} 
										 ?>	
										 <ul class="dropdown-menu" style="padding: 4px 15px; width: 50px">
											<li><a href="post.php?module=remove-action&post_id=<?php echo $rowSelect["post_id"] ?>&cmt_id=<?php echo $rowSelect["cmt_id"] ?>">Remove</a></li>
										</ul>
									</div>
										<h6><?php echo $row["cmt_content"] ?></h6>
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
								<div class="sub-commenter d-flex ">
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
												<small style="padding-top:5px"><button data-toggle="collapse" data-target="#reply-form-'.$i.'" style="background:none; border:none;"><a href="post.php?module=post-detail&id='.$row["post_id"].'&cmt_id='.$row["cmt_id"].'#form-cmt">Reply</a></button></small>
											';
										} else{
											echo '
												<small style="padding-top:5px"><a href="login.php">Reply</a></small>
											';
										}
									 ?>
								</div>
							</div>
						</div>	
						<?php 
							$cmt_id = $row["cmt_id"];
							$selectCountRep = "SELECT COUNT(*) AS total_rep FROM tbl_post_comment_reply WHERE cmt_id = '$cmt_id'";
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
								$cmt_id = $row["cmt_id"];
								$sqlSelectRep = "SELECT * FROM tbl_post_comment_reply INNER JOIN tbl_client ON tbl_post_comment_reply.client_id = tbl_client.client_id WHERE cmt_id = '$cmt_id'";
								$resultRep = mysqli_query($conn, $sqlSelectRep);
									while($rowRep = mysqli_fetch_assoc($resultRep)){
							 ?>
							<div class="reply-comments col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
								<img src="<?php echo $row["image"] ?>" alt="">
								<input type="text" name="reply_content">
								<button class="btn btn-outline-success" type="submit" name="replyCmt">Submit</button>
							</form>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="body-right col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
					<img src="./images/Sherlock_Holmes.gif" alt="" width="100%" >
					<div class="search-btn pt-5">
						<i class='fas fa-search'></i>
						<input type="text" id="searchstring" name="search" placeholder="Search.." >
						<hr>
					</div>
					<div class="category-blog text-center">
						<h4 class="cat-title">Newest</h4>
						<ul>
							<?php 
								$sqlSelectReview = "SELECT * FROM tbl_blog WHERE status = 1 ORDER BY post_id DESC LIMIT 5";
								$result = mysqli_query($conn, $sqlSelectReview);
								while($row = mysqli_fetch_assoc($result)){
					 		?>
							<a href="post.php?module=post-detail&id=<?php echo $row["post_id"] ?>"><li class="cat-item">- <?php echo $row["title"] ?> (2k9)</li></a> 
							<?php } ?>
						</ul>
					</div>
					<div class="popular text-center">
						<h4 class="cat-title">Popular</h4>
						<?php 

							$sqlSelectReview = "SELECT * FROM tbl_blog WHERE status = 1 ORDER BY post_id ASC LIMIT 3";
							$result = mysqli_query($conn, $sqlSelectReview);
							while($row = mysqli_fetch_assoc($result)){
				 		?>
						<div class="popular-item">
							<?php
								$sqlNumComments = "SELECT COUNT(cmt_id) AS total_cmt FROM tbl_post_comment WHERE post_id =".$row["post_id"];
								$numComments = mysqli_query($conn, $sqlNumComments);
								$rowNum = mysqli_fetch_assoc($numComments);

								$sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_post_favorite WHERE post_id =".$row["post_id"];
								$resultFavor = mysqli_query($conn, $sqlCountFavorite);
								$rowFavor = mysqli_fetch_assoc($resultFavor);
							?> 
							<h5><a href="post.php?module=post-detail&id=<?php echo $row["post_id"] ?>"><?php echo $row["title"] ?></a></h5>
							<p><i class="material-icons person">person</i> <?php echo $row["author"] ?> <i class="far fa-comment-dots ml-2"></i> <?php echo $rowNum["total_cmt"] ?> <i class="fas fa-heart ml-2"></i>
								<?php 
									$total_favor = $rowFavor["total_favor"];
									if($total_favor == 0){
										echo '0';
									} else{
										echo ''.$rowFavor["total_favor"].'';
									}
								 ?>
							 </p></p>
						</div>
						<hr class="light">
						<?php } ?>
					</div>
					<div class="Calendar text-center">
						<h4 class="cat-title">Calendar</h4>
						<table id="wp-calendar-86889979" class="calendar">	
							<thead>
								<tr>
									<th class="weekday" scope="col" title="Monday">Mon</th>
									<th class="weekday" scope="col" title="Tuesday">Tue</th>
									<th class="weekday" scope="col" title="Wednesday">Wed</th>
									<th class="weekday" scope="col" title="Thursday">Thu</th>
									<th class="weekday" scope="col" title="Friday">Fri</th>
									<th class="weekday" scope="col" title="Saturday">Sat</th>
									<th class="weekday" scope="col" title="Sunday">Sun</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($weeks as $week) {
										echo $week;
									}
								 ?>
								<tr>
									<td class="month_prev"><a href="?ym=<?php echo $prev; ?>">&lt;</a></td>
									<td class="month_prev" colspan="2"><?php echo $html_title ?></td>
									<td class="month_next"><a href="?ym=<?php echo $next; ?>">&gt;</a></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tags text-center">
						<h4 class="cat-title">Tags</h4>
						<div class="tag-content">
							<?php 
								$selectTag = "SELECT * FROM tbl_tag ORDER BY tag_id DESC LIMIT 11";
								$resultTag = mysqli_query($conn, $selectTag);
								while($rowTag = mysqli_fetch_assoc($resultTag)){
							 ?>
							<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1"><?php echo $rowTag["tag_name"] ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function getAllComments(start, max){
		if(start>max){
			return;
		}
		$.ajax({
			url: 'book.php',
			method: 'post',
			dataType: 'text',
			data: {
				getAllComments: 1,
				start: start
			}, success: function(response){
				$(".userComments").append(response);
				getAllComments((start+20), max);
			}	
		});
	}
</script>