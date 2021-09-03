<?php  
    if(isset($_POST["addTest"])){
        $test_name = $_POST["test_name"];
        $grade_id = $_POST["grade_id"];
        $rank_id = $_POST["rank_id"];

        // die;

        $sqlInsert = "INSERT INTO tbl_test(test_name,grade_id,rank_id)";
        $sqlInsert .="VALUES('$test_name','$grade_id','$rank_id')";
        mysqli_query($conn,$sqlInsert) or die("Lỗi thêm mới bai thi");
        header("location:admin.php?module=course-test-list");
    }
?>
<div class="container">
    <div class="card">
        <div class="test-header d-flex">
            <h3 class="card-header">Add test</h3>
            <a href="admin.php?module=course-test-list"><button class="btn btn-md btn-success btn-space">Test list</button></a>       
        </div>
        <div class="card-body">
            <form id="form" method="post" >
                <div class="form-group row">
                    <label for="test_name" class="col-2 col-lg-2 col-form-label text-right">Test</label>
                    <div class="col-8 col-lg-8">
                        <input id="test_name" name="test_name" type="text" placeholder="Test name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grade_id" class="col-2 col-lg-2 col-form-label text-right">Grade</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $sqlSelectGrade = "SELECT * FROM tbl_grade";
                            $resultGrade = mysqli_query($conn,$sqlSelectGrade) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="grade_id" id="grade_id">
                          <option value="">---</option>
                          <?php  
                            while ($rowGrade = mysqli_fetch_assoc($resultGrade)) {
                                ?>
                                    <option value="<?php echo $rowGrade["grade_id"] ?>"><?php echo $rowGrade["grade_detail"] ?></option>
                                <?php
                            }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rank_id" class="col-2 col-lg-2 col-form-label text-right">Rank</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $sqlSelectRank = "SELECT * FROM tbl_rank";
                            $resultRank = mysqli_query($conn,$sqlSelectRank) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="rank_id" id="rank_id">
                          <option value="">---</option>
                          <?php  
                            while ($rowRank = mysqli_fetch_assoc($resultRank)) {
                                ?>
                                    <option value="<?php echo $rowRank["rank_id"] ?>"><?php echo $rowRank["rank_detail"] ?></option>
                                <?php
                            }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-right">
                        <button type="submit" name="addTest" class="btn btn-space btn-success">Add</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
</style>