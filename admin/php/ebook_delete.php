<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$id = $_GET['id'];

$sql = $db->query("DELETE FROM ebooks where book_id='$id'");


header('location: ../ebook_list.php');


$db->close();
