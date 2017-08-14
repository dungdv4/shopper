<?php
    ob_start();
    session_start();
	include("../../connection.php");
	if(!isset($_POST['submit'])){
		header("location:../index.php");
	}
	else{
	$inputEmail = $_POST['email'];
	$inputPassword = $_POST['password'];
$sqlCheckLogin = "SELECT * FROM user WHERE email = '$inputEmail' AND password = '$inputPassword'" ;

	$result = mysqli_query($conn, $sqlCheckLogin) or die($sqlCheckLogin);
	$data = mysqli_fetch_row($result);
	if(mysqli_num_rows($result) > 0){
		$_SESSION['isLoggin'] = "TRUE";
		$_SESSION['user'] =$data;
		//print_r($_SESSION['isLoggin']);
		//Xu ly luu cookie
			if(isset($_POST['remember']))
		{
$cookie_name = 'user';
$cookie_value = serialize($data);
setcookie($cookie_name, $cookie_value, time() + 86400, '/'); // 86400 = 1 day
/*	if(isset($_COOKIE[$cookie_name])){
	   // $cookie = $_COOKIE['cookie'];
	    die("Dung");
	}
	else{
	    die("Hung");
	}*/
		}
		header("location:../index.php");

		

	}
	else{
		header("location:login.php?error=true");
	}
	}
 ?>