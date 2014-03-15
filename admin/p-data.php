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
$name=htmlspecialchars($_POST[name]);
$add=htmlspecialchars($_POST[add]);
$url=htmlspecialchars($_POST[url]);
$tel=htmlspecialchars($_POST[tel]);
$email=htmlspecialchars($_POST[email]);
$fax=htmlspecialchars($_POST[fax]);
$date_s=htmlspecialchars($_POST[date_s]);
$date_f=htmlspecialchars($_POST[date_f]);
$time_s=htmlspecialchars($_POST[time_s]);
$time_f=htmlspecialchars($_POST[time_f]);
$title=htmlspecialchars($_POST[title]);
$description=htmlspecialchars($_POST[description]);
$keyword=htmlspecialchars($_POST[keyword]);
if($name!=""&&$add!=""&&$tel!=""&&$email!=""&&$fax!=""&&$date_s!=""&&$date_f!=""&&$time_s!=""&&$time_f!=""&&$title!=""&&$description!=""&&$keyword!=""){
$sql=mysql_query("UPDATE `web_detail` SET  `name` =  '$name',`add` =  '$add',`tel` =  '$tel',`email` =  '$email',`fax` =  '$fax',`date_s` =  '$date_s',`date_f` =  '$date_f',`time_s` =  '$time_s',`time_f` =  '$time_f',`title` =  '$title',`description` =  '$description',`keyword` =  '$keyword',`url` =  '$url' WHERE `id` =1 LIMIT 1")or die("ERROR $sql");
echo "<meta http-equiv='refresh' content='0;url=data.php'>";
}else{
?>
<script language="JavaScript">
	alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ');
	history.back();
</script>
<?
}
?>
</body>
</html>
