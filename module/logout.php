<?php  
	//Reset OAuth access token

	session_destroy();
	
	header("location:./index.php");
?>