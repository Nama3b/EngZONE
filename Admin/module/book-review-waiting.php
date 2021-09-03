<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List review book</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="bookRv_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Book</th>
                        <th scope="col">Client</th>
                        <th scope="col">Content</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectReview = "SELECT * FROM tbl_book_review INNER JOIN tbl_book ON tbl_book_review.book_id = tbl_book.book_id WHERE tbl_book_review.status = 0";
                      $result = mysqli_query($conn,$sqlselectReview) or die("Lỗi truy vấn review");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                      
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><div class="book_name"><?php echo $row["book_name"] ?></div></td>
                            <td><?php echo $row["reviewer_name"] ?></td>
                            <td><div style="width: 377px; overflow-x: scroll;"><?php echo $row["review_content"] ?></div></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"..." ?></td>
                            <td>
                                <a href="admin.php?module=active-action&book_review_id=<?php echo $row["review_id"] ?>" onclick="return confirm('Are you sure to approve this review?');"><i class="fas fa-comment-medical"></i></a>
                                <a href="admin.php?module=remove-action&review_book_id=<?php echo $row["review_id"] ?>" onclick="return confirm('Are you sure to remove this reivew?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>