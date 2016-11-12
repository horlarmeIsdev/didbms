<?php include ('inc/redirect.php'); ?>
<?php
unset($_SESSION['request']);
if(isset($_POST['continue']))
{
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$category = $_POST['category'];
$level = "staff";
$level2 = "non-staff";
$level3 = "student";
$request = "SELECT * FROM registration AS rg WHERE ";
if($category == $level){
$request .= "(rg.level = '$level')";
}
elseif($category == $level2){
$request .= "(rg.level = '$level2')";
}
elseif($category == $level3){
$request .= "(rg.level LIKE '%%%L')";
}
else{
$request .= "((rg.level = '$level') OR ";
$request .= "(rg.level = '$level2') OR ";
$request .= "(rg.level LIKE '%%%L'))";
}
if($start_date != NULL && $end_date != NULL){
$request .= " AND (rg.registration_date BETWEEN '$start_date' AND '$end_date')";
}
$result = mysql_query($request);
$info= mysql_fetch_assoc($result);
 	if(empty($start_date) && empty($end_date) && empty($category)){
		$_SESSION['error']= "Field(s) empty. Re-try!";
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
		$_SESSION['error']= "No record found ";
		if($start_date != NULL && $end_date != NULL){$_SESSION['error'] .= "between ".$start_date." and ".$end_date;}
		header('location:'.$_SERVER['PHP_SELF']);
	}
else{ 
$_SESSION['start_date'] = $start_date;
$_SESSION['end_date'] = $end_date;
$_SESSION['category'] = $category;
$_SESSION['request'] = $request;
header('location:p_list_report.php');
}
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
<?php include ('inc/rptheader.php'); ?>

<div id="content_2" class="main_container" align="center">
<div class="dashboard1" align="center" style="background:none; margin-top:15px;">
<form class="formreg" method="POST"><table width="300" height="160">
<th class="tablehead">PATIENTS LIST</th>
<th><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th>
<tr>
<td><label for="start_date">Dated from:</label><br /> 
<input  type="text" id="custom" name="start_date" placeholder="dd/mm/yyyy" /></td>
<td><label for="end_date">to:</label><br /> 
<input  type="text" id="default" name="end_date" placeholder="dd/mm/yyyy" /></td>
</tr>
<tr><td><label for="category">Category</label><br /> 
<select name="category">
            <option value="">Select Level</option>
            <option value="staff">Staff</option>
            <option value="non-staff">Non Staff</option>
            <option value="student">Student</option></select></td>
<td>
<input  type="submit" name="continue" value="Continue" class="button"/></td>
</tr></table>

</form>
<a href="p_attendance.php"><img src="Images/patientattendance.png" width="300" height="160" alt="patientlist"></a>
</div>

<div class="dashboard2" align="left" style="background:none; margin-top:15px;">
<a href="medical_history.php"><img src="Images/medicalhistory.png" width="300" height="160" alt="patientlist"></a>
<a href="p_diagnoses.php"><img src="Images/diagnoseshistory.png" width="300" height="160" alt="patientlist"></a>
</div>
</div>

<?php include ('inc/footer.php'); ?>