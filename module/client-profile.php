<?php   
  include("./permission.php");



  if(isset($_GET["client_id"])){
    $client_id = $_GET["client_id"];
    $sqlEditClientUser = "SELECT * FROM tbl_client WHERE client_id = ".$client_id;
    $result = mysqli_query($conn,$sqlEditClientUser) or die("Lỗi truy vấn sửa tài khoản");
    $row = mysqli_fetch_row($result);
  }
  if(isset($_POST["editProfile"])){
    $client_id = $_GET["client_id"];
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phonenumber = $_POST["phonenumber"];

    if(isset($_FILES["client_img"])){
      if ($_FILES["client_img"]["name"] != "") {
        if(isset($_FILES["client_img"]["name"])){
          if($_FILES["client_img"]["type"] == "client_img/jpeg" || $_FILES["client_img"]["type"] == "client_img/jpg" || $_FILES["client_img"]["type"] == "client_img/png" || $_FILES["client_img"]["type"] == "client_img/gif"){
            if($_FILES["client_img"]["error"]==0){
              move_uploaded_file($_FILES["client_img"]["tmp_name"], "..".$link.$_FILES["client_img"]["name"]);
              $client_img = $link.$_FILES["client_img"]["name"];
            }
          } else{
            echo "File không hỗ trợ";
          }
        }
      } else{
        $client_img = $_GET["client_img"];
      }        
    }

    $sqlUpdateClientUser = "UPDATE tbl_client SET username = '$username' , fullname = '$fullname', email = '$email', address ='$address', phonenumber = '$phonenumber'  WHERE client_id = $client_id";

    $result = mysqli_query($conn,$sqlUpdateClientUser) or die("Lỗi truy vấn sửa tài khoản");
    header("location: index.php?module=client-profile&client_id=$client_id");
  }

  if(isset($_POST["changePass"])){
    $password = $_POST["password"];
    $sqlUpdatePass = "UPDATE tbl_client SET password = '$password' WHERE client_id = '$client_id'";
    $resultPass = mysqli_query($conn,$sqlUpdatePass) or die("Loi sua mat khau");
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
          $sqlSelectPost = "SELECT COUNT(post_id) AS total_post FROM tbl_blog WHERE client_id = '$client_id'";
          $resultPost = mysqli_query($conn, $sqlSelectPost);
          $rowPost = mysqli_fetch_assoc($resultPost);

          $sqlselectOrder = "SELECT COUNT(order_id) AS total_order FROM tbl_order WHERE client_id = '$client_id'";
          $resultOrder = mysqli_query($conn,$sqlselectOrder) or die("Lỗi truy vấn Post");
          $rowOrder = mysqli_fetch_assoc($resultOrder);   

          $sqlselectSave = "SELECT COUNT(save_id) AS total_save FROM tbl_post_save WHERE client_id = '$client_id' AND save_status = 1";
          $resultSave = mysqli_query($conn,$sqlselectSave) or die("Lỗi truy vấn save");
          $rowSave = mysqli_fetch_assoc($resultSave); 

          $sqlselectSaveLess = "SELECT COUNT(save_id) AS total_save FROM tbl_lesson_save WHERE client_id = '$client_id' AND lesson_status = 1";
          $resultSaveLess = mysqli_query($conn,$sqlselectSaveLess) or die("Lỗi truy vấn save less");
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
            <div class="h6 ">
              <small><i class="fas fa-building mr-2"></i>- Creative Namaeb Officer</small>
              <br> --- <br>
              <?php 
                $selectUser = "SELECT * FROM tbl_client INNER JOIN tbl_rank ON tbl_client.rank_id = tbl_rank.rank_id WHERE tbl_client.client_id = '$client_id'";
                $result1 = mysqli_query($conn, $selectUser);
                $row1 = mysqli_fetch_assoc($result1);
              ?>
              <small><i class="fas fa-briefcase mr-2"></i>- <?php echo $row1["rank_detail"] ?> </small>
              <br> --- <br>
              <small><i class="fas fa-school mr-2"></i>- <?php echo $row[10] ?></small>
            </div> 
            <hr class="dark">
            <button class="btn btn-sm btn-outline-success "data-toggle="collapse" data-target="#addRank">Update your level education</button>
             <?php 
              if(isset($_POST["addEdu"])){
                $client_id = $_GET["client_id"];
                $school = $_POST["school"];
                $grade = $_POST["grade"];
                $rank = $_POST["rank"];

                $query = "UPDATE tbl_client SET school = '$school', grade = '$grade', rank_id = '$rank' WHERE client_id = '$client_id'";
                mysqli_query($conn, $query) or die("loi roi bro");
                header("location: index.php?module=client-profile&client_id=$client_id");
              }
             ?>
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
              <button type="submit" name="addEdu" class="btn btn-sm btn-outline-success">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 ">
      <div class="card shadow client-profile-body">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">My profile</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="">
            <h6 class="heading-small mb-4">Profile information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control form-control-alternative" placeholder="" value="<?php echo $row[1] ?>">
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="form-group">
                    <label class="form-control-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="" value="<?php echo $row[4] ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-11">
                  <div class="form-group">
                    <label class="form-control-label" for="fullname">Full name</label>
                    <input type="text" id="fullname" name="fullname" class="form-control form-control-alternative" placeholder="" value="<?php echo $row[3] ?>">
                  </div>
                </div>
              </div>
            </div>
            <hr class="dark">
                <!-- Address -->
            <h6 class="heading-small mb-4">Contact info</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-11">
                  <div class="form-group">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" name="address" value="<?php echo $row[5] ?>" type="text">
                  </div>
                </div>
                <div class="col-md-11">
                  <div class="form-group">
                    <label class="form-control-label" for="phonenumber">Phone number</label>
                    <input id="phonenumber" class="form-control form-control-alternative" placeholder="Phone number" name="phonenumber" value="<?php echo $row[6] ?>" type="text">
                  </div>
                </div>
              </div>
            </div>
            <hr class="dark">
                <!-- Description -->
            <h6 class="heading-small mb-4">About me</h6>
            <div class="col-lg-11 ml-3">
              <div class="form-group">
                <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."><?php echo $row[8] ?></textarea>
              </div>
            </div>
            <div class="col-12 d-flex">
              <div class="col-6 col-xs-7 col-sm-7 col-md-8 col-lg-7 col-xl-8"></div>
              <div class="col-6 col-xs-5 col-sm-5 col-md-4 col-lg-5 col-xl-4">
                <button type="submit" class="btn btn-md btn-outline-light" name="editProfile">Update profile</button>
              </div>
            </div>
          </form>
          <hr class="dark">
          <form method="post" action="">
            <div class="form-group">
              <label class="form-control-label" for="changepass">Change password</label>
              <div class="col-12 d-flex">
                <div class="col-9 col-md-10 col-lg-10 col-xl-10">
                  <input type="password" name="password" class="form-control form-control-alternative">
                </div>
                <div class="col-3 col-md-2 col-lg-2 col-xl-2">
                  <button type="submit" class="btn btn-md btn-outline-light" name="changePass">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>