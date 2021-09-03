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
	<div class="container pt-5">
		<div class="row padding">
			<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
				<?php 
					if(isset($_GET["post_id"])){	
                 		$sqlSelectPost = "SELECT p.*,c.username FROM tbl_blog AS p";
                  		$sqlSelectPost .=" INNER JOIN tbl_client AS C ON p.client_id=c.client_id";
        				$post_content = $_GET["post_content"];
						$strCut = substr($post_content, 0,49);
						$post_content = substr($strCut, 0, strrpos($strCut, ' ')).'...';
					}
					$i=0;
					while($row = mysqli_fetch_assoc($result1)){
						$i++;
				?>
				<div class="blog-section">
					<img src="<?php echo $row["post_img"] ?>" alt="">
					<div class="blog-content">
						<div class="d-flex">
							<h3><?php echo $row["title"] ?></h3>
							<?php 
								$post_id = $row["post_id"];
								$sqlSetting = "SELECT * FROM tbl_blog WHERE post_id = '$post_id'";
								$resultSetting = mysqli_query($conn, $sqlSetting);
								$rowSetting = mysqli_fetch_assoc($resultSetting);

								if($postSetting == $rowSetting["client_id"]){
									echo '
									<div class="dropdown dropdown-toggle ml-3 mt-1" data-toggle="dropdown"><button class="btn btn-sm btn-outline-success pb-0"><i class="material-icons">settings</i></button></div>	
									<ul class="dropdown-menu" style="padding: 4px 15px; width: 50px">
										<li><a href="post.php?module=post-edit&id='.$rowSetting["post_id"].'">Edit</a></li>
										<li><a href="post.php?module=remove-action&post_id='.$rowSetting["post_id"].'">Remove</a></li>
									</ul>
									';
								} else{
									echo '';
								}
							 ?>
						</div>
						<div class="contact-in4">
							<?php
								$sqlNumComments = "SELECT COUNT(cmt_id) AS total_cmt FROM tbl_post_comment WHERE post_id =".$row["post_id"];
								$numComments = mysqli_query($conn, $sqlNumComments);
								$rowNum = mysqli_fetch_assoc($numComments);
							?> 
							<div class="d-flex"><i class="material-icons date-range">date_range</i> <?php echo $row["createdate"] ?> <i class="material-icons person ml-3 mr-1">person</i><?php echo $row["author"] ?> <i class="ml-3 far fa-comment-dots mr-1"></i> <?php echo $rowNum["total_cmt"] ?> 
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
												header("refresh:0");
											} else{
												$favorite_status = 1;
												$sqlAddFovorite = "INSERT INTO tbl_post_favorite(post_id, client_id, favorite_status)";
												$sqlAddFovorite .= "VALUE('$post_id', '$client_id', '$favorite_status') ";
												mysqli_query($conn, $sqlAddFovorite);
												header("refresh:0");
											}
										}
										if(isset($_POST["removeFavorite-$i"])){
											$sqlRemoveFavorite = "UPDATE tbl_post_favorite SET favorite_status = 0 WHERE post_id = '$post_id' AND client_id = '$client_id'";
											mysqli_query($conn, $sqlRemoveFavorite);
											header("refresh:0");
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
											echo '<button class="btn btn-sm btn-outline-danger ml-3" "><a href="login.php"><i class="far fa-heart mr-1"></i>'.$rowFavor["total_favor"].'</a></button>';
										}
									 ?>
								</form>							
								<?php 
									if($login){
										$post_id = $row["post_id"];
										$client_id = $_SESSION["client_id"];

										$sqlSelectSave = "SELECT * FROM tbl_post_save WHERE client_id = '$client_id' AND post_id = '$post_id'";
										$resultSelectSave = mysqli_query($conn, $sqlSelectSave);
										$rowSelectSave = mysqli_fetch_assoc($resultSelectSave);

										if(isset($_POST["savePost-$i"])){
											if($client_id == $rowSelectSave["client_id"]){
												$sqlSavePost = "UPDATE tbl_post_save SET save_status = 1 WHERE client_id = '$client_id' AND post_id = '$post_id'";
												mysqli_query($conn, $sqlSavePost);
												header("refresh:0");
											} else{
												$save_status = 1;
												$sqlSavePost = "INSERT INTO tbl_post_save(post_id, client_id, save_status)";
												$sqlSavePost .= "VALUES('$post_id', '$client_id', '$save_status')";
												mysqli_query($conn, $sqlSavePost);
												header("refresh:0");
											}	
										}
										if(isset($_POST["removeSavePost-$i"])){
											$sqlSavePost = "UPDATE tbl_post_save SET save_status = 0 WHERE client_id = '$client_id' AND post_id = '$post_id'";
											mysqli_query($conn, $sqlSavePost);
											header("refresh:0");
										} 
									}
								 ?>
								<form action="" method="post">
									<?php 
										if($login){
											$post_id = $row["post_id"];
											$client_id = $_SESSION["client_id"];

											$sqlSelectSave = "SELECT * FROM tbl_post_save WHERE client_id = '$client_id' AND post_id = '$post_id'";
											$resultSelectSave = mysqli_query($conn, $sqlSelectSave);
											$rowSelectSave = mysqli_fetch_assoc($resultSelectSave);
											$savePost = $rowSelectSave["save_status"];

											if($savePost == 0){
												echo '<button class="btn btn-sm btn-outline-success ml-2" name="savePost-'.$i.'" type="submit"><i class="fas fa-save"></i></button>';
											} else{
												echo '<button class="btn btn-sm btn-outline-success ml-2" name="removeSavePost-'.$i.'" type="submit"><i class="fas fa-save">v</i></button>';
											}	
										} else{
											echo '';
										}
										
									 ?>
								 </form>
							</div>
							<div class="blog-content" >
								<?php echo $row["post_content"] ?>
							</div>
							<a href="post.php?module=post-detail&id=<?php echo $row["post_id"] ?>">Read more</a>
						</div>
					</div>
				</div>
				<hr class="light">
				<?php 
					}
				?>
				<div class="related-product-area text-center">
					<div class="container text-center">
						<?php 
							if (ceil($total_pages / $num_results_on_page) > 0): ?>
								<ul class="pagination">
									<?php if ($page > 1): ?>
									<li class="prev page-item"><a href="post.php?page=<?php echo $page-1 ?>">Prev</a></li>
									<?php endif; ?>

									<?php if ($page > 3): ?>
									<li class="start"><a href="post.php?page=1">1</a></li>
									<li class="dots">...</li>
									<?php endif; ?>

									<?php if ($page-2 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
									<?php if ($page-1 > 0): ?><li class="page"><a href="post.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

									<li class="currentpage page-item active"><a href="post.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

									<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page page-item"><a href="post.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
									<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page page-item"><a href="post.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

									<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
									<li class="dots">...</li>
									<li class="end"><a href="post.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
									<?php endif; ?>

									<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
									<li class="next page-item"><a href="post.php?page=<?php echo $page+1 ?>">Next</a></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="body-right col-4 col-sm-4 col-md-4 col-lg-4">
					<div class="search-btn">
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
		
		
