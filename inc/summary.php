<div align="center">
<table border="1">
<th class="tablehead" colspan="5"> SUMMARY</th>
<tr>
<td class="summary" bgcolor="#C8FDD3">Male</td>
<td class="summary" bgcolor="#C8FDD3">Female</td>
<td class="summary">Staff</td>
<td class="summary">Non-Staff</td>
<td class="summary">Student</td>
</tr>
<tr>
<td class="summary" bgcolor="#C8FDD3"><?php  
$malecnt = $request." AND (rg.gender = 'Male')";
$mcnt = mysql_query($malecnt);
$mcnt = mysql_num_rows($mcnt);
echo $mcnt;
?></td>
<td class="summary" bgcolor="#C8FDD3"><?php  
$fcnt = $request." AND (rg.gender = 'Female')";
$fcnt = mysql_query($fcnt);
$fcnt = mysql_num_rows($fcnt);
echo $fcnt;
?></td>
<td class="summary"><?php  
$sfcnt = $request." AND (rg.level = 'Staff')";
$sfcnt = mysql_query($sfcnt);
$sfcnt = mysql_num_rows($sfcnt);
echo $sfcnt;
?></td>
<td class="summary"><?php  
$nsfcnt = $request." AND (rg.level ='non-staff')";
$nsfcnt = mysql_query($nsfcnt);
$nsfcnt = mysql_num_rows($nsfcnt);
echo $nsfcnt;
?></td>
<td class="summary"><?php  
$sdcnt = $request." AND (rg.level LIKE '%%%L')";
$sdcnt = mysql_query($sdcnt);
$sdcnt = mysql_num_rows($sdcnt);
echo $sdcnt;
?></td>
</tr>
</table>
</div>