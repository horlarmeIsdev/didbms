<?php include ('inc/redirect.php'); ?>
<?php
if(!isset($patientid)){
	header('location:indexpatient.php');
}
else
{
$getdata=mysql_query("SELECT * FROM registration WHERE patientid='$patientid'");
$data=mysql_fetch_assoc($getdata);
$patientid=$data ['patientid'];
$surname =$data ['surname'];
$othernames=$data ['othernames'];
$department=$data ['department'];
$dob=$data ['date_of_birth'];
$gender=$data ['gender'];
$level=$data ['level'];
$bloodgroup=$data ['bloodgroup'];
$mobile=$data ['mobile'];
$address=$data ['address'];
$noknames=$data ['noknames'];
$nokaddress=$data ['nokaddress'];
$nokphone=$data ['nokphone'];
}

?>

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
					<a href="home.php" id="tab_1"  >Homepage</a>
					<a href="reg_patient.php" >Register Patient</a>
                    <a href="medicalprofile.php" id="tab_3" class="current-tab">Medical Profile</a>
					<a href="diagnoses.php" id="tab_2">Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="content_2" class="main_container" align="center" style="height:450PX; overflow:hidden">
<div class="dashboard1" align="center" style="height:inherit"></div>
<div class="dashboard2" align="left">
      <table height="320px" class="patientinfo" cellspacing="7">
      
<th colspan="2" class="tablehead">PATIENT SOCIAL INFORMATION</th>
        <tr>
          <td>Patient HN</td><td width="237"><?php echo $patientid; ?></td></tr>
        <tr>
          <td>Surname</td><td><?php echo $surname; ?></td></tr>
          <tr>
          <td width="151">OtherNames</td><td><?php echo $othernames; ?></td>
        </tr>
        <tr>
          <td>Department</td><td><?php echo $department; ?></td></tr>
          <tr>
          <td>Date of Birth</td><td><?php echo $dob; ?></td>
        </tr>
        <tr>
          <td>Gender</td><td><?php echo $gender; ?></td></tr>
          <tr>
          <td>Level</td><td><?php echo $level; ?></td>
        </tr>
        <tr>
          <td>Blood Group</td><td><?php echo $bloodgroup; ?></td></tr>
          <tr>
          <td>Mobile</td><td><?php echo $mobile; ?></td>
        </tr>
        <tr>
          <td>ADDRESS</td><td><?php echo $address; ?></td></tr>
         <tr><td>N.O.K's Mobile No.</td><td><?php echo $nokphone; ?></td>
        <td colspan="2"><a href="updateprofile.php"><input type="submit" class="button" id="register" value="Edit Profile"/></a></td>
        </tr>
      </table></div>      
		  </div>

<?php include ('inc/footer.php'); ?>