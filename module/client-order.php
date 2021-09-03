<?php 
    include("./permission.php");

    if(isset($_POST["reBuy"])){
        header("location:book.php?module=checkout");
    }

    if(isset($_POST["removeOrder"])){
        $sqlDelOrder = "DELETE FROM tbl_order WHERE order_id = ".$_GET["order_id"];
        $result = mysqli_query($conn,$sqlDelOrder) or die("Lỗi xóa don hang");
        header("location:index.php?module=client-order");
    }
 ?>
<div class="container client-order">
    <div class="row">
        <div class="order-section mt-3">
        <h2 class="mb-3">Your order information</h2>
            <?php 
                $sql = "SELECT * FROM tbl_order WHERE client_id=".$_SESSION["client_id"];
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
             ?>
            <div class="order-item mb-3">
                <div class="order-item-info col-12 d-flex">
                    <div class="col-6 date"><u><h6>Date create: <i class="far fa-calendar-alt"></i> <?php echo $row["createdate"] ?></h6></u></div>
                    <div class="col-6" align="right"><u><h6>Status: <?php echo ($row["status"])?"Done <i class='far fa-check-circle'></i>":"Waiting..." ?></h6></u></div>
                </div>
                <?php 
                $selectOrder = "SELECT * FROM tbl_orderdetail INNER JOIN tbl_book ON tbl_orderdetail.book_id = tbl_book.book_id WHERE tbl_orderdetail.order_id=".$row["order_id"] ;
                $resultOrder = mysqli_query($conn,$selectOrder) or die("Lỗi truy vấn Post");
                $i = 0;
                while ($rowOrder = mysqli_fetch_assoc($resultOrder)) {
                    $i++;
                ?>
                <div class="order-item-body col-12 d-flex pt-3">
                    <div class="col-1"><img src="<?php echo $rowOrder["book_img"] ?>" alt="" width="47px" height = "60px"></div>
                    <div class="col-4"><h6><a href="book.php?module=book-detail&book_id=<?php echo $rowOrder["book_id"] ?>"><?php echo $rowOrder["book_name"] ?></a></h6></div>
                    <div class="col-2"><h6><?php echo number_format($rowOrder["book_price"],0,",","."); ?>$</h6></div>
                    <div class="col-1"><h6>x<?php echo $rowOrder["quantity"] ?></h6></div>
                    <div class="col-3"><h6>Total: <?php echo number_format($rowOrder["total_price"],0,",","."); ?>$</h6></div>
                    <div class="col-1">
                        
                    </div>
                </div>
            <?php } ?>
            <div class="col-12" align="right">
                <a href="index.php?module=client-order-detail&order_id=<?php echo $row["order_id"] ?>"><button class="btn btn-sm btn-outline-success">Detail</button></a>
                <?php 
                    $status = $row["status"];
                    if($status == 0){
                        echo '
                            <button class="btn btn-sm btn-outline-success" name="removeOrder" type="submit" align="right">Remove</button>
                        ';
                    } else{
                        echo '
                            <button class="btn btn-sm btn-outline-success" name="reBuy" type="submit">Rebuy</button>
                        ';
                    }
                 ?>
                
            </div>

            </div>
            <hr>
        <?php } ?>
        </div>
    </div>
</div>
