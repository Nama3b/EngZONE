<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <?php 
            $post_id = $_GET["id"];
            $sql = "SELECT * FROM tbl_post_comment INNER JOIN tbl_blog ON tbl_post_comment.post_id = tbl_blog.post_id WHERE tbl_post_comment.post_id = '$post_id'";
            $result1 = mysqli_query($conn,$sql) or die("Lỗi truy vấn cmt");
            $row1 = mysqli_fetch_assoc($result1);
         ?>
        <h3 class="card-header">List comment <u><?php echo $row1["title"] ?></u>'s post</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Commenter</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date create</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                        $post_id = $_GET["id"];
                        $sqlselectCmt = "SELECT * FROM tbl_post_comment INNER JOIN tbl_blog ON tbl_post_comment.post_id = tbl_blog.post_id WHERE tbl_post_comment.post_id = '$post_id'";
                        $result = mysqli_query($conn,$sqlselectCmt) or die("Lỗi truy vấn cmt");
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                      
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["cmter_name"] ?></td>
                            <td><?php echo $row["cmt_content"] ?></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <?php 
                                $cmt_id = $row["cmt_id"];
                                $sqlSelectRep = "SELECT COUNT(*) AS total_reply FROM tbl_post_comment_reply WHERE cmt_id = '$cmt_id'";
                                $resultRep = mysqli_query($conn, $sqlSelectRep);
                                $rowRep = mysqli_fetch_assoc($resultRep);
                             ?>
                            <td><?php echo $rowRep["total_reply"] ?>
                                <button class="btn btn-sm btn-outline-success" style="background-color: black;border: 1px solid green;margin-left: 9px"><a href="admin.php?module=post-comment-reply&id=<?php echo $row["cmt_id"] ?>" style="color: white">Detail</a></button>
                            </td>
                            <td><?php echo ($row["status"])?"Display":"Waiting" ?></td>
                            <td>
                                <?php 
                                    $status = $row["status_cmt"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&post_cmt_id='.$row["cmt_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&post_cmt_id='.$row["cmt_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=remove-action&post_cmt_id=<?php echo $row["cmt_id"] ?>" onclick="return confirm('Do you sure to remove this comment?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>