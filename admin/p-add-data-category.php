<?
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$cate_id=$_POST[cate_id];
$title=$_POST[title];
$short_detail=$_POST[short_detail];
$detail=addslashes($_POST[input]);
$status_comment=$_POST[status_comment];
$tag1=$_POST[tag1];
$tag2=$_POST[tag2];
$tag3=$_POST[tag3];
$tag4=$_POST[tag4];
$tag5=$_POST[tag5];
$tag6=$_POST[tag6];
$file1=$_FILES[file1][name];
$tmp1=$_FILES[file1][tmp_name];
$size1=$_FILES[file1][size];
$date=date("Y-n-j H:i:s");
if(isset($file1)&&$file1!=""){
	if($size1<=50000){
	$time=date("YnjHis");
	$rename="$time-$file1";
	@copy($tmp1,"../post-s-img/$rename");
	//insert
	$insert=mysql_query("INSERT INTO `post` (`cate_id` ,`title` ,`short_detail` ,`detail` ,`img` ,`status_comment` ,`post_date` ,`view`)VALUES ('$cate_id', '$title', '$short_detail', '$detail', '$rename', '$status_comment', '$date', '0')") or die("ERROR $insert บรรทัดที่ 44");
	//select
	$spost="SELECT id FROM `post` ORDER BY id DESC LIMIT 0, 1";
	$repost=mysql_query($spost) or die("ERROR $spost");
	$rpost=mysql_fetch_row($repost);
	//insert tag
	$insert_tag=mysql_query("INSERT INTO `tag_post` (`post_id` ,`tag1` ,`tag2` ,`tag3` ,`tag4` ,`tag5` ,`tag6`)VALUES ('$rpost[0]', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6')") or die("ERROR $insert_tag");
	mysql_close();
	print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
		}else{
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ขนาดไฟล์ภาพของท่านมีขนาดเกิน 50kb ครับ'); 	
		history.back();
	</script> 
<? 		
	}
}else{
	//insert
	$insert=mysql_query("INSERT INTO `post` (`cate_id` ,`title` ,`short_detail` ,`detail` ,`status_comment` ,`post_date` ,`view`)VALUES ('$cate_id', '$title', '$short_detail', '$detail', '$status_comment', '$date', '0')") or die("ERROR $insert บรรทัดที่ 44");
	//select
	$spost="SELECT id FROM `post` ORDER BY id DESC LIMIT 0, 1";
	$repost=mysql_query($spost) or die("ERROR $spost");
	$rpost=mysql_fetch_row($repost);
	//insert tag
	$insert_tag=mysql_query("INSERT INTO `tag_post` (`post_id` ,`tag1` ,`tag2` ,`tag3` ,`tag4` ,`tag5` ,`tag6`)VALUES ('$rpost[0]', '$tag1', '$tag2', '$tag3', '$tag4', '$tag5', '$tag6')") or die("ERROR $insert_tag");
	mysql_close();	
	print "<meta http-equiv=refresh content=0;URL=all-main-category.php?cate_id=$cate_id>";
	
}
?>
