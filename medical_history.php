<?php include ('inc/redirect.php'); ?>
<?php
unset($_SESSION['request']);
if(isset($_POST['continue']))
{
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$patientid = $_POST['patientid'];
$surname = $_POST['surname'];

$request = "SELECT * FROM diagnoses AS dg, ";
$request .= "registration AS rg ";
$request .= "WHERE (dg.patientid = '$patientid' AND dg.patientid = rg.patientid AND rg.surname = '$surname')";
if($start_date != NULL && $end_date != NULL){
$request .= " AND (dg.date_of_clinic BETWEEN '$start_date' AND '$end_date')";
}
$result= mysql_query($request);
$info=mysql_fetch_assoc($result);
 if(empty($patientid) || empty($surname) && (empty($start_date) || empty($end_date))){
		$_SESSION['error']= "Field(s) empty! Retry!";
		header('location:'.$_SERVER['PHP_SELF']);
	}
elseif($start_date == NULL && $end_date != NULL){
		$_SESSION['error']= "Invalid date range. Try Again!";
		header('location:'.$_SERVER['PHP_SELF']);
	}
elseif($start_date != NULL && $end_date == NULL){
		$_SESSION['error']= "Invalid date range. Try Again!";
		header('location:'.$_SERVER['PHP_SELF']);
	}
elseif($info == NULL){
		$_SESSION['error']= "Invalid entry/Date Not in range. Pls Try again! ";
		header('location:'.$_SERVER['PHP_SELF']);
}
else{ 
$_SESSION['start_date'] = $start_date;
$_SESSION['end_date'] = $end_date;
$_SESSION['patient'] = $patientid;
$_SESSION['surname'] = $surname;
$_SESSION['request'] = $request;
header('location:medical_history_report.php');
}
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
<form class="formreg" method="post"><table width="320" height="160">
<th class="tablehead">MEDICAL HISTORY</th>
<th colspan="2"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th><tr>
<td><label for="patient_hn">Patient HN:</label> 
<input  type="text" id="patientid" name="patientid" required /></td>
<td><label for="surname">Surname</label> 
<input  type="text" id="surname"  name="surname" required /></td>

</tr>
<tr>
<td><label for="start_date">Dated from:</label> 
<input  type="text" id="default" name="start_date" placeholder="dd/mm/yyyy"/></td>
<td><label for="end_date">to:</label> 
<input  type="text" id="custom" name="end_date" placeholder="dd/mm/yyyy"/></td>
<td>
<input  type="submit" name="continue" value="Continue" class="button" id="" /></td>
</tr></table>

</form>
<a href="p_diagnoses.php"><img src="Images/diagnoseshistory.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>