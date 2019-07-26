<?php

define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$rrr=$_GET['id'];
//$sss=$_SESSION['SESS_PRO_PIC'];
$filename=$rrr;
$date = date('m/d/Y h:i:s a', time());
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
header('Content-Transfer-Encoding: binary');
readfile($filename);

