<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$submit=$_POST[Submit];
$name=htmlspecialchars($_POST[name]);
$email=htmlspecialchars($_POST[email]);
$url=htmlspecialchars($_POST[url]);
$code=$_POST[code];
$type=$_POST[type];
$ask=$_POST[ask];
$ans=$_POST[ans];
$dm=date("d-m");
$y=date("Y")+543;
$date="$dm-$y";
if(isset($submit)&&$submit=="บันทึกข้อมูล"&&$name!=""&&$email!=""&&$url!=""&&$code!=""&&$ans!=""){
	//check ผลบวก
	if(isset($ask)&&isset($ans)&&$ask==$ans){
	$sql=mysql_query("INSERT INTO `link_exchange` (`name` ,`email` ,`url` ,`code` ,`type` ,`date` ,`actived`)VALUES ('$name',  '$email',  '$url',  '$code',  '$type',  '$date',  '0'
)")or die("ERROR $sql บรรทัด18");
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
		alert('ขอโทษครับ คุณบวกเลขไม่ถูกต้องครับ'); 	
		history.back();
	</script> 
	<?
	}
}else{
	?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกข้อมูลไม่ครบครับ'); 	
		history.back();
	</script> 
	<?
}
?>