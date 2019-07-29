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
            <h6 class="m-0 font-weight-bold text-primary">All Reservations</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Requested By</th>
                        <th>Date Reserved</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php


                    $query = "SELECT reserved.reserve_id, reserved.book_id, reserved.r_date, reserved.status, books.book_name, users.user_id, users.username  FROM reserved, books, users WHERE reserved.book_id = books.book_id AND reserved.user_id = users.user_id";
                    $result = $db->query($query);

                    /* associative array */
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            ?>

                            <tr>
                                <td class="col-6"><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['r_date']; ?></td>
                                <td>


                                    <a href="<?php echo ADMIN_PATH; ?>confirm.php?id=<?php echo $row['reserve_id']; ?>">Confirm Book</a>
                                </td>

                            </tr>

                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php include "includes/footer.php"?>
