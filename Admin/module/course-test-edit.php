<?php  
    if(isset($_GET["test_id"])){
        $test_id = $_GET["test_id"];
        $sqlEditTest = "SELECT * FROM tbl_test WHERE test_id = ". $test_id;
        $result = mysqli_query($conn,$sqlEditTest) or die("Lỗi truy vấn sửa bai thi");
        $row = mysqli_fetch_row($result);
    }

    if(isset($_POST["updateTest"])){
        $test_name = $_POST["test_name"];
        $grade_id = $_POST["grade_id"];
        $rank_id = $_POST["rank_id"];
        $section_id = $_POST["section_id"];
        $total_question = $_POST["total_question"];

        //Xử lý FILE
        $sqlUpdateTest = "UPDATE tbl_test SET test_name = '$test_name', grade_id = '$grade_id', rank_id = '$rank_id', total_question = '$total_question' WHERE test_id = '$test_id'";

        $result = mysqli_query($conn,$sqlUpdateTest) or die("Lỗi truy vấn");
        header("location:admin.php?module=course-test-list");
    }
?>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Edit test</h3>
        <div class="card-body">
            <form id="form" method="post" action="">
                <div class="form-group row">
                    <label for="book_name" class="col-3 col-lg-2 col-form-label text-right">Test</label>
                    <div class="col-9 col-lg-10">
                        <input id="test_name" name="test_name" value="<?php echo $row[1] ?>" type="text" placeholder="question content" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grade_id" class="col-3 col-lg-2 col-form-label text-right">Grade</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="grade_id" id="grade_id">
                            <option value="<?php echo $row[2] ?>">-- Select grade --
                            <?php 
                                $sqlslectGrade = "SELECT * FROM tbl_grade";
                                $resultGrade = mysqli_query($conn,$sqlslectGrade) or die("lỗi truy vấn danh mục");
                                while ($rowGrade = mysqli_fetch_assoc($resultGrade)) {
                                        $selected='';
                                    if($row[2] == $rowGrade["grade_id"]){
                                            $selected='selected';
                                } ?>
                            </option> 
                            <option <?php echo $selected;  ?> value="<?php echo $rowGrade["grade_id"] ?>"> <?php echo $rowGrade["grade_detail"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rank_id" class="col-3 col-lg-2 col-form-label text-right">Rank</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="rank_id" id="rank_id">
                            <option value="<?php echo $row[3] ?>">-- Select rank --
                            <?php 
                                $sqlslectRank = "SELECT * FROM tbl_rank";
                                $resultRank = mysqli_query($conn,$sqlslectRank) or die("lỗi truy vấn danh mục");
                                while ($rowRank = mysqli_fetch_assoc($resultRank)) {
                                        $selected='';
                                    if($row[3] == $rowRank["rank_id"]){
                                            $selected='selected';
                                    } ?>
                            </option> 
                            <option <?php echo $selected;  ?> value="<?php echo $rowRank["rank_id"] ?>"> <?php echo $rowRank["rank_detail"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="total_question" class="col-3 col-lg-2 col-form-label text-right">Total question</label>
                    <div class="col-9 col-lg-10">
                        <?php 
                            $sqlCountQues = "SELECT COUNT(*) AS total_queston FROM tbl_question WHERE test_id = '$test_id'";
                            $resultCount = mysqli_query($conn,$sqlCountQues) or die("Lỗi truy vấn danh mục");
                            $rowCount = mysqli_fetch_assoc($resultCount);
                         ?>
                        <input id="total_question" name="total_question" value="<?php echo $rowCount["total_queston"] ?>" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 pl-0">
                    <div class="text-right">
                        <button type="submit" name="updateTest" class="btn btn-space btn-success">Update</button>
                    </div>
                </div>
                <div class="col-sm-6 pl-1">
                    <button type="submit" class="btn btn-space btn-success">
                        <a href="admin.php?module=course-question-add&test_id=<?php echo $row[0] ?>" class="text-right" style="color:white">Add question</a>
                    </button>
                </div>
            </form>
            <div class="col-sm-6 pl-1">
                <a href="admin.php?module=course-test-list" >
                    <button type="submit" class="btn-sm btn-space btn-success">
                        <i class="material-icons">subdirectory_arrow_left</i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>


