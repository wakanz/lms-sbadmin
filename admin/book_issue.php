<?php
include "includes/topbar.php";
if(isset($_POST['submit']))
{
    issueBook();
}
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="col-10" style="margin: 0 auto;" >
            <div class="col-md-8" style="margin: 0 auto;">
            <div class="card shadow mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between mb-4 py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Issue Book</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="name">Book Name</label>
                                <select class="form-control" name="books" required>
                                    <option>Select Book Location.</option>
                                    <?php


                                    $query = "SELECT * FROM books";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>

                                            <option value="<?php echo $row['book_id']?>"><?php echo $row['book_name'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">User</label>
                                <select class="form-control" name="user" required>
                                    <option>Select Users</option>
                                    <?php


                                    $query = "SELECT * FROM users";
                                    $result = $db->query($query);



                                    /* associative array */
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            ?>



                                            <option value="<?php echo $row['user_id']?>"><?php echo $row['username'] ;?></option>
                                            <?php
                                        } }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="copies">Return Date</label>
                                <input placeholder="Selected date" type="text" id="datepicker" name="r_date" class="form-control datepicker" required>
                            </div>


                        <button name="submit" type="submit" class="btn btn-primary" >Issue</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

    </div>

<?php include "includes/footer.php"?>