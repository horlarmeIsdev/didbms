<?php session_start();
@$error=$_SESSION['error'];
unset($_SESSION['error']);

@$ok=$_SESSION['ok'];
unset($_SESSION['ok']);
require_once "class.php";
$class= new pal();
$class->fconnect();
@$admin_user = $_SESSION['ausername'];
@$user = $_SESSION['uusername'];
@$patientid =$_SESSION['patientid'];
if(isset($admin_user) || isset($user) || isset($patientid)){
	
} else
{
	    session_destroy();
		header('location:index.php');
}
?>