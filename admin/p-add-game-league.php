<?php
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//echo "$_SESSION[m_login]<br>$_SESSION["m_id"]";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}
$id=mysql_real_escape_string($_POST['id']);
$league=mysql_real_escape_string($_POST['league']);
//echo "$cate_name=[cate_name]<br>$title=[title]<br>$description=[description]<br>$keyword=[keyword]<br>$file1=[file1][name]<br>$tmp1=[file1][tmp_name]";
if($league!=""){
	//insert
	$sql=mysql_query("INSERT INTO `game_league` (`league`)VALUES ('$league')")or die("ERROR $sql");
	mysql_close();
	print "<meta http-equiv=refresh content=0;URL=all-game-league.php>";
}else{
?>
<script language="JavaScript">
	alert('ขอโทษครับ ท่านกรอกข้อมูลไม่ครบครับ');
	history.back();
</script>
<?php
exit();
}
?>
