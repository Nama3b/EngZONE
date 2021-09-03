<?php 
    ob_start();
    session_start();
    include("connection.php");
    header("Access-Control-Allow-Origin: *");
    
    if(isset($_POST["book_id"]) && isset($_POST["book_qty"])){
    	$id = $_POST["book_id"];
        $book_qty = $_POST["book_qty"];
    	if(isset($_SESSION["cart"])){
    		$cart = $_SESSION["cart"];
    		// echo "<pre>";
    		// print_r($cart);

    		if(array_key_exists($id, $cart)){
	    		if($_POST["book_qty"]){
		    		$cart[$id] = array(
						'book_name'=>$cart[$id]["book_name"],
						'book_img'=>$cart[$id]["book_img"],
						'book_price'=>$cart[$id]["book_price"],
						'book_qty'=>$_POST["book_qty"]
	    			);
    			} else{
    				unset($cart[$id]);
    			}
    			$_SESSION["cart"]=$cart;
    		}
    	}
    }
    
 ?>