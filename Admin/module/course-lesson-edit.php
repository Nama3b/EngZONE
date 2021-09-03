<?php  
    if(isset($_GET["lesson_id"])){
        $lesson_id = $_GET["lesson_id"];
        $sqlEditLess = "SELECT * FROM tbl_lesson WHERE lesson_id = ". $lesson_id;
        $result = mysqli_query($conn,$sqlEditLess) or die("Lỗi truy vấn sửa cau hoi");
        $row = mysqli_fetch_row($result);
    }

    if(isset($_POST["updateLess"])){
        $grade_id = $_POST["grade_id"];
        $test_id = $_POST["test_id"];
        $lesson_name = $_POST["lesson_name"];
        $lesson_content = $_POST["lesson_content"];
        $lesson_video = $_POST["lesson_video"];
        $teacher = $_POST["teacher"];

        //Xử lý FILE
        $sqlUpdateLess = "UPDATE tbl_lesson SET grade_id = '$grade_id', test_id = '$test_id',lesson_name = '$lesson_name', lesson_content = '$lesson_content',lesson_video = '$lesson_video',teacher = '$teacher' WHERE lesson_id = '$lesson_id'";

        $result = mysqli_query($conn,$sqlUpdateLess) or die("Lỗi truy vấn sửa sản phẩm");
        header("location:admin.php?module=course-lesson");
    }
?>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Edit lesson</h3>
        <div class="card-body">
            <form id="form" method="post" action="">
                <div class="form-group row">
                    <label for="lesson_name" class="col-3 col-lg-2 col-form-label text-right">Lesson</label>
                    <div class="col-9 col-lg-10">
                        <input id="lesson_name" name="lesson_name" value="<?php echo $row[3] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lesson_content" class="col-3 col-lg-2 col-form-label text-right">Content</label>
                    <div class="col-9 col-lg-10">
                        <textarea id="lesson_content" name="lesson_content" placeholder="lesson_content" class="form-control" cols="30" rows="5"><?php echo $row[4] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grade_id" class="col-3 col-lg-2 col-form-label text-right">Grade</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="grade_id" id="grade_id">
                            <option value="<?php echo $row[2] ?>">---
                            <?php 
                                $sqlslectGrade = "SELECT * FROM tbl_grade";
                                $resultGrade = mysqli_query($conn,$sqlslectGrade) or die("lỗi truy vấn danh mục");
                                while ($rowGrade = mysqli_fetch_assoc($resultGrade)) {
                                        $selected='';
                                    if($row[2] == $rowGrade["grade_id"]){
                                            $selected='selected';
                                } ?>
                            </option> 
                            <option <?php echo $selected;  ?> value="<?php echo $row[2] ?>"> <?php echo $rowGrade["grade_detail"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="test_id" class="col-3 col-lg-2 col-form-label text-right">Test</label>
                    <div class="col-8 col-lg-8">
                        <select class="form-control" name="test_id" id="test_id">
                            <option value="<?php echo $row[1] ?>">---
                            <?php 
                                $grade_id = $row[2];
                                $sqlslectTest = "SELECT * FROM tbl_test WHERE grade_id = '$grade_id'";
                                $resultTest = mysqli_query($conn,$sqlslectTest) or die("lỗi truy vấn danh mục");
                                while ($rowTest = mysqli_fetch_assoc($resultTest)) {
                                    $selected = '';
                                    if($row[1] == $rowTest["test_id"]){
                                        $selected = 'selected';
                                    }
                            ?>
                            </option>
                            <option <?php echo $selected;  ?> value="<?php echo $rowTest["test_id"] ?>"><?php echo $rowTest["test_name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-sm btn-outline-success" style="background-color: black;border: 2px solid green;"><a href="admin.php?module=course-test-edit&test_id=<?php echo $row[1] ?>" style="color: white">Test detail</a></button>
                </div>
                <div class="form-group row">
                    <label for="lesson_video" class="col-3 col-lg-2 col-form-label text-right">URL Vid</label>
                    <div class="col-9 col-lg-10">
                        <input id="lesson_video" name="lesson_video" value="<?php echo $row[5] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="teacher" class="col-3 col-lg-2 col-form-label text-right">Teacher</label>
                    <div class="col-9 col-lg-10">
                        <input id="teacher" name="teacher" value="<?php echo $row[6] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 pl-0">
                    <div class="text-right">
                        <button type="submit" name="updateLess" class="btn btn-space btn-success">Update</button>
                    </div>
                </div>
                <div class="col-sm-6 pl-1">
                    <button type="submit" class="btn btn-space btn-success">
                        <a href="admin.php?module=course-test-add&lesson_id=<?php echo $row[0] ?>" class="text-right" style="color:white">New test</a>
                    </button>
                </div>
            </form>
            <div class="col-sm-6 pl-1">
                <a href="admin.php?module=course-lesson" >
                    <button type="submit" class="btn-sm btn-space btn-success">
                        <i class="material-icons">subdirectory_arrow_left</i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

