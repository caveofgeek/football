<?
session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION[admin_login])) {
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
<link href="css/justified-nav.css" rel="stylesheet">
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
$geo=$_POST[geo];
$province=htmlspecialchars($_POST[province]);
$s="select * from province where PROVINCE_NAME='$province'";
$re=mysql_query($s) or die("ERROR $s บรททัด38");
$num=mysql_num_rows($re);
if($num>=1){
?>
<script language="JavaScript">
	alert('ขอโทษครับ ชื่อจังหวัดนี้มีอยู่แล้วครับ');
	history.back();
</script>
<?
}else{
if($province!=""&&$geo!=""){
$sql=mysql_query("INSERT INTO `province` (`PROVINCE_NAME`, `GEO_ID`)VALUES ('$province', '$geo')")or die("ERROR $sql บรรทัด49");
echo "<meta http-equiv='refresh' content='0;url=province.php'>";
}else{
?>
<script language="JavaScript">
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ');
	history.back();
</script>
<?
}
}
?>
</body>
</html>