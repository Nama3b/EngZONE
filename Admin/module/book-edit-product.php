<?php  
    if(isset($_GET["book_id"])){
        $book_id = $_GET["book_id"];
        $sqlEditBook = "SELECT * FROM tbl_book WHERE book_id = ". $book_id;
        $result = mysqli_query($conn,$sqlEditBook) or die("Lỗi truy vấn sửa sản phẩm");
        $row = mysqli_fetch_row($result);
    }

    if(isset($_POST["updateBook"])){
        $link = '/upload/';
        $book_name = $_POST["book_name"];
        $book_cat_id = $_POST["book_cat_id"];
        $book_price = $_POST["book_price"];
        $book_sale = $_POST["book_sale"];
        $book_qty = $_POST["book_qty"];
        $book_img = "upload/".$_POST["book_img"];
        $book_description = $_POST["book_description"];
        $book_favorite = $_POST["book_favorite"];

        //Xử lý FILE
        if(isset($_FILES["book_img"])){
            if ($_FILES["book_img"]["name"] != "") {
                if(isset($_FILES["book_img"]["name"])){
                    if($_FILES["book_img"]["type"] == "book_img/jpeg" || $_FILES["book_img"]["type"] == "book_img/jpg" || $_FILES["book_img"]["type"] == "book_img/png" || $_FILES["book_img"]["type"] == "book_img/gif"){
                        if($_FILES["book_img"]["error"]==0){
                            move_uploaded_file($_FILES["book_img"]["tmp_name"], "..".$link.$_FILES["book_img"]["name"]);
                            $book_img = $link.$_FILES["book_img"]["name"];
                        }
                    } else{
                        echo "File không hỗ trợ";
                    }
                }
            } else{
                $book_img = $_GET["book_img"];
            }
            
        } else{
            $book_img = $row[6];
        }
        $sqlUpdatePro = "UPDATE tbl_book SET book_name = '$book_name',book_cat_id = '$book_cat_id',book_price = '$book_price', book_sale = '$book_sale', book_qty = '$book_qty',book_img = '$book_img', book_description = '$book_description', book_favorite = '$book_favorite' WHERE book_id = '$book_id'";

        $result = mysqli_query($conn,$sqlUpdatePro) or die("Lỗi truy vấn sửa sản phẩm");
        header("location:admin.php?module=book-list-product");
    }
    if(isset($_POST["back"])){
        header("location: admin.php?module=book-list-product");
    }
?>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Edit book</h3>
        <div class="card-body">
            <form id="form" method="post" action="">
                <div class="form-group row">
                    <label for="book_name" class="col-3 col-lg-2 col-form-label text-right">Name</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_name" name="book_name" value="<?php echo $row[2] ?>" type="text" placeholder="Book name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_cat_id" class="col-3 col-lg-2 col-form-label text-right">Category</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="book_cat_id" id="book_cat_id">
                            <option value="<?php echo $row[1] ?>">-- Select Category --
                                <?php 
                                $sqlslectcat = "SELECT * FROM tbl_book_category WHERE `status`=1";
                                $resultcat = mysqli_query($conn,$sqlslectcat) or die("lỗi truy vấn danh mục");
                                    while ($rowcat = mysqli_fetch_assoc($resultcat)) {
                                        $selected='';
                                        if($row[1] == $rowcat["book_cat_id"]){
                                            $selected='selected';
                                        } ?>
                                      </option> 
                                      <option <?php echo $selected;  ?> value="<?php echo $rowcat["book_cat_id" ] ?>"> <?php echo $rowcat["book_cat_name"] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="book_price" class="col-3 col-lg-2 col-form-label text-right">Price</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_price" name="book_price" value="<?php echo $row[3] ?>" type="text" placeholder="Book price" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_sale" class="col-3 col-lg-2 col-form-label text-right">Sale off</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_sale" name="book_sale" value="<?php echo $row[4] ?>" type="text" placeholder="Book ale off" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_qty" class="col-3 col-lg-2 col-form-label text-right">Quantity</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_qty" name="book_qty" value="<?php echo $row[5] ?>" type="text" placeholder="Book quantity" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_img" class="col-3 col-lg-2 col-form-label text-right">Image</label>
                    <div class="col-9 col-lg-10">
                        <input id="book_img" name="book_img" type="file" value="<?php echo $row[6] ?>">
                        <img src="<?php echo $row[6] ?>" style="width: 90px; height: 100px" alt="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="book_favorite" class="col-3 col-lg-2 col-form-label text-right">Favorite</label>
                    <?php 
                        $book_id = $row[0];
                        $sqlSelectFavorite = "SELECT COUNT(*) AS book_favorite FROM tbl_book_favorite WHERE book_id = '$book_id'";
                        $resultFavorite = mysqli_query($conn, $sqlSelectFavorite);
                        $rowFavorite = mysqli_fetch_assoc($resultFavorite);
                     ?>
                    <div class="col-9 col-lg-10">
                        <input id="book_favorite" name="book_favorite" value="<?php echo $rowFavorite["book_favorite"] ?>" type="text" placeholder="Book favorite" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Description" class="col-3 col-lg-2 col-form-label text-right">Description</label>
                    <div class="col-9 col-lg-10">
                        <textarea id="Description" name="book_description" placeholder="Description" class="form-control" cols="30" rows="5"><?php echo $row[7] ?></textarea>
                    </div>
                </div>
                <div class="col-sm-6 pl-0">
                    <p class="text-right">
                        <button type="submit" name="updateBook" class="btn btn-space btn-success">Update</button>
                    </p>
                </div>
                <div class="col-sm-6 pl-1">
                    <a class="text-right">
                        <button type="submit" name="back" class="btn btn-space btn-success">Turn back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

