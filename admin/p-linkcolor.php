<?
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION[m_id]";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
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
<?
$Submit=$_POST[Submit];
$color=$_POST[color];
$visit=$_POST[visit];
$rollover=$_POST[rollover];
$active=$_POST[active];
//echo "$color=[color]<br>$visit=[visit]<br>$rollover=[rollover]<br>$active=[active]";

$sql=mysql_query("update `link` set `color`='$color' ,`visit`='$visit' ,`rollover`='$rollover' ,`active`='$active' where id='1'")or die("ERROR $sql บรรทัด46");
echo "<meta http-equiv='refresh' content='0;url=linkcolor.php'>"; 

?>
</body>
</html>
