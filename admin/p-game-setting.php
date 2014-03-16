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
$Submit=$_POST[Submit];
$gametime=htmlspecialchars($_POST[gametime]);
$win=htmlspecialchars($_POST[win]);
$lost=htmlspecialchars($_POST[lost]);
$title=htmlspecialchars($_POST[title]);
$description=htmlspecialchars($_POST[description]);
$keyword=htmlspecialchars($_POST[keyword]);
if($gametime!=""&&$win!=""&&$lost!=""){
$sql=mysql_query("UPDATE `game_config` SET `gametime`='$gametime' ,`yes`='$win' ,`no`='$lost',`title`='$title',`description`='$description',`keyword`='$keyword' WHERE `id`=1")or die("ERROR $sql");
echo "<meta http-equiv='refresh' content='0;url=game-setting.php'>";
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
