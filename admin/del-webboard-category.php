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
$id=$_GET["id"];

//select img webboard
$sql5="SELECT id, img FROM `webboard` WHERE cate_id='$id'";
$re5=mysql_query($sql5) or die("ERROR $sql5");
while($r5=mysql_fetch_row($re5)){
//del img webboard
	$webboard="../webboard/board-img/$r5[1]";
	@unlink ($webboard);
//select img ans_webboard
$sql6="SELECT img FROM `ans_webboard` WHERE topic_id='$r5[0]'";
$re6=mysql_query($sql6) or die("ERROR $sql6");
while($r6=mysql_fetch_row($re6)){
//del img ans_webboard
	$ans_webboard="../webboard/board-img/$r6[0]";
	@unlink ($ans_webboard);
}
//del ans_webboard
$del_ans_webboard=mysql_query("DELETE FROM `ans_webboard` WHERE topic_id='$r5[0]'") or die ("ERROR del_ans_webboard");
}
//del webboard
$del_webboard=mysql_query("DELETE FROM `webboard` WHERE `cate_id`='$id'") or die ("ERROR del_webboard");
//del category
$sql2=mysql_query("DELETE FROM `webboard_category` WHERE id='$id'")or die("ERROR $sql2");
echo "<meta http-equiv='refresh' content='0;url=webboard-category.php'>";
?>
</body>
</html>
