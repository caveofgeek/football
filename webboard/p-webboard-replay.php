<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
$topic_id=$_POST[topic_id];
$cate_id=$_POST[cate_id];
$topic=$_POST[topic];
$user=$_POST[user];
$pass=$_POST[pass];
$detail=addslashes($_POST[input]);
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
$capcha=$_POST[capcha];
$rands=$_POST[rands];
$date=date("Y-n-j H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
//check capcha
if(isset($rands)&&isset($capcha)&&$rands==$capcha){
	//check user & pass
	$s="SELECT id FROM `member` where user='$user' and pass='$pass'";
	$re=mysql_query($s) or die("ERROR $s");
	$num=mysql_num_rows($re);
	$r=mysql_fetch_row($re);
	if($num<=0){
?>
	<script language="JavaScript"> 	
		alert('ขออภัยครับ ท่านกรอก ชื่อผู้ใช้ และ/หรือ รหัสผ่าน ไม่ถูกต้องครับ'); 	
		history.back();
	</script>
<?
	}else{
			//check ขนาดไฟล์ภาพ
			if(isset($file1)&&$file1!=""){
			if($size1<=200000){
			$time=date("YnjHis");
			$rename="$time-$file1";
			@copy($tmp1,"board-img/$rename");
			$insert=mysql_query("INSERT INTO `ans_webboard` (`topic_id` ,`member_id` ,`detail` ,`img` ,`date` ,`ip` )VALUES ('$topic_id', '$r[0]', '$detail', '$rename', '$date', '$ip')") or die("ERROR $insert บรรทัดที่ 37");
			$upd=mysql_query("UPDATE `webboard` SET `upd_date`='$date' , `status`='2' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 43");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=../board-$topic_id-$cate_id/$topic.html'>" ; 
			}else{
?>
		<script language="JavaScript"> 	
			alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 200kb ครับ'); 	
			history.back();
		</script> 
<? 		
			}
			}else{
			$insert=mysql_query("INSERT INTO `ans_webboard` (`topic_id` ,`member_id` ,`detail` ,`img` ,`date` ,`ip` )VALUES ('$topic_id', '$r[0]', '$detail', '', '$date', '$ip')") or die("ERROR $insert บรรทัดที่ 55");
			$upd=mysql_query("UPDATE `webboard` SET `upd_date`='$date' , `status`='2' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 56");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=../board-$topic_id-$cate_id/$topic.html'>" ; 
			}
			}
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
		history.back();
	</script> 
<? } ?>