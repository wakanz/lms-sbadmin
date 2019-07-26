<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit']))
{

    $id = $_POST['section_id'];

    $section_name            =           $_POST['name'];

    $sql = $db->query("UPDATE sections set section_name='$section_name' where section_id='$id'");
    //echo $sql->affectedRows();

    $_SESSION['message'] = "Author updated!";

    header('location: ../section_list.php');

}else{
    return "required fields are missing";
}

$db->close();

