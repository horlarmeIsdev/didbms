<?php
$username="root";
$pass="";
mysql_connect('localhost',$username,$pass);

?>


<?php

 if(mysql_query("CREATE DATABASE `didbms`")) {
   // echo "Database  created";
  } else {
    echo mysql_error();
  }

?>

<?php
 mysql_select_db('didbms');
$result = mysql_query("CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1; ");

?>

<?php
$result = mysql_query("INSERT INTO `admin` (`username`, `password`) VALUES
('admin01', 'officer'); ");


?>

<?php
 mysql_select_db('didbms');
$result = mysql_query("CREATE TABLE IF NOT EXISTS `diagnoses` (
`SN` bigint(11) unsigned NOT NULL,
  `patientid` varchar(20) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `diagnosis_1` varchar(50) NOT NULL,
  `icdcode_1` varchar(50) NOT NULL,
  `diagnosis_2` varchar(50) NOT NULL,
  `icdcode_2` varchar(50) NOT NULL,
  `diagnosis_3` varchar(50) NOT NULL,
  `icdcode_3` varchar(50) NOT NULL,
  `date_of_clinic` varchar(20) NOT NULL,
  `patient_cat` varchar(12) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ; ");

?>

<?php
$result = mysql_query("INSERT INTO `diagnoses` (`SN`, `patientid`, `doctor_name`, `diagnosis_1`, `icdcode_1`, `diagnosis_2`, `icdcode_2`, `diagnosis_3`, `icdcode_3`, `date_of_clinic`, `patient_cat`, `remark`) VALUES
(1, '', 'OLA', 'OLA', 'icdcode_1', 'OLA', 'icdcode_2', 'OLA', 'icdcode_3', '02/01/2012', '', ''),
(2, 'ST02012', 'OLU', 'OK', '21', 'OK2', '22', 'OK3', '23', '10/02/2014', '', ''),
(3, 'ST0004', 'ADENLE', 'MALARIA', '00454', 'COUGH', '0241', 'COLD', '2304', '10/05/2014', '', ''),
(4, 'ST00001', 'LEKAN', 'FEVER', '0235', 'COLD', '2304', 'COUGH', '0241', '10/04/2014', '', ''),
(5, 'ST02012', 'AJENIFUJA', 'OK', 'icdcode_1', '', '', '', '', '10/06/2014', '', ''),
(6, 'ST02012', 'LEKAN', 'COUGH', 'icdcode_1', 'FEVER', 'icdcode_2', 'MALARIA', 'icdcode_3', '10/05/2014', '', ''),
(7, 'ST02012', 'OLAMI', 'FEVER', '001', 'COUGH', '002', 'MALARIA', '003', '10/07/2014', '', ''),
(8, 'ST02012', 'myname', 'well', 'icdcode_1', 'good', 'icdcode_2', 'ok', 'icdcode_3', '10/07/2014', '', ''),
(9, 'ST02012', 'OLALEKAN', 'COUGH', '0241', 'FEVER', '0235', 'MALARIA', '00454', '10/06/2014', '', ''),
(10, 'ST000010', 'ADELEKE', 'MALARIA', 'J142', '', '', '', '', '10/05/2014', '', ''),
(11, 'ST000011', 'OLANRE', 'PLAMODIASIS', 'J142', '', '', '', '', '10/02/2014', '', ''),
(12, 'ST02012', 'lugh', 'lfyghj', 'lyfghjk', 'lyfghj', 'lfyghj', 'fyghj', 'ghj', 'liuvbgh', '', ''),
(13, 'ST02012', 'shjt', 'ahrf', 'srjt', '', '', '', '', 'asrhsdh', '', ''),
(14, 'ST02012', ';lhkj', 'glhj', ';hjlk', '', '', '', '', 'asgdhkl;', '', ''),
(15, 'ST02012', 'gaog', 'ogag', 'ogalhl', '', '', '', '', 'go', '', ''),
(16, 'ST02012', ';lghj', ';gkhjk', ';guhjk', '', '', '', '', 'al;tha', 'In-patient', ''); ");


?>

<?php
 mysql_select_db('didbms');
$result = mysql_query("CREATE TABLE IF NOT EXISTS `registration` (
  `patientid` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `othernames` varchar(25) NOT NULL,
  `department` varchar(50) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(80) NOT NULL,
  `patient_status` varchar(20) NOT NULL,
  `noknames` varchar(50) NOT NULL,
  `nokaddress` varchar(80) NOT NULL,
  `nokphone` int(11) NOT NULL,
  `registration_date` varchar(15) NOT NULL,
  `patient_pix` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 ");

?>
<?php
 mysql_select_db('didbms');
$result = mysql_query("INSERT INTO `registration` (`patientid`, `surname`, `othernames`, `department`, `bloodgroup`, `gender`, `level`, `date_of_birth`, `mobile`, `address`, `patient_status`, `noknames`, `nokaddress`, `nokphone`, `registration_date`, `patient_pix`) VALUES
('JYXE', 'XGDS', 'YJXETHCRGD', 'JTXHCGRF', 'A+', 'Male', 'staff', 'LKUJRF', '2147483647', 'LKCJ', 'In-patient', 'HCDGF', ';OLGKUYJ', 2147483647, '10/01/2014', ''),
('ST000008', 'OLAMIDE', 'OLAITAN', 'APH', 'AB+', 'Male', 'STAFF', '02/01/2011', '07032930000', 'FUNAAB', '', 'IDERA', 'ABEOKUTA', 2147483647, '10/14/2014', '3d2d1d625b66ace1d6b5'),
('ST00001', 'KUNLE', 'UNCLE JOE', 'MATHEMATICS', 'O+', 'Male', '400L', '02/08/2011', '2147483647', '11, ADETUNJI STREET, CAMP, ABEOKUTA', 'In-patient', 'AKIN', '11, ADETUNJI STREET, CAMP, ABEOKUTA', 2147483647, '10/02/2014', ''),
('ST000010', 'OLA', 'MAYOWA', 'CSC', 'O+', 'Female', '400L', '01/03/2001', '08121548721', 'CAMP, ANA', 'Out-patient', 'ADE', 'CAMP', 812154691, '10/08/2014', ''),
('ST000011', 'LEKAN', 'OLA', 'PBS', 'B+', 'Male', '200L', '02/08/2011', '08123568923', 'CAMP', 'In-patient', 'OLA', 'ABK', 2147483647, '10/08/2014', ''),
('ST0004', 'AKANDE', 'AHMED', 'CIVIL', 'B+', 'Male', 'non-staff', '02/08/2011', '81215487', 'ADIGBE', 'In-patient', 'AYOBAMI', '5, MY STREET, MYBUSTOP, IBADAN', 2147483647, '10/05/2014', 'c4a5b85d09b845955d4a'),
('ST00049', 'KEHINDE', 'ISMAIL', 'CSC', 'A+', 'Male', '200L', '02/08/2011', '08081960633', 'ABK', '', 'LEKAN', 'CAMP', 2147483647, '02/11/2014', '50e522999878d26c9e04'),
('ST00074', 'AKANDE', 'OLAITAN', 'APH', 'AB-', 'Male', '400L', '05/08/2011', '07032930000', 'FUNAAB', '', 'IDERA', 'ABEOKUTA', 2147483647, '02/11/2014', '89c9dbd8dcfa86befa7d'),
('ST02012', 'ABDULLAHI', 'MONSUR LEKAN', 'PBST', 'A+', 'Male', 'staff', '2012/07/03', '2147483647', 'UNAAB', 'In-patient', 'Idera-Oluwa', 'ABK', 2147483647, '10/04/2014', 'a92a356d294bbfe312a8'),
('ST02014', 'AKINOLA', 'SAMSON', 'CSC', 'A+', 'Male', '200L', '02/08/2011', '2147483647', 'UNAAB', 'Out-patient', 'OLA', 'ABK', 2147483647, '0000-00-00', ''),
('ST054', 'SULAIMON', 'ABDULLAHI', 'CIVIL', 'B+', 'Male', '500L', '18/08/2011', '08025814789', 'HOME', '', 'LEKAN', 'ABK', 2147483647, '02/11/2014', '97adefd1f7443cd7a12a'),
('ST1425', 'OLALEKAN', 'MONSUR', 'CSC', 'A+', 'Male', '500L', '02/08/2011', '08131167172', '4, CAMP, ABK', 'In-patient', 'NIKE', '5, NEXT MY HOUSE', 2147483647, '10/03/2014', ''); ");

?>

<?php
 mysql_select_db('didbms');
$result = mysql_query("CREATE TABLE IF NOT EXISTS `user` (
  `staffid` varchar(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1; ");

?>
<?php
 mysql_select_db('didbms');
$result = mysql_query("INSERT INTO `user` (`staffid`, `username`, `password`) VALUES
('0005', 'sp005', 'ajoke'),
('0055', 'sp055', 'adeleke'); ");
?>

<?php
 mysql_select_db('didbms');
$result = mysql_query("ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`); ");
 
 ?>
 <?php
 mysql_select_db('didbms');
$result = mysql_query(" ALTER TABLE `diagnoses`
 ADD PRIMARY KEY (`SN`); ");
 ?>
 
 <?php
 mysql_select_db('didbms');
$result = mysql_query(" ALTER TABLE `registration`
 ADD PRIMARY KEY (`patientid`); ");
 ?>

 <?php
 mysql_select_db('didbms');
$result = mysql_query(" ALTER TABLE `user`
 ADD PRIMARY KEY (`staffid`); ");
 ?>

 <?php
 mysql_select_db('didbms');
$result = mysql_query(" ALTER TABLE `user`
 ADD PRIMARY KEY (`staffid`); ");
 ?>

 <?php
 mysql_select_db('didbms');
$result = mysql_query("ALTER TABLE `diagnoses`
MODIFY `SN` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17; ");

?>