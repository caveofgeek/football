<?php
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการร้านค้า ::.</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style4 {font-size: small; font-weight: bold; }
-->
</style></head>

<body>
<?php
$zean_id=$_POST[zean_id];
$team1=htmlspecialchars($_POST[team1]);
$team2=htmlspecialchars($_POST[team2]);
$team3=htmlspecialchars($_POST[team3]);
$t_ded1=htmlspecialchars($_POST[t_ded1]);
$t_ded2=htmlspecialchars($_POST[t_ded2]);
$t_ded3=htmlspecialchars($_POST[t_ded3]);
$days=htmlspecialchars($_POST[days]);
$months=htmlspecialchars($_POST[months]);
$years=htmlspecialchars($_POST[years]);
$date="$years-$months-$days";
if($team1!=""&&$team2!=""&&$team3!=""){
//select post_date และ zean_id
$s="SELECT * FROM `tded_zean` WHERE zean_id='$zean_id' AND post_date='$date'";
$re=mysql_query($s) or die("ERROR 1");
$n=mysql_num_rows($re);
//check post_date และ zean_id ว่าวันนี้โพสต์ไปแล้วหรือยัง
if($n==0){
$sql=mysql_query("INSERT INTO `tded_zean` (`zean_id` ,`team1` ,`tded1` ,`team2` ,`tded2` ,`team3` ,`tded3` ,`days` ,`months` ,`years` ,`post_date` )VALUES ('$zean_id', '$team1', '$t_ded1', '$team2', '$t_ded2', '$team3', '$t_ded3', '$days', '$months', '$years','$date')")or die("ERROR 2");

mysql_close();
echo "<meta http-equiv='refresh' content='0;url=tded-zean.php?zean_id=$zean_id'>";
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ วันที่ <?php echo $date; ?> คุณให้ทีเด็ดไปแล้วครับ'); 	
	history.back();
</script> 
<?php
}
}else{
?>
<script language="JavaScript">
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ');
	history.back();
</script> 
<?php
}
?>
</body>
</html>