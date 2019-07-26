<?php
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/mylms/");

include(ROOT_PATH . "init.php");

$books = $db->query('SELECT * FROM books')->fetchAll();



$db->close();