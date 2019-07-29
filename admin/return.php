<?php
include "includes/topbar.php";
if(isset($_POST['submit']))
{
    returnBook();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="col-md-8" style="margin: 0 auto;">
                <div class="card shadow mb-4">
                    <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Return Book</h6>
                    </div>

                    <div class="card-body">
<?php

$id = $_GET['id'];

$query = "SELECT borrow.borrow_id, borrow.due_date, users.username, books.book_name, fines.fine_amnt FROM borrow, books, users, fines WHERE borrow.borrow_id = '$id' AND books.book_id = borrow.book_id AND users.user_id = borrow.user_id AND fines.borrow_id = '$id'";
$result = $db->query($query);

/* associative array */
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
                        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                            <div class="form-group">
                            <input type="hidden" name="r_id" value="<?php echo $row['borrow_id']; ?>">
                            <input type="hidden" name="b_id" value="<?php echo $row['book_id']; ?>">
                            <div class="form-group">
                                <label for="description">Book Name</label>
                                <input disabled="disabled" type="text" class="form-control" value="<?php echo $row['book_name']; ?>" >
                            </div>

                            <div class="form-group">
                                <label for="fine">Fine Amount</label>
                                <input disabled="disabled" type="text" class="form-control" name="fine" value="<?php echo $row['fine_amnt']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="username">Borrowed By</label>
                                <input type="hidden" name="u_id" value="<?php echo $row['user_id']; ?>">
                                <input disabled="disabled" type="text" class="form-control" value="<?php echo $row['username']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="description">Return Date</label>
                                <input disabled="disabled" type="text" class="form-control" name="desc" value="<?php echo date('Y-m-d') ?>">
                            </div>
                            </div>


                            <button name="submit" type="submit" class="btn btn-primary" >Return</button>
                        </form>
        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include "includes/footer.php"?>