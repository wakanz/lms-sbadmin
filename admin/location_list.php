<?php
include "includes/topbar.php";

if (isset($_GET['id']))
{
    delLocation();

}
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Locations</h6>
            <a href="location_add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Location</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Location ID</th>
                        <th>Location Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php


                    $query = "SELECT * FROM locations";
                    $result = $db->query($query);

                    /* associative array */
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                            <tr>
                            <tr>
                                <td><?php echo $row['location_id']; ?></td>
                                <td><?php echo $row['location_name']; ?></td>
                                <td>
                                    <a href="<?php echo ADMIN_PATH; ?>location_edit.php?id=<?php echo $row['location_id']; ?>" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="?id=<?php echo $row['location_id']; ?>" class="del" title="Delete"><i class="far fa-trash-alt"></i></a>
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
