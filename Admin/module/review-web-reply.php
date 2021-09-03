<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <?php 
            $review_id = $_GET["id"];
            $sql = "SELECT * FROM tbl_review_web WHERE review_id = '$review_id'";
            $result = mysqli_query($conn,$sql) or die("Lỗi truy vấn cmt");
            $row = mysqli_fetch_assoc($result);
         ?>
        <h3 class="card-header">Main comment content: <?php echo $row["review_content"] ?></h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="bookRv_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Reviewer</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date create</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                        $review_id = $_GET["id"];
                        $sqlselectRep = "SELECT * FROM tbl_review_web_reply INNER JOIN tbl_client ON tbl_review_web_reply.client_id = tbl_client.client_id WHERE tbl_review_web_reply.review_id = '$review_id'";
                        $resultRep = mysqli_query($conn,$sqlselectRep) or die("Lỗi truy vấn review");
                        $i = 0;
                        while ($rowRep = mysqli_fetch_assoc($resultRep)) {
                            $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th></div></td>
                            <td><?php echo $rowRep["username"] ?></td>
                            <td><div style="width: 377px; overflow-x: scroll;"><?php echo $rowRep["reply_content"] ?></div></td>
                            <td><?php echo $rowRep["createdate"] ?></td>
                            <td><?php echo ($rowRep["status_reply"])?"Display":"Block" ?></td>
                            <td>
                                <?php 
                                    $status = $rowRep["status_reply"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&web_reply_id='.$rowRep["reply_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&web_reply_id='.$rowRep["reply_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=remove-action&reply_id=<?php echo $rowRep["reply_id"] ?>" onclick="return confirm('Are you sure to remove this reivew?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>