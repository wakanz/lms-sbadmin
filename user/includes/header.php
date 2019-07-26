<?php
// We need to use sessions
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../../index.php');
}elseif ($_SESSION['user_type'] != 1){
    header('location: ../../user/logout.php?action=not_admin');
}else{

}

define("BASE_URL","https://slms.me/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");

define("ADMIN_PATH", "/admin/");

define("USER_PATH", "/user/");

include(ROOT_PATH . "loader.php");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	 <title>Home</title>

	 <!-- Css Files -->
	 <link href="<?php echo USER_PATH ;?>assets/css//bootstrap.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//font-awesome.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//flaticon.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//slick-slider.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//fancybox.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//style.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//color.css" rel="stylesheet">
	 <link href="<?php echo USER_PATH ;?>assets/css//responsive.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">


	 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	 <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	 <![endif]-->
	</head>
	<body>

	 <!--// Main Wrapper \\-->
	 <div class="ereaders-main-wrapper">