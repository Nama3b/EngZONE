<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List review book</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="bookRv_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Book</th>
                        <th scope="col">Reviewer</th>
                        <th scope="col">Content</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Like</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectReview = "SELECT * FROM tbl_book_review INNER JOIN tbl_book ON tbl_book_review.book_id = tbl_book.book_id ";
                      $result = mysqli_query($conn,$sqlselectReview) or die("Lỗi truy vấn review");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                      
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><div class="book_name"><?php echo $row["book_name"] ?></div></td>
                            <td><?php echo $row["reviewer_name"] ?></td>
                            <td><div class="review"><?php echo $row["review_content"] ?></div></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <?php 
                                $review_id = $row["review_id"];
                                $sqlSelectRep = "SELECT COUNT(*) AS total_reply FROM tbl_book_review_reply WHERE review_id = '$review_id'";
                                $resultRep = mysqli_query($conn, $sqlSelectRep);
                                $rowRep = mysqli_fetch_assoc($resultRep);
                             ?>
                            <td><?php echo $rowRep["total_reply"] ?>
                                <button class="btn btn-sm btn-outline-success" style="background-color: black;border: 1px solid green;margin-left: 9px"><a href="admin.php?module=book-review-reply&id=<?php echo $row["review_id"] ?>" style="color: white">Detail</a></button>
                            </td>
                            <?php 
                                $review_id = $row["review_id"];
                                $sqlSelectFavorite = "SELECT COUNT(*) AS review_like FROM tbl_book_review_like WHERE review_id = '$review_id'";
                                $resultFavorite = mysqli_query($conn, $sqlSelectFavorite);
                                $rowFavorite = mysqli_fetch_assoc($resultFavorite);
                             ?>
                            <td><?php echo $rowFavorite["review_like"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"..." ?></td>
                            <td>
                                <?php 
                                    $status = $row["status"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&book_review_id='.$row["review_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&book_review_id='.$row["review_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=remove-action&review_book_id=<?php echo $row["review_id"] ?>" onclick="return confirm('Are you sure to remove this reivew?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>