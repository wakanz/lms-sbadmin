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
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                                <th>Fine</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php


                            if (isset($_SESSION['name'])) {

                                $user_id = $_SESSION['id'];

                                $query = "SELECT borrow.borrow_id, borrow.date_out, borrow.due_date, borrow.status, ebooks.book_name, fines.fine_amnt FROM borrow INNER JOIN users ON  borrow.user_id = users.user_id INNER JOIN  ebooks ON  borrow.book_id = ebooks.book_id INNER JOIN fines ON fines.borrow_id = borrow.borrow_id WHERE borrow.user_id = '$user_id' AND borrow.book_type = 1 ORDER BY 'borrow' DESC ";

                                $result = $db->query($query);

                                /* associative array */
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $bo_id = $row['borrow_id'];
                                        $d = strtotime($row['due_date']);
                                        $c = strtotime(date("Y-m-d"));
                                        //$amount =  $row['fine'];
                                        $diff = $c -$d;
                                        $diff = $diff/(60*60*24);

                                        $diff =  $diff * 10;
                                        if ($diff >= 0) {
                                            $query = $db->query("UPDATE fines SET fine_amnt = '$diff' WHERE borrow_id = '$bo_id'");
                                        }


                                        ?>

                                        <tr>
                                            <td value><?php echo $row['book_name']; ?></td>
                                            <td><?php echo $row['date_out']; ?></td>b
                                            <td><?php echo $row['due_date']; ?></td>
                                            <td><?php echo $row['fine_amnt']; ?></td>
                                            <td>
                                                <?php if ($row['status'] == 1) { ?>
                                                    <a class="btn btn-warning btn-sm"></i>Not Returned</a>
                                                <?php } elseif ($row['status'] == 0) { ?>
                                                    <button type="button" class="btn btn-success btn-sm">Returned</button>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php } } } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--// Main Section \\-->

    </div>
    <!--// Main Content \\-->


<?php include "includes/footer.php"; ?><?php
