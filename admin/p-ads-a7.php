<?php
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION["m_id"]";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}
$type=mysql_real_escape_string($_POST['type_id']);
if($type==1){
$id=mysql_real_escape_string($_POST['id']);
$adsense=addslashes(mysql_real_escape_string($_POST['adsense']));
$op=mysql_real_escape_string($_POST['op']);
$part1="../ads-img/$op";
@unlink ($part1);
$upd=mysql_query("UPDATE `ads_a7` SET `type` =  '$type', `type_ads` =  '', `adsense` =  '$adsense', `name` =  '', `tel` =  '', `email` =  '', `url` =  '', `keyword` =  '', `img` =  '', `start_date` =  '', `finish_date` =  '' WHERE `id` ='$id' LIMIT 1") or die("Error $upd");
mysql_close();
}else if($type==2){
$id=mysql_real_escape_string($_POST['id']);
$op=mysql_real_escape_string($_POST['op']);
$type_ads=mysql_real_escape_string($_POST['type_ads']);
$keyword=mysql_real_escape_string($_POST['keyword']);
$url=mysql_real_escape_string($_POST['url']);
$start_date=mysql_real_escape_string($_POST['start_date']);
$finish_date=mysql_real_escape_string($_POST['finish_date']);
$name=mysql_real_escape_string($_POST['name']);
$tel=mysql_real_escape_string($_POST['tel']);
$email=mysql_real_escape_string($_POST['email']);
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];

if($file1!=""){
$date=date("dmYHis");
$img="$date$file1";
$part1="../ads-img/$op";
@unlink ($part1);
@copy($tmp1,"../ads-img/$img");
}else{
$img=$op;
}
$upd=mysql_query("UPDATE `ads_a7` SET `type` =  '$type', `type_ads` =  '$type_ads', `adsense` =  '', `name` =  '$name', `tel` =  '$tel', `email` =  '$email', `url` =  '$url', `keyword` =  '$keyword', `img` =  '$img', `start_date` =  '$start_date', `finish_date` =  '$finish_date' WHERE `id` ='$id' LIMIT 1") or die("Error $upd");
mysql_close();
}
print "<meta http-equiv=refresh content=0;URL=ads-a7.php>";
?>
