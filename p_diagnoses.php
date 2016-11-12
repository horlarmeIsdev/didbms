<?php include ('inc/redirect.php'); ?>
<?php
unset($_SESSION['request']);
if(isset($_POST['continue']))
{
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$diagnosis = $_POST['diagnosis'];
$icdcode = $_POST['icdcode'];
$request = "SELECT * FROM diagnoses AS dg, ";
$request .= "registration AS rg WHERE (dg.patientid = rg.patientid) AND ";
if(($diagnosis != NULL) && ($icdcode == NULL)){
$request .= "(dg.diagnosis_1 ='$diagnosis' OR dg.diagnosis_2 = '$diagnosis' OR dg.diagnosis_3 ='$diagnosis')";
}
elseif(($diagnosis == NULL) && ($icdcode != NULL)){
$request .= "(dg.icdcode_1 = '$icdcode' OR dg.icdcode_2 = '$icdcode' OR dg.icdcode_3 = '$icdcode')";
}
elseif(($diagnosis != NULL) && ($icdcode != NULL)){
$request .= "((dg.diagnosis_1 ='$diagnosis' AND dg.icdcode_1 = '$icdcode') ";
$request .= "OR (dg.diagnosis_2 = '$diagnosis' AND dg.icdcode_2 = '$icdcode') ";
$request .= "OR (dg.diagnosis_3 ='$diagnosis' AND dg.icdcode_3 = '$icdcode'))";
}
if($start_date != NULL && $end_date != NULL){
$request .= " AND (dg.date_of_clinic BETWEEN '$start_date' AND '$end_date')";
}
$result= mysql_query($request);
$info=mysql_fetch_assoc($result);
 	if(empty($start_date) && empty($end_date) && empty($diagnosis) && empty($icdcode)){
		$_SESSION['error']= "Field(s) empty! Try again!";
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
		$_SESSION['error']= "Invalid Entry/No record found ";
		if($diagnosis != NULL){$_SESSION['error'] .= "for ".$diagnosis;}
		if($icdcode != NULL){$_SESSION['error'] .= " (".$icdcode.")";}
		header('location:'.$_SERVER['PHP_SELF']);
	}
else{ 
$_SESSION['start_date'] = $start_date;
$_SESSION['end_date'] = $end_date;
$_SESSION['diagnosis'] = $diagnosis;
$_SESSION['icdcode'] = $icdcode;
$_SESSION['request'] = $request;
header('location:p_diagnoses_report.php');
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
<form class="formreg" method="POST"><table width="320" height="160">
<th class="tablehead">DIAGNOSES HISTORY</th><th colspan="2"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th>
<tr>
<td><label for="patient_hn">Diagnosis:</label> 
<input  type="text" name="diagnosis" id="diagnosis"  placeholder="diagnosis" /></td>
<td><label for="surname">ICD Code</label> 
<input  type="text"  name="icdcode" placeholder="icd code if available"/></td>

</tr>
<tr>
<td><label for="start_date">Dated from:</label> 
<input  type="text" id="default" name="start_date" placeholder="dd/mm/yyyy"/></td>
<td><label for="end_date">to:</label> 
<input  type="text" id="custom" name="end_date" placeholder="dd/mm/yyyy"/></td>
<td>
<input  type="submit" name="continue" value="Continue" class="button" /></td>
</tr></table>

</form>
<a href="medical_history.php"><img src="Images/medicalhistory.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>