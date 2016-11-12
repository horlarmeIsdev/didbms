<?php
class pal
{
function fconnect()
	{
	$cnn=mysql_connect('localhost','root','') or die('Our server is down due to the following '.mysql_error());
	mysql_select_db('didbms',$cnn);
	}
	
function login($ausername,$password)
	{
		if(empty($ausername) || empty($password))
		{
			$_SESSION['error']="Field(s) must not be empty! Re-try";
header('location:'.$_SERVER['PHP_SELF']);	
		}
		else if($ausername==$password)
			{
			$_SESSION['error']="Invalid username or password! Try again";
			header('location:'.$_SERVER['PHP_SELF']);	
			}
			else
			{
			$getdata=mysql_query("SELECT * FROM admin WHERE username='$ausername' AND password='$password'");	
			$data=mysql_fetch_assoc($getdata);
			if($data['username']==$ausername && $data['password']==$password)
			{
			$_SESSION['ausername']=$ausername;
			header('location:home.php');
			}
			else
			{
			$_SESSION['error']='Invalid username and/or password!';
			header('location:'.$_SERVER['PHP_SELF']);	
			}
			}
}
	
function loginpatient($pusername,$password)
	{
		if(empty($pusername) || empty($password))
		{
			$_SESSION['error']="Field(s) must not be empty! Re-try";
			header('location:indexpatient.php');	
		}
		else if($pusername==$password)
			{
			$_SESSION['error']="Invalid username or password! New Patient <a href='reg_patient.php'>Register here</a> or Try again";
			header('location:indexpatient.php');	
			}
			else
			{
			$getdata=mysql_query("SELECT * FROM registration WHERE patientid='$pusername' AND surname='$password'");	
			$data=mysql_fetch_assoc($getdata);
			if($pusername ==$data['patientid'] && $password ==$data['surname'])
			{
			$_SESSION['patientid']=$pusername;
			header('location:medicalprofile.php');
			}
			else
			{
			$_SESSION['error']='Invalid username and/or password!';
			header('location:indexpatient.php');	
	exit;
			}
			}
}
function login_user($uusername,$password)
	{
		if(empty($uusername) || empty($password))
		{
			$_SESSION['error']="Field(s) must not be empty! Re-try";
			header('location:index_user.php');	
		}
		else if($uusername==$password)
			{
			$_SESSION['error']="Invalid username or password! Try again";
			header('location:index_user.php');	
			}
			else
			{
			$getdata=mysql_query("SELECT * FROM user WHERE username='$uusername' AND password='$password'");	
			$data=mysql_fetch_assoc($getdata);
			if($data['username']==$uusername && $data['password']==$password)
			{
			$_SESSION['uusername']=$uusername;
			header('location:home.php');
			}
			else
			{
			$_SESSION['error']='Invalid username and/or password!';
			header('location:index_user.php');	
			}
			}
}
	
function getdata($start_date, $end_date, $category)
	{
		$b=mysql_query("SELECT ".$data." FROM signup ORDER BY rand()");
		while($n=mysql_fetch_array($b,MYSQL_ASSOC))
		{
			$dt=$n[$data];
		}
		return $dt;
	}
	
function register($patientid,$surname,$othernames,$department,$bg,$gender,$level,$dob,$mobile,$address,
$noknames, $nokaddress,$nokphone, $reg_date, $pixname, $file_location, $ext)
{
if(empty($patientid) ||empty($surname) || empty($othernames) || empty($department) || empty($bg) || empty($gender) || empty($level) ||empty($dob) ||empty($mobile) || empty($address) ||
 empty($noknames) || empty( $nokaddress) ||empty($nokphone))
{
$_SESSION['error']="Field(s) Empty! Pls, Everyfield is required!";
header('location:reg_patient.php');

exit;
}

	if(strlen($mobile<11) || strlen($nokphone<11))
{
$_SESSION['error']="Please enter a valid phone number!";
header('location:reg_patient.php');
exit;
}
if($ext != ".jpg"){
$_SESSION['error']="Only Jpeg image is allowed, Try again!";
header('location:reg_patient.php');
exit;
}
$query="INSERT INTO registration VALUES ('$patientid','$surname','$othernames','$department','$bg','$gender','$level','$dob','$mobile','$address','$patient_status','$noknames','$nokaddress','$nokphone','$reg_date','$pixname')";
$result=mysql_query($query);

	if($result)
	{
	move_uploaded_file($file_location,'picture/'.$pixname);
	$_SESSION['ok']="Registration successfull! <a href='indexpatient.php'>Patient Login?</a>";
	@$_SESSION['patientid'] = NULL;
     header('location:reg_patient.php');
	}
	else
	{
	$_SESSION['error']="Registration not successful! TRY AGAIN";
	header('location:reg_patient.php');
	}
	exit;
	
}

function update_profile($patientid,$surname,$othernames,$department,$gender,$level,$mobile,$address, $noknames, $nokaddress,$nokphone, $pixname, $file_location)
{
	if(empty($surname) || empty($othernames) || empty($department) || empty($gender) || empty($level) ||empty($mobile) || empty($address) || empty($noknames) || empty($nokaddress) || empty($nokphone) || empty($pixname))
	{
	$_SESSION['error']="Field(s) must not be empty. Try again";
	header('location:'.$_SERVER['PHP_SELF']);
	}
	else if(isset($patientid))	
		{
			mysql_query("UPDATE registration SET surname='$surname', othernames='$othernames', department='$department', gender='$gender', level='$level', mobile='$mobile', address ='$address', noknames ='$noknames', nokaddress='$nokaddress', nokphone='$nokphone', patient_pix ='$pixname' WHERE patientid='$patientid'");
			$check=mysql_affected_rows();
			if($check>0)
			{
		 move_uploaded_file($file_location,'picture/'.$pixname);
			$_SESSION['ok'] = "Update successfull! Thank you!";	
	header('location:'.$_SERVER['PHP_SELF']);
			}
			else
			{
			$_SESSION['error']="Update not successfull! Changes Not saved! ";
			header('location:'.$_SERVER['PHP_SELF']);
			}
		}
	
}

}
?>