<?php include ('inc/redirect.php'); ?>
<?php if(!isset($patientid))
{
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
$date_register = $data['registration_date'];
if(isset($_POST['update'])){
$surname= $_POST['surname'];
$othernames= $_POST['othernames'];
$department=$_POST['department'];
$gender = $_POST['gender'];
$level=$_POST['level'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$noknames=$_POST['noknames'];
$nokaddress=$_POST['nokaddress'];
$nokphone = $_POST['nokphone'];
  $pixname=$_FILES["patient_pix"]["name"];
  $file_location=$_FILES["patient_pix"]["tmp_name"];
  
  $ext=strrchr($pixname,'.');
$pixname=md5($pixname.gmdate("His YMD"));
$pixname=substr($pixname,0,20);
$pixname=$pixname.$ext;
$class->update_profile($patientid, $surname,$othernames,$department,$gender,$level,$mobile,$address, $noknames, $nokaddress,$nokphone, $pixname, $file_location);
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
					<a href="#" id="tab_2"  class="current-tab">Update Profile</a>
					<a href="diagnoses.php" id="tab_2">Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="content_2" class="main_container" align="center">
          <form id="form1" name="form1" method="post" class="formreg" enctype="multipart/form-data">
      <table width="660" height="314" border="0" align="center" cellpadding="0" cellspacing="10" >
      
<th colspan="2" class="tablehead">PATIENT REGISTRATION</th>
<th colspan="2"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th>
        <tr>         
          <td>Patient HN</td>
          <td><input name="patientid" type="text" disabled="disabled" id="patientid" value="<?php echo $patientid; ?>" /></td>
          <td>Change Passport</td>
          <td colspan="2"><input type="file" name="patient_pix" title="Please select JPEG file only" /></td>
        </tr>
        <tr>
          <td>Surname</td>
          <td><input name="surname" type="text" id="surname" value="<?php echo $surname; ?>"/></td>
          <td>OtherNames</td>
          <td><input name="othernames" type="text" id="othername" value="<?php echo $othernames; ?>" /></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><input name="department" type="text" id="department" value="<?php echo $department; ?>" /></td>
          <td>Blood Group</td>
          <td><select name="bg" id="bg" style="width:150px" disabled="disabled">
            <option value="<?php echo $bloodgroup; ?>" selected><?php echo $bloodgroup; ?></option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select></td>

        </tr>
        <tr>
          <td>Gender</td>
          <td><label>
            <input name="gender" type="radio"  value="Male" checked="CHECKED" />
            Male</label>
            <input name="gender" type="radio"  value="Female" />
            Female</td>
          <td>Category/Level</td>
          <td><select name="level" id="level" style="width:150px" onBlur="return category();" >
            <option value="<?php echo $level; ?>" selected><?php echo $level; ?></option>
            <option value="100L">100L</option>
            <option value="200L">200L</option>
            <option value="300L">300L</option>
            <option value="400L">400L</option>
            <option value="500L">500L</option>
            <option value="600L">600L</option>
            <option value="700L">700L</option>
            <option value="STAFF">STAFF</option>
            <option value="NON STAFF">NON STAFF</option>
          </select></td>
        </tr>
        <tr>
          <td>Date of Birth</td>
          <td><input  name="dob" type="text" id="dashboard" value="<?php echo $dob; ?>" disabled /></td>

          <td>Mobile</td>
          <td><input name="mobile" type="text" id="mobile" placeholder="xxxx/xxx/xxxx" value="<?php echo $mobile; ?>" /></td>
        </tr>
        <tr>
          <td>ADDRESS</td>
          <td><input name="address" type="text" id="address" placeholder="address" value="<?php echo $address; ?>" /></td>
          <td>Next of Kin</td>
          <td><input name="noknames" type="text" id="phone" value="<?php echo $noknames; ?>" /></td>
        </tr>
        <tr >
          <td>N.O.K Address</td>
          <td><input name="nokaddress" type="text" id="address" value="<?php echo $nokaddress; ?>" /></td>
          <td>N.O.K Phone No.</td>
          <td><input name="nokphone" type="text" id="phone" placeholder="xxxx/xxx/xxxx" value="<?php echo $nokphone; ?>"/></td>
          <td><input name="update" type="submit" class="button" id="update" value="Update"/></td>
        </tr>
        
      </table>
      </form>
<?php }?>
			</div>

<?php include ('inc/footer.php'); ?>