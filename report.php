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
<?php include ('inc/rptheader.php'); ?>

<div id="content_2" class="main_container" align="center">
<div class="dashboard1" align="center" style="background:none; margin-top:15px;">
<a href="p_list.php"><img src="Images/patientlist.png" width="300" height="160" alt="patientlist"></a>
<a href="p_attendance.php"><img src="Images/patientattendance.png" width="300" height="160" alt="patientlist"></a>
</div>

<div class="dashboard2" align="left" style="background:none; margin-top:15px;">
<a href="medical_history.php"><img src="Images/medicalhistory.png" width="300" height="160" alt="patientlist"></a>
<a href="p_diagnoses.php"><img src="Images/diagnoseshistory.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>