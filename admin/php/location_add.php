<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit'])) {

    $location_name = $_POST['name'];


    $sql = $db->query("INSERT INTO locations (location_name) VALUES ('$location_name')");
    //echo $sql->affectedRows();



    header('location: ../location_list.php');



}

$db->close();