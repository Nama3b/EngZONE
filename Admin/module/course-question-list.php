<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List question</h3>
        <a href="admin.php?module=course-question-add"><button class="btn btn-md btn-success btn-space">Add question</button></a>
        <div class="card-body" style="margin-top: 25px">
            <table class="table table-bordered table-hover" id="ques_data">    
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Info</th>
                        <th scope="col">A</th>
                        <th scope="col">B</th>
                        <th scope="col">C</th>
                        <th scope="col">D</th>
                        <th scope="col">Correct</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectQuestion = "SELECT * FROM tbl_question AS p";
                      $sqlselectQuestion .=" INNER JOIN tbl_grade AS C ON p.grade_id=c.grade_id";
                      $sqlselectQuestion .=" INNER JOIN tbl_rank AS R ON p.rank_id=r.rank_id";
                      $sqlselectQuestion .=" INNER JOIN tbl_section AS S ON p.section_id=s.section_id";
                      $result = mysqli_query($conn,$sqlselectQuestion) or die("Lỗi truy vấn sản phẩm");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["question_content"] ?></td>
                            <td><?php echo $row["grade_detail"] ?>, <?php echo $row["rank_detail"] ?>, <?php echo $row["section_detail"] ?></td>
                            <td><?php echo $row["answer_a"] ?></td>
                            <td><?php echo $row["answer_b"] ?></td>
                            <td><?php echo $row["answer_c"] ?></td>
                            <td><?php echo $row["answer_d"] ?></td>
                            <td align="center"><?php echo $row["correct_answer"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"Hide" ?></td>
                            <td>
                                <a href="admin.php?module=course-question-edit&question_id=<?php echo $row["question_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&question_id=<?php echo $row["question_id"] ?>" onclick="return confirm('Do you sure to remove this question?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>