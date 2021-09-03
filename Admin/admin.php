  <?php  
  ob_start();
  session_start();
  include("connection.php");
  if(!isset($_SESSION["loggedIn"])){
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html>

<head>
  	<meta charset="utf-8">
  	<link href="../images/35493994-36e2c50e-04d9-11e8-8b38-890caea01850.png" rel="icon" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
  <!-- Bootstrap CSS -->
<!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
  	<link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/navbar-fixed-left.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/docs.css">  
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    
  <!-- DATA_TABLE -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 

    <title>Admin</title>

</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-left" style="overflow-y: scroll; direction: rtl">
		<div class="container" style="direction: ltr">
			<div class="navbar-header4" align="center">
				<button type="button" class="navbar-toggle collapsed navbar-dark" data-toggle="collapse" data-target="#navbarResponsive" aria-expanded="false" aria-controls="navbar">	
          <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
      	</button>
				<a href="../index.php" class="navbar-branch ">		
					<img src="../images/204362082_1241767646277919_4473932285118109597_n.png" alt="" width="60px" align="center">
				</a>
			</div>
      		<div class="collapse navbar-collapse" id="navbarResponsive">
      			<ul class="nav navbar-nav ml-auto cat-list">
      				<li class="nav-item">
      					<a href="" class="dad-nav-link" data-toggle="collapse" data-target="#submenu-1" aria-expanded="false">
      						<i class="fas fa-book"></i> Book manage
      					</a>
      					<div id="submenu-1" class="submenu collapse">
      						<ul class="nav flex-column">
      							<li class="nav-item"><a href="admin.php?module=book-list-category" class="nav-link">List category book</a></li>
      							<li class="nav-item"><a href="admin.php?module=book-list-product" class="nav-link">List book</a></li>
      							<li class="nav-item"><a href="admin.php?module=book-review" class="nav-link">Book review</a></li>
                    <li class="nav-item"><a href="admin.php?module=book-review-waiting" class="nav-link">Book review waiting</a></li>
      						</ul>
      					</div>
      				</li>
      				<li class="nav-item">
      					<a href="" class="dad-nav-link" data-toggle="collapse" data-target="#submenu-2" aria-expanded="false">
      						<i class="fa fa-list-alt"></i> Orders
      					</a>
      					<div id="submenu-2" class="submenu collapse">
      						<ul class="nav flex-column">
      							<li class="nav-item"><a href="admin.php?module=order-list" class="nav-link">List order</a></li>
      							<li class="nav-item"><a href="admin.php?module=order-list-waiting" class="nav-link">List order waiting for approval</a></li>
                    <li class="nav-item"><a href="admin.php?module=order-list-done" class="nav-link">List done order</a></li>
      						</ul>
      					</div>
      				</li>
      				<li class="nav-item">
      					<a href="" class="dad-nav-link" data-toggle="collapse" data-target="#submenu-3" aria-expanded="false">
      						<i class="fab fa-blogger"></i> Post
      					</a>
      					<div id="submenu-3" class="submenu collapse">
      						<ul class="nav flex-column">
      							<li class="nav-item"><a href="admin.php?module=post-all" class="nav-link">All post</a></li>
      							<li class="nav-item"><a href="admin.php?module=post-waiting" class="nav-link">Post's waiting</a></li>
      							<li class="nav-item"><a href="admin.php?module=post-approved" class="nav-link">Post approved</a></li>
                    <li class="nav-item"><a href="admin.php?module=post-all-comment" class="nav-link">All post comment</a></li>
      						</ul>
      					</div>
      				</li>
      				<li class="nav-item">
      					<a href="" class="dad-nav-link" data-toggle="collapse" data-target="#submenu-4" aria-expanded="false">
      						<i class="fas fa-comment-dots"></i> Web review
      					</a>
      					<div id="submenu-4" class="submenu collapse">
      						<ul class="nav flex-column">
      							<li class="nav-item"><a href="admin.php?module=review-web" class="nav-link">Web review's list</a></li>
                    <li class="nav-item"><a href="admin.php?module=review-web-waiting" class="nav-link">Web review's waiting</a></li>
      						</ul>
      					</div>
      				</li>
      				<li class="nav-item">
      					<a href="" class="dad-nav-link" data-toggle="collapse" data-target="#submenu-5" aria-expanded="false">
      						<i class="fas fa-user-astronaut"></i> Admin user 
      					</a>
      					<div id="submenu-5" class="submenu collapse">
      						<ul class="nav flex-column">
      							<li class="nav-item"><a href="register.php" class="nav-link">Create admin user</a></li>
      							<li class="nav-item"><a href="admin.php?module=admin-profile-user&admin_id=<?php echo ucfirst($_SESSION["loggedIn"][0]) ?>" class="nav-link">Profile admin user</a></li>
      						</ul>
      					</div>
      				</li>
              <li class="nav-item">
                <a href="admin.php"><i class="material-icons">exit_to_app</i></a>
              </li>
      			</ul>
      		</div>
		</div>	
	</nav>
	<div class="container-fluid">
		<div class="col-md-12 navbar-search mr-3">
			<div class="col-md-9">
				<form action="" class="form-search">
					<div class="search-btn">
						<i class="fas fa-search" aria-hidden="true"></i>
						<input type="text" id="searchstring" name="search" placeholder="Search..">
					</div>
						<hr class="light">
				</form>		
			</div>
			<div class="col-md-3 admin-profile">
		          <div class="nav-item dropdown">
		            <a class="nav-link pr-0 dropdown-toggle" href="#" role="button" data-toggle="dropdown">
		              <div class="media align-items-center d-flex">
		                <span class="avatar avatar-sm rounded-circle">
		                  <img alt="" src="images/default-user.png" width="50px">
		                </span>
		                <div class="media-body ml-2 d-none d-lg-block">
		                    <h4><?php echo ucfirst($_SESSION["loggedIn"][1]) ?></h4>
		                </div>
		              </div>
		            </a>
		            <ul class="dropdown-menu">
                  <li class="li"><h6 class="text-overflow m-0">Hellou!</h6></li>
                  <li class="li">
                    <a href="admin.php?module=admin-profile-user&admin_id=<?php echo ucfirst($_SESSION["loggedIn"][0]) ?>" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My admin profile</span>
                    </a>
                  </li>
                  <li class="li">
                    <a href="" class="dropdown-item">
                      <i class="ni ni-calendar-grid-58"></i>
                      <span>Activities</span>
                    </a>  
                  </li>
                  <li class="li">
                    <a href="https://www.facebook.com/EZEnglishZoneKids" class="dropdown-item">
                      <i class="ni ni-support-16"></i>
                      <span>Help</span>
                    </a>  
                  </li>
                  <div class="dropdown-divider"></div>
                  <li class="li">
                    <a href="admin.php?module=logout" class="dropdown-item">
                      <i class="ni ni-user-run"></i>
                      <span>Log out</span>
                    </a>  
                  </li>
		            </ul>
		          </div>
		        </div>	
		  </div>
    </div>
    <div class="container-fluid">
	    <?php 
		if (isset($_GET["module"])) {
			$file = "module/".$_GET["module"].".php";
				include($file);
			} else{
				include("module/main-content.php");
			}
		?>
		<?php 
		if (isset($_GET["module"])) {
	 		$file="module/".$_GET["module"].".php";
	 	}
		?>	
    </div>

  <script>
    $(document).ready(function(){
        $('#book_data').DataTable();
        $('#bookRv_data').DataTable();
        $('#cat_data').DataTable();
        $('#order_data').DataTable();
        $('#post_data').DataTable();
        $('#comment_data').DataTable();
        $('#reviewWeb_data').DataTable();
        $('#client_data').DataTable();
        $('#admin_data').DataTable();
        $('#ques_data').DataTable();
        $('#test_data').DataTable();
        $('#lesson_data').DataTable();
    });
  </script>

  <!-- ICON -->
  <script defer src="../css/fontawesome/js/fontawesome.js"></script>
	<!-- JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- 	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!--   <script src="https://cdn.rawgit.com/mladenplavsic/bootstrap-navbar-sidebar/3bd282bd/docs/docs.js"></script> -->

</body>
</html>