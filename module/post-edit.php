<?php 
    if(isset($_GET["id"])){
        $sqlEditPost = "SELECT * FROM tbl_blog WHERE post_id = ". $_GET["id"];
        $result = mysqli_query($conn,$sqlEditPost) or die("Lỗi truy vấn sửa sản phẩm");
        $row = mysqli_fetch_row($result);
    }

	if(isset($_POST["updatePost"])){
        $link = '/upload/';
		$client_id = $_SESSION["client_id"];
		$title = $_POST["title"];
		$author = $_SESSION["username"];
		$post_content = $_POST["post_content"];
		$tag_id = $_POST["tag_id"];
        $post_img = "upload/".$_POST["post_img"];

		//Xử lý FILE
        if(isset($_FILES["post_img"])){
            if ($_FILES["post_img"]["name"] != "") {
                if(isset($_FILES["post_img"]["name"])){
                    if($_FILES["post_img"]["type"] == "post_img/jpeg" || $_FILES["post_img"]["type"] == "post_img/jpg" || $_FILES["post_img"]["type"] == "post_img/png" || $_FILES["post_img"]["type"] == "post_img/gif"){
                        if($_FILES["post_img"]["error"]==0){
                            move_uploaded_file($_FILES["post_img"]["tmp_name"], "..".$link.$_FILES["post_img"]["name"]);
                            $post_img = $link.$_FILES["post_img"]["name"];
                        }
                    } else{
                        echo "File không hỗ trợ";
                    }
                }
            } else{
                $post_img = $row[5];
            }
            
        } 

		$sqlSelect = "SELECT * FROM tbl_blog WHERE title = '$title'";
		$result1 = mysqli_query($conn, $sqlSelect);

		
	        $sqlUpdatePost = "UPDATE tbl_blog SET client_id = '$client_id', author = '$author', title = '$title', post_content = '$post_content', tag_id = '$tag_id', post_img = '$post_img', status = 0 WHERE post_id =".$_GET["id"];
			mysqli_query($conn, $sqlUpdatePost) or die("error edit post");
			header("location: post.php");			
		
	}
 ?>

<div class="container pt-5">	
	<form action="" method="post">
		<div class="form-group row">
			<div class="title col-4">
                <label for="title"><i class="far fa-bookmark mr-1"></i></label>
				<input type="text" name="title" placeholder="Type a title" value="<?php echo $row[3] ?>">
				<hr>
			</div>
            <div class="col-5 d-flex ml-3">
                <label for="post_img" class="form-label text-right mr-2">Image:</label>
                <input id="post_img" name="post_img" type="file" value="<?php echo $row[5] ?>">    
            </div>
            <img src="<?php echo $row[5] ?>" align="right" style="width: 212px; height: 111px" alt="">
        </div>
		<div class="form-group row pt-2">
			<div class="col-12">
			    <textarea class="form-control" name="post_content" id="comments" rows="15" placeholder="Let your imagination go to the moon ^^"><?php echo $row[4] ?></textarea>
			</div>
			<hr class="light">
			<div class="col-12 tag-sub">
				<div class="tagz">
					<p>Tags:</p>  
					<select class="tag-select" id="tag_id" name="tag_id">
                        <option value="<?php echo $row[6] ?>">--Select tags--
                            <?php 
                            	$sqlslectTag = "SELECT * FROM tbl_tag WHERE status = 1";
                                $resultTag = mysqli_query($conn,$sqlslectTag) or die("lỗi truy vấn danh mục");
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
				<div class="submit-btn">
					<button class="btn btn-md btn-outline-success" name="updatePost" type="submit" onclick="return alert('Your post has been update and you have to wait for confirmation!')">Update</button>
				</div>	
			</div>
    	</div>	
	</form>
    <?php 
        if(isset($_POST["addTag"])){
            $tag_name = $_POST["tag_name"];
            $sqlSelectTag = "SELECT * FROM tbl_tag WHERE tag_name = '$tag_name'";
            $result = mysqli_query($conn, $sqlSelectTag);

            if(mysqli_num_rows($result) > 0){
                header("Location: post.php?module=post-create&tagError=Tag name has already had!");
                exit();
            } else{
                $sqlAddTag = "INSERT INTO tbl_tag(tag_name) VALUES('$tag_name')";
                mysqli_query($conn, $sqlAddTag);
                header("location: post.php?module=post-create");
            }
        }
     ?>
    <?php if(isset($_GET['tagError'])){ ?>
        <p class="error"><?php echo $_GET['tagError']; ?></p>
    <?php } ?>
    <form method="post" class="col-12" style="margin-left: -17px">
        <div class="add-tag col-5 ml-0 pl-0">
            <input type="text" name="tag_name" placeholder="Add your tag">
            <button class="btn btn-sm btn-success ml-1" type="submit" name="addTag">Add</button>
            <hr align="left" style="width: 75%; ">  
        </div>
    </form> 
</div>