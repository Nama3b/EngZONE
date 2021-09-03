<?php 
	if (isset($_GET["client_id"])) {
		$activeUser = "UPDATE tbl_client SET status = 1 WHERE client_id=".$_GET["client_id"];
		$result = mysqli_query($conn,$activeUser);
		header("location:admin.php?module=client-user");
	}
	if (isset($_GET["book_id"])) {
		$activeBook = "UPDATE tbl_book SET status_book = 1 WHERE book_id=".$_GET["book_id"];
		$result = mysqli_query($conn,$activeBook);
		header("location:admin.php?module=book-list-product");
	}
	if (isset($_GET["test_id"])) {
		$activeTest = "UPDATE tbl_test SET status = 1 WHERE test_id=".$_GET["test_id"];
		$result = mysqli_query($conn,$activeTest);
		header("location:admin.php?module=course-test-list");
	}
	if (isset($_GET["post_id"])) {
		$blockPost = "UPDATE tbl_blog SET status = 1 WHERE post_id =".$_GET["post_id"];
		$result = mysqli_query($conn,$blockPost);
		header("location:admin.php?module=post-all");
	}
	if (isset($_GET["post_cmt_id"])) {
		$activePostCmt = "UPDATE tbl_post_comment SET status_cmt = 1 WHERE cmt_id =".$_GET["post_cmt_id"];
		$result = mysqli_query($conn,$activePostCmt);
		header("location:admin.php?module=post-all-comment");
	}
	if(isset($_GET["review_web_id"])){
        $sqlUpdateReview = "UPDATE tbl_review_web SET status = 1 WHERE review_id =".$_GET["review_web_id"];
        $result = mysqli_query($conn,$sqlUpdateReview) or die("Lỗi dang danh gia");
        header("location:admin.php?module=review-web");
    } 
	if(isset($_GET["book_review_id"])){
        $sqlUpdateReview = "UPDATE tbl_book_review SET status = 1 WHERE review_id = ".$_GET["book_review_id"];
        $result = mysqli_query($conn,$sqlUpdateReview) or die("Lỗi dang danh gia");
        header("location:admin.php?module=book-review");
    }
	if (isset($_GET["reply_id"])) {
		$activeRep = "UPDATE tbl_post_comment_reply SET status_reply = 1 WHERE reply_id=".$_GET["reply_id"];
		$result = mysqli_query($conn,$activeRep);
		header("location:admin.php?module=post-all-comment");
	}
	if (isset($_GET["web_reply_id"])) {
		$activeRep = "UPDATE tbl_review_web_reply SET status_reply = 1 WHERE reply_id=".$_GET["web_reply_id"];
		$result = mysqli_query($conn,$activeRep);
		header("location:admin.php?module=review-web");
	}
	if (isset($_GET["book_reply_id"])) {
		$activeRep = "UPDATE tbl_book_review_reply SET status_reply = 1 WHERE reply_id=".$_GET["book_reply_id"];
		$result = mysqli_query($conn,$activeRep);
		header("location:admin.php?module=book-review");
	}
 ?>