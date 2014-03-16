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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
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

//del game_league
$sql=mysql_query("delete from game_league where id='$id'")or die("ERROR $sql");

//select game_id from game_match
$s="SELECT id FROM `game_match` where league_id='$id'";
$re=mysql_query($s) or die("ERROR $s");
while($r=mysql_fetch_row($re)){
//del game_play
$sql3=mysql_query("delete from game_play where game_id='$r[0]'")or die("ERROR $sql3");
}

//del game_match
$sql2=mysql_query("delete from game_match where league_id='$id'")or die("ERROR $sql2");

echo "<meta http-equiv='refresh' content='0;url=all-game-league.php'>";
?>
</body>
</html>
