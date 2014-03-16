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
$id=$_POST[id];
$league=$_POST[league];
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];
//echo "$cate_name=[cate_name]<br>$title=[title]<br>$description=[description]<br>$keyword=[keyword]<br>$file1=[file1][name]<br>$tmp1=[file1][tmp_name]";
if($league!=""&&$file1!=""){
	$time=date("YnjHis");
	$rename="$time-$file1";
	@copy($tmp1,"../league-icon/$rename");
	//insert
	$sql=mysql_query("INSERT INTO `league` (`league` ,`icon`)VALUES ('$league',  '$rename')")or die("ERROR $sql");
	mysql_close();
	print "<meta http-equiv=refresh content=0;URL=add-league.php>";
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
