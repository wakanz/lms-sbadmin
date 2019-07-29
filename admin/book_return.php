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
                        <th>Book Name</th>
                        <th>User Name</th>
                        <th>Date Borrowed</th>
                        <th>Due Date</th>
                        <th>Fine</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php


                    $query = "SELECT borrow.borrow_id, borrow.date_out, borrow.due_date, borrow.status, users.username,books.book_name, fines.fine_amnt, settings.fine FROM borrow, users,books, fines, settings WHERE borrow.user_id = users.user_id AND borrow.book_id = books.book_id AND  fines.borrow_id = borrow.borrow_id AND borrow.status = 1";

                    $result = $db->query($query);

                    /* associative array */
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $bo_id = $row['borrow_id'];
                            $d = strtotime($row['due_date']);
                            $c = strtotime(date("Y-m-d"));
                            //$amount =  $row['fine'];
                            if ($c > $d) {
                                $diff = $c - $d;
                                $diff = $diff / (60 * 60 * 24);
                                $fine = $row['fine'];
                                $diff = $diff * $fine;


                            } else
                            {
                                $diff = 0;

                            }

                            $query = $db->query("UPDATE fines SET fine_amnt = '$diff' WHERE borrow_id = '$bo_id'");

                            ?>

                            <tr>
                            <tr>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['date_out']; ?></td>
                                <td><?php echo $row['due_date']; ?></td>
                                <td><?php echo $row['fine_amnt']; ?></td>
                                <td>
                                    <?php if($row['status'] == 1)
                                    {?>
                                        <a class="btn btn-primary btn-sm" href="<?php echo ADMIN_PATH; ?>return.php?id=<?php echo $row['borrow_id']; ?>"></i>
                                            Return Book</a>
                                        <?php
                                    }elseif ($row['status'] == 0) { ?>
                                        <button type="button" class="btn btn-success btn-sm">Returned</button>
                                    <?php } ?>

                                </td>
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
