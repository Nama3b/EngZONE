<?php  
    if(isset($_GET["question_id"])){
        $question_id = $_GET["question_id"];
        $sqlEditQues = "SELECT * FROM tbl_question WHERE question_id = ". $question_id;
        $result = mysqli_query($conn,$sqlEditQues) or die("Lỗi truy vấn sửa cau hoi");
        $row = mysqli_fetch_row($result);
    }

    if(isset($_POST["updateQues"])){
        $question_content = $_POST["question_content"];
        $section_id = $_POST["section_id"];
        $grade_id = $_POST["grade_id"];
        $rank_id = $_POST["rank_id"];
        $answer_a = $_POST["answer_a"];
        $answer_b = $_POST["answer_b"];
        $answer_c = $_POST["answer_c"];
        $answer_d = $_POST["answer_d"];
        $correct_answer = $_POST["correct_answer"];

        //Xử lý FILE
        $sqlUpdateQues = "UPDATE tbl_question SET question_content = '$question_content',section_id = '$section_id', grade_id = '$grade_id',rank_id = '$rank_id', answer_a = '$answer_a',answer_b = '$answer_b',answer_c = '$answer_c',answer_d = '$answer_d',correct_answer = '$correct_answer' WHERE question_id = '$question_id'";

        $result = mysqli_query($conn,$sqlUpdateQues) or die("Lỗi truy vấn sửa sản phẩm");
        header("location:admin.php?module=course-question-list");
    }
?>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Edit question</h3>
        <div class="card-body">
            <form id="form" method="post" action="">
                <div class="form-group row">
                    <label for="book_name" class="col-3 col-lg-2 col-form-label text-right">Question</label>
                    <div class="col-9 col-lg-10">
                        <input id="question_content" name="question_content" value="<?php echo $row[4] ?>" type="text" placeholder="question content" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="section_id" class="col-3 col-lg-2 col-form-label text-right">Section</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="section_id" id="section_id">
                            <option value="<?php echo $row[1] ?>">---
                            <?php 
                                $sqlslectSec = "SELECT * FROM tbl_section";
                                $resultSec = mysqli_query($conn,$sqlslectSec) or die("lỗi truy vấn danh mục");
                                while ($rowSec = mysqli_fetch_assoc($resultSec)) {
                                        $selected='';
                                    if($row[1] == $rowSec["section_id"]){
                                            $selected='selected';
                                } ?>
                            </option> 
                            <option <?php echo $selected;  ?> value="<?php echo $rowSec["section_id"] ?>"> <?php echo $rowSec["section_detail"] ?></option>
                            <?php } ?>
                        </select>
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
                    <label for="rank_id" class="col-3 col-lg-2 col-form-label text-right">Rank</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="rank_id" id="rank_id">
                            <option value="<?php echo $row[3] ?>">---
                            <?php 
                                $sqlslectRank = "SELECT * FROM tbl_rank";
                                $resultRank = mysqli_query($conn,$sqlslectRank) or die("lỗi truy vấn danh mục");
                                while ($rowRank = mysqli_fetch_assoc($resultRank)) {
                                        $selected='';
                                    if($row[3] == $rowRank["rank_id"]){
                                            $selected='selected';
                                } ?>
                            </option> 
                            <option <?php echo $selected;  ?> value="<?php echo $row[3] ?>"> <?php echo $rowRank["rank_detail"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_a" class="col-3 col-lg-2 col-form-label text-right">Answer A:</label>
                    <div class="col-9 col-lg-10">
                        <input id="answer_a" name="answer_a" value="<?php echo $row[5] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_b" class="col-3 col-lg-2 col-form-label text-right">Answer B:</label>
                    <div class="col-9 col-lg-10">
                        <input id="answer_b" name="answer_b" value="<?php echo $row[6] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_c" class="col-3 col-lg-2 col-form-label text-right">Answer C:</label>
                    <div class="col-9 col-lg-10">
                        <input id="answer_c" name="answer_c" value="<?php echo $row[7] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_d" class="col-3 col-lg-2 col-form-label text-right">Answer D:</label>
                    <div class="col-9 col-lg-10">
                        <input id="answer_d" name="answer_d" value="<?php echo $row[8] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="correct_answer" class="col-3 col-lg-2 col-form-label text-right">Answer Correct</label>
                    <div class="col-9 col-lg-10">
                        <input id="correct_answer" name="correct_answer" value="<?php echo $row[9] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 pl-0">
                    <div class="text-right">
                        <button type="submit" name="updateQues" class="btn btn-space btn-success">Update</button>
                    </div>
                </div>
                <div class="col-sm-6 pl-1">
                    <a href="admin.php?module=course-question-add" class="text-right">
                        <button type="submit" class="btn btn-space btn-success">Turn back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

