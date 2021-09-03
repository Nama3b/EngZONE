<?php   

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
          $client_id = $_GET["client_id"];
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
                <div class="col-12">
                  <span class="description"><small><?php echo $row[1] ?> posts:</small></span><br>
                  <span class="heading"><i class="fab fa-blogger"></i>: <?php echo $rowPost["total_post"] ?>-<button class="btn btn-sm btn-outline-success ml-1"><a href="post.php" style="font-size: 12px; color:green; text-decoration: none;">View</a></button></span>
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
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 ">
      <div class="card shadow client-profile-body">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0"><?php echo $row[1] ?>'s profile</h3>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" action="">
            <h6 class="heading-small mb-4">Profile information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-5">
                    <p>Username: <?php echo $row[1] ?></p>
                </div>
                <div class="col-lg-7">
                    <p>Email: <?php echo $row[4] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-11">
                    <p>Full name: <?php echo $row[3] ?></p>
                </div>
              </div>
            </div>
            <hr class="dark">
                <!-- Address -->
            <h6 class="heading-small mb-4">Contact info</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-11">
                    <p>Address: <?php echo $row[5] ?></p>
                </div>
                <div class="col-md-11">
                  <div class="form-group">
                    <p>Phone number: <?php echo $row[6] ?></p>
                  </div>
                </div>
              </div>
            </div>
            <hr class="dark">
                <!-- Description -->
            <h6 class="heading-small mb-4">About me</h6>
            <div class="col-lg-11 ml-3">
                    <p>About <?php echo $row[1] ?>: <?php echo $row[8] ?></p>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>