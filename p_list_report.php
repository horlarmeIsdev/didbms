<?php include ('inc/redirect.php'); ?>
<?php
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date'];
$category = $_SESSION['category'];
@$request = $_SESSION['request'];
$req = $request." ORDER BY rg.registration_date ASC";
$result= mysql_query($req);
if($result == NULL){
header('location:report.php');
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
<?php include ('inc/rptheader.php'); ?>

<table class="report" border="1">
  <th colspan="6" class="tablehead">PATIENTS' LIST <?php if($start_date != NULL && $end_date != NULL){ echo " BETWEEN ".$start_date." AND ".$end_date;} ?><?php if($category != NULL){echo " (".$category.")";}?></th>
          <tr style="background-color:#0FF;">
            <td class="tdtxt"><strong>S/N</strong></td>
            <td class="tdtxt"><strong>Patient HN</strong></td>
            <td class="tdtxt"><strong>Surname</strong></td>
            <td class="tdtxt"><strong>Other names</strong></td>
            <td class="tdtxt"><strong>Phone Number</strong></td>
            <td class="tdtxt"><strong>Gender</strong></td>
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
            <td width="100" class="tdtxt"><?php echo ucfirst($info['patientid']);?></td>
            <td width="120" class="tdtxt"><?php echo ucfirst($info['surname']);?></td>
            <td width="100" class="tdtxt"><?php echo ucfirst($info['othernames']) ;?></td>
            <td width="100" class="tdtxt"><?php echo ucfirst($info['mobile']);?></td>
            <td width="120" class="tdtxt"><?php echo ucfirst($info['gender']);?></td>
          </tr>
          
          
            
          <?php }?>         
           </table>
       <div align="right">
      <span><a href="#null" onclick="printContent('print_div')">
         <input type="button" value="Print" class="button" />
         </a></span>
         <span><form method="post">
           
           <input name="summary" type="submit" class="button" value="Summary" />
         </form></span>
         <?php if (isset($_POST['summary'])){include('inc/summary.php');}?>
           </div></div>

<?php include ('inc/footer.php'); ?>