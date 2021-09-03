<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List review waiting for approve</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="reviewWeb_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Review content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date create</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectReview = "SELECT * FROM tbl_review_web  WHERE status = 0";
                      $result = mysqli_query($conn,$sqlselectReview) or die("Lỗi truy vấn review");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                      
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["reviewer_name"] ?></td>
                            <td><div style="width: 377px; overflow-x: scroll;"><?php echo $row["review_content"] ?></div></td>
                            <td><img src="<?php echo $row["img"] ?>" style="width: 50px; height: 50px;" alt=""></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo $row["rating"] ?></td>
                            <td><?php echo ($row["status"])?"Display":"Waiting" ?></td>
                            <td>
                                <a href="admin.php?module=active-action&review_web_id=<?php echo $row["review_id"] ?>" onclick="return confirm('Are you sure to approve this review?');"><i class="fas fa-comment-medical"></i></a>
                                <a href="admin.php?module=review-web-remove&id=<?php echo $row["review_id"] ?>" onclick="return confirm('Do you sure to remove this reivew?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>