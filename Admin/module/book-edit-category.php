<?php  
    if(isset($_GET["id"])){
        $book_cat_id = $_GET["id"];
        $sqlEditCat = "SELECT * FROM tbl_book_category WHERE book_cat_id = ".$book_cat_id;
        $result = mysqli_query($conn,$sqlEditCat) or die("Lỗi truy vấn sửa danh mục");
        $row = mysqli_fetch_row($result);
        // echo "<pre>";
        // print_r($row);
    }
    if(isset($_POST["updateCat"])){
        $book_cat_name = $_POST["book_cat_name"];

        $sqlUpdateCat = "UPDATE tbl_book_category SET book_cat_name = '$book_cat_name' WHERE book_cat_id = '$book_cat_id'";
        $result = mysqli_query($conn,$sqlUpdateCat) or die("Lỗi truy vấn sửa danh mục");
        header("location:admin.php?module=book-list-category");
    }
?>
<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header">Edit book category</h5>
        <div class="card-body">
            <form id="form" method="post">
                <div class="form-group row">
                    <label for="book_cat_name" class="col-3 col-lg-2 col-form-label text-right">Category book</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_cat_name" name="book_cat_name" value="<?php echo $row[1] ?>" type="text" placeholder="Book category name" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                    <label class="be-checkbox custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="1" name="status" id="status" <?php echo ($row[2])?"checked":"" ?> />
                        <span class="custom-control-label">Status</span>
                    </label>
                </div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" name="updateCat" class="btn btn-space btn-success">Update book category</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>




<style>
  .custom-control{
    margin-bottom: 20px;
  }
  .custom-control-label{
    padding-top: 4px;
  }
  .custom-control{
    margin-left: 90px;
  }
</style>