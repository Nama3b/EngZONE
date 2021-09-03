<?php 
	ob_start();
	session_start();
	include("connection.php");
    header("Access-Control-Allow-Origin: *");

	if(isset($_POST["book_id"])){
		$id = $_POST["book_id"];
		$book_qty = $_POST["book_qty"];
		$sqlSelectBook = "SELECT * FROM tbl_book WHERE book_id=".$id;
		$result = mysqli_query($conn,$sqlSelectBook);
		$row = mysqli_fetch_row($result);

		if(!isset($_SESSION["cart"])){
			$cart[$id] = array(
				'book_name'=>$row[2],
				'book_img'=>$row[6],
				'book_price'=>$row[3],
				'book_qty'=>1
			); 
		} else{
			$cart = $_SESSION["cart"];
			if(array_key_exists($id,$cart)){
				$cart[$id] = array(
					'book_name'=>$row[2],
					'book_img'=>$row[6],
					'book_price'=>$row[3],
					'book_qty'=>(int)$cart[$id]['book_qty']+$book_qty
				);
			} else{
				$cart[$id]= array(
					'book_name'=>$row[2],
					'book_img'=>$row[6],
					'book_price'=>$row[3],
					'book_qty'=>1
				);
			}
		}

		$_SESSION["cart"] = $cart;
		// echo "<pre>";
		// print_r($_SESSION["cart"]);

		$book_qty = 0;
		$total = 0;
		foreach($cart as $value){
			$book_qty += (int)$value["book_qty"];
			$total += (int)$value["book_qty"]*(int)$value["book_price"];
		}
		echo $book_qty."-".number_format($total,0,",",".");
	}
	// 	$quantity = 0;
	// 	$total = 0;
	// 	foreach ($cart as $value) {
	// 		$quantity += (int)$value["quantity"];
	// 		$total += (int)$value["quantity"]*(int)$value["price"];
	// 	}
	// 	echo $quantity."-".number_format($total,0,",",".");
	// }

 ?>
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

