<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$id = $_GET['id'];

$sql = $db->query("UPDATE fines set status = 0 where borrow_id='$id'") or die(mysqli_error($db));



header('location: ../fine_pay.php');


$db->close();

