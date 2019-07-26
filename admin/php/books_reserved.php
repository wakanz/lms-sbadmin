<?php

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");



if (isset($_POST['confirm'])) {


    $Id = $_POST['r_id'];
    $b_id = $_POST['b_id'];
    $user_id = $_POST['u_id'];
    $due_date =  date('Y-m-d', strtotime(str_replace('-', '/', $_POST['r_date'])));
    //$Id = $db->insert_id;



    $sql = $db->query("UPDATE borrow SET status = 1, date_out= now(),due_date = '$due_date' WHERE reserve_id = '$Id'");
    $sql .= $db->query("UPDATE reserved SET  status = 1 WHERE reserve_id = '$Id'");

    $sql .= $db->query("INSERT INTO fines (borrow_id) VALUES ('$Id')");

    $sql .= $db->query("UPDATE books SET book_qty = (book_qty - 1) WHERE book_id = '$b_id'");
    $sql .= $db->query("DELETE FROM reserved WHERE status = 1");

    if ($sql == TRUE) {
        $books = $db->query("SELECT * FROM books WHERE book_id = '$b_id'");

        while ($row = mysqli_fetch_assoc($books)) {
            $n = ucfirst('Admin'. ' ' . 'Approved' . ' ' . $row['book_name'] . ' ' . 'Request');
            $sql = $db->query("INSERT INTO notifications (user_id,notification,type) VALUES ('$user_id', '$n', 2)");
        }
    }



   header('location: ../books_reserved.php');



}

die(mysqli_error($db));

$db->close();
?>



