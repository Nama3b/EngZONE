<div class="col-12">
    <div class="card">
        <h3 class="card-header">List user admin</h3>
        <div class="card-body">
            <table class="table table-bordered" id="admin_data">
                <thead>
                    <tr class="table-header">
                      <th scope="col">#</th>
                      <th scope="col">User name</th>
                      <th scope="col">Full name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Birthday</th>
                      <th scope="col">Phone number</th>
                      <th scope="col">Address</th>
                      <!-- <th scope="col">Image</th> -->
                      <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $sqlSelectAdminUser = "SELECT * FROM tbl_admin";
                        $result = mysqli_query($conn,$sqlSelectAdminUser) or die("Error login profile admin user");
                        $i=0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $i++;
                    ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                              <td><?php echo $row["user_name"] ?></td>
                              <td><?php echo $row["fullname"] ?></td>
                              <td><?php echo $row["email"] ?></td>
                              <td><?php echo $row["birthday"] ?></td>
                              <td><?php echo $row["phonenumber"] ?></td>
                              <td><?php echo $row["address"] ?></td>
                              <!-- <td><img src="../<?php echo $row["admin_img"] ?>" style="width: 50px; height: 50px;" alt=""></td> -->                         
                              <td> 
                                <a href="admin.php?module=admin-profile-user&admin_id=<?php echo $row["admin_id"] ?>"><i class="fas fa-edit"></i></a>
                                <a href="admin.php?module=remove-action&admin_id=<?php echo $row["admin_id"] ?>" onclick="return confirm('Do you sure to remove this admin!');"><i class="fas fa-trash-alt"></i></a>
                              </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>