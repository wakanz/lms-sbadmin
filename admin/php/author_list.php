<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");
include_once (ROOT_PATH ."loader.php");

$books = $db->query('SELECT * FROM books')->fetchAll();



$db->close();