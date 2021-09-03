<?php  
    if(isset($_POST["addLess"])){
        $grade_id = $_POST["grade_id"];
        $lesson_name = $_POST["lesson_name"];
        $lesson_content = $_POST["lesson_content"];
        $lesson_video = $_POST["lesson_video"];
        $teacher = $_POST["teacher"];

        // die;

        $sqlInsert = "INSERT INTO tbl_lesson(grade_id, lesson_name, lesson_content, lesson_video, teacher)";
        $sqlInsert .= "VALUES('$grade_id','$lesson_name','$lesson_content','$lesson_video','$teacher')";
        mysqli_query($conn,$sqlInsert) or die("Lỗi thêm mới bai giang");
        header("location:admin.php?module=course-lesson");
    }
?>
<div class="container">
    <div class="card">
        <h3 class="card-header">Add lesson</h3>
        <div class="card-body">
            <form id="form" method="post" >
                <div class="form-group row">
                    <label for="lesson_name" class="col-3 col-lg-3 col-form-label text-right">Lesson</label>
                    <div class="col-8 col-lg-8">
                        <input id="lesson_name" name="lesson_name" type="text" placeholder="Lesson name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lesson_content" class="col-3 col-lg-3 col-form-label text-right">Content</label>
                    <div class="col-8 col-lg-8">
                        <textarea id="lesson_content" name="lesson_content" placeholder="lesson_content" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grade_id" class="col-3 col-lg-3 col-form-label text-right">Grade</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $sqlSelectGrade = "SELECT * FROM tbl_grade";
                            $resultGrade = mysqli_query($conn,$sqlSelectGrade) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="grade_id" id="grade_id">
                          <option value="">---</option>
                            <?php  
                            while ($rowGrade = mysqli_fetch_assoc($resultGrade)) { ?>
                                <option value="<?php echo $rowGrade["grade_id"] ?>"><?php echo $rowGrade["grade_detail"] ?></option>
                            <?php
                                }
                              ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lesson_video" class="col-3 col-lg-3 col-form-label text-right">URL Vid</label>
                    <div class="col-8 col-lg-8">
                        <input id="lesson_video" name="lesson_video" type="text" placeholder="lesson's video" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="teacher" class="col-3 col-lg-3 col-form-label text-right">Teacher</label>
                    <div class="col-8 col-lg-8">
                        <input id="teacher" name="teacher" type="text" placeholder="Teacher name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-right">
                        <button type="submit" name="addLess" class="btn btn-space btn-success">Add Lesson</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
