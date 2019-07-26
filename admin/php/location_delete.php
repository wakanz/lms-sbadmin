<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$id = $_GET['id'];

$sql = $db->query("DELETE FROM locations where location_id='$id'");

$_SESSION['message'] = "Location deleted!";

header('location: ../location_list.php');


$db->close();

