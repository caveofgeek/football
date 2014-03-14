<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? 
include "../inc/config.inc.php";
include "../function/function.php";

$id=$_POST[id];
$topic_id=$_POST[topic_id];
$cate_id=$_POST[cate_id];
$topic=$_POST[topic];
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
			$upd=mysql_query("UPDATE `ans_webboard` SET `detail`='$detail' ,`img`='$rename' WHERE `id`='$id'") or die("ERROR $upd บรรทัดที่ 21");
			mysql_close();
			
			$url=rewrite($title);
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
			$upd=mysql_query("UPDATE `ans_webboard` SET `detail`='$detail' WHERE `id`='$id'") or die("ERROR $upd บรรทัดที่ 21");
			mysql_close();
			
			$url=rewrite($title);
			echo "<meta http-equiv='refresh' content='0;url=../board-$topic_id-$cate_id/$topic.html'>" ; 
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