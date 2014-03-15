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
<?
$Submit=$_POST[Submit];
$color=$_POST[color];
$op=$_POST[op];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$fix=$_POST[fix];
$repeat=$_POST[repeat];
if($file1!=""){
	//del img1
	$part1="../bg-img/$op";
	@unlink ($part1);
	@copy($tmp1,"../bg-img/$file1");
	//del img2

	$sql=mysql_query("UPDATE  `bg` SET  `color` =  '$color',`img` =  '$file1',`repeat` =  '$repeat',`fix` =  '$fix' WHERE  `id` ='1'") or die("ไม่แก้ไขเพิ่มข้อมูลได้ 50");
	mysql_close();
	echo "<meta http-equiv=refresh content=0;URL=bg.php>";
}else if($file1==""){

	$sql=mysql_query("UPDATE  `bg` SET  `color` =  '$color',`repeat` =  '$repeat',`fix` =  '$fix' WHERE  `id` ='1'") or die("ไม่แก้ไขเพิ่มข้อมูลได้ 55");
	mysql_close();
	echo "<meta http-equiv=refresh content=0;URL=bg.php>";
}
?>
</body>
</html>
