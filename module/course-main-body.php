<?php
	// Set your timezone
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	// Get prev & next month
	if (isset($_GET['ym'])) {
	    $ym = $_GET['ym'];
	} else {
	    // This month
	    $ym = date('Y-m');
	}

	// Check format
	$timestamp = strtotime($ym . '-01');
	if ($timestamp === false) {
	    $ym = date('Y-m');
	    $timestamp = strtotime($ym . '-01');
	}

	// Today
	$today = date('Y-m-j', time());

	// For H3 title
	$html_title = date('Y / m', $timestamp);

	// Create prev & next month link     mktime(hour,minute,second,month,day,year)
	$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
	$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

	// Number of days in the month
	$day_count = date('t', $timestamp);
	 
	// 0:Sun 1:Mon 2:Tue ...
	$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
	//$str = date('w', $timestamp);

	// Create Calendar!!
	$weeks = array();
	$week = '';

	// Add empty cell
	$week .= str_repeat('<td></td>', $str);
	for ( $day = 1; $day <= $day_count; $day++, $str++) {
	    $date = $ym . '-' . $day;
	    if ($today == $date) {
	        $week .= '<td class="today">' . $day;
	    } else {
	        $week .= '<td>' . $day;
	    }
	    $week .= '</td>';
	    // End of the week OR End of the month
	    if ($str % 7 == 6 || $day == $day_count) {
	        if ($day == $day_count) {
	            // Add empty cell
	            $week .= str_repeat('<td></td>', 6 - ($str % 7));
	        }
	        $weeks[] = '<tr>' . $week . '</tr>';

	        // Prepare for new week
	        $week = '';
	    }

	}
?>
<div class="container pt-4 course-main-body">
	<div class="row">
		<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xs-8">
			<div class="card-body">
				<div class="card-header col-12">
					<div class="header-left col-6"><u>Primary school</u></div>
					<div class="header-btn col-6">
						<button type="submit" class="btn btn-sm btn-outline-success"><a href="course.php?module=course-detail-primary">Join</a></button>
					</div>
				</div>
				<div class="card-body">
					<div class="body-content">
						<h2>Namaeb the creater</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quam, voluptas vitae doloribus, adipisci, magni sed earum hic amet iure blanditiis iste error reiciendis, provident aliquid fugiat velit magnam voluptates.</p>
					</div>
					<hr>
					<div class="body-creater">
						<img src="images/default-user.png" alt="">
						<h6>Namaeb.</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="card-header col-12">
					<div class="header-left col-6"><u>Secondary School</u></div>
					<div class="header-btn col-6">
						<button type="submit" class="btn btn-sm btn-outline-success"><a href="course.php?module=course-detail-secondary">Join</a></button>
					</div>
				</div>
				<div class="card-body">
					<div class="body-content">
						<h2>Namaeb the creater</h2>
						<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus voluptatem, suscipit, possimus eum, odio harum ratione molestiae id quae reprehenderit vitae expedita ex, modi labore. Eos adipisci nihil assumenda?</p>
					</div>
					<hr>
					<div class="body-creater">
						<img src="images/default-user.png" alt="">
						<h6>Namaeb.</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="card-header col-12">
					<div class="header-left col-6"><u>High school</u></div>
					<div class="header-btn col-6">
						<button type="submit" class="btn btn-sm btn-outline-success"><a href="course.php?module=course-detail-highschool">Join</a></button>
					</div>
				</div>
				<div class="card-body">
					<div class="body-content">
						<h2>Namaeb the creater</h2>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam architecto accusamus, ab excepturi laboriosam aut impedit libero, cupiditate ratione nemo expedita provident, laborum dolore soluta reprehenderit consequatur officiis nostrum.</p>
					</div>
					<hr>
					<div class="body-creater">
						<img src="images/default-user.png" alt="">
						<h6>Namaeb.</h6>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="card-header col-12">
					<div class="header-left col-6"><u>University</u></div>
					<div class="header-btn col-6">
						<button type="submit" class="btn btn-sm btn-outline-success"><a href="course.php?module=course-detail-university">Join</a></button>
					</div>
				</div>
				<div class="card-body">
					<div class="body-content">
						<h2>Namaeb the creater</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, sed soluta! Molestias quam totam deserunt officia. Veniam soluta qui fugiat facilis! Obcaecati autem illum et optio tenetur dolor consectetur?</p>
					</div>
					<hr>
					<div class="body-creater">
						<img src="images/default-user.png" alt="">
						<h6>Namaeb.</h6>
					</div>
				</div>
			</div>	
		</div>
		<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
			<img src="images/learn-english-2960911.jpg" alt="" width="100%" height="13%">
			<div class="search-btn pt-5">
				<i class='fas fa-search'></i>
				<input type="text" id="searchstring" name="search" placeholder="Search.." >
				<hr>
			</div>
			<div class="category-course">
				<h4 class="course-title text-center">TOP GREATEST STUDENT</h4>
				<ul>
					<li>- Namaeb the creater</li>
					<li>- Namaeb the creater</li>
					<li>- Namaeb the creater</li>
					<li>- Namaeb the creater</li>
				</ul>
			</div>
			<div class="Calendar text-center">
				<h4 class="course-title">Calendar</h4>
				<table id="wp-calendar-86889979" class="calendar">	
					<thead>
						<tr>
							<th class="weekday" scope="col" title="Monday">Mon</th>
							<th class="weekday" scope="col" title="Tuesday">Tue</th>
							<th class="weekday" scope="col" title="Wednesday">Wed</th>
							<th class="weekday" scope="col" title="Thursday">Thu</th>
							<th class="weekday" scope="col" title="Friday">Fri</th>
							<th class="weekday" scope="col" title="Saturday">Sat</th>
							<th class="weekday" scope="col" title="Sunday">Sun</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($weeks as $week) {
								echo $week;
							}
						?>
						<tr>
							<td class="month_prev"><a href="?ym=<?php echo $prev; ?>">&lt;</a></td>
							<td class="month_prev" colspan="2"><?php echo $html_title ?></td>
							<td class="month_next"><a href="?ym=<?php echo $next; ?>">&gt;</a></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="tags text-center">
				<h4 class="course-title">Tags</h4>
				<div class="tag-content">
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Art</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Beauty</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Business</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Culture</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Design</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">English</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">LifeStyle</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Quote</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Social</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Scientist</a>
					<a href="" class="tag-cloud-link tag-link-16 tag-link-position-1">Travel</a>
				</div>
			</div>
		</div>
	</div>
</div>