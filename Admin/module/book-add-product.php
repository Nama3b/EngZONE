<?php  
    if(isset($_POST["addNewBook"])){
        $link = '/uploads/';
        $book_name = $_POST["book_name"];
        $book_cat_id = $_POST["book_cat_id"];
        $book_price = $_POST["book_price"];
        $book_sale = $_POST["book_sale"];
        $book_qty = $_POST["book_qty"];
        $book_img = "./upload/".$_POST["book_img"];
        $book_description = $_POST["book_description"];
        $book_favorite = $_POST["book_favorite"];

        //Xử lý FILE
        if(isset($_FILES["book_img"])){
            if(isset($_FILES["book_img"]["name"])){
                if($_FILES["book_img"]["type"] == "book_img/jpeg" || $_FILES["book_img"]["type"] == "book_img/jpg" || $_FILES["book_img"]["type"] == "book_img/png" || $_FILES["book_img"]["type"] == "book_img/gif"){
                    if($_FILES["book_img"]["error"]==0){

                        move_uploaded_file($_FILES["book_img"]["tmp_name"], "..".$link.$_FILES["book_img"]["name"]);
                        $book_img = $link.$_FILES["book_img"]["name"];
                    }
                }
                else{
                    echo "File không hỗ trợ";
                }
            }
        }
        // die;

        $sqlInsertBook = "INSERT INTO tbl_book(book_name,book_cat_id,book_price,book_sale,book_qty,book_img,book_description,book_favorite)";
        $sqlInsertBook .= "VALUES('$book_name','$book_cat_id','$book_price','$book_sale','$book_qty','$book_img','$book_description','$book_favorite')";
        mysqli_query($conn,$sqlInsertBook) or die("Lỗi thêm mới sản phẩm");
        header("location:admin.php?module=book-list-product");
    }
?>
<div class="container">
    <div class="card">
        <h3 class="card-header">Add book product</h3>
        <div class="card-body">
            <form id="form" method="post" >
                <div class="form-group row">
                    <label for="book_name" class="col-3 col-lg-3 col-form-label text-right">Book name</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_name" name="book_name" type="text" placeholder="Book name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_cat_id" class="col-3 col-lg-3 col-form-label text-right">Book category</label>
                    <div class="col-8 col-lg-8">
                        <?php  
                            $sqlSelectCat = "SELECT * FROM tbl_book_category WHERE `status` = 1";
                            $resultCat = mysqli_query($conn,$sqlSelectCat) or die("Lỗi truy vấn danh mục");
                        ?>
                        <select class="form-control" name="book_cat_id" id="book_cat_id">
                          <option value="">--Chọn Danh mục--</option>
                          <?php  
                            while ($rowCat = mysqli_fetch_assoc($resultCat)) {
                                ?>
                                    <option value="<?php echo $rowCat["book_cat_id"] ?>"><?php echo $rowCat["book_cat_name"] ?></option>
                                <?php
                            }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_price" class="col-3 col-lg-3 col-form-label text-right">Price</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_price" name="book_price" type="text" placeholder="Book price" class="form-control">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="book_sale" class="col-3 col-lg-3 col-form-label text-right">Sale off</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_sale" name="book_sale" type="text" placeholder="Sale off" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_qty" class="col-3 col-lg-3 col-form-label text-right">Quantity</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_qty" name="book_qty" type="text" placeholder="Book quantity" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_img" class="col-3 col-lg-3 col-form-label text-right">Image</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_img" name="book_img" type="file" >
                        <img src="" style="width: 100px; height: 90px;" alt="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_description" class="col-3 col-lg-3 col-form-label text-right">Description</label>
                    <div class="col-8 col-lg-8">
                        <textarea class="form-control" name="book_description" id="dresscription" rows="3" col="50" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-right">
                        <button type="submit" name="addNewBook" class="btn btn-space btn-success">Add new book</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
</style>