<?php
session_start();
include "../inc/config.inc.php";
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
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: underline;
}
-->
</style></head>

<body>
<?php
$user=$_POST["user"];
$pass=$_POST["pass"];
$s="SELECT * FROM `admin` where user='$user' and pass='$pass'";
$re=mysql_query($s) or die("ERROR $s");
$num=mysql_num_rows($re);
$r=mysql_fetch_row($re);

if($num<=0){
?>
	<script language="JavaScript"> 	
		alert("ขออภัยครับ ข้อมูลผู้ดูแลระบบ ของท่านไม่มีอยู่ในระบบครับ"); 	
		window.location = 'index.php'; 
	</script> 
<?php
}
else {
$_SESSION["admin_login"]="admin_login";

echo "<meta http-equiv=refresh content=0;URL=data.php>";
}
?>
</body>
</html>
