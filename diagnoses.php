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
$pixname = $data['patient_pix'];
$ext = strrchr($pixname,'.');

if (isset($_POST['add'])){
$date_of_clinic= $_POST['date_of_clinic'];
$diagnosis_1= $_POST['diagnosis_1'];
$doctor_name= $_POST['doctor_name'];
$icdcode_1= $_POST['icdcode_1'];
$diagnosis_2= $_POST['diagnosis_2'];
$icdcode_2= $_POST['icdcode_2'];
$diagnosis_3= $_POST['diagnosis_3'];
$icdcode_3= $_POST['icdcode_3'];
$patient_cat = $_POST['patient_cat'];
$remark = $_POST['remark'];
if(
empty($date_of_clinic)||
empty($diagnosis_1)||
empty($doctor_name)||
empty($icdcode_1)
)
{
$_SESSION['error']="No value is entered. Try Again!";
header('location:'.$_SERVER['PHP_SELF']);	
exit;
}
else{

mysql_query("INSERT INTO diagnoses (patientid, doctor_name, diagnosis_1, icdcode_1, diagnosis_2, icdcode_2, diagnosis_3, icdcode_3, date_of_clinic, patient_cat, remark) VALUES 
('$patientid','$doctor_name','$diagnosis_1','$icdcode_1','$diagnosis_2','$icdcode_2','$diagnosis_3','$icdcode_3','$date_of_clinic','$patient_cat','$remark')");
	$check=mysql_affected_rows();
	if($check>0)
{
$_SESSION['ok']="Record Saved";
header('location:'.$_SERVER['PHP_SELF']);	
exit;
}
else
$_SESSION['error']="Not successful! Pls Try Again.";
header('location:'.$_SERVER['PHP_SELF']);	
exit;
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
					<a href="setting.php" id="tab_0">Admin</a>
                    <?PHP
					}
					?>
					<a href="home.php" id="tab_1">Homepage</a>
					<a href="reg_patient.php" >Register Patient</a>
                    <a href="medicalprofile.php" id="tab_3">Medical Profile</a>
					<a href="updateprofile.php" id="tab_2"  >Update Profile</a>
					<a href="diagnoses.php" id="tab_2" class="current-tab">Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="content_2" class="main_container" align="center" style="height:420px;">
<div class="dashboard1" align="center" style="background:none;">
	<p class="tablehead">Patient Information</p>
	<p>&nbsp;</p>
	<table>
<tr> 
<td><a href="#"><img name="patient" src="picture/<?php echo @$pixname.'.jpg'; ?>" width="209" height="179" alt="Patient Picture" ></a></td>

</tr>    
<tr> 
<td>Patient HN: <?php echo $patientid; ?></td>
<td></td>
</tr>
<tr>
<td>Name: <?php 
$query = "SELECT * FROM registration WHERE patientid = '$patientid'";
$result = mysql_query($query);
$result= mysql_fetch_assoc($result);
echo $result['surname']." ".$result['othernames'];
?></td>
</tr>
<tr><td>Gender: <?php echo $result['gender']?></td></tr>
	</table>
</div>
<div class="dashboard2" align="left">
          <form class="formdiag" name="form1" method="post" action="diagnoses.php">
<table>

<tr><td colspan="2"><span style="color:#F00; font-size:15px; text-align:center"><?php echo $error; ?></span><span style="color:#00F; font-size:15px"><?php echo $ok; ?></span></td></tr>
<tr> 
<td>Clinic Date:</td>
<td>Doctor's Name:</td>
</tr>
<tr>
<td><input name="date_of_clinic" type="text" id="custom" placeholder="dd/mm/yyyy" required/></td>
<td><input name="doctor_name" type="text" placeholder="Doctor's name" required /></td>
</tr>
<tr>
<td>Diagnosis:</td>
<td>ICD Code:</td>
</tr>
<tr>
<td><input name="diagnosis_1" type="text" required /></td>
<td><input name="icdcode_1" type="text"   /></td></tr>
</tr>
<tr>
<td>Diagnosis:</td>
<td>ICD Code:</td>
</tr>
<tr>
<td><input name="diagnosis_2" type="text"  /></td>
<td><input name="icdcode_2" type="text"   /></td></tr>
</tr>
<tr>
<td>Diagnosis:</td>
<td>ICD Code:</td>
</tr>
<tr>
<td><input name="diagnosis_3" type="text"  /></td>
<td><input name="icdcode_3" type="text"  /></td>
</tr>
<tr>
<td> <input name="patient_cat" type="radio"  value="In-patient" checked="CHECKED" /><label>In-patient</label>
<br /><input name="patient_cat" type="radio"  value="Out-patient" /><label>Out-patient</label>
</td>
<td><label>Remark</label><input name="remark" type="text" required /></td>
</tr>
<tr>
<td colspan="2" align="right"><input name="add" type="submit" class="button" id="register" value="ADD"/></td>
</tr>
</table></form>
</div></div>
<?php include ('inc/footer.php'); ?>