<?php @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "../inc/config.inc.php";
$game_id=mysql_real_escape_string($_POST['game_id']);
$result=mysql_real_escape_string($_POST['result']);
$date=date("Y-m-d");
if($result!=""){
	$s=mysql_query("INSERT INTO `game_play` (`game_id` ,`member_id` ,`dategame` ,`result`)VALUES ('$game_id',  '$_SESSION[m_id]',  '$date',  '$result')") or die("ERROR INSERT บรรทัด22");
	mysql_close();
?>
	<script language="JavaScript">
		alert('บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ');
		window.location = 'index.php';
	</script>
<?php
}else{
	?>
	<script language="JavaScript">
		alert('ขอโทษครับ กรุณาเลือกทายผลด้วยครับ');
		history.back();
	</script>
	<?php
}
?>