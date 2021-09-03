<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">List book category</h3>
        <a href="admin.php?module=book-add-category"><button class="btn btn-md btn-success btn-space">Add category</button></a>
        <div class="card-body" style="margin-top: 25px">
            <table class="table table-bordered" id="cat_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Book category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $sqlSelectCat = "SELECT * FROM tbl_book_category";
                        $result = mysqli_query($conn,$sqlSelectCat) or die("Lỗi truy vấn danh mục");
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                    ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["book_cat_name"] ?></td>
                            <td><?php echo ($row["status"])?"Show":"Hide" ?></td>
                            <td>
                                <a href="admin.php?module=book-edit-category&id=<?php echo $row["book_cat_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&cat_id=<?php echo $row["book_cat_id"] ?>" onclick="return confirm('Do you sure to remove this category');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>