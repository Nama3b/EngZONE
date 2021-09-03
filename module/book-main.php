<div class="container pt-5">
	<div class="row">
		<div class="col-12 flex-wrap d-flex">
			<?php 
				$i=0;
				while($row = mysqli_fetch_array($result1)){
					$i++;
			?>
			<div class="col-6 col-xs-6 col-sm-6 col-md-4 col-l-4 book-section" id="book-section-<?php echo $i ?>">
				<a href="book.php?module=book-detail&book_id=<?php echo $row["book_id"] ?>"><img src="<?php echo $row["book_img"] ?>" alt="" width="100%" height="100%"></a>
				<div class="book-in4 pt-2">
					<h6><a href="book.php?module=book-detail&book_id=<?php echo $row["book_id"] ?>"><?php echo $row["book_name"] ?></a></h6>
					<div class="d-flex mb-3" >
						<?php
							$book_id = $row["book_id"];
							if($login){
								$client_id = $_SESSION["client_id"];
								$sqlSelectFavor = "SELECT * FROM tbl_book_favorite WHERE book_id = '$book_id' AND client_id = '$client_id'";
								$resultFavor2 = mysqli_query($conn, $sqlSelectFavor);
								$rowFavor2 = mysqli_fetch_assoc($resultFavor2);

								if(isset($_POST["addFavorite-$i"])){
									if($rowFavor2["client_id"] == $client_id){
										$sqlAddFovorite = "UPDATE tbl_book_favorite SET favorite_status = 1 WHERE book_id = '$book_id' AND client_id = '$client_id'";
										mysqli_query($conn, $sqlAddFovorite);
										header("refresh:0");
									} else{
										$favorite_status = 1;
										$sqlAddFovorite = "INSERT INTO tbl_book_favorite(book_id, client_id, favorite_status)";
										$sqlAddFovorite .= "VALUE('$book_id', '$client_id', '$favorite_status') ";
										mysqli_query($conn, $sqlAddFovorite);
										header("refresh:0");
									}
								}
								if(isset($_POST["removeFavorite-$i"])){
									$sqlRemoveFavorite = "UPDATE tbl_book_favorite SET favorite_status = 0 WHERE book_id = '$book_id' AND client_id = '$client_id'";
									mysqli_query($conn, $sqlRemoveFavorite);
									header("refresh:0");
								}	
							}

							$sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_book_favorite WHERE book_id = '$book_id'";
							$resultFavor = mysqli_query($conn, $sqlCountFavorite);
							$rowFavor = mysqli_fetch_assoc($resultFavor);

							$sqlSelectReview = "SELECT AVG(favorite) AS avg_rate FROM tbl_book_review WHERE status = 1 AND book_id = '$book_id'" ;
							$result2 = mysqli_query($conn, $sqlSelectReview);
							$row2 = mysqli_fetch_assoc($result2);
						 ?>
						<form action="" method="post">
							<?php 
								if($login){
									$favor_status = $rowFavor2["favorite_status"];
									if($favor_status == 1){
										echo '<button class="btn btn-sm btn-outline-danger mr-2" name="removeFavorite-'.$i.'"><i class="fas fa-heart"></i>'.$rowFavor["total_favor"].' </button>	';
									} else{
										echo '<button class="btn btn-sm btn-outline-danger mr-2" name="addFavorite-'.$i.'"><i class="far fa-heart"></i>'.$rowFavor["total_favor"].'</button>';
									}	
								} else{
									echo '<button class="btn btn-sm btn-outline-danger mr-2" "><a href="login.php" class="mr-1"><i class="far fa-heart"></i></a>'.$rowFavor["total_favor"].'</button>';
								}
								
							 ?>
						</form>
						<button class="btn btn-sm btn-outline-light mr-2" data-toggle="modal" data-target="#bookDetail_<?php echo $i ?>"><i class="fas fa-search"></i></button>
						<button class="btn btn-sm btn-outline-success" onclick="addCart(<?php echo $row["book_id"] ?>)"><i class="fas fa-cart-plus"></i> Add cart</button>
						<div class="stars">
							<?php echo number_format($row2["avg_rate"], 1); ?>
							<input class="star" type="radio" name="star" checked/>
							<label class="star ml-1"></label>
						</div>	
					</div>
				</div>
			</div>
			<div class="modal fade" id="bookDetail_<?php echo $i ?>" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body text-center ">
							<a href="book.php?module=book-detail&book_id=<?php echo $row["book_id"] ?>"><img src="<?php echo $row["book_img"] ?>" alt="" width="88%" height="90%"></a>
						</div>
						<?php 
							$sqlTotalBuy = "SELECT SUM(quantity) AS total_buy FROM tbl_orderdetail WHERE book_id =".$row["book_id"];
							$resultTotal = mysqli_query($conn, $sqlTotalBuy);
							$rowTotal = mysqli_fetch_assoc($resultTotal);
						 ?>
						<div class="total-buy ml-5 d-flex">
							<div>
								<p><small>(<?php echo $rowTotal["total_buy"] ?> products has been purchased)</small></p>	
							</div>
							<div class="stars">
								<?php echo number_format($row2["avg_rate"], 1); ?>
								<input class="star" type="radio" name="star" checked/>
								<label class="star ml-1"></label>
							</div>	
						</div>
						<div class="col-12 d-flex">
							<div class="col-6"></div>
							<div class="price col-6" align="right">
								<h4><u><?php echo number_format($row[3],0,",","."); ?>$</u></h4>
								<small class="old-price"><?php echo number_format($row[4],0,",","."); ?>$</small>
							</div>	
						</div>
						
					</div>	
				</div>
			</div>
			<?php } ?>
		<hr class="light">
	</div>
</div>
		<div class="related-product-area text-center">
			<div class="container">
				</ul>
					<?php 
						if (ceil($total_pages / $num_results_on_page) > 0): ?>
							<ul class="pagination">
								<?php if ($page > 1): ?>
								<li class="prev page-item"><a href="book.php?page=<?php echo $page-1 ?>">Prev</a></li>
								<?php endif; ?>

								<?php if ($page > 3): ?>
								<li class="start"><a href="book.php?page=1">1</a></li>
								<li class="dots">...</li>
								<?php endif; ?>

								<?php if ($page-2 > 0): ?><li class="page"><a href="book.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
								<?php if ($page-1 > 0): ?><li class="page"><a href="book.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

								<li class="currentpage page-item active"><a href="book.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

								<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page page-item"><a href="book.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
								<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page page-item"><a href="book.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

								<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
								<li class="dots">...</li>
								<li class="end"><a href="book.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
								<?php endif; ?>

								<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
								<li class="next page-item"><a href="book.php?page=<?php echo $page+1 ?>">Next</a></li>
								<?php endif; ?>
							</ul>
					<?php endif; ?> 
			</div>
		</div>