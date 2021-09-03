<?php 
	if (isset($_GET["client_id"])) {
		$blockUser = "UPDATE tbl_client SET status = 0 WHERE client_id=".$_GET["client_id"];
		$result = mysqli_query($conn,$blockUser);
		header("location:admin.php?module=client-user");
	}
	if (isset($_GET["book_id"])) {
		$blockBook = "UPDATE tbl_book SET status_book = 0 WHERE book_id=".$_GET["book_id"];
		$result = mysqli_query($conn,$blockBook);
		header("location:admin.php?module=book-list-product");
	}
	if (isset($_GET["test_id"])) {
		$blockTest = "UPDATE tbl_test SET status = 0 WHERE test_id=".$_GET["test_id"];
		$result = mysqli_query($conn,$blockTest);
		header("location:admin.php?module=course-test-list");
	}
	if (isset($_GET["post_id"])) {
		$blockPost = "UPDATE tbl_blog SET status = 0 WHERE post_id =".$_GET["post_id"];
		$result = mysqli_query($conn,$blockPost);
		header("location:admin.php?module=post-all");
	}
	if (isset($_GET["post_cmt_id"])) {
		$blockPostCmt = "UPDATE tbl_post_comment SET status_cmt = 0 WHERE cmt_id =".$_GET["post_cmt_id"];
		$result = mysqli_query($conn,$blockPostCmt);
		header("location:admin.php?module=post-all-comment");
	}
	if(isset($_GET["review_web_id"])){
        $sqlUpdateReview = "UPDATE tbl_review_web SET status = 0 WHERE review_id =".$_GET["review_web_id"];
        $result = mysqli_query($conn,$sqlUpdateReview) or die("Lỗi dang danh gia");
        header("location:admin.php?module=review-web");
    } 
	if(isset($_GET["book_review_id"])){
        $sqlUpdateReview = "UPDATE tbl_book_review SET status = 0 WHERE review_id = ".$_GET["book_review_id"];
        $result = mysqli_query($conn,$sqlUpdateReview) or die("Lỗi dang danh gia");
        header("location:admin.php?module=book-review");
    }
	if (isset($_GET["reply_id"])) {	
		$blockRep = "UPDATE tbl_post_comment_reply SET status_reply = 0 WHERE reply_id=".$_GET["reply_id"];
		$result = mysqli_query($conn,$blockRep);
		header("location:admin.php?module=post-all-comment");
	}
	if (isset($_GET["web_reply_id"])) {
		$blockRep = "UPDATE tbl_review_web_reply SET status_reply = 0 WHERE reply_id=".$_GET["web_reply_id"];
		$result = mysqli_query($conn,$blockRep);
		header("location:admin.php?module=review-web");
	}
	if (isset($_GET["book_reply_id"])) {
		$blockRep = "UPDATE tbl_book_review_reply SET status_reply = 0 WHERE reply_id=".$_GET["book_reply_id"];
		$result = mysqli_query($conn,$blockRep);
		header("location:admin.php?module=book-review");
	}
 ?>