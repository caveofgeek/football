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
$op=$_GET[op];
//del img
$part1="../post-s-img/$op";
@unlink ($part1);

//del post
$sql=mysql_query("delete from post where id='$id'")or die("ERROR $sql");

//del tag post
$sql3=mysql_query("delete from tag_post where post_id='$id'")or die("ERROR $sql3");

//del contact_del_post
$sql4=mysql_query("delete from contact_del_post where post_id='$id'")or die("ERROR $sql4");

mysql_close();
print "<meta http-equiv=refresh content=0;URL=list-del-data-category.php>";
?>
</body>
</html>
