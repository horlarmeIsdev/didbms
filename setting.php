<?php include ('inc/redirect.php'); ?>
<?php
if(isset($admin_user)){
	
} else
{
	    session_destroy();
header('location:index.php');
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
<a href="delete_user.php"><img src="Images/delete_user.png" width="300" height="160" alt="patientlist"></a>
<a href="report.php"><img src="Images/more_rep.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>