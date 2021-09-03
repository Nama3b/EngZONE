<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List all post</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="post_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Status</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectPost = "SELECT * FROM tbl_blog WHERE status = 0";
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
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo ($row["status"])?"Approved":"Waiting" ?></td>
                            <td>
                                <a href="admin.php?module=post-detail&id=<?php echo $row["post_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&post_id=<?php echo $row["post_id"] ?>" onclick="return confirm('Do you sure to remove this post');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>