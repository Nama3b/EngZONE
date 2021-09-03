<?php 
	include("./permission.php");
 ?>
<div class="container pt-5">
	<div class="row justify-content-center">
		<div class="col-12 col-xs-12 col-sm-12 col-md-7 col-lg-7 checkout-detail">
			<h2>Checkout detail</h2>
			<form action="" method="post">
				<input type="text" class="d-none" name="client_id" value="<?php echo $row["client_id"] ?>">
				<div class="form-group">
					<input type="text" class="col-md-11" id="client_name" name="client_name" placeholder="Type your name" value="<?php echo $row["fullname"] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="col-md-11" id="email" name="email" placeholder="Type your email" value="<?php echo $row["email"] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="col-md-11" id="address" name="address" placeholder="Type your address" value="<?php echo $row["address"] ?>">
				</div>
				<div class="form-group">
					<input type="text" class="col-md-11" id="phonenumber" name="phonenumber" placeholder="Type your phone number" value="<?php echo $row["phonenumber"] ?>">
				</div>
				<button type="submit" class="btn btn-outline-success" name="addNew" id="checkoutBtn" >
					Order
				</button>	
				<a href="book.php" class="btn btn-outline-success"><i class="fa fa-sign-out"></i></a>
			</form>
		</div>
		<div class="col-12 col-xs-12 col-sm-12 col-md-5 col-lg-5 your-check">
			<h2>Your check</h2>
			<div class="check-list">
				<?php 
					$book_qty = 0;
					$total = 0;
					$subtotal = 0;
					if(isset($_SESSION["cart"])){
						$cart = $_SESSION["cart"];
						foreach($cart as $key => $value){
				 ?>
				<div class="product-widget">
					<div class="col-3 product-img">
						<img src="<?php echo $value["book_img"] ?>" width="100%" alt="">
					</div>
					<div class="product-in4">
						<div class="na-pri col-10">
							<h6 class="product-name"><a href="book.php?module=book-detail&book_id=<?php echo $key ?>"><?php echo $value["book_name"] ?></a></h6>
							<h6 class="product-price">$ <?php echo number_format($value["book_price"],0,",","."); ?></h6>	
						</div>
						<div class="product-count col-2">
							<input type="text" id="book_qty_<?php echo $key ?>" name="book_qty" class="book_qty" value="<?php echo $value["book_qty"] ?>" onclick="updateCart(<?php echo $key?>)" >
							<div class="quantity-ic">
								<a href="">
									<i class="fas fa-chevron-up" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $key ?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;updateCart(<?php echo $key?>)"></i>
								</a>
								<a href="">
									<i class="fas fa-chevron-down" id="book_qty" onclick="var result = document.getElementById('book_qty_<?php echo $key ?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;updateCart(<?php echo $key?>)">
									</i>
								</a>	
							</div>
						</div>
					</div>
					<div class="trash "><a href="" class=""><i class="fas fa-trash-alt"></i></a></div>
				</div>
				<?php } } ?>
			</div>
			<hr class="light">
			<div class="total-pricee">
				<div class="transport-ship">
					<p>Transport ship: 2$</p>
				</div>
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
				<div class="price">
					<p>Total: <span class="text-right"><label id="total"><?php echo number_format($total,0,",","."); ?></label> $</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    if(isset($_POST["addNew"])){
        include("./function.php");
        $sql = insert('tbl_order',$_POST);
        $result1 = mysqli_query($conn,$sql);
        $row1 = mysqli_fetch_assoc($result1);
		$id = mysqli_insert_id($conn);
		$content .= "
			<h1>Delivery order:</h1>
			<table>
				<tr>
					<td>Name:</td>
					<td>".$row["fullname"]."</td>
				</tr>
				<tr>
					<td>Address:</td>
					<td>".$row["address"]."</td>
				</tr>
				<tr>
					<td>Phone number:</td>
					<td>".$row["phonenumber"]."</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>".$row["email"]."</td>
				</tr>
			</table>
			<h1>Product order:</h1>
			<table width='888' border='1'>
			<tr ><th>#</th><th>Image</th><th>Book name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
			";
		$i=0;
		$sqlSelect = "SELECT * FROM tbl_book";
		$resultSelect = mysqli_query($conn, $sqlSelect);
		$rowSelect = mysqli_fetch_assoc($resultSelect);
		if(isset($_SESSION["cart"])){
			foreach ($_SESSION["cart"] as $key => $value) {
			$i++;	
			$book_qty = $value["book_qty"];
			$total_price = $value["book_price"]*$value["book_qty"];
			$sqlInsertOrderDetail = "INSERT INTO tbl_orderdetail(order_id,book_id,quantity,total_price)";
			$sqlInsertOrderDetail .= "VALUES('$id','$key','$book_qty','$total_price')";
			mysqli_query($conn,$sqlInsertOrderDetail);

			$book_quantity = $rowSelect["book_quantity"] - $book_qty;
			$sqlUpdateQty = "UPDATE tbl_book SET book_quantity = '$book_quantity' WHERE book_id = '$key'";
			mysqli_query($conn, $sqlUpdateQty);	
			$content .="<tr><td>$i</td><td><img src='".$value["book_img"]."'></td><td>".$value["book_name"]."</td><td>".$value["book_price"]."</td><td>".$value["book_qty"]."</td><td>$total_price</td></tr>";

			}
			$content .='
			</table>
			';	

		}


    // include required phpmailer files
		include("./phpmailer/PHPMailer.php");
		include("./phpmailer/Exception.php");
		include("./phpmailer/OAuth.php");
		include("./phpmailer/POP3.php");
	    include("./phpmailer/SMTP.php");

		$mail = new PHPMailer\PHPMailer\PHPMailer();
	    $mail->IsSMTP(); 
	    try {
			$mail->SMTPDebug  = 1;
			$mail->CharSet 	  = 'UTF-8';
			$mail->isSMTP();

			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true; 

			$mail->Username   = 'engzoneez@gmail.com';
			$mail->Password   = 'engzon3@gmail.com';

			$mail->SMTPSecure = 'tls';
			$mail->Port       = 587;    

			$email = $_POST["email"];
			$client_name = $_POST["client_name"];
			$mail->setFrom('engzoneez@gmail.com', 'EngZone Checkout');

			$mail->addAddress($email,$client_name);

			$mail->isHTML(true);      
			$mail->Subject = 'Hellou! This is your orders form EngZone!';
			$mail->Body = $content; 
			$mail->send();
			header("Location: book.php?module=finish-checkout&order_id=$id");
			} catch (Exception $e) {
			echo "Mail Error: {$mail->ErrorInfo}";
		}  
		// Closing smtp connection
		$mail->smtpClose();                
	}
?>

