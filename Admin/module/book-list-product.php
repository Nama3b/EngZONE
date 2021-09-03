<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List book product</h3>
        <a href="admin.php?module=book-add-product"><button class="btn btn-md btn-success btn-space">Add book</button></a>
        <div class="card-body" style="margin-top: 25px">
            <table id="book_data" class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Book</th>
                        <th scope="col">Category</th>
                        <th scope="col">Sale</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Cmts</th>
                        <th scope="col">Like</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectBook = "SELECT * FROM tbl_book AS p";
                      $sqlselectBook .=" INNER JOIN tbl_book_category AS C ON p.book_cat_id=c.book_cat_id";
                      $result = mysqli_query($conn,$sqlselectBook) or die("Lỗi truy vấn sản phẩm");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><img src="<?php echo $row["book_img"] ?>" style="width: 50px; height: 50px;" alt=""></td>
                            <td><div class="book_name"><?php echo $row["book_name"] ?></div></td>
                            <td><?php echo $row["book_cat_name"] ?></td>
                            <td><?php echo $row["book_price"] ?></td>
                            <td><?php echo $row["book_sale"] ?></td>
                            <td><?php echo $row["book_qty"] ?></td>
                            <?php 
                                $book_id = $row["book_id"];
                                $sqlSelectComment = "SELECT COUNT(*) AS total_comment FROM tbl_book_review WHERE book_id = '$book_id'";
                                $resultComment = mysqli_query($conn, $sqlSelectComment);
                                $rowComment = mysqli_fetch_assoc($resultComment);
                             ?>
                            <td><?php echo $rowComment["total_comment"] ?>
                                <button class="btn btn-sm btn-outline-success ml-2" style="background-color: black;border: 1px solid green"><a href="admin.php?module=book-review-detail&id=<?php echo $row["book_id"] ?>" style="color: white"><i class="fas fa-edit"></i></a></button>
                            </td>
                            <?php 
                                $sqlSelectFavorite = "SELECT COUNT(*) AS book_favorite FROM tbl_book_favorite WHERE book_id = '$book_id'";
                                $resultFavorite = mysqli_query($conn, $sqlSelectFavorite);
                                $rowFavorite = mysqli_fetch_assoc($resultFavorite);
                             ?>
                            <td><?php echo $rowFavorite["book_favorite"] ?></td>
                            <?php 
                                $sqlSelectRate = "SELECT AVG(favorite) AS rating FROM tbl_book_review WHERE status = 1 AND book_id = '$book_id'" ;
                                $resultRate = mysqli_query($conn, $sqlSelectRate);
                                $rowRate = mysqli_fetch_assoc($resultRate);
                             ?>
                            <td><?php echo number_format($rowRate["rating"], 1); ?></td>
                            <td><?php echo ($row["status_book"])?"Show":"Hide" ?></td>
                            <td>
                                <?php 
                                    $status = $row["status_book"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&book_id='.$row["book_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&book_id='.$row["book_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=book-edit-product&book_id=<?php echo $row["book_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&book_id=<?php echo $row["book_id"] ?>" onclick="return confirm('Are you sure to remove this product?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


