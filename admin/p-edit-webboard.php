<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
include "../inc/config.inc.php";
$topic_id=$_POST[topic_id];
$title=$_POST[title];
$cate=$_POST[cate];
$detail=addslashes($_POST[input]);
$op=$_POST[op];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
if(isset($file1)&&$file1!=""){
	if($size1<=200000){
		if(isset($op)){
			$img_board="../board-img/$op";
			@unlink($img_board);
		}
			$time=date("YnjHis");
			$rename="$time-$file1";
			@copy($tmp1,"board-img/$rename");
			$upd=mysql_query("UPDATE `webboard` SET `cate_id`='$cate' ,`title`='$title' ,`detail`='$detail' ,`img`='$rename' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 24");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=all-webboard.php'>" ; 
	}else{
?>
		<script language="JavaScript"> 	
			alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 200kb ครับ'); 	
			history.back();
		</script> 
<? 		
	}
}else{
			$upd=mysql_query("UPDATE `webboard` SET `cate_id`='$cate' ,`title`='$title' ,`detail`='$detail' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 36");
			mysql_close();
			echo "<meta http-equiv='refresh' content='0;url=all-webboard.php'>" ; 
}
?>