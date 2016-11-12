<?php include ('inc/redirect.php'); ?>
<?php
if(isset($admin_user)){
	
} else
{
	    session_destroy();
header('location:index.php');
}

if(isset($_POST['delete'])){
$uusername = $_POST['uusername'];	
$password = $_POST['password'];
$staffid = $_POST['staffid'];
	if(empty($uusername) || empty($password) || empty($staffid)){
			$_SESSION['error']="Field(s) empty! Re-try";
			header('location:'.$_SERVER['PHP_SELF']);	
	}
	else{
			$query = "DELETE FROM user WHERE username = '$uusername'";
			$result = mysql_query($query);
			$check=mysql_affected_rows();
			if($check>0){
			$_SESSION['ok'] = "User deleted successfully!";	
			header('location:'.$_SERVER['PHP_SELF']);
			}
			else{
			$_SESSION['error']="Not successful! Re-try";
			header('location:'.$_SERVER['PHP_SELF']);	
			}
	}
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
			<header>
			
				
<nav class="header_link" id="links">
<?php 
					if(isset($admin_user)){
					?>
					<a href="setting.php" id="tab_0" class="current-tab">Admin</a>
                    <?PHP
					}
					?>
					<a href="home.php" id="tab_1">Homepage</a>
                    <a href="medicalprofile.php" id="tab_3">Medical Profile</a>
					<a href="updateprofile.php" id="tab_2"  >Update Profile</a>
					<a href="diagnoses.php" id="tab_2" >Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="content_2" class="main_container" align="center">
<div class="dashboard1" align="center" style="background:none; margin-top:15px;">
<a href="add_user.php"><img src="Images/add_user.png" width="300" height="160" alt="patientlist"></a>
<a href="user_list.php"><img src="Images/view_users.png" width="300" height="160" alt="patientlist"></a>
</div>

<div class="dashboard2" align="left" style="background:none; margin-top:15px;">
<form class="formreg" method="POST"><table width="300" height="160">
<th class="tablehead">DELETE USER</th>
<th><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th>
<tr>
<td><label for="staffid">Staff No.:</label><br /> 
<input  type="text" id="start_date" name="staffid" /></td>
<td><label for="username">Username:</label><br /> 
<input  type="text" name="uusername" /></td>
</tr>
<tr><td><label for="password">Password:</label><br /> 
<input  type="text" name="password" /></td>
<td>
<input  type="submit" name="delete" value="Delete" class="button" id="" /></td>
</tr></table>

</form>
<a href="report.php"><img src="Images/more_rep.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>