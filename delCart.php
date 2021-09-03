<?php  
	if(isset($_GET["book_id"])){
        $id = $_GET["book_id"];
        $sqlDelCart = "DELETE FROM tbl_cart WHERE book_id = $id";
        $result = mysqli_query($conn,$sqlDelCart) or die("Lỗi xóa sản phẩm");
        header("location:index.php?module=checkout");
    }
?>