<?php  
	if(isset($_GET["uid"])){
		$sqlDel = "DELETE FROM `user` WHERE user_id=".$_GET["uid"];
		mysqli_query($conn,$sqlDel) or die("Loi update user".$sqlDel);
		header("location:index.php?module=listuser");
	}
?>