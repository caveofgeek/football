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
$id=$_GET[id];

$sql=mysql_query("UPDATE `game_match` SET `game_status`='4' WHERE id='$id'")or die("ERROR $sql");

//select แต้มถูก ผิด
$sgame="select yes, no from game_config where id=1";
$regame=mysql_query($sgame) or die("ERROR $sgame");
$rgame=mysql_fetch_row($regame);
//echo $rgame[0];

//select ผลการแข่างขัน
$sql1="SELECT result, game_date FROM `game_match` WHERE id='$id'";
$result1=mysql_query($sql1) or die("ERROR $sql1");
$row1=mysql_fetch_row($result1);

//select หาคนทายถูก
$sql2="SELECT member_id, result FROM `game_play` WHERE game_id='$id' AND result='$row1[0]'";
$result2=mysql_query($sql2) or die("ERROR $sql2");
$num2=mysql_num_rows($result2);
if($num2>=1){
while($row2=mysql_fetch_row($result2)){

//insert game_member_score
$sql4=mysql_query("INSERT INTO `game_member_score` (`member_id` ,`yes` ,`no` ,`point` ,`date` )VALUES ('$row2[0]', '1', '0', '$rgame[0]', '$row1[1]')")or die("ERROR $sql4");

}
}

//select หาคนทายผิด
$sql3="SELECT member_id, result FROM `game_play` WHERE game_id='$id' AND result!='$row1[0]'";
$result3=mysql_query($sql3) or die("ERROR $sql3");
$num3=mysql_num_rows($result3);
if($num3>=1){
while($row3=mysql_fetch_row($result3)){

//insert game_member_score
$sql4=mysql_query("INSERT INTO `game_member_score` (`member_id` ,`yes` ,`no` ,`point` ,`date` )VALUES ('$row3[0]', '0', '1', '$rgame[1]', '$row1[1]')")or die("ERROR $sql4");

}
}

mysql_close();
echo "<meta http-equiv='refresh' content='0;url=all-game-match.php'>";
?>
</body>
</html>