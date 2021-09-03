<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <div class="lesson-header">
            <h3 class="card-header">Secondary's school lesson</h3>
            <a href="admin.php?module=course-lesson-add"><button class="btn btn-md btn-success btn-space">Add lesson</button></a>   
        </div>
        <div class="card-body" style="margin-top: 25px">
            <table id="book_data" class="table table-bordered table-hover">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Lesson</th>
                        <th scope="col">Content</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectLesson = "SELECT * FROM tbl_lesson WHERE grade_id > 5 AND grade_id <= 9";
                      $result = mysqli_query($conn,$sqlselectLesson) or die("Lỗi truy vấn sản phẩm");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["lesson_name"] ?></td>
                            <td><?php echo $row["lesson_content"] ?></td>
                            <td><?php echo $row["grade_id"] ?></td>
                            <td><?php echo $row["teacher"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"Hide" ?></td>
                            <td>
                                <a href="admin.php?module=course-lesson-edit&lesson_id=<?php echo $row["lesson_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=course-lesson-remove&lesson_id=<?php echo $row["lesson_id"] ?>" onclick="return confirm('Do you sure to remove this lesson?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="admin.php?module=course-lesson"><button class="btn btn-space btn-success">Turn back</button></a>
        </div>
    </div>
</div>


