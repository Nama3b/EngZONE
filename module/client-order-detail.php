<?php 
	include("./permission.php");

	if(isset($_POST["removeOrder"])){
        $sqlDelOrder = "DELETE FROM tbl_order WHERE order_id = ".$_GET["order_id"];
        $result = mysqli_query($conn,$sqlDelOrder) or die("Lỗi xóa don hang");
        header("location:book.php?module=finish-checkout");
    }
 ?>
<div class="container order-detail">
	<div class="row">
		<h1>Your order detail</h1>
        <div class="card-body">
            <h5>Client information</h5>
            <table class="table table-bordered table-hover" id="order_detail_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">Client</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Status</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                    	$client_id = $_SESSION["client_id"];
                    	$order_id = $_GET["order_id"];
                      	$sqlselectPost = "SELECT * FROM tbl_order WHERE order_id = '$order_id' AND client_id = '$client_id'";
                      	$result = mysqli_query($conn,$sqlselectPost) or die("Lỗi truy vấn order");
                      	$i = 0;
                      	while ($row = mysqli_fetch_assoc($result)) {
                          	$i++;
                     ?>
                        <tr class="table-body">
                            <td><?php echo $row["client_name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["address"] ?></td>
                            <td><?php echo $row["phonenumber"] ?></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo ($row["status"])?"Confirmed":"Waiting" ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            <h5>Order information</h5>
            <table class="table table-bordered table-hover" id="order_detail_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">Image</th>
                        <th scope="col">Book name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                        $selectOrder = "SELECT * FROM tbl_orderdetail INNER JOIN tbl_book ON tbl_orderdetail.book_id = tbl_book.book_id where order_id=".$_GET["order_id"] ;
                        $result = mysqli_query($conn,$selectOrder) or die("Lỗi truy vấn oderdetail");
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                     ?>
                        <tr class="table-body">
                            <td><img src="<?php echo $row["book_img"] ?>" style="width: 50px; height: 50px;" alt=""></td>
                            <td><?php echo $row["book_name"] ?></td>
                            <td><?php echo $row["book_price"] ?></td>
                            <td><?php echo $row["quantity"] ?></td>
                            <td><?php echo $row["total_price"] ?></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            <form action="" method="post">   
                <p class="text-right">
                    <button type="submit" name="removeOrder" class="btn btn-success" onclick="return confirm('Are you sure to remove this order!')">Remove order</button>
                </p>
            </form>
        </div>
	</div>
</div>