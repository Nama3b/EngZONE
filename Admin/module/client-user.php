<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List user client</h3>
        <div class="card-body">
            <table class="table table-bordered" id="client_data">
                <thead>
                    <tr class="table-header">
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Client name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Image</th>
                      <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $sqlSelectUser = "SELECT * FROM tbl_client";
                        $result = mysqli_query($conn,$sqlSelectUser) or die("Error login profile user");
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                    ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                              <td><?php echo $row["username"] ?></td>
                              <td><?php echo $row["fullname"] ?></td>
                              <td><div class="email"><?php echo $row["email"] ?></div></td>
                              <td><div class="address"><?php echo $row["address"] ?></div></td> 
                              <td><?php echo $row["phonenumber"] ?></td>
                              <td><img src="../<?php echo $row["client_img"] ?>" style="width: 44px; height: 44px;" alt=""></td>   
                              <td><?php echo ($row["status"])?"Active":"Block" ?></td>
                              <td>
                                <?php 
                                    $status = $row["status"];
                                    if($status==0){
                                        echo '
                                            <a href="admin.php?module=active-action&client_id='.$row["client_id"].'" ><i class="fas fa-lock-open"></i></a>
                                        ';
                                    } else{
                                        echo '
                                            <a href="admin.php?module=block-action&client_id='.$row["client_id"].'" ><i class="fas fa-user-lock"></i></a>
                                        ';
                                    }
                                 ?>
                              </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--                                 <a href="admin.php?module=client-user-block&id=<?php echo $row["client_id"] ?>" onclick="return confirm('Are you sure to block this user!');"><i class="fas fa-user-lock"></i></a>
                                <a href="admin.php?module=client-user-active&id=<?php echo $row["client_id"] ?>" onclick="return confirm('Are you sure to active this user!');"><i class="fas fa-lock-open"></i></a> -->