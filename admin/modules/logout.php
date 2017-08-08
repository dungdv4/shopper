<?php
session_start();
if(!isset($_SESSION['isLoggin'])){
header("location:../index.php");

	}
	else{
session_destroy();
setcookie('user', $cookie_value, -1	, "/");
header("location:../index.php");
	}
  ?>
