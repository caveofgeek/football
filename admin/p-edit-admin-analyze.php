<?php
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION["m_id"]";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
$id=mysql_real_escape_string($_POST['id']);
$name=htmlspecialchars(mysql_real_escape_string($_POST['name']));
$op=mysql_real_escape_string($_POST['op']);
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];
$size1=$_FILES["file1"]["size"];
$user=htmlspecialchars(mysql_real_escape_string($_POST["user"]));
$pass=htmlspecialchars(mysql_real_escape_string($_POST["pass"]));
$date=date("Y-m-d");
if($name!=""&&$user!=""&&$pass!=""){
	if(isset($file1)&&$file1!=""){
		if($size1<=50000){
		$part="../mod/avatar/$op";
		@unlink ($part);
		$time=date("YnjHis");
		$rename="$time-$file1";
		@copy($tmp1,"../mod/avatar/$rename");
		$sql=mysql_query("UPDATE `admin_analyze` SET `name`='$name' ,`img`='$rename' ,`user`='$user' ,`pass`='$pass' WHERE id='$id'")or die("ERROR $sql");
		echo "<meta http-equiv='refresh' content='0;url=edit-admin-analyze.php?id=$id'>";
		}else{
?>
		<script language="JavaScript">
			alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 50kb ครับ');
			history.back();
        </script>
<?php

		}
	}else{
	$sql=mysql_query("UPDATE `admin_analyze` SET `name`='$name' ,`user`='$user' ,`pass`='$pass' WHERE id='$id'")or die("ERROR $sql");
	echo "<meta http-equiv='refresh' content='0;url=edit-admin-analyze.php?id=$id'>";
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
