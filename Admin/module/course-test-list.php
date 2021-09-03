<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List course test</h3>
        <a href="admin.php?module=course-test-add"><button class="btn btn-md btn-success btn-space">Add test</button></a>
        <div class="card-body" style="margin-top: 25px">
            <table class="table table-bordered table-hover" id="test_data">    
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Total ques</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectTest = "SELECT * FROM tbl_test AS p";
                      $sqlselectTest .=" INNER JOIN tbl_grade AS C ON p.grade_id=c.grade_id";
                      $sqlselectTest .=" INNER JOIN tbl_rank AS D ON p.rank_id=d.rank_id";
                      $result = mysqli_query($conn,$sqlselectTest) or die("Lỗi truy vấn bai thi");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["test_name"] ?></td>
                            <td><?php echo $row["test_id"] ?></td>
                            <td><?php echo $row["grade_detail"] ?></td>
                            <td><?php echo $row["rank_detail"] ?></td>
                            <td><?php echo $row["total_question"] ?></td>
                            <td><?php echo ($row["status"])?"Display":"Block" ?></td>
                            <td>
                                <?php 
                                    $status = $row["status"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&test_id='.$row["test_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&test_id='.$row["test_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                                <a href="admin.php?module=course-test-edit&test_id=<?php echo $row["test_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&test_id=<?php echo $row["test_id"] ?>" onclick="return confirm('Do you sure to remove this test?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>