<?php  

    if(isset($_GET["admin_id"])){
        $admin_id = $_GET["admin_id"];
        $sqlEditAdminUser = "SELECT * FROM tbl_admin WHERE admin_id = ".$admin_id;
        $result = mysqli_query($conn,$sqlEditAdminUser) or die("Lỗi truy vấn sửa tài khoản");
        $row = mysqli_fetch_row($result);
    }
    if(isset($_POST["editAdminUser"])){
        $admin_id = $_GET["admin_id"];
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $birthday = $_POST["birthday"];
        $phonenumber = $_POST["phonenumber"];
        $address = $_POST["address"];
        // $admin_img = $_POST["admin_img"];

        $sqlUpdateAdminUser = "UPDATE tbl_admin SET user_name = '$user_name' ,password = '$password', fullname = '$fullname' ,email = '$email', birthday = '$birthday' , phonenumber = '$phonenumber' , address ='$address' WHERE admin_id = $admin_id";

        $result = mysqli_query($conn,$sqlUpdateAdminUser) or die("Lỗi truy vấn sửa tài khoản");
        header("location:admin.php?module=admin-list-user");
    }
?>

      <div class="col-xl-12 col-sm-12 col-md-10 col-lg-10">
            <div class="card">
                <h3 class="card-header">Edit profile admin</h3>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group row">
                            <label for="username" class="col-4 col-lg-4 col-form-label text-right">User Name</label>
                            <div class="col-8 col-lg-8">
                                <input id="user_name" name="user_name" value="<?php echo $row[1] ?>" type="text" placeholder="Edit user name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-4 col-lg-4 col-form-label text-right">Password</label>
                            <div class="col-8 col-lg-8">
                                <input id="password" name="password" value="<?php echo $row[2] ?>" type="text" placeholder="Edit password" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="col-4 col-lg-4 col-form-label text-right">Full name</label>
                            <div class="col-8 col-lg-8">
                                <input id="fullname" name="fullname" value="<?php echo $row[5] ?>" type="text" placeholder="Edit your name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-4 col-lg-4 col-form-label text-right">Email</label>
                            <div class="col-8 col-lg-8">
                                <input id="email" name="email" value="<?php echo $row[3] ?>" type="text" placeholder="Edit email" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phonenumber" class="col-4 col-lg-4 col-form-label text-right">Phone number</label>
                            <div class="col-8 col-lg-8">
                                <input id="phone" name="phonenumber" value="<?php echo $row[6] ?>" type="text" placeholder="Sửa số điện thoại" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-4 col-lg-4 col-form-label text-right">Address</label>
                            <div class="col-8 col-lg-8">
                                <input id="address" name="address" value="<?php echo $row[4] ?>" type="text" placeholder="Sửa địa chỉ" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-4 col-lg-4 col-form-label text-right">Birthday</label>
                            <div class="col-8 col-lg-8">
                                <input type="datetime-local" id="birthday" name="birthday" value="<?php echo $row[7] ?>">
                            </div>
                        </div>
                        <div class="col-sm-5 pt-4" style="margin-top: 20px;">
                                <button type="submit" name="editAdminUser" class="btn btn-space btn-primary">Update profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






<style>
  .custom-control{
    margin-bottom: 20px;
  }
  .custom-control-label{
    padding-top: 4px;
  }
  .custom-control{
    margin-left: 90px;
    float: right; 
    display: inline;
  }
</style>
