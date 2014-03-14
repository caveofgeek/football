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
$type=htmlspecialchars($_POST[type]);
$id=htmlspecialchars($_POST[id]);
$league_id=htmlspecialchars($_POST[league_id]);
$home=htmlspecialchars($_POST[home]);
$away=htmlspecialchars($_POST[away]);
$score=htmlspecialchars($_POST[score]);
$result=htmlspecialchars($_POST[result]);
$days=htmlspecialchars($_POST[days]);
$months=htmlspecialchars($_POST[months]);
$years=htmlspecialchars($_POST[years]);
$game_time=htmlspecialchars($_POST[game_time]);
$date="$years-$months-$days";
if($league_id!=""&&$game_time!=""&&$home!=""&&$away!=""){

$sql=mysql_query("UPDATE `game_match` SET `league_id`='$league_id' ,`home`='$home' ,`away`='$away' ,`score`='$score' ,`result`='$result' ,`days`='$days' ,`months`='$months' ,`years`='$years' ,`game_date`='$date' ,`game_time`='$game_time' ,`game_status`='$type' WHERE id='$id'")or die("ERROR $sql");

mysql_close();
echo "<meta http-equiv='refresh' content='0;url=edit-game-match.php?id=$id&type=$type'>";
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