<?php
session_start();
@$error=$_SESSION['error'];
unset($_SESSION['error']);

@$ok=$_SESSION['ok'];
unset($_SESSION['ok']);
require_once "class.php";
$class= new pal();
$class->fconnect();
if(isset($_POST['submit']))
{
$uusername=$_POST['login'];
$password=$_POST['password'];
$class->login_user($uusername,$password);	
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
			<header>
			
				
				<nav class="header_link"> <span style="color:#000;"><strong>Select a login category</strong></span>
					<a href="index.php" id="tab_1" >Admin</a>
					<a href="index_user.php" id="tab_2" class="current-tab">User</a>
				</nav>
			</header>
			<section id="content_3" class="content"><p class="valform" align="center"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></p>
				<form class="form_login" method="post">
				    <p class="clearfix">
				        <label for="login">User ID</label>
				        <input type="text" name="login" id="login" placeholder="Username" required />
				    </p>
				    <p class="clearfix">
				        <label for="password">Password</label>
				        <input type="password" name="password" id="password" placeholder="Password" required /> 
				    </p>
				    <p class="clearfix">
				        <input type="checkbox" name="remember" id="remember">
				        <label for="remember">Remember me</label>
				    </p>
				    <p class="clearfix">
				        <input type="submit" name="submit" value="Sign in">
				    </p>       
				</form>​
			</section>
<div style="margin-top:140px"></div>
<?php include ('inc/footer.php'); ?>