<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List review website</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="reviewWeb_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Like</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectReview = "SELECT * FROM tbl_review_web";
                      $result = mysqli_query($conn,$sqlselectReview) or die("Lỗi truy vấn review");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                      
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["reviewer_name"] ?></td>
                            <td><div class="content"><?php echo $row["review_content"] ?></div></td>
                            <td><img src="<?php echo $row["img"] ?>" style="width: 50px; height: 50px;" alt=""></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <?php 
                                $review_id = $row["review_id"];
                                $sqlSelectRep = "SELECT COUNT(*) AS total_reply FROM tbl_review_web_reply WHERE review_id = '$review_id'";
                                $resultRep = mysqli_query($conn, $sqlSelectRep);
                                $rowRep = mysqli_fetch_assoc($resultRep);
                             ?>
                            <td><?php echo $rowRep["total_reply"] ?>
                                <button class="btn btn-sm btn-outline-success" style="background-color: black;border: 1px solid green;margin-left: 9px"><a href="admin.php?module=review-web-reply&id=<?php echo $row["review_id"] ?>" style="color: white">Detail</a></button>
                            </td>
                            <?php 
                                $sqlCountFavorite = "SELECT SUM(like_status) AS total_like FROM tbl_review_web_like WHERE review_id = '$review_id'";
                                $resultFavor = mysqli_query($conn, $sqlCountFavorite);
                                $rowFavor = mysqli_fetch_assoc($resultFavor);
                             ?>
                            <td><?php echo $rowFavor["total_like"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"Hide" ?></td>
                            <td>
                                <?php 
                                    $status = $row["status"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&review_web_id='.$row["review_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&review_web_id='.$row["review_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=remove-action&review_web_id=<?php echo $row["review_id"] ?>" onclick="return confirm('Do you sure to remove this reivew?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>