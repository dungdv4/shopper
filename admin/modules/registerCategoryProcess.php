<?php 
if(isset($_POST['addNew']))
{
	if(isset($_POST['cateid'])){

	}
	else{
		$categoryName = $_POST['cateName'];
		$status = 'deactive';
		if(isset($_POST['status'])){
			$status = 'active';
		}
		$datecreate = date("Y-m-d H:i:s");
		$insertCategoryQuery = "INSERT INTO `category` (cat_name,parent_id,status,data_create)";
		$insertCategoryQuery .= " VALUES ('$categoryName','0','$status','$datecreate')";

		mysqli_query($conn,$insertCategoryQuery) or die("Loi insert category".$insertCategoryQuery);
	}
}
else{
	header("location:index.php");
}


 ?>

