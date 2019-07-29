<?php

include_once "init/database.php";
include_once "init/functions.php";

require 'init/classes/Base.php';
require 'init/classes/Html.php';
require 'init/classes/Pdf.php';


//Data Sanitization
$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);