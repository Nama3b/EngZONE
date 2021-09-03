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

 ?>
<div class="container mt-5">
	<div class="row test-body">
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
				<button type="submit" class="btn btn-sm btn-outline-success" name="startTest">Start</button>
			</div>	
		</div>
		<hr>
			
		<div class="testing-section">
			<?php
				$test_id = $_GET["test_id"];
				$sqlSelectQues = "SELECT * FROM tbl_question WHERE test_id = '$test_id'";
				$resultQues = mysqli_query($conn, $sqlSelectQues);
				$i = 0;
				while($rowQues = mysqli_fetch_assoc($resultQues)){
					$i++;
			  ?>
			  <?php 	
				if(isset($_POST["finishTest"])){
					$client_id = $_GET["client_id"];
					$test_id = $_GET["test_id"];
					$question_id = $rowQues["question_id"];
					$student_answer = $_POST["student_answer"];
					$sqlCal = "INSERT INTO tbl_check_test(client_id, test_id, question_id, student_answer)";
					$sqlCal .= "VALUES('$client_id', '$test_id', '$question_id', '$student_answer')";
					$result = mysqli_query($conn, $sqlCal);
					header("location: course.php?module=course-test-finish&test_id=$test_id&lesson_id=$lesson_id");
				}
				 ?>
			<form action="" method="post">
				<div class="question">
					<div class="header-question">
						<h5><?php echo $i; ?>. <?php echo $rowQues["question_content"] ?></h5>
					</div>
					<div class="body-question d-flex">
						<input type="radio" id="<?php echo $rowQues["answer_a"] ?>" name="student_answer" value="1">
						<label for="<?php echo $rowQues["answer_a"] ?>">A. <?php echo $rowQues["answer_a"] ?></label><br>
						<input type="radio" id="<?php echo $rowQues["answer_b"] ?>" name="student_answer" value="2">
						<label for="<?php echo $rowQues["answer_b"] ?>">B. <?php echo $rowQues["answer_b"] ?></label><br>
						<input type="radio" id="<?php echo $rowQues["answer_c"] ?>" name="student_answer" value="3">
						<label for="<?php echo $rowQues["answer_c"] ?>">C. <?php echo $rowQues["answer_c"] ?></label>
						<input type="radio" id="<?php echo $rowQues["answer_d"] ?>" name="student_answer" value="4">
						<label for="<?php echo $rowQues["answer_d"] ?>">D. <?php echo $rowQues["answer_d"] ?></label>
					</div>
				</div>	
				<button type="submit" class="btn btn-sm btn-outline-danger" name="finishTest" onclick="return confirm('Are you sure to finish the test?')">Finish</button>	
			</form>	
				<hr>
			<?php } ?>
		</div>	
	</div>
</div>