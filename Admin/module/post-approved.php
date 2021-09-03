<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List posts approved</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="post_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Like</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Status</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectPost = "SELECT * FROM tbl_blog WHERE status = 1";
                      $result = mysqli_query($conn,$sqlselectPost) or die("Lỗi truy vấn Post");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["author"] ?></td>
                            <td><?php echo $row["title"] ?></td>
                            <?php 
                                $sql = "SELECT * FROM tbl_tag WHERE tag_id =".$row["tag_id"];
                                $resultTag = mysqli_query($conn, $sql);
                                $rowTag = mysqli_fetch_assoc($resultTag);
                             ?>
                            <td><?php echo $rowTag["tag_name"] ?></td>
                            <?php 
                                $post_id = $row["post_id"];
                                $sqlSelectComment = "SELECT COUNT(*) AS total_comment FROM tbl_post_comment WHERE post_id = '$post_id'";
                                $resultComment = mysqli_query($conn, $sqlSelectComment);
                                $rowComment = mysqli_fetch_assoc($resultComment);
                             ?>
                            <td><?php echo $rowComment["total_comment"] ?>
                                <button class="btn btn-sm btn-outline-success" style="background-color: black;border: 1px solid green;margin-left: 9px"><a href="admin.php?module=post-comment&id=<?php echo $row["post_id"] ?>" style="color: white">Detail</a></button>
                            </td>
                            <?php 
                                $sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_post_favorite WHERE post_id = '$post_id'";
                                $resultFavor = mysqli_query($conn, $sqlCountFavorite);
                                $rowFavor = mysqli_fetch_assoc($resultFavor);
                             ?>
                            <td><?php echo $rowFavor["total_favor"] ?></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo ($row["status"])?"Approved":"Waiting" ?></td>
                            <td>
                                <?php 
                                    $status = $row["status"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&post_id='.$row["post_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&post_id='.$row["post_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=post-remove&id=<?php echo $row["post_id"] ?>" onclick="return confirm('Do you sure to remove this post');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>