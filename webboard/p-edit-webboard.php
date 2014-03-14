<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "../inc/config.inc.php";
include "../function/function.php";

$topic_id=$_POST[topic_id];
$title=$_POST[title];
$cate=$_POST[cate];
$detail=addslashes($_POST[input]);
$op=$_POST[op];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
$capcha=$_POST[capcha];
$rands=$_POST[rands];
if(isset($rands)&&isset($capcha)&&$rands==$capcha){
if(isset($file1)&&$file1!=""){
	if($size1<=200000){
		if(isset($op)){
			$img_board="board-img/$op";
			@unlink($img_board);
		}
			$time=date("YnjHis");
			$rename="$time-$file1";
			@copy($tmp1,"board-img/$rename");
			$upd=mysql_query("UPDATE `webboard` SET `cate_id`='$cate' ,`title`='$title' ,`detail`='$detail' ,`img`='$rename' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 21");
			mysql_close();
			
			$url=rewrite($title);
			echo "<meta http-equiv='refresh' content='0;url=../board-$topic_id-$cate/$url.html'>" ; 
	}else{
?>
		<script language="JavaScript"> 	
			alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 200kb ครับ'); 	
			history.back();
		</script> 
<? 		
	}
}else{
			$upd=mysql_query("UPDATE `webboard` SET `cate_id`='$cate' ,`title`='$title' ,`detail`='$detail' WHERE `id`='$topic_id'") or die("ERROR $upd บรรทัดที่ 35");
			mysql_close();
			
			$url=rewrite($title);
			echo "<meta http-equiv='refresh' content='0;url=../board-$topic_id-$cate/$url.html'>" ; 
}
}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ คุณกรอกรหัสยืนยันไม่ถูกต้องครับ'); 	
		history.back();
	</script> 
<? 
} 
?>