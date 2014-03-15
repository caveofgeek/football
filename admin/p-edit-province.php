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
$Submit=$_POST[Submit];
$id=$_POST[id];
$geo=$_POST[geo];
$province=htmlspecialchars($_POST[province]);
//echo "$Submit=[Submit]<br>$cate=[cate]";
$s="select * from province where PROVINCE_NAME='$province' AND GEO_ID='$geo'";
$re=mysql_query($s) or die("ERROR MENU $s บรรทัด40");
$num=mysql_num_rows($re);
if($num>=1){
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ ชื่อจังหวัดนี้มีอยู่แล้วครับ'); 	
	history.back();
</script> 
<?php
}else{
if($province!=""&&$id!=""&&$geo!=""){
$sql=mysql_query("UPDATE `province` SET `PROVINCE_NAME`='$province', `GEO_ID`='$geo' WHERE PROVINCE_ID='$id'")or die("ERROR $sql บรรทัด51");
echo "<meta http-equiv='refresh' content='0;url=edit-province.php?id=$id'>"; 
}else{
?>
<script language="JavaScript"> 	
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
	history.back();
</script> 
<?php
}
}
?>
</body>
</html>