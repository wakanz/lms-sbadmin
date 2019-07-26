<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");
//$id = $_GET['id'];

if (isset($_POST['confirm'])) {


    $Id = $_POST['r_id'];

//$Id = $db->insert_id;


//fines 0 -> not paid and 1-> paid
//borrow 1 -> not returned 0 -> returned book

    $sql = $db->query("UPDATE borrow, books SET borrow.status = '0', borrow.date_in = now(), books.book_qty = (book_qty + 1) WHERE borrow_id='$Id' AND borrow.book_id = books.book_id");
    $sql .= $db->query("UPDATE fines SET status = 1 WHERE borrow_id = '$Id'");


    header('location: ../book_return.php');
}


$db->close();



