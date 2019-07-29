<?php
include "includes/topbar.php";
if (isset($_POST['submit'])) {
    confirmBook();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;">
            <div class="col-md-8" style="margin: 0 auto;">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Confirm Book</h6>
                    </div>

                    <div class="card-body">
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                            <?php

                            $id = $_GET['id'];
                            $query = "SELECT reserved.reserve_id, reserved.book_id, books.book_name, users.user_id, users.username  FROM reserved, books, users WHERE reserved.reserve_id = '$id' AND reserved.book_id = books.book_id AND reserved.user_id = users.user_id";
                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                    <input type="hidden" name="r_id" value="<?php echo $row['reserve_id']; ?>">
                                    <input type="hidden" name="b_id" value="<?php echo $row['book_id']; ?>">
                                    <input type="hidden" name="u_id" value="<?php echo $row['user_id']; ?>">
                                    <div class="form-group ">
                                        <label for="name">Book Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['book_name'] ?>"
                                               disabled>
                                    </div>

                                    <div class="form-group ">
                                        <label for="name">Requested By</label>
                                        <input type="text" class="form-control" value="<?php echo $row['username'] ?>"
                                               disabled>
                                    </div>

                                    <div class="form-group ">
                                        <label for="copies">Return Date</label>
                                        <input placeholder="Selected return date" type="text" id="datepicker"
                                               name="r_date" class="form-control datepicker" required>
                                    </div>

                                <?php }
                            } ?>
                            <button name="submit" type="submit" class="btn btn-primary">Issue</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include "includes/footer.php" ?>