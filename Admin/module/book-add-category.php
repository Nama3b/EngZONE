<?php  
    if(isset($_POST["addBookCat"])){
        $book_cat_name = $_POST["book_cat_name"];

        $sqlInsert = "INSERT INTO tbl_book_category(book_cat_name)";
        $sqlInsert .= " VALUES('$book_cat_name')";
        $result = mysqli_query($conn,$sqlInsert) or die("error add cat");
        header("location:admin.php?module=book-list-category");
    }
?>
<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Create new book category</h3>
        <div class="card-body">
            <form id="form" method="post">
                <div class="form-group row pt-4">
                    <label for="book_cat_name" class="col-4 col-lg-4 col-form-label text-right">Book category</label>
                    <div class="col-8 col-lg-8">
                        <input id="book_cat_name" name="book_cat_name" type="text" placeholder="Type book category" class="form-control">
                    </div>
                </div>
                <div class="">
                    <p class="text-right">
                        <button type="submit" name="addBookCat" class="btn btn-space btn-success">Add category</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
