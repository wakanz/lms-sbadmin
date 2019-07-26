<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit']))
{

    $id = $_POST['location_id'];

    $location_name            =           $_POST['name'];





    $sql = $db->query("UPDATE locations set location_name='$location_name' where location_id='$id'");
    //echo $sql->affectedRows();

    $_SESSION['message'] = "location updated!";

    header('location: ../location_list.php');

}else{
    return "required fields are missing";
}

$db->close();

