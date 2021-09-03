<?php  
    if(isset($_POST["addQues"])){
        $question_content = $_POST["question_content"];
        $test_id = $_GET["test_id"];
        $grade_id = $_POST["grade_id"];
        $rank_id = $_POST["rank_id"];
        $answer_a = $_POST["answer_a"];
        $answer_b = $_POST["answer_b"];
        $answer_c = $_POST["answer_c"];
        $answer_d = $_POST["answer_d"];
        $correct_answer = $_POST["correct_answer"];

        // die;

        $sqlInsert = "INSERT INTO tbl_question(question_content,test_id,grade_id,rank_id,answer_a,answer_b,answer_c,answer_d,correct_answer)";
        $sqlInsert .= "VALUES('$question_content','$test_id','$grade_id','$rank_id','$answer_a','$answer_b','$answer_c','$answer_d','$correct_answer')";
        mysqli_query($conn,$sqlInsert) or die("Error add question");
        header("location: admin.php?module=course-question-add&test_id=<?php echo $rowTest[0] ?>");
    }
?>
<div class="container">
    <div class="card">
        <h3 class="card-header">Add question</h3>
        <div class="card-body">
            <form id="form" method="post" >
                <div class="form-group row">
                    <label for="grade_id" class="col-3 col-lg-3 col-form-label text-right">Test name</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $test_id = $_GET["test_id"];
                            $sqlSelectTest = "SELECT * FROM tbl_test WHERE test_id = '$test_id'";
                            $resultTest = mysqli_query($conn,$sqlSelectTest) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="test_id" id="test_id">
                            <?php $rowTest = mysqli_fetch_assoc($resultTest); ?>
                            <option value="<?php echo $rowTest["test_id"] ?>"><?php echo $rowTest["test_name"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grade_id" class="col-3 col-lg-3 col-form-label text-right">Grade</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $test_id = $_GET["test_id"];
                            $sqlSelectGrade = "SELECT * FROM tbl_test INNER JOIN tbl_grade ON tbl_test.grade_id = tbl_grade.grade_id WHERE test_id = '$test_id'";
                            $resultGrade = mysqli_query($conn,$sqlSelectGrade) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="grade_id" id="grade_id">
                            <?php $rowGrade = mysqli_fetch_assoc($resultGrade); ?>
                            <option value="<?php echo $rowGrade["grade_id"] ?>"><?php echo $rowGrade["grade_detail"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rank_id" class="col-3 col-lg-3 col-form-label text-right">Rank</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $test_id = $_GET["test_id"];
                            $sqlSelectRank = "SELECT * FROM tbl_test INNER JOIN tbl_rank ON tbl_test.rank_id = tbl_rank.rank_id WHERE test_id = '$test_id'";
                            $resultRank = mysqli_query($conn,$sqlSelectRank) or die("Lỗi truy vấn danh mục");
                            $rowRank = mysqli_fetch_assoc($resultRank);
                        ?>
                        <select class="form-control" name="rank_id" id="rank_id">
                            <option value="<?php echo $rowRank["rank_id"] ?>"><?php echo $rowRank["rank_detail"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="question_content" class="col-3 col-lg-3 col-form-label text-right">Question</label>
                    <div class="col-8 col-lg-8">
                        <input id="question_content" name="question_content" type="text" placeholder="Question content" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_a" class="col-3 col-lg-3 col-form-label text-right">Answer A:</label>
                    <div class="col-8 col-lg-8">
                        <input id="answer_a" name="answer_a" type="text" placeholder="Answer A" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_a" class="col-3 col-lg-3 col-form-label text-right">Answer B:</label>
                    <div class="col-8 col-lg-8">
                        <input id="answer_b" name="answer_b" type="text" placeholder="Answer B" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_a" class="col-3 col-lg-3 col-form-label text-right">Answer C:</label>
                    <div class="col-8 col-lg-8">
                        <input id="answer_c" name="answer_c" type="text" placeholder="Answer C" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="answer_a" class="col-3 col-lg-3 col-form-label text-right">Answer D:</label>
                    <div class="col-8 col-lg-8">
                        <input id="answer_d" name="answer_d" type="text" placeholder="Answer D" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="correct_answer" class="col-3 col-lg-3 col-form-label text-right">Correct answer</label>
                    <div class="col-8 col-lg-8">
                        <select class="form-control" name="correct_answer" id="correct_answer=">
                            <option value="0">---</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                          ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-right">
                        <button type="submit" name="addQues" class="btn btn-space btn-success">
                            Add question
                        </button>
                    </p>
                </div>
                <div class="col-sm-6">
                    <p class="text-left">
                        <button type="submit" class="btn btn-space btn-success">
                            <a href="admin.php?module=course-test-edit&test_id=<?php echo $rowTest["test_id"] ?>" style="color:white">Return</a>
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
