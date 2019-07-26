<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit'])) {

    $section_name = $_POST['name'];

    $sql = $db->query("INSERT INTO sections (section_name) VALUES ('$section_name')");
    //echo $sql->affectedRows();



    header('location: ../section_list.php');



}

$db->close();