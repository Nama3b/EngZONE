<?php 	
	$lesson_id = $_GET["lesson_id"];
	$sqlSelectLess = "SELECT * FROM tbl_lesson WHERE lesson_id = '$lesson_id'";
	$resultLess = mysqli_query($conn, $sqlSelectLess);
	$rowLess = mysqli_fetch_assoc($resultLess);

	$test_id = $_GET["test_id"];
	$sqlSelectTest = "SELECT * FROM tbl_test WHERE test_id = '$test_id'";
	$resultTest = mysqli_query($conn, $sqlSelectTest);
	$rowTest = mysqli_fetch_assoc($resultTest);

	$client_id = $_SESSION["client_id"];
	$sqlSelectUser = "SELECT * FROM tbl_client WHERE client_id = '$client_id'";
	$resultUser = mysqli_query($conn, $sqlSelectUser);
	$rowUser = mysqli_fetch_assoc($resultUser);

	if(isset($_GET["test_id"])){
		$sqlSelect = "SELECT * FROM tbl_question WHERE test_id =".$_GET["test_id"];
		$resultSelect = mysqli_query($conn, $sqlSelect);
		$rowSelect = mysqli_fetch_assoc($resultSelect);

		$student_answer = $rowSelect["correct_answer"];
		$sqlCal = "UPDATE tbl_check_test SET check_status = 1 WHERE student_answer = '$student_answer'";	
	}
	
 ?>
<div class="container mt-5">
	<div class="row test-finish">
		<h3><?php echo $rowLess["lesson_name"] ?></h3>
		<hr>
		<h5 class="mb-3"><u>Test:</u> <?php echo $rowTest["test_name"] ?></h5>
		<div class="col-12 d-flex">
			<div class="col-6 test-info">
				<h6><i class="fas fa-user-circle mr-2"></i>- <?php echo $rowUser["fullname"] ?></h6>
				<h6><i class="fas fa-school mr-2"></i>- <?php echo $rowUser["school"] ?></h6> 
				<h6><i class="fas fa-clock mr-2"></i>- <?php echo $rowTest["time_limit"] ?> minutes</h6>
			</div>
			<div class="col-6 test-btn" align="right">
				<?php 
					$sqlCountScore = "SELECT SUM(check_status) AS score FROM tbl_check_test WHERE test_id = '$test_id' AND client_id = '$client_id'";
					$resultCount = mysqli_query($conn, $sqlCountScore);
					$rowCount = mysqli_fetch_assoc($resultCount);
				 ?>
				Test score: <?php echo $rowCount["score"] ?>.
			</div>	
		</div>
		<hr>
		<div class="testing-section">
			<?php
				$test_id = $_GET["test_id"];
				$sqlSelectQues = "SELECT * FROM tbl_question INNER JOIN tbl_check_test ON tbl_question.question_id = tbl_check_test.question_id WHERE tbl_question.test_id = '$test_id'";
				$resultQues = mysqli_query($conn, $sqlSelectQues);
				$i = 0;
				while($rowQues = mysqli_fetch_assoc($resultQues)){
					$i++;
			  ?>
			<div class="question">
				<div class="header-question">
					<h5><?php echo $i; ?>. <?php echo $rowQues["question_content"] ?></h5>
				</div>
				<div class="body-question d-flex">
					<div>Your answer: <?php echo $rowQues["student_answer"] ?></div><br>
					<div>Correct answer: <?php echo $rowQues["correct_answer"] ?></div>
				</div>	
			</div>
			<?php } ?>
		</div>	
	</div>
</div>
