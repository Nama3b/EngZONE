<?php   
  include("./permission.php");

  if(isset($_GET["client_id"])){
    $client_id = $_GET["client_id"];
    $sqlEditClientUser = "SELECT * FROM tbl_client WHERE client_id = ".$client_id;
    $result = mysqli_query($conn,$sqlEditClientUser) or die("Lỗi truy vấn sửa tài khoản");
    $row = mysqli_fetch_row($result);
  }
?>
<div class="container pt-5 client-body">
  <div class="row justify-content-center">
    <div class="col-12 col-xs-11 col-sm-11 col-md-10 col-lg-4 col-xl-4">
      <div class="card card-profile shadow justify-content-center">
        <div class="col-lg-12 pt-3">
          <div class="card-profile-image" align="center">
            <a href="#">
              <img src="<?php echo $row[7] ?>" width = "150px" height = "150px" alt="">
            </a>
          </div>
        </div>
        <?php
          $client_id = $_SESSION["client_id"];
          $sqlSelectPost = "SELECT COUNT(*) AS total_post FROM tbl_blog WHERE client_id = '$client_id'";
          $resultPost = mysqli_query($conn, $sqlSelectPost);
          $rowPost = mysqli_fetch_assoc($resultPost);

          $sqlselectOrder = "SELECT COUNT(*) AS total_order FROM tbl_order WHERE client_id = '$client_id'";
          $resultOrder = mysqli_query($conn,$sqlselectOrder) or die("Lỗi truy vấn Post");
          $rowOrder = mysqli_fetch_assoc($resultOrder);   

          $sqlselectSave = "SELECT COUNT(*) AS total_save FROM tbl_post_save WHERE client_id = '$client_id' AND save_status = 1";
          $resultSave = mysqli_query($conn,$sqlselectSave) or die("Lỗi truy vấn save");
          $rowSave = mysqli_fetch_assoc($resultSave); 

          $sqlselectSaveLess = "SELECT COUNT(*) AS total_save FROM tbl_lesson_save WHERE client_id = '$client_id' AND lesson_status = 1";
          $resultSaveLess = mysqli_query($conn,$sqlselectSaveLess) or die("Lỗi truy vấn save");
          $rowSaveLess = mysqli_fetch_assoc($resultSaveLess);          
        ?>
        <div class="card-body">
          <div class="row">
            <div class="col-12" style="padding: 0;">
              <h3 class="text-center">
                <?php echo $row[3] ?>
              </h3>
              <div class="card-profile-stats d-flex text-center">
                <div class="col-6">
                  <span class="description"><small>Your posts:</small></span><br>
                  <span class="heading"><i class="fab fa-blogger"></i>: <?php echo $rowPost["total_post"] ?>-<button class="btn btn-sm btn-outline-success ml-1"><a href="index.php?module=client-post&client_id=<?php echo $row[0] ?>" style="font-size: 12px; color:green; text-decoration: none;">Detail</a></button></span>
                </div>
                <div class="col-6">
                  <span class="description"><small>Your orders:</small></span><br>
                  <span class="heading"><i class="fa fa-shopping-cart"></i>: <?php echo $rowOrder["total_order"] ?>-<button class="btn btn-sm btn-outline-danger ml-1"><a href="index.php?module=client-order&client_id=<?php echo $row[0] ?>" style="font-size: 12px; color:green; text-decoration: none;">Detail</a></button></span>
                </div>
              </div>
              <div class="card-profile-stats d-flex text-center">
                <div class="col-6">
                  <span class="description"><small>Save posts:</small></span><br>
                  <span class="heading"><i class="fas fa-save"></i>: <?php echo $rowSave["total_save"] ?> -<button class="btn btn-sm btn-outline-secondary ml-1"><a href="index.php?module=client-save-post&client_id=<?php echo $row[0] ?>" style="font-size: 12px; color:green; text-decoration: none;">Detail</a></button></span>
                </div>
                <div class="col-6">
                  <span class="description"><small>Save lessons:</small></span><br>
                  <span class="heading"><i class="fas fa-bookmark"></i>: <?php echo $rowSaveLess["total_save"] ?>-<button class="btn btn-sm btn-outline-info ml-1"><a href="index.php?module=client-save-lesson&client_id=<?php echo $row[0] ?>" style="font-size: 12px; color:green; text-decoration: none;">Detail</a></button></span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center pt-3">
            <div class="" style="font-family:cursive">
              <i class="fas fa-home mr-2"></i>- <?php echo $row[5] ?>
            </div>
            <hr class="dark">
            <h4><u>Education level:</u></h4>
             <?php 
              if(isset($_POST["addRank"])){
                $school = $_POST["school"];
                $grade = $_POST["grade"];
                $rank = $_POST["rank"];
                $_SESSION["addRank"] = 1;

                $query = "UPDATE tbl_client SET school = '$school', grade = '$grade', rank = '$rank' WHERE client_id = '$client_id'";
                $resultRank = mysqli_query($conn, $query) or die("loi roi bro");
              }
             ?>
            <div class="h6 ">
              <i class="fas fa-building mr-2"></i>- Creative Namaeb Officer
              <br> --- <br>
              <?php 
                $selectUser = "SELECT * FROM tbl_client INNER JOIN tbl_rank ON tbl_client.rank_id = tbl_rank.rank_id ";
                $result1 = mysqli_query($conn, $selectUser);
                $row1 = mysqli_fetch_assoc($result1);
              ?>
              <i class="fas fa-briefcase mr-2"></i>- <?php echo $row1["rank_detail"] ?> 
              <br> --- <br>
              <i class="fas fa-school mr-2"></i>- <?php echo $row[10] ?>
            </div> 
            <hr class="dark">
            <button class="btn btn-sm btn-outline-success "data-toggle="collapse" data-target="#addRank">Update your level education</button>
            <form action="" method="post" class="text-left collapse" id="addRank">
              <div class="form-group">
                <label class="form-control-label" for="rank">Rank</label>
                <select class="form-control" name="rank" id="rank">
                  <option value="<?php echo $row[12] ?>">---
                    <?php 
                      $sqlslectRank = "SELECT * FROM tbl_rank";
                      $resultRank = mysqli_query($conn,$sqlslectRank) or die("lỗi truy vấn rank");
                      while ($rowRank = mysqli_fetch_assoc($resultRank)) {
                        $selected='';
                        if($row[12] == $rowRank["rank_id"]){
                          $selected='selected';
                      } ?>
                  </option> 
                  <option <?php echo $selected;  ?> value="<?php echo $rowRank["rank_id" ] ?>"> <?php echo $rowRank["rank_detail"] ?></option>
                          <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="school">School</label>
                <input type="text" id="school" name="school" class="form-control form-control-alternative" placeholder="" value="<?php echo $row[10] ?>">
              </div>   
              <div class="form-group">
                <label class="form-control-label" for="grade">Grade</label>
                <input type="text" id="grade" name="grade" class="form-control form-control-alternative" placeholder="" value="<?php echo $row[11] ?>">
              </div>  
              <button type="submit" name="addRank" class="btn btn-sm btn-outline-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 ">
      <div class="card table-responsive">
          <h3 class="card-header">Your post's list</h3>
          <div class="card-body">
              <table class="table table-bordered table-hover" id="post_data">
                  <thead>
                      <tr class="table-header" style="color:white">
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Tag</th>
                          <th scope="col">Cmts</th>
                          <th scope="col">Like</th>
                          <th scope="col">Datecreate</th>
                          <th scope="col"></th>
                      </tr>                
                  </thead>
                  <tbody>
                      <?php 
                        $sqlselectPost = "SELECT * FROM tbl_blog WHERE client_id =".$_SESSION["client_id"];
                        $result = mysqli_query($conn,$sqlselectPost) or die("Lỗi truy vấn Post");
                        $i = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                       ?>
                          <tr class="table-body">
                              <th scope="row"><?php echo $i; ?></th>
                              <td><div class="post-title"><?php echo $row["title"] ?></div></td>
                              <?php 
                                  $sql = "SELECT * FROM tbl_tag WHERE tag_id =".$row["tag_id"];
                                  $resultTag = mysqli_query($conn, $sql);
                                  $rowTag = mysqli_fetch_assoc($resultTag);
                               ?>
                              <td><?php echo $rowTag["tag_name"] ?></td>
                              <?php 
                                  $post_id = $row["post_id"];
                                  $sqlSelectComment = "SELECT COUNT(*) AS total_comment FROM tbl_post_comment WHERE post_id = '$post_id'";
                                  $resultComment = mysqli_query($conn, $sqlSelectComment);
                                  $rowComment = mysqli_fetch_assoc($resultComment);
                               ?>
                              <td><?php echo $rowComment["total_comment"] ?>
                                  <button class="btn btn-sm btn-outline-success" style="background-color: black; font-size: 11px"><a href="post.php?module=post-detail&id=<?php echo $row["post_id"] ?>#form-cmt" style="color: white; text-decoration: none"><i class="fas fa-edit"></i></a></button>
                              </td>
                              <?php 
                                  $sqlCountFavorite = "SELECT SUM(favorite_status) AS total_favor FROM tbl_post_favorite WHERE post_id = '$post_id'";
                                  $resultFavor = mysqli_query($conn, $sqlCountFavorite);
                                  $rowFavor = mysqli_fetch_assoc($resultFavor);
                               ?>
                              <td><?php echo $rowFavor["total_favor"] ?></td>
                              <td><?php echo $row["createdate"] ?></td>
                              <td><a href="post.php?module=post-edit&id=<?php echo $row["post_id"] ?>"><i class="fas fa-edit"></i></a></d></td>
                          </tr>
                  <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>