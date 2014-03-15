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
$l_id=$_POST[l_id];
$home=htmlspecialchars($_POST[home]);
$away=htmlspecialchars($_POST[away]);
$odds_ball=htmlspecialchars($_POST[odds_ball]);
$t_ded=htmlspecialchars($_POST[t_ded]);
$detail=htmlspecialchars($_POST[detail]);
$time_live=htmlspecialchars($_POST[time_live]);
$ch_live=htmlspecialchars($_POST[ch_live]);
$score=htmlspecialchars($_POST[score]);
$days=htmlspecialchars($_POST[days]);
$months=htmlspecialchars($_POST[months]);
$years=htmlspecialchars($_POST[years]);
$date="$years-$months-$days";
if($home!=""&&$away!=""&&$odds_ball!=""&&$detail!=""&&$time_live!=""){
$sql=mysql_query("INSERT INTO `t_ded` (`l_id` ,`home` ,`away` ,`odds_ball` ,`t_ded` ,`t_ded_detail` ,`time_live` ,`ch_live` ,`score` ,`days` ,`months` ,`years` ,`post_date` )VALUES ('$l_id', '$home', '$away', '$odds_ball', '$t_ded', '$detail', '$time_live', '$ch_live', '$score', '$days', '$months', '$years', '$date')")or die("ERROR $sql บรรทัด 45");

$s="SELECT post_date FROM `t_ded` order by id desc limit 0, 1";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
echo "<meta http-equiv='refresh' content='0;url=league-t-ded.php?l_id=$l_id&tdate=$r[0]'>";
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