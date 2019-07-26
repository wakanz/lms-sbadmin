<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit']))
{

    $id = $_POST['author_id'];

    $author_name            =           $_POST['name'];





    $sql = $db->query("UPDATE authors set author_name='$author_name' where author_id='$id'");
    //echo $sql->affectedRows();

    $_SESSION['message'] = "Author updated!";

    header('location: ../author_list.php');

}else{
    return "required fields are missing";
}

$db->close();

