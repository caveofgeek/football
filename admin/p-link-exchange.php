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
$links=mysql_real_escape_string($_POST['links']);
$data=mysql_real_escape_string($_POST['data']);
$op=mysql_real_escape_string($_POST['op']);
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];
$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$url=mysql_real_escape_string($_POST['url']);
$code=mysql_real_escape_string($_POST['code']);
$type=mysql_real_escape_string($_POST['type']);
$dm=date("d-m");
$y=date("Y")+543;
$date="$dm-$y";
if($links==1){
	$sql=mysql_query("update link_admin set data='$data' where id='2'")or die("ERROR $sql บรรทัด43");
	echo "<meta http-equiv='refresh' content='0;url=linkexchange.php'>";
}else if($links==2){
	if($file1!=""){
	$part="../banner/$op";
	@unlink ($part);
	@copy($tmp1,"../banner/$file1");
	$sql=mysql_query("update link_admin set data='$data', img='$file1' where id='1'")or die("ERROR $sql บรรทัด50");
	echo "<meta http-equiv='refresh' content='0;url=linkexchange.php'>";
	}else{
	$sql=mysql_query("update link_admin set data='$data' where id='1'")or die("ERROR $sql บรรทัด53");
	echo "<meta http-equiv='refresh' content='0;url=linkexchange.php'>";
	}
}else if($links==3){
	$sql=mysql_query("INSERT INTO `link_exchange` (`name` ,`email` ,`url` ,`code` ,`type` ,`date` ,`actived`)VALUES ('$name',  '$email',  '$url',  '$code',  '$type',  '$date',  '1'
)")or die("ERROR $sql บรรทัด62");
	echo "<meta http-equiv='refresh' content='0;url=linkexchange.php'>";
}
?>
</body>
</html>
