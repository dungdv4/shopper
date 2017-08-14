<?php  
    include("../connection.php");
    if(isset($_POST["id"])){
    	$id = $_POST["id"];
    	echo("aaaaa");
    	print_r($_FILES);
    }
    else{
    	echo("Error");
    }
?>

