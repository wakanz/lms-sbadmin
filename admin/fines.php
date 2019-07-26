<?php
include "includes/topbar.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Locations</h6>
            <a href="fine_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Location</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php


                    //$query = "SELECT * FROM fines";
                    $query = "SELECT fines.fine_amnt, borrow.borrow_id, users.username FROM fines, borrow, users WHERE fines.borrow_id = borrow.borrow_id";



                    $result = $db->query($query);

                    /* associative array */
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                            <tr>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['fine_amnt']; ?></td>
                                <td>
                                    <a href="<?php echo ADMIN_PATH; ?>fine_pay.php?id=<?php echo $row['fine_id']; ?>" title="Pay"><i class="fas fa-edit"></i></a>
                                </>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php include "includes/footer.php"?>
