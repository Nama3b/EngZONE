<div class="row">
	<div class="lesson-body text-center">
		<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="lesson-item">
				<div class="left-item">
					<a href="admin.php?module=course-lesson-primary"><i class="fas fa-home"></i></a>
				</div>
				<div class="right-item">
					<div class="data-item"></div>
					<div class="name-item">
						<h3><a href="admin.php?module=course-lesson-primary">Primary</a></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="lesson-item">
				<div class="left-item">
					<a href="admin.php?module=course-lesson-secondary"><i class="	fas fa-school"></i></a>
				</div>
				<div class="right-item">
					<div class="data-item"></div>
					<div class="name-item">
						<h3><a href="admin.php?module=course-lesson-secondary">Secondary</a></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="lesson-item">
				<div class="left-item">
					<a href="admin.php?module=course-lesson-highschool"><i class="fas fa-hospital-alt"></i></a>
				</div>
				<div class="right-item">
					<div class="data-item"></div>
					<div class="name-item">
						<h3><a href="admin.php?module=course-lesson-highschool">Highschool</a></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="lesson-item">
				<div class="left-item">
					<a href="admin.php?module=course-lesson-university"><i class="	fas fa-graduation-cap"></i></a>
				</div>
				<div class="right-item">
					<div class="data-item"></div>
					<div class="name-item">
						<h3><a href="admin.php?module=course-lesson-university">University</a></h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	    <div class="card table-responsive m-b-30">
	    	<div class="lesson-header">
		    	<h3 class="card-header">All list lesson</h3>
		        <a href="admin.php?module=course-lesson-add"><button class="btn btn-md btn-success btn-space">Add lesson</button></a>	
	    	</div>
	        <div class="card-body" style="margin-top: 25px">
	            <table id="lesson_data" class="table table-bordered table-hover">
	                <thead>
	                    <tr class="table-header">
	                        <th scope="col">#</th>
	                        <th scope="col">Lesson</th>
	                        <th scope="col">Content</th>
	                        <th scope="col">Grade</th>
	                        <th scope="col">Test</th>
	                        <th scope="col">Teacher</th>
	                        <th scope="col">Status</th>
	                        <th scope="col">Edit</th>
	                    </tr>                
	                </thead>
	                <tbody>
	                    <?php 
	                      $sqlselectLesson = "SELECT * FROM tbl_lesson ";
	                      $result = mysqli_query($conn,$sqlselectLesson) or die("Lỗi truy vấn sản phẩm");
	                      $i = 0;
	                      while ($row = mysqli_fetch_assoc($result)) {
	                          $i++;
	                     ?>
	                        <tr class="table-body">
	                            <th scope="row"><?php echo $i; ?></th>
	                            <td><div class="content"><?php echo $row["lesson_name"] ?></div></td>
	                            <td><div class="content"><?php echo $row["lesson_content"] ?></div></td>
	                            <td><?php echo $row["grade_id"] ?></td>
	                            <?php 
	                            	$test_id = $row["test_id"];
	                            	$sqlSelectTest = "SELECT * FROM tbl_test WHERE test_id = '$test_id'";
	                            	$resultTest = mysqli_query($conn, $sqlSelectTest);
	                            	$rowTest = mysqli_fetch_assoc($resultTest);
	                             ?>
	                            <td><?php echo $rowTest["test_name"] ?></td>
	                            <td><?php echo $row["teacher"] ?></td>
	                            <td><?php echo ($row["status"])?"Display":"Block" ?></td>
	                            <td>
	                                <a href="admin.php?module=course-lesson-edit&lesson_id=<?php echo $row["lesson_id"] ?>"><i class="fas fa-edit"></i></a>
	                                <a href="admin.php?module=remove-action&lesson_id=<?php echo $row["lesson_id"] ?>" onclick="return confirm('Do you sure to remove this lesson?');"><i class="fas fa-trash-alt"></i></a>
	                            </td>
	                        </tr>
	                <?php } ?>
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>