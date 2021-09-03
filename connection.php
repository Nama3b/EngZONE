<?php 	
	//kết nối sang CSDL 
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "engzone";

	$conn = mysqli_connect($server,$user,$password,$database) or die("Lỗi kết nối");
	mysqli_set_charset($conn,"utf8");
?> 
