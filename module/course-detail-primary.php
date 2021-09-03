<?php 
	$query = "SELECT * FROM tbl_grade WHERE grade_id <= 5 ORDER BY grade_id ASC ";
	$result = mysqli_query($conn, $query);
	$menu = '';
	$content = '';
	$i = 0;

	while($row = mysqli_fetch_array($result))
	{
	 if($i == 0)
	 {
	  $menu .= '
	   <li class="active"><a href="#'.$row["grade_id"].'" data-toggle="tab">'.$row["grade_detail"].'</a></li>
	  ';
	  $content .= '
	   <div id="'.$row["grade_id"].'" class="tab-pane fade in active">
	  ';
	 }
	 else
	 {
	  $menu .= '
	   <li><a href="#'.$row["grade_id"].'" data-toggle="tab">'.$row["grade_detail"].'</a></li>
	  ';
	  $content .= '
	   <div id="'.$row["grade_id"].'" class="tab-pane fade">
	  ';
	 }
	 $lesson_query = "SELECT * FROM tbl_lesson WHERE grade_id = '".$row["grade_id"]."'";
	 $lesson_result = mysqli_query($conn, $lesson_query);
	 while($rowLess = mysqli_fetch_array($lesson_result))
	 {
	  $content .= '
	  	<div class="lesson-list-items d-flex col-12">
			<div class="col-9 col-xs-9 col-sm-8 col-md-4 col-lg-3 col-xl-3 lesson-title">
				<h6>'.$rowLess["lesson_name"].'</h6>
			</div>
			<div class="col-md-6 col-lg-7 col-xl-7 lesson-content">
				<h6>'.$rowLess["lesson_content"].'</h6>
			</div>
			<div class="col-3 col-xs-3 col-sm-4 col-md-2 col-lg-2 col-xl-2">
				<button class="btn btn-sm btn-space btn-outline-success"><a href="course.php?module=course-lesson-detail&lesson_id='.$rowLess["lesson_id"].' ">Start</a></button>
			</div>
		</div>
		<hr class="light">
	  ';
	 }
	 $content .= '<div style="clear:both"></div></div>';
	 $i++;
	}
 ?>
<div class="container pt-5">
	<div class="row">
		<div class="lesson-header">
			<h1>Primary's school lesson</h1>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem perspiciatis doloremque ullam illum veniam quod temporibus eum? Dolore quis quas exercitationem voluptas possimus, repudiandae ex porro assumenda debitis eligendi.</p>
			<hr>
			<h6><i class="fa fa-facebook-square"></i> Follow and like <a href="https://www.facebook.com/EZEnglishZoneKids/" target="_blank">EngZone Facebook page</a> for update our information and support for you</h6>
			<h6><i class="fab fa-youtube"></i> Follow my youtube channel to learn more <a href="https://www.youtube.com/channel/UCp3l3o3UwhyWYKdqKLuA99Q" target="_blank">Here.</a></h6>
		</div>
	</div>
</div>
<div class="lesson-body mt-5">
	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<?php echo $menu; ?>
		</ul>
		<h5><u>All lesson:</u></h5>
		<ul class="tab-content">
			<?php echo $content; ?>
		</ul>
	</div>
</div>