<?php include ('inc/redirect.php'); ?>
<?php
if(isset($admin_user)){
	
} else
{
	    session_destroy();
header('location:index.php');
}
$request = "SELECT * FROM user";
$result= mysql_query($request);	

?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
<header>
			
				
<nav class="header_link" id="links">
<?php 
					if(isset($admin_user)){
					?>
					<a href="setting.php" id="tab_0" class="current-tab">Admin</a>
                    <?PHP
					}
					?>
					<a href="home.php" id="tab_1">Homepage</a>
                    <a href="medicalprofile.php" id="tab_3">Medical Profile</a>
					<a href="updateprofile.php" id="tab_2"  >Update Profile</a>
					<a href="diagnoses.php" id="tab_2" >Add Diagnoses</a>
					<a href="report.php" id="tab_4">Report</a>
					<a href="home.php" id="tab_5">About</a>
					<a href="logout.php" id="tab_6">Logout</a>
				</nav>				
			</header>
<div id="print_div" class="main_container" align="center">
<p style="font-family:'Arial Black', Gadget, sans-serif; font-weight:600; font-size:16px;">DIDBMS: Diagnoses Index Database Management System</p>
<?php $num=mysql_num_rows($result); mysql_close();?>
<table align="center"  border="0" width="764" height="40" style="font-size:16px;   " >
  <th colspan="4" class="tablehead">USERS' LIST </th>
          <tr style="background-color:#666666;">
            <td class="tdtxt"><strong>S/N</strong></td>
            <td class="tdtxt"><strong>Staff Number</strong></td>
            <td class="tdtxt"><strong>Username</strong></td>
            <td class="tdtxt"><strong>Password</strong></td>
          </tr>
          <?php
		  $i=0;
          while($info=mysql_fetch_assoc($result)){
					$i=$i+1;
					if($i%2==0){
						$bg="#D6D6D6";
					}
					else{
					$bg="#FFF";
					}
					
					?>
            <?php echo "<a href=''>" ?>  
                 
          <tr style="background-color:<?php echo $bg;  ?>; text-align:left" >
          
          
            <td width="30" class="tdtxt"><?php echo $i;   ?>&nbsp;</td>
            <td width="100" class="tdtxt"><?php echo ucfirst($info['staffid']);?></td>
            <td width="120" class="tdtxt"><?php echo ucfirst($info['username']);?></td>
            <td width="100" class="tdtxt"><?php echo ucfirst($info['password']) ;?></td>
          </tr>
          
          
            
          <?php }?>         
           </table>
           <div align="right"><a href="#null" onclick="printContent('print_div')"><input name="Submit" type="submit" class="button" value="Print" /></a></div>
</div>

<?php include ('inc/footer.php'); ?>