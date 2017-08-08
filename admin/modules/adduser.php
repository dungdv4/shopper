<h1 class="page-header">
    <?php 
        $fistName=""; 
        $lastName=""; 
        $userName=""; 
        $email=""; 
        $phone=""; 
        $birthday=""; 
        $address=""; 
        $id=0;
        if(isset($_GET["uid"])){
            echo "Sửa";
            $id =$_GET["uid"];
            $sqlEdit='SELECT * FROM `user` WHERE user_id='.$_GET["uid"];
            $rowEdit = mysqli_query($conn,$sqlEdit);
            $dataEdit = mysqli_fetch_row($rowEdit);

            $fistName=$dataEdit[1]; 
            $lastName=$dataEdit[2]; 
            $userName=$dataEdit[3]; 
            $email=$dataEdit[5]; 
            $phone=$dataEdit[6]; 
            $birthday= date('d-m-Y',strtotime($dataEdit[8])) ; 
            $address=$dataEdit[12]; 

            // echo "<prE>";
            // print_r($dataEdit);
            // die;
        }else{
            echo "Thêm mới";
        }
    ?>
</h1>
<div class="panel panel-default">
	<div class="panel-heading">
        Thanh vien
    </div>
    <div class="panel-body">
    	<div class="row">
    		<div class="col-md-6">
    			<form role="form" method="post" action="index.php?module=xuLyUser">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>" />
                        <input class="form-control" type="text" name="fistName" id="firstName" placeholder="Nhap first name" value="<?php echo $fistName; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lastName" id="lastName" placeholder="Nhap lastName" value="<?php echo $lastName; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>userName</label>
                        <input class="form-control" type="text" name="userName" id="userName" placeholder="Nhap userName" value="<?php echo $userName; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Avata</label>
                        <input type="file" name="avata" id="avata" />
                    </div>
                    <?php  
                        if(!isset($_GET["uid"])){
                    ?>
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Nhap userName" />
                        </div>
                    <?php  
                        }
                    ?>
                    <div class="form-group">
                        <label>email</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="Nhap email" value="<?php echo $email; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input class="form-control" type="text" name="phone" id="phone" placeholder="Nhap phone" value="<?php echo $phone; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control" type="text" name="birthday" id="birthday" placeholder="Nhap birthday" value="<?php echo $birthday; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="radio" name="gender" id="male" value="1" /><label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="0" /><label for="female">Female</label>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <?php  
                        	$sqlProvince = "SELECT * FROM province";
                        	$result = mysqli_query($conn, $sqlProvince);
                        	// echo "<pre>";
                        	// print_r(mysqli_fetch_assoc($result));
                        	// die;
                        ?>
                        <select name="province" id="province" class="form-control" onchange="getDicttrict(this.value)">
                        	<option value="">--Chon Tinh--</option>
                        	<?php  
                        		while($row = mysqli_fetch_assoc($result)) {
                                    $selected ="";
                                    if($row["provinceid"]==$dataEdit[9]){
                                        $selected = "selected";
                                    }
	                        ?>
	                        	<option <?php echo $selected ?> value="<?php echo $row["provinceid"] ?>"><?php echo $row["name"] ?></option>
	                        <?php			
                        		}
                        	?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>District</label>
                        <?php  
                            if(isset($_GET["uid"])){
                                $sqlDict = "SELECT * FROM district WHERE provinceid=".$dataEdit[9];
                                $result = mysqli_query($conn, $sqlDict);
                            }
                        ?>
                        <select name="district" id="district" class="form-control" onchange="getWard(this.value)" >
                        	<option value="">--Chon Quan/Huyen--</option>
                            <?php  
                                if(isset($_GET["uid"])){
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $selected ="";
                                        if($row["districtid"]==$dataEdit[10]){
                                            $selected = "selected";
                                        }
                            ?>
                                <option <?php echo $selected ?> value="<?php echo $row["districtid"] ?>"><?php echo $row["name"] ?></option>
                            <?php           
                                }}
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ward</label>
                        <select name="ward" id="ward" class="form-control" >
                        	<option value="">--Chon Phuong/Xa--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" id="address" placeholder="Nhap address" value="<?php echo $address; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>is marital</label>
                       <select name="marital" id="marital" class="form-control" >
                        	<option value="">--Chon Fa/No</option>
                        	<option value="1">Is marrid</option>
                        	<option value="2">Fa</option>
                        </select>
                    </div>
                    <button type="submit" name="addNew" class="btn btn-default">
                        <?php  
                            if(isset($_GET["uid"])){
                                echo "Cập nhật";
                            }else{
                                echo "Thêm mới";
                            }
                        ?>
                    </button>
                </form>
    		</div>
    		<div class="col-md-6"></div>
    	</div>
    </div>
</div>