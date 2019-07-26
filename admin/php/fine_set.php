<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit'])) {

    $fine = $_POST['fine'];


    $sql = $db->query("UPDATE settings SET fine = '$fine'");
  // die(mysqli_error($db));

    header('location: ../fine_set.php');



}

$db->close();