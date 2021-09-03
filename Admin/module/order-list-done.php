<style>

</style>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card table-responsive m-b-30">
        <h3 class="card-header">List order</h3>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="order_data">
                <thead>
                    <tr class="table-header">
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Datecreate</th>
                        <th scope="col">Status</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php 
                      $sqlselectPost = "SELECT * FROM tbl_order WHERE status = 1";
                      $result = mysqli_query($conn,$sqlselectPost) or die("Lỗi truy vấn Post");
                      $i = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                          $i++;
                     ?>
                        <tr class="table-body">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["client_name"] ?></td>
                            <td><div class="email"><?php echo $row["email"] ?></div></td>
                            <td><div class="address"><?php echo $row["address"] ?></div></td>
                            <td><?php echo $row["phonenumber"] ?></td>
                            <td><?php echo $row["createdate"] ?></td>
                            <td><?php echo ($row["status"])?"Done":"..." ?></td>
                            <td>
                                <a href="admin.php?module=order-remove&id=<?php echo $row["order_id"] ?>" onclick="return confirm('Do you sure to remove this order');"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>