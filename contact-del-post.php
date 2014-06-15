<?php
@session_start();
include "inc/config.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แจ้งลบข่าวสาร</title>
</head>

<body>
<?php
$topic_id=mysql_real_escape_string($_POST["topic_id"]);
$capcha=htmlspecialchars($_POST["capcha"]);
$rands=mysql_real_escape_string($_POST["rands"]);
$date=date("Y-n-j H:i:s");
if(isset($rands)&&isset($capcha)&&$rands==$capcha){
//insert
$insert=mysql_query("INSERT INTO `contact_del_post` (`post_id` ,`date`)VALUES ('$topic_id', '$date')") or die("ERROR $insert");
?>
<script language="JavaScript">
	alert('บันทึกข้อมูลเสร็จเรียบร้อย');
	window.location = 'index.php';
</script>
<?php
}else{
?>
<script language="JavaScript" type="text/javascript">
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ');
		history.back();
</script>
<?php } ?>
</body>
</html>
