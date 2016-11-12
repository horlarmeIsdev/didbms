if(($diagnosis != NULL) && ($icdcode == NULL) ){
$request = "SELECT * FROM diagnoses AS t1, ";
$request .= "registration AS t2 ";
$request .= "WHERE t1.patientid = t2.patientid AND ((t1.diagnosis_1 = '$diagnosis') OR (t1.diagnosis_2 = '$diagnosis') OR (t1.diagnosis_3 = '$diagnosis')) ";
$request .= "AND t1.date_of_clinic BETWEEN '$start_date' AND '$end_date' ORDER BY t1.date_of_clinic ASC";
}
elseif(($diagnosis == NULL) && ($icdcode != NULL) ){
$request = "SELECT * FROM diagnoses AS t1, ";
$request .= "registration AS t2 ";
$request .= "WHERE t1.patientid = t2.patientid AND (t1.icdcode_1 = '$icdcode' OR t1.icdcode_2 = '$icdcode' OR t1.icdcode_3 = '$icdcode') ";
$request .= "AND t1.date_of_clinic BETWEEN '$start_date' AND '$end_date' ORDER BY t1.date_of_clinic ASC";
}

@$result= mysql_query($request);	
