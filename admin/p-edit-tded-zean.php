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
$id=$_POST[id];
$zean_id=$_POST[zean_id];
$team1=htmlspecialchars($_POST[team1]);
$team2=htmlspecialchars($_POST[team2]);
$team3=htmlspecialchars($_POST[team3]);
$t_ded1=htmlspecialchars($_POST[t_ded1]);
$t_ded2=htmlspecialchars($_POST[t_ded2]);
$t_ded3=htmlspecialchars($_POST[t_ded3]);
$days=htmlspecialchars($_POST[days]);
$months=htmlspecialchars($_POST[months]);
$years=htmlspecialchars($_POST[years]);
$date="$years-$months-$days";
if($team1!=""&&$team2!=""&&$team3!=""){
$sql=mysql_query("UPDATE `tded_zean` SET `team1`='$team1' ,`tded1`='$t_ded1' ,`team2`='$team2' ,`tded2`='$t_ded2' ,`team3`='$team3' ,`tded3`='$t_ded3' ,`days`='$days' ,`months`='$months' ,`years`='$years' ,`post_date`='$date' WHERE id='$id'")or die("ERROR $sql");

mysql_close();
echo "<meta http-equiv='refresh' content='0;url=tded-zean.php?zean_id=$zean_id'>";
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