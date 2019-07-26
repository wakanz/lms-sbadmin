<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

if(isset($_POST['submit']))
{


}

   // header('location: ../book_list.php');

die(mysqli_error($db));


$db->close();

