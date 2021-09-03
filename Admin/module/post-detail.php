<?php  
    if(isset($_GET["id"])){
        $post_id = $_GET["id"];
        $sqlEditPost = "SELECT * FROM tbl_blog WHERE post_id = ".$post_id;
        $result = mysqli_query($conn,$sqlEditPost) or die("Lỗi truy vấn");
        $row = mysqli_fetch_row($result);
    }
    if(isset($_POST["approve"])){
        $status = 1;
        $sqlUpdatePost = "UPDATE tbl_blog SET status = '$status' WHERE post_id = $post_id";
        $result = mysqli_query($conn,$sqlUpdatePost) or die("Lỗi cho phep dang bai");
        header("location:admin.php?module=post-approved");
    }
    if(isset($_POST["back"])){
        header("location: admin.php?module=post-waiting");
    }
?>
<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
    <div class="card">
        <h3 class="card-header">Post's waiting detail</h3>
        <div class="card-body">
            <form id="form" method="post" action="">
                <div class="form-group row">
                    <label for="title" class="col-3 col-lg-2 col-form-label text-right">Title</label>
                    <div class="col-9 col-lg-10">
                        <input id="title" name="title" value="<?php echo $row[3] ?>" type="text" placeholder="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-3 col-lg-2 col-form-label text-right">Author</label>
                    <div class="col-9 col-lg-10">
                        <input id="author" name="author" value="<?php echo $row[2] ?>" type="text" placeholder="author" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_content" class="col-3 col-lg-2 col-form-label text-right">Post content</label>
                    <div class="col-9 col-lg-10">
                        <textarea id="post_content" name="post_content" placeholder="Post content" class="form-control" cols="30" rows="5"><?php echo $row[4] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_favorite" class="col-3 col-lg-2 col-form-label text-right">Tag</label>
                    <div class="col-9 col-lg-10">
                        <select class="form-control" name="post_tag" id="post_tag">
                            <option value="<?php echo $row[6] ?>">-- Select Tag --
                                <?php 
                                $sql = "SELECT * FROM tbl_tag WHERE status = 1";
                                $resultTag = mysqli_query($conn, $sql);
                                    while ($rowTag = mysqli_fetch_assoc($resultTag)) {
                                        $selected='';
                                        if($row[6] == $rowTag["tag_id"]){
                                            $selected='selected';
                                        } ?>
                                      </option> 
                                      <option <?php echo $selected;  ?> value="<?php echo $rowTag["tag_id" ] ?>"> <?php echo $rowTag["tag_name"] ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="post_img" class="col-3 col-lg-2 col-form-label text-right">Image</label>
                    <div class="col-9 col-lg-10">
                        <input id="post_img" name="post_img" type="file" value="<?php echo $row[5] ?>">
                        <img src="../<?php echo $row[5] ?>" style="width: 229px; height: 111px;margin-top:15px" alt="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="book_favorite" class="col-3 col-lg-2 col-form-label text-right">Status</label>
                    <div class="col-9 col-lg-10">
                        <input id="status" name="status" value="<?php echo ($row[8])?"Display":"Waiting" ?>" type="text" placeholder="status" class="form-control">
                    </div>
                </div>
                <button class="col-4 btn btn-sm btn-outline-success" align="left">
                    <a href="admin.php?module=remove-action&post_id=<?php echo $row[0] ?>" onclick="return confirm('Do you sure to remove this post');"><i class="fas fa-trash-alt"></i></a>
                </button>
                <div class="col-sm-6 pl-0">
                    <div class="text-right">
                        <button type="submit" name="approve" class="btn btn-space btn-success">Approve</button>
                    </div>
                </div>
                <div class="col-sm-2 pl-1">
                    <a class="text-right">
                        <button type="submit" name="back" class="btn btn-space btn-success">Turn back</button>
                    </a>
                </div> 
            </form>
        </div>
    </div>
</div>