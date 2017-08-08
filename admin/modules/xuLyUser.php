<?php  
	if(isset($_POST["addNew"])){
		
		$fistName = $_POST["fistName"];
		$lastName = $_POST["lastName"];
		$userName = $_POST["userName"];
		if(!$_POST["uid"]){
			$password = md5($_POST["password"]);
		}
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$birthday = date("Y-m-d",strtotime($_POST["birthday"])); 
		$gender = $_POST["gender"];
		$province = $_POST["province"];
		$district = $_POST["district"];
		$ward = $_POST["ward"];
		$address = $_POST["address"];
		$marital = $_POST["marital"];
		$datecreate = date("Y-m-d H:i:s");

		if(!$_POST["uid"]){
			$insertUser = "INSERT INTO `user` (firstName,lastName,userName,`password`,email,mobile,gender,birthday,province,dictrict,ward,address,avatar,marital,data_create)";
			$insertUser .= " VALUES ('$fistName','$lastName','$userName','$password','$email','$phone','$gender','$birthday','$province ','$district','$ward','$address','','$marital','$datecreate')";

			mysqli_query($conn,$insertUser) or die("Loi insert user".$insertUser);
		}else{
			//update
			$sqlUpdate="UPDATE `user` SET firstName='$fistName',lastName='$lastName',userName='$userName',email='$email',mobile='$phone',province='$province',";
			$sqlUpdate .=" dictrict='$district',ward='$ward',birthday='$birthday',avatar='',gender='$gender',marital='$marital ',address='$address' WHERE user_id=".$_POST["uid"];
			mysqli_query($conn,$sqlUpdate) or die("Loi update user".$sqlUpdate);

		}

		
		// echo "<script>alert('them thanh cong');window.location.href('index.php')</script>";
		header("location:index.php?module=listuser");
	}
?>