<?php include ('inc/redirect.php'); ?>
<?php
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date'];
$category = $_SESSION['category'];
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

<table align="center"  border="1" width="764" height="40" style="font-size:16px;   " >
  <th colspan="7" class="tablehead">PATIENTS' ATTENDANCE <?php if($start_date != NULL && $end_date != NULL){ echo " BETWEEN ".$start_date." AND ".$end_date;} ?> <?php if($category != NULL){echo " (".$category.")";}?></th>
          <tr style="background-color:#0ff;">
            <td class="tdtxt"><strong>S/N</strong></td>
            <td class="tdtxt"><strong>Patient HN</strong></td>
            <td width="200"><table>
        <tr>    <td class="tdtxt" width="120"><strong>Diagnosis</strong></td>
            <td class="tdtxt" width="80"><strong>ICD Code</strong></td>
        </tr>

           </table> </td>
            <td class="tdtxt"><strong>Doctor's Name</strong></td>
            <td class="tdtxt"><strong>Date of Clinic</strong></td>
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
		    <td width="100" class="tdtxt"><?php echo ucfirst($info['patientid']) ;?></td>
		<td class="tdtxt" width="200"><table>
        <tr>    <td class="tdtxt" width="120"><?php echo ucfirst($info['diagnosis_1']) ;?></td>
            <td class="tdtxt" width="80"><?php echo ucfirst($info['icdcode_1']);?></td>
        </tr>
    <?php if(isset($info['diagnosis_2'])){
	
	  ?>  <tr>    <td class="tdtxt"><?php echo ucfirst($info['diagnosis_2']) ;?></td>
            <td class="tdtxt"><?php echo ucfirst($info['icdcode_2']);?></td>
        </tr>
        <?php }?>
    <?php if(isset($info['diagnosis_3'])){
		?>
                <tr>    <td class="tdtxt"><?php echo ucfirst($info['diagnosis_3']) ;?></td>
            <td class="tdtxt"><?php echo ucfirst($info['icdcode_3']);?></td>
        </tr>
        <?php }?>
        </table></td>
            <td width="120" class="tdtxt"><?php echo ucfirst($info['doctor_name']);?></td>
            <td width="120" class="tdtxt"><?php echo ucfirst($info['date_of_clinic']);?></td>
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