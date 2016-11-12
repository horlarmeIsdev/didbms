<?php include ('inc/redirect.php'); ?>
<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
			<header>
			
				
<nav class="header_link" id="links">
<?php 
					if(isset($admin_user)){
					?>
					<a href="setting.php" id="tab_0">Admin</a>
                    <?PHP
					}
					?>
					<a href="home.php" id="tab_1"  class="current-tab">Homepage</a>
					<a href="reg_patient.php" id="tab_2" >Register Patient</a>
                    <a href="medicalprofile.php" id="tab_3">Medical Profile</a>
					<a href="diagnoses.php" id="tab_2">Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="content_2" class="main_container" align="center"></div>

<?php include ('inc/footer.php'); ?>