<header>
			
				
<nav class="header_link" id="links">
<?php 
					if(isset($admin_user)){
					?>
					<a href="setting.php" id="tab_0" >Admin</a>
                    <?PHP
					}
					?>
					<a href="home.php" id="tab_1">Homepage</a>
					<a href="reg_patient.php">Register Patient</a>
                    <a href="medicalprofile.php" id="tab_3">Medical Profile</a>
					<a href="updateprofile.php" id="tab_2"  >Update Profile</a>
					<a href="diagnoses.php" id="tab_2" >Add Diagnosis</a>
					<a href="report.php" id="tab_4" class="current-tab">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
</header>
<?php if(@$result != NULL){?>
<div id="print_div" class="main_container" align="center" style="height:auto;">
<p align="left" class="report_title" style="padding-left:30px;">DIDBMS: Diagnoses Index Database Management System</p>
<?php }?>