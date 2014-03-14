<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
include "../function/function.php";
$user=$_POST[user];
$pass=$_POST[pass];
$title=$_POST[title];
$cate=$_POST[cate];
$detail=addslashes($_POST[input]);
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
$capcha=$_POST[capcha];
$rands=$_POST[rands];
$date=date("Y-n-j H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
//check ค่าว่าง
if($title!=""&&$cate!=""&&$capcha!=""){
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
			$scate="SELECT * FROM `webboard_category` WHERE id='$cate'";
			$recate=mysql_query($scate) or die("Error $scate");
			$rcate=mysql_fetch_row($recate);
			$url=rewrite($rcate[1]);
			$insert=mysql_query("INSERT INTO `webboard` (`member_id` ,`cate_id` ,`title` ,`detail` ,`img` ,`date` ,`view` ,`sticky` ,`ip` ,`upd_date` ,`status` )VALUES ('$r[0]', '$cate', '$title', '$detail', '$rename', '$date', '0', '0', '$ip', '$date', '1')") or die("ERROR $insert บรรทัดที่ 44");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=../wcate-$cate/$url'>" ; 
			}else{
?>
		<script language="JavaScript"> 	
			alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 200kb ครับ'); 	
			history.back();
		</script> 
<? 		
			}
			}else{
			$scate="SELECT * FROM `webboard_category` WHERE id='$cate'";
			$recate=mysql_query($scate) or die("Error $scate");
			$rcate=mysql_fetch_row($recate);
			$url=rewrite($rcate[1]);
			$insert=mysql_query("INSERT INTO `webboard` (`member_id` ,`cate_id` ,`title` ,`detail` ,`img` ,`date` ,`view` ,`sticky` ,`ip` ,`upd_date` ,`status` )VALUES ('$r[0]', '$cate', '$title', '$detail', '$file1', '$date', '0', '0', '$ip', '$date', '1')") or die("ERROR $insert บรรทัดที่ 56");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=../wcate-$cate/$url'>" ; 
			}
	}
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
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