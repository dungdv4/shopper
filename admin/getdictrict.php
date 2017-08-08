<?php  
    include("../connection.php");
    if(isset($_POST["id"])){
    	$id = $_POST["id"];
    	$sqlDict = "SELECT * FROM district WHERE provinceid='$id '";
    	$result = mysqli_query($conn, $sqlDict);
    }
?>

<option value="">--Chon Quan/Huyen--</option>
<?php  
	while($row = mysqli_fetch_assoc($result)) {
?>
	<option value="<?php echo $row["districtid"] ?>"><?php echo $row["name"] ?></option>
<?php			
	}
?>