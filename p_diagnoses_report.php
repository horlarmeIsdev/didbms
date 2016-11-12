<?php include ('inc/redirect.php'); ?>
<?php
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date'];
$diagnosis = $_SESSION['diagnosis'];
$icdcode = $_SESSION['icdcode'];
@$request = $_SESSION['request'];
$req = $request." ORDER BY dg.date_of_clinic ASC";
$result= mysql_query($req);
if($result == NULL){
header('location:report.php');
}
?>

<?php include ('inc/doctype.php'); ?>
<?php include ('inc/top.php'); ?>
<?php include ('inc/rptheader.php'); ?>

    <p align="left" style="padding-left:30px; font-weight:bold;"><?php if ($diagnosis != NULL){echo "DIAGNOSIS: ".$diagnosis."&nbsp; &nbsp;&nbsp; &nbsp;";} ?>  <?php if($icdcode != NULL){ echo "ICD CODE: ".$icdcode; }?></p>
    
    <table align="center"  border="1" width="764" height="40" style="font-size:16px;   " >
      <th colspan="8" class="tablehead"> DIAGNOSES HISTORY <?php if($start_date != NULL && $end_date != NULL){ echo " BETWEEN ".$start_date." AND ".$end_date;} ?></th>
          <tr style="background-color:#0ff;">
            <td class="tdtxt"><strong>S/N</strong></td>
        	<td class="tdtxt" width="120"><strong>Patient HN</strong></td>
            <td class="tdtxt" width="80"><strong>Initials</strong></td>
            <td class="tdtxt" width="80"><strong>Gender</strong></td>
       <?php if(($diagnosis == NULL) && ($icdcode != NULL)){ ?>
        <td width="120" class="tdtxt"><strong>Diagnosis</strong></td>
        <?php }?>  
            <td class="tdtxt"><strong>Doctor</strong></td>
            <td class="tdtxt"><strong>Date of Clinic</strong></td>
            <td class="tdtxt"><strong>Remark</strong></td>
          </tr>
          <?php
		  $i=0;
          while(@$info=mysql_fetch_array($result)){
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
    	<td class="tdtxt" width="120"><?php echo ucfirst($info['patientid']) ;?></td>
        <td class="tdtxt" width="120"><?php echo ucfirst($info['othernames'][0]).".".$info['surname'][0]."." ;?></td>
        <td class="tdtxt" width="100"><?php echo ucfirst($info['gender']) ;?></td>
       <?php if(($diagnosis == NULL) && ($icdcode != NULL)){ ?>
       <td><table>
       <?php if($info['icdcode_1'] == $icdcode){ ?>
        <tr><td width="120" class="tdtxt"><?php echo $info['diagnosis_1'];?></td></tr>
        <?php }?> 
		<?php if($info['icdcode_2'] == $icdcode){ ?>
        <tr><td width="120" class="tdtxt"><?php echo $info['diagnosis_2'];?></td></tr>
        <?php }?>
		<?php if($info['icdcode_3'] == $icdcode){ ?>
        <tr><td width="120" class="tdtxt"><?php echo $info['diagnosis_3'];?></td></tr>
        <?php }?>
      </table></td>
		<?php }?>  
        <td class="tdtxt" width="80"><?php echo ucfirst($info['doctor_name']);?></td>
        <td width="120" class="tdtxt"><?php echo $info['date_of_clinic'];?></td>
        <td width="120" class="tdtxt"><?php echo $info['remark'];?></td>
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