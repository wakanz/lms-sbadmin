<?php

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");



if (isset($_POST['submit'])) {




    $book_id = $_POST['books'];
    $user_id = $_POST['users'];
    $due_date =  date('Y-m-d', strtotime(str_replace('-', '/', $_POST['r_date'])));
    //$Id = $db->insert_id;



    $sql = $db->query("INSERT INTO borrow (book_id,book_type,user_id,date_out,due_date) VALUES ('$book_id',1,'$user_id',now(),'$due_date')");

    $Id = $db->insert_id;

    $sql .= $db->query ("INSERT INTO fines (borrow_id) VALUES ('$Id')") or die(mysqli_error($db));


    $sql .= $db->query("UPDATE books SET book_qty = (book_qty - 1) where book_id = '$book_id'");




    header('location: ../book_issue.php');


}

$db->close();
?>



