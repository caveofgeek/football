<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$game_id=$_POST[game_id];
$result=$_POST[result];
$date=date("Y-m-d");
if($result!=""){
	$s=mysql_query("INSERT INTO `game_play` (`game_id` ,`member_id` ,`dategame` ,`result`)VALUES ('$game_id',  '$_SESSION[m_id]',  '$date',  '$result')") or die("ERROR INSERT บรรทัด22");
	mysql_close();
?>
	<script language="JavaScript"> 	
		alert('บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ'); 	
		window.location = 'index.php'; 
	</script> 
<?
}else{
	?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ กรุณาเลือกทายผลด้วยครับ'); 	
		history.back();
	</script> 
	<?
}
?>