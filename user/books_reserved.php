<?php
include "includes/navbar.php";
if (isset($_GET['id']))
{
    delReservedBook();

}
?>

    <!--// Main Content \\-->
    <div class="ereaders-main-content">

        <!--// Main Section \\-->
        <div class="ereaders-main-section">
            <div class="container">
                <div class="ereaders-book-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="myTable">
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

                            $user_id = $_SESSION['id'];
                            $query = "SELECT  reserved.reserve_id, reserved.r_date, reserved.status, books.book_name  FROM reserved, books WHERE reserved.book_id = books.book_id AND reserved.user_id = '$user_id' AND reserved.book_type = 1";


                            $result = $db->query($query);

                            /* associative array */
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                    <tr>
                                        <td class="col-8"><?php echo $row['book_name']; ?></td>
                                        <td><?php echo $row['r_date']; ?></td>
                                        <td>
                                            <?php if($row['status'] == 1){ ?>
                                                <button type="button" class="btn btn-success btn-sm">Accepted</button>
                                            <?php }elseif ($row['status'] == 0) { ?>
                                                <button type="button" class="btn btn-warning btn-sm">Pending</button>
                                            <?php } ?>
                                        </td>
                                        <td>
                            <a href="?id=<?php echo $row['reserve_id']; ?>">
                              Delete
                            </a>

                                        </td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
    <!--// Main Content \\-->


<?php include "includes/footer.php"; ?><?php
