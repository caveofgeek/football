<?php @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "inc/config.inc.php";
$email=$_POST['email'];

$title="select * from web_detail where id=1";
$titlere=mysql_query($title) or die("ERROR $title บรททัด4");
$titler=mysql_fetch_row($titlere);

if($email==""){
	?>
	<script language="JavaScript">
		alert('ขอโทษครับ กรุณากรอกอีเมล์ด้วยครับ');
		history.back();
	</script>
	<?php
}else{
	//check Email
	$s="select email from member where email='$email'";
	$re=mysql_query($s) or die("ERROR $s");
	$n=mysql_num_rows($re);
	if($n==0){
	?>
	<script language="JavaScript">
		alert('ไม่พบอีเมล์นี้ในระบบ กรุณาเช็คอีเมล์อีกครั้งครับ');
		history.back();
	</script>
	<?php
	}else{
	$s="select user, pass from member where email='$email'";
	$re=mysql_query($s) or die("ERROR $s");
	$r=mysql_fetch_row($re);
		$strTo = "$email";
		$strSubject = "=?UTF-8?B?".base64_encode("แจ้งข้อมูลการเข้าสู่ระบบสมาชิก $titler[1]")."?=";
		$strHeader .= "MIME-Version: 1.0' . \r\n";
		$strHeader .= "Content-type: text/html; charset=utf-8\r\n";
		$strHeader .= "From: $titler[1]<$titler[4]>\r\n";
		$strMessage = "ข้อมูลการเข้าสู่ระบบสมาชิก<br><br>
		ชื่อผู้ใช้ = $r[0]<br>
		รหัสผ่าน = $r[1]
		";
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
	?>
	<script language="JavaScript">
		alert('ระบบได้ทำการส่งข้อมูลไปให้ท่านแล้วครับ กรุณาเช็คอีเมล์ที่กล่องขาเข้า (Inbex) หรือ กล่องขยะ (Junkbox)');
		window.location = 'index.php';
	</script>
	<?php
	}
}
?>