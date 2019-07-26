<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit'])) {

    $author_name = $_POST['name'];


    $sql = $db->query("INSERT INTO authors (author_name) VALUES ('$author_name')");
    //echo $sql->affectedRows();



    header('location: ../author_list.php');



}

$db->close();