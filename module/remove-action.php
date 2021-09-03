<?php 
	if(isset($_GET["review_id"])){
		$sql = "DELETE FROM tbl_book_review WHERE review_id =".$_GET["review_id"];
		$result = mysqli_query($conn, $sql);
		header("location: book.php?module=book-detail");
	}
	if(isset($_GET["post_id"])){
		$sql = "DELETE FROM tbl_blog WHERE post_id =".$_GET["id"];
		$result = mysqli_query($conn, $sql);
		header("location: post.php?module=post-main");
	}
	if(isset($_GET["cmt_id"])){
		$sql = "DELETE FROM tbl_post_comment WHERE cmt_id =".$_GET["cmt_id"];
		$result = mysqli_query($conn, $sql);
		$post_id = $_GET["post_id"];
		header("location: post.php?module=post-detail&post_id=$post_id");
	}
	if(isset($_GET["review_id"])){
		$sql = "DELETE FROM tbl_book_review WHERE review_id =".$_GET["review_id"];
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$book_id = $_GET["book_id"];
		header("location: book.php?module=book-detail&book_id=$book_id");
	}
	if(isset($_GET["review_id"])){
		$sql = "DELETE FROM tbl_review_web WHERE review_id =".$_GET["review_id"];
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		header("location: index.php#Client");
	}
 ?>