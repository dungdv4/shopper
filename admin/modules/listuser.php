<h1 class="page-header">Danh sách</h1>
<div class="panel panel-default">
	<div class="panel-heading">
        Thanh vien
    </div>
    <div class="panel-body">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="table-responsive table-bordered">
    				<table class="table">
    					<tr>
    						<th>#</th>
    						<!-- <th>firstName</th>
    						<th>lastName</th> -->
    						<th>userName</th>
    						<th>avatar</th>
    						<th>email</th>
    						<th>mobile</th>
    						<th>gender</th>
    						<th>birthday</th>
    						<th>province</th>
    						<th>dictrict</th>
    						<th>ward</th>
    						<th>address</th>
    						<!-- <th>marital</th> -->
    						<th>Action</th>
    					</tr>
						<?php  
							$sqlUser = 'SELECT u.user_id,u.firstName,u.lastName,u.userName,';
							$sqlUser .= ' u.`password`,u.email,u.mobile,u.gender,u.birthday,';
							$sqlUser .= ' u.address,u.avatar,u.marital,u.data_create,p.`name` AS provinceName,';
							$sqlUser .= ' d.`name` AS dictName,w.`name` AS wardName FROM `user` AS u';
							$sqlUser .= ' INNER JOIN province AS p ON u.province = p.provinceid';
							$sqlUser .= ' INNER JOIN district AS d ON u.dictrict = d.districtid';
							$sqlUser .= ' INNER JOIN ward AS w ON u.ward = w.wardid';
							$result = mysqli_query($conn, $sqlUser);
							$i=0;
							while($row = mysqli_fetch_assoc($result)) {
								$i++;
						?>
	    					<tr>
	    						<td>
	    							<?php echo $i ?>
	    						</td>
	    						<td>
	    							<?php echo $row["userName"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["avatar"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["email"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["mobile"] ?>
	    						</td>
	    						<td>
	    							<?php echo ($row["gender"])?"Nam":"Nữ" ?>
	    						</td>
	    						<td>
	    							<?php echo date("d-m-Y",strtotime($row["birthday"])); ?>
	    						</td>
	    						<td>
	    							<?php echo $row["address"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["provinceName"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["dictName"] ?>
	    						</td>
	    						<td>
	    							<?php echo $row["wardName"] ?>
	    						</td>
	    						<td>
	    							<a href="index.php?module=adduser&uid=<?php echo $row["user_id"] ?>" class="fa fa-pencil"></a>
	    							<a href="index.php?module=deluser&uid=<?php echo $row["user_id"] ?>" class="fa fa-trash-o"></a>
	    						</td>
	    					</tr>
						<?php  
							}
						?>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>
</div>