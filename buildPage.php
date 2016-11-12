<?php include ('inc/redirect.php'); ?>
<?php if(isset($_POST['register']))
{
$patientid= $_POST['patientid'];
$patient_status= $_POST['patient_status'];
$surname= $_POST['surname'];
$othernames= $_POST['othernames'];
$department=$_POST['department'];
$bg=$_POST['bg'];
$gender=$_POST['gender'];
$level=$_POST['level'];
$dob=$_POST['dob'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$noknames=$_POST['noknames'];
$nokaddress=$_POST['nokaddress'];
$nokphone = $_POST['nokphone'];
$reg_date = date("m/d/Y");
$class->register($patientid,$patient_status,$surname,$othernames,$department,$bg,$gender,$level,$dob,$mobile,$address,
$noknames, $nokaddress,$nokphone, $reg_date);
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
<?php include ('inc/header.php'); ?>
<div id="content_2" class="main_container" align="center">
          <form id="form1" name="form1" method="post" class="formreg">
      <table width="660" height="314" border="0" align="center" cellpadding="0" cellspacing="10" style="color:#000" >
      
<th colspan="2" style="border-style: solid double; border-color:#030; border-top:none; border-left:none; border-right:none;">PATIENT REGISTRATION</th>
<th colspan="2"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></th>
        <tr>         
          <td>Patient HN</td>
          <td><input name="patientid" type="text" id="patientid" required /></td>
          <td>Status</td>
          <td>
            <input name="patient_status" type="radio"  value="In-patient" checked="CHECKED" required />
            <label>In-patient</label><br/>
            <input name="patient_status" type="radio"  value="Out-patient" required />
            <label>Out-patient</label></td>
        </tr>
        <tr>
          <td>Surname</td>
          <td><input name="surname" type="text" id="surname" required/></td>
          <td>OtherNames</td>
          <td><input name="othernames" type="text" id="othername" required /></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><input name="department" type="text" id="department" required /></td>
          <td>Blood Group</td>
          <td><select name="bg" id="bg" style="width:150px">
            <option value="">Select BG</option>
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
          <td><select name="level" id="level" style="width:150px" onBlur="return category();">
            <option value="">Select Level</option>
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
          <td><input  name="dob" type="text" value="02/08/2011" id="dashboard" required /></td>

          <td>Mobile</td>
          <td><input name="mobile" type="text" id="mobile" placeholder="xxxx/xxx/xxxx" required /></td>
        </tr>
        <tr>
          <td>ADDRESS</td>
          <td><input name="address" type="text" id="address" value="" placeholder="address" /></td>
          <td>Next of Kin</td>
          <td><input name="noknames" type="text" id="phone" /></td>
        </tr>
        <tr >
          <td>N.O.K Address</td>
          <td><input name="nokaddress" type="text" id="address" value="" /></td>
          <td>N.O.K Phone No.</td>
          <td><input name="nokphone" type="text" id="phone" placeholder="xxxx/xxx/xxxx"/></td>
          <td><input name="register" type="submit" class="button" id="register" value="Register"/></td>
        </tr>
        
      </table>
      </form>
			</div>

<?php include ('inc/footer.php'); ?>