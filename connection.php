<?php  
	$serverName="localhost";
	$userName = "root";
	$password = "";
	$dataBase="shopper";
	$conn = mysqli_connect($serverName,$userName,$password,$dataBase) or die("Lỗi kết nối");
	mysqli_set_charset($conn,"utf8");
?>