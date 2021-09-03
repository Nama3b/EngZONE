<?php  
	if (isset($_GET["admin_id"])) {
		$delAdminUser = "DELETE FROM tbl_admin WHERE admin_id=".$_GET["admin_id"];
		$result = mysqli_query($conn,$delAdminUser);
		header("location:admin.php?module=admin-list-user");
	}
	if(isset($_GET["book_id"])){
        $sqlDelProduct = "DELETE FROM tbl_book WHERE book_id = " .$_GET["book_id"];
        $result = mysqli_query($conn,$sqlDelProduct) or die("Lỗi xóa san pham");
        header("location:admin.php?module=book-list-product");
    }
    if(isset($_GET["cat_id"])){
        $sqlDelCategory = "DELETE FROM tbl_book_category WHERE book_cat_id = ".$_GET["cat_id"];
        $result = mysqli_query($conn,$sqlDelCategory) or die("Lỗi xóa danh mục");
        header("location:admin.php?module=book-list-category");
    }
	if (isset($_GET["client_id"])) {
		$delUser = "DELETE FROM tbl_client WHERE client_id=".$_GET["client_id"];
		$result = mysqli_query($conn,$delUser);
		header("location:admin.php?module=client-user");
	}
	if(isset($_GET["lesson_id"])){
        $sqlDelLesson = "DELETE FROM tbl_lesson WHERE lesson_id = " .$_GET["lesson_id"];
        $result = mysqli_query($conn,$sqlDelLesson) or die("Lỗi xóa bai giang");
        header("location:admin.php?module=course-lesson");
    }
	if (isset($_GET["question_id"])) {
		$delQues = "DELETE FROM tbl_question WHERE question_id=".$_GET["question_id"];
		$result = mysqli_query($conn,$delQues);
		header("location:admin.php?module=course-question-list");
	}
	if (isset($_GET["test_id"])) {
		$delTest = "DELETE FROM tbl_test WHERE test_id=".$_GET["test_id"];
		$result = mysqli_query($conn,$delTest);
		header("location:admin.php?module=course-test-list");
	}
	if(isset($_GET["order_id"])){
        $sqlDelOrder = "DELETE FROM tbl_order WHERE order_id = ".$_GET["order_id"];
        $result = mysqli_query($conn,$sqlDelOrder) or die("Lỗi xóa don hang");
        header("location:admin.php?module=order-list");
    }
	if(isset($_GET["post_id"])){
        $sqlDelPost = "DELETE FROM tbl_blog WHERE post_id = ".$_GET["post_id"];
        $result = mysqli_query($conn,$sqlDelPost) or die("Lỗi xóa bai viet");
        header("location:admin.php?module=post-all");
    }
	if(isset($_GET["post_cmt_id"])){
        $sqlDelCmt = "DELETE FROM tbl_post_comment WHERE cmt_id = ".$_GET["post_cmt_id"];
        $result = mysqli_query($conn,$sqlDelCmt) or die("Lỗi xóa cmt");
        header("location:admin.php?module=post-all-comment");
    } 
	if(isset($_GET["review_book_id"])){
        $sqlDelReview = "DELETE FROM tbl_book_review WHERE review_id = ".$_GET["review_book_id"];
        $result = mysqli_query($conn,$sqlDelReview) or die("Lỗi xóa reivew");
        header("location:admin.php?module=book-review");
    }
	if(isset($_GET["review_web_id"])){
        $sqlDelReview = "DELETE FROM tbl_review_web WHERE review_id = ".$_GET["review_web_id"];
        $result = mysqli_query($conn,$sqlDelReview) or die("Lỗi xóa reivew");
        header("location:admin.php?module=review-web");
    }
    if(isset($_GET["reply_id"])){
        $sqlDelReview = "DELETE FROM tbl_post_comment_reply WHERE reply_id = ".$_GET["reply_id"];
        $result = mysqli_query($conn,$sqlDelReview) or die("Lỗi xóa reivew");
        header("location:admin.php?module=review-web");
    }
    if(isset($_GET["book_reply_id"])){
        $sqlDelReview = "DELETE FROM tbl_book_review_reply WHERE reply_id = ".$_GET["book_reply_id"];
        $result = mysqli_query($conn,$sqlDelReview) or die("Lỗi xóa reivew");
        header("location:admin.php?module=book-review");
    }
?>