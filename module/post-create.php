<?php 
	include("./permission.php");

	if(isset($_POST["addPost"])){
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
                $post_img = $_GET["post_img"];
            }
            
        } 

		$sqlSelect = "SELECT * FROM tbl_blog WHERE title = '$title'";
		$result1 = mysqli_query($conn, $sqlSelect);

		if(mysqli_num_rows($result1) > 0){
			header("Location: post.php?module=post-create&error=Post name has already had!");
		    exit();
		} else{
			$sqlAddPost = "INSERT INTO tbl_blog(title, client_id, author, post_content, post_img, tag_id)";
			$sqlAddPost .= "VALUES('$title', '$client_id', '$author', '$post_content', '$post_img', '$tag_id')";
			mysqli_query($conn, $sqlAddPost) or die("error add post");
			header("location: post.php");			
		}
	}
 ?>

<div class="container pt-5">	
	<?php if(isset($_GET['error'])){ ?>
      	<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
	<form action="" method="post">
		<div class="form-group row">
			<div class="title">
				<input type="text" id="title" name="title" placeholder="Type a title">
				<hr>
			</div>
            <label for="post_img" class="col-3 col-lg-2 col-form-label text-right">Post image</label>
            <input id="post_img" name="post_img" type="file">
        </div>
		<div class="form-group row pt-3">
			<div class="col-12">
			    <textarea class="form-control" name="post_content" id="comments" rows="15" placeholder="Let your imagination go to the moon ^^"></textarea>
			</div>
			<hr class="light">
			<div class="col-12 tag-sub">
				<div class="tagz">
					<p>Tags:</p>  
					<select class="tag-select" id="tag_id" name="tag_id">
                        <option value="">--Select tags--
                            <?php 
                            	$sqlslectTag = "SELECT * FROM tbl_tag WHERE status = 1";
                                $resultTag = mysqli_query($conn,$sqlslectTag) or die("lỗi truy vấn danh mục");
                                while ($rowTag = mysqli_fetch_assoc($resultTag)) {
                                    ?>
                                </option> 
                                <option value="<?php echo $rowTag["tag_id" ] ?>"> <?php echo $rowTag["tag_name"] ?></option>
                            <?php } ?>
					</select>
				</div>
				<div class="submit-btn">
					<button class="btn btn-md btn-outline-success" name="addPost" type="submit" onclick="return alert('Your post has been upload please waiting for confirm')">Post</button>
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
	<form method="post" class="col-12">
		<div class="add-tag col-5 ml-0 pl-0">
			<input type="text" name="tag_name" placeholder="Add your tag">
			<button class="btn btn-sm btn-success ml-1" type="submit" name="addTag">Add</button>
			<hr align="left" style="width: 75%; ">	
		</div>
	</form>		
</div>