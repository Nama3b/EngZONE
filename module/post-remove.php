<?php 
	if(isset($_GET["id"])){
		$sql = "DELETE * FROM tbl_blog WHERE post_id =".$_GET["id"];
		$result = mysqli_query($conn, $sql);
		header("location: post.php?module=post-main");
	}
 ?>