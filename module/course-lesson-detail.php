<?php 
	if(isset($_GET["lesson_id"])){
		$sqlSelectLess = "SELECT * FROM tbl_lesson WHERE lesson_id = ".$_GET["lesson_id"];
		$result = mysqli_query($conn,$sqlSelectLess) or die("Lỗi chi tiết bai giang");
		$row = mysqli_fetch_row($result);
	}
	$client_id = $_SESSION["client_id"];
	$sql = "SELECT * FROM tbl_client WHERE client_id = '$client_id'";
	$result1 = mysqli_query($conn, $sql);
	$row1 = mysqli_fetch_assoc($result1);
?>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="lesson-detail-body col-12">
			<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-5">
				<div class="d-flex">
					<h3><?php echo $row[3] ?></h3>
					<?php 
						if($login){
							$lesson_id = $_GET["lesson_id"];
							$client_id = $_SESSION["client_id"];

							$sqlSelectSave = "SELECT * FROM tbl_lesson_save WHERE client_id = '$client_id' AND lesson_id = '$lesson_id'";
							$resultSelectSave = mysqli_query($conn, $sqlSelectSave);
							$rowSelectSave = mysqli_fetch_assoc($resultSelectSave);
							if(isset($_POST["saveLess"])){
								if($client_id == $rowSelectSave["client_id"]){
									$sqlSavePost = "UPDATE tbl_lesson_save SET lesson_status = 1 WHERE client_id = '$client_id' AND lesson_id = '$lesson_id'";
									mysqli_query($conn, $sqlSavePost);
									header("refresh:0");
								} else{
									$lesson_status = 1;
									$sqlSavePost = "INSERT INTO tbl_lesson_save(lesson_id, client_id, lesson_status)";
									$sqlSavePost .= "VALUES('$lesson_id', '$client_id', '$lesson_status')";
									mysqli_query($conn, $sqlSavePost);
									header("refresh:0");
								}	
							}
							if(isset($_POST["removeSaveLess"])){
								$sqlSavePost = "UPDATE tbl_lesson_save SET lesson_status = 0 WHERE client_id = '$client_id' AND lesson_id = '$lesson_id'";
								mysqli_query($conn, $sqlSavePost);
								header("refresh:0");
							} 
						}
					 ?>
					<form action="" method="post">
						<?php 
							$lesson_id = $_GET["lesson_id"];
							$sql = "SELECT * FROM tbl_lesson_save WHERE lesson_id = '$lesson_id'";
							$resultSave = mysqli_query($conn, $sql);
							$rowSave = mysqli_fetch_assoc($resultSave);
							$saveLess = $rowSave["lesson_status"];

							if($saveLess == 0){
								echo '<button class="btn btn-sm btn-outline-success ml-2" name="saveLess" type="submit"><i class="far fa-bookmark"></i></button>';
							} else{
								echo '<button class="btn btn-sm btn-outline-success ml-2" name="removeSaveLess" type="submit"><i class="fas fa-bookmark"></i></button>';
							}
						 ?>
					 </form>	
				</div>
				<p><?php echo $row[4] ?></p>
				<button class="btn btn-sm btn-space btn-outline-success"><a href="course.php?module=course-lesson-test&lesson_id=<?php echo $row[0] ?>&test_id=<?php echo $row[1] ?>">Do a test</a></button>
				<a href="course.php?module=course-main-body" class="ml-2 "><i class="material-icons">exit_to_app</i></a>
			</div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-7 yt-vd">
				<iframe width="666" height="333" src="<?php echo $row[5] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>