<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$id = $_GET['id'];

$sql = $db->query("DELETE FROM authors where author_id='$id'");

$_SESSION['message'] = "Author deleted!";

header('location: ../author_list.php');


$db->close();

