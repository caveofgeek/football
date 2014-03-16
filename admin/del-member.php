<?php
session_start();
include "../inc/config.inc.php";
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
</head>

<body>
<?php
$member_id=$_GET[member_id];

//select img
$sql="SELECT img FROM `member` WHERE id='$member_id'";
$re=mysql_query($sql) or die("ERROR select img");
$r=mysql_fetch_row($re);
//del รูป Avatar
	$part="../member/avatar/$r[0]";
	@unlink ($part);

//member
$del_member=mysql_query("delete from member where id='$member_id'") or die("ERROR $del_member");

//select webboard
$sql1="SELECT img FROM `webboard` WHERE member_id='$member_id'";
$re1=mysql_query($sql1) or die("ERROR select webboard");
while($r1=mysql_fetch_row($re1)){
//del รูปประกอบหลัก
	$partimgshow2="../webboard/board-img/$r1[0]";
	@unlink ($partimgshow2);
}
//del webboard 
$del_webboard=mysql_query("DELETE FROM `webboard` WHERE `member_id`='$member_id'") or die ("ERROR del_auction_tab");

//select ans_webboard
$sql2="SELECT img FROM `ans_webboard` WHERE member_id='$member_id'";
$re2=mysql_query($sql2) or die("ERROR select ans_webboard");
while($r2=mysql_fetch_row($re2)){
//del รูปประกอบหลัก
	$partimgshow2="../webboard/board-img/$r2[0]";
	@unlink ($partimgshow2);
}

//del ans_webboard 
$del_ans_webboard=mysql_query("DELETE FROM `ans_webboard` WHERE `member_id`='$member_id'") or die ("ERROR del_auction_tab");

//del game_play 
$del_game_play=mysql_query("DELETE FROM `game_play` WHERE `member_id`='$member_id'") or die ("ERROR del_auction_tab");

//del game_member_score 
$del_game_member_score=mysql_query("DELETE FROM `game_member_score` WHERE `member_id`='$member_id'") or die ("ERROR del_auction_tab");


echo "<meta http-equiv=refresh content=0;URL=all-member.php>"; 
exit(); 
?>
</body>
</html>
