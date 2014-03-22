<?php
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id=$_POST[id];
$cate_id=$_POST["cate_id"];
$title=$_POST[title];
$short_detail=$_POST[short_detail];
$detail=addslashes($_POST["input"]);
$status_comment=$_POST[status_comment];
$tag1=$_POST[tag1];
$tag2=$_POST[tag2];
$tag3=$_POST[tag3];
$tag4=$_POST[tag4];
$tag5=$_POST[tag5];
$tag6=$_POST[tag6];
$op=$_POST[op];
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];
$size1=$_FILES["file1"]["size"];
$date=date("Y-n-j H:i:s");
if(isset($file1)&&$file1!=""){
	if($size1<=50000){
	$part1="../post-s-img/$op";
	@unlink ($part1);
	$time=date("YnjHis");
	$rename="$time-$file1";
	@copy($tmp1,"../post-s-img/$rename");
	//update
	$update=mysql_query("UPDATE `post` SET `title`='$title' ,`short_detail`='$short_detail' ,`detail`='$detail' ,`img`='$rename' ,`status_comment`='$status_comment' WHERE id='$id'") or die("ERROR $update");
	//update tag
	$update_tag=mysql_query("UPDATE `tag_post` SET `tag1`='$tag1' ,`tag2`='$tag2' ,`tag3`='$tag3' ,`tag4`='$tag4' ,`tag5`='$tag5' ,`tag6`='$tag6' WHERE post_id='$id'") or die("ERROR $update_tag");
	mysql_close();
	print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
	}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 50kb ครับ'); 	
		history.back();
	</script> 
<?php 		
	}
}else{
	//update
	$update=mysql_query("UPDATE `post` SET `title`='$title' ,`short_detail`='$short_detail' ,`detail`='$detail' ,`status_comment`='$status_comment' WHERE id='$id'") or die("ERROR $update");
	//update tag
	$update_tag=mysql_query("UPDATE `tag_post` SET `tag1`='$tag1' ,`tag2`='$tag2' ,`tag3`='$tag3' ,`tag4`='$tag4' ,`tag5`='$tag5' ,`tag6`='$tag6' WHERE post_id='$id'") or die("ERROR $update_tag");
	mysql_close();	
	print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
}
?>
