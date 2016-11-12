<?php include ('inc/redirect.php'); ?>
<?php
if(isset($_POST['submit']))
{
$pusername=$_POST['login'];
$password=$_POST['password'];
$class->loginpatient($pusername,$password);	
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
			<header>
			
				
				<nav class="header_link"> <span style="color:#000;"><strong>Welcome to Patient portal</strong></span>
					<a href="reg_patient.php" id="tab_1" >Register</a>
					<a href="indexpatient.php" id="tab_2" class="current-tab">Login</a>
				</nav>
			</header>
			<section id="content_3" class="content"><p class="valform" align="center"><span style="color:#F00; font-size:14px; background-color:#FFF;"><?php echo $error; ?></span><span style="color:#00F; font-size:14px; background-color:#FFF;"><?php echo $ok; ?></span></p>
				<form class="form_login" method="post">
				    <p class="clearfix">
				        <label for="login">Patient HN</label>
				        <input type="text" name="login" id="login" placeholder="Username" required="required" />
				    </p>
				    <p class="clearfix">
				        <label for="password">Surname</label>
				        <input type="password" name="password" id="password" placeholder="Password" required="required" /> 
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