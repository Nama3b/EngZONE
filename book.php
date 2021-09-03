<?php
  ob_start();
  session_start();
  include("connection.php");  
  header("Access-Control-Allow-Origin: *");

  $login = false;
  $username = false;
  if(isset($_SESSION['login'])){
  	$login = true;
  	$username = true;
  }

$mysqli = mysqli_connect('localhost', 'root', '', 'engzone');

$total_pages = $mysqli->query('SELECT * FROM tbl_book')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 6;


if ($stmt = $mysqli->prepare('SELECT * FROM tbl_book WHERE status_book = 1 ORDER BY book_id DESC LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result1 = $stmt->get_result() or die("error");

	if(isset($_GET["book_id"])){
		$sqlSelectPro = "SELECT * FROM tbl_book";
		$result = mysqli_query($conn,$sqlSelectPro) or die("Lỗi truy cập cơ sở dữ liệu");
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
  	<link href="images/204362082_1241767646277919_4473932285118109597_n.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/book.css">
	<link rel="stylesheet" href="css/fontawesome/css/all.css">
	<link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Library</title>
</head>
<body>
	<!-- navigation -->
	<nav class="navbar navbar-expand-md sticky-top animated fadeInDown">
		<div class="container-fluid">
			<a href="index.php" class="navbar-branch nav-link">
				<img src="images/53278904_2601150810111427_5858780672478412800_n.jpg" alt="" width="50px">
			</a>
			<button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#navbarResponsive" style="border:2px solid white;">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<a href="book.php" style="margin-right: 29px;"><li class="fas fa-book"></li></a>
					<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="course.php" class="nav-link">Course</a></li>
					<li class="nav-item"><a href="post.php" class="nav-link">Post</a></li>
					<li class="nav-item">
						<div class="cart dropdown">
							<?php
								$book_qty=0;
								$total=0;  
								if(isset($_SESSION["cart"])){
									$cart = $_SESSION["cart"];
									foreach ($cart as $value) {
										$book_qty += (int)$value["book_qty"];
										$total += (int)$value["book_qty"]*(int)$value["book_price"];	
									}
								}
							?>
							<a href="" class="dropdown-toggle" role="button" data-toggle="dropdown">
						    	<i class="fa fa-shopping-cart"></i>
						    	<span class="nb" id="book_qty"><?php echo $book_qty ?></span>
						    </a>
						    <div class="dropdown-menu" style="">
								<div id="shopping-cart">
									<div class="shopping-cart-list" >
										<?php 
											if(isset($_SESSION["cart"])){
												$cart = $_SESSION["cart"];
												foreach ($cart as $key => $value) {
										?>
										<div class="book_widget col-12">
											<div class="book_thumb col-3">
												<img src="<?php echo $value["book_img"] ?>" width="100%" alt="">
											</div>
											<div class="product-body col-8">
												<h6 class="book_price"><b>$ <?php echo number_format($value["book_price"],0,",","."); ?> </b><span class="book_qty">x<?php echo $value["book_qty"] ?></span></h6>
												<h6 class="book_name">
													<a href="book.php?module=detail-book&book_id=<?php echo $key; ?>"><b><?php echo $value["book_name"] ?></b></a>
												</h6>
											</div>
											<a href="" onclick="delCart(<?php echo $key ?>)"><i class="fas fa-trash-alt"></i></a>
										</div>
										<?php }	} ?>
										<hr class="light">
									</div>
									<div class="total_price">
										Total: <span class="text-right"><label id="total"><?php echo number_format($total,0,",","."); ?></label>$</span>
									</div>
									<hr>
									<div class="shopping-cart-btns">
										<a href="book.php?module=shoppingcart">
											<button type="submit" class="btn btn-md btn-outline-light">Your cart</button>
										</a>
										
										<a href="book.php?module=checkout">
											<button type="submit" class="btn btn-md btn-outline-danger">Checkout</button>
										</a>
									</div>
								</div>
							</div>
					    </div>
					</li>
				</ul>
			</div>
			<?php 
	 			if($username){
	 				$currentUser = $_SESSION["username"];	
					$selectClient = "SELECT * FROM tbl_client WHERE username ='$currentUser'";
					$result = mysqli_query($conn, $selectClient);
					$row = mysqli_fetch_assoc($result);
	 			}

				if($login){
					echo '
						<div class="admin-profile">
							<ul class=" navbar-nav align-items-center d-none d-md-flex">
					          <li class="nav-item dropdown">
					            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					              <div class="media align-items-center">
					                <span class="avatar avatar-sm rounded-circle">
					                  <img alt="" src="'.$row["client_img"].'" width="50px">
					                </span>
					                <div class="media-body ml-2 d-none d-lg-block">
					                    <p>'.$row["username"].'</p>
					                </div>
					              </div>
					            </a>
					            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
					              <div class=" dropdown-header noti-title">
					                <h6 class="text-overflow m-0">Hellou !</h6>
					              </div>
					              <a href="index.php?module=client-profile&client_id='.$row["client_id"].'" class="dropdown-item">
					                <i class="ni ni-single-02"></i>
					                <span>My profile</span>
					              </a>
					              <a href="book.php?module=shoppingcart" class="dropdown-item">
					                <i class="ni ni-calendar-grid-58"></i>
					                <span>My cart</span>
					              </a>
					              <a href="facebook.com" class="dropdown-item">
					                <i class="ni ni-support-16"></i>
					                <span>Help</span>
					              </a>
					              <div class="dropdown-divider"></div>
					              <a href="index.php?module=logout" class="dropdown-item">
					                <i class="ni ni-user-run"></i>
					                <span>Log out</span>
					              </a>
					            </div>
					          </li>
					        </ul>	
						</div>		
					';
				} else{
					echo '
						<div class="nav-item"><button class="btn btn-outline-light btn-md"><a href="login.php" style="text-decoration: none;">Try it for free!</a></button>
						</div>
					';
				}
			 ?>
		</div>
	</nav>
	<div class="main-book">
		<div class="book-header" style="background: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg') no-repeat !important;">
			<div class="container-fluid padding">
				<div class="row text-center padding">
					<div class="col-12">
						<h1 class="display-2">Book</h1>
						<h5>Home / Book</h5>
					</div>
				</div>
			</div>
		</div>
		<?php 
		if (isset($_GET["module"])) {
			$file = "module/".$_GET["module"].".php";
				include($file);
			} else{
				include("module/book-main.php");
			}
		?>
		<?php 
		if (isset($_GET["module"])) {
	 		$file="module/".$_GET["module"].".php";
	 	}
		?>
	</div>
	<footer>
		<div class="container-fluid pl-5">
			<div class="row text-center">
				<div class="col-md-4">
					<img src="images/53278904_2601150810111427_5858780672478412800_n.jpg" alt="" width="50px">
					<hr class="dark">
					<p class="text-left">
						<i class="material-icons">phone_iphone</i>  999-8888-666<br>
						<i class="material-icons">mail_outline</i>  leedragon@gmail.com<br>
						<i class="far fa-address-card"></i>  Neue Mainzer Str. 52-58, 60311 Frankfurt am Main, Germany.
					</p>
				</div>
				<div class="col-md-4 business-time">
					<h4>Business Time</h4>
					<hr class="dark">
					<p class="text-left">
						<i class="fas fa-clock"></i>  Monday-Friday: 8am - 7pm<br>
						<i class="fas fa-clock"></i>  Weekend: 9am - 1pm
					</p>
				</div>
				<div class="col-md-4 service">
					<h4>Services</h4>
					<hr class="dark">
					<p class="text-left">
						- Lorem ipsum, dolor sit amet.<br>
						- Lorem, ipsum dolor sit.<br>
						- Lorem ipsum dolor, sit amet consectetur.
					</p>
				</div>
				<hr class="dark">
				<div class="col-6"><p>Designed by Namaeb</p></div>
				<div class="col-6"><p>Made with <i class="fa fa-keyboard-o"></i> and <i class="fa fa-hand-stop-o"></i></p></div>	
			</div>
		</div>
	</footer>


	
	<script>
		tinymce.init({
			selector:'#comments'
		});

		function addCart(book_id){
			book_qty = $("#book_qty_"+book_id).val();
			if(book_qty == undefined){
				book_qty = 1;
			}
			 $.post("cart.php",{'book_id':book_id,'book_qty':book_qty}, function(data, status){
			 	item = data.split("-");
			 	$("#book_qty").text(item[0]);
			 	$("#total").text(item[1]);
  			});
		}
        function updateCart(book_id){
            book_qty = $("#book_qty_"+book_id).val();
            // $.post('updateCart.php', {'book_id':book_id,'book_qty':book_qty}, function(data){

            // });
            if(book_qty == undefined){
				book_qty = 1;
			}
			 $.post("cart.php",{'book_id':book_id,'book_qty':book_qty}, function(data, status){
			 	item = data.split("-");
			 	$("#book_qty").text(item[0]);
			 	$("#total").text(item[1]);
  			});
            $.post('updateCart.php',{'book_id':book_id,'book_qty':book_qty},function(data){
                $(".cart").load("book.php .cart");
                $(".shopping-detail").load("book.php?module=shoppingcart .shopping-detail");
                $(".total-price").load("book.php?module=shoppingcart .total-price");
            });
        }
        function delCart(book_id){
            $.post('updateCart.php',{'book_id':book_id,'book_qty':0},function(data){
                $(".cart").load("book.php .cart");
                $(".book_widget").load("book.php .book_widget");
            });
        }
	</script>
	<!-- ICON -->
	<script defer src="css/fontawesome/js/fontawesome.js"></script>
	<!-- JS -->
	<script src="js/book.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
	<script src="jquery/jquery-3.3.1.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- 	<script>
	 	$.ajax({
		type: 'GET',
		url: 'http://engzone.great-site.net/posts/1',
		success: data => {
			console.log(data);
		},
		error: () => {
			console.log('Error');
		}
	})
	</script> -->
</body>
</html>
<?php
	$stmt->close();
}
?>
