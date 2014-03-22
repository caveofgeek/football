<?php
session_start();
include "../inc/config.inc.php";
//echo "$_SESSION[m_login]<br>$_SESSION["m_id"]";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$type=$_POST[type_id];
if($type==1){
$adsense=addslashes($_POST[adsense]);
$op=$_POST[op];
$part1="../ads-img/$op";
@unlink ($part1);
$upd=mysql_query("UPDATE `ads_a1` SET `type` =  '$type', `type_ads` =  '', `adsense` =  '$adsense', `name` =  '', `tel` =  '', `email` =  '', `url` =  '', `keyword` =  '', `img` =  '', `start_date` =  '', `finish_date` =  '' WHERE `id` =1 LIMIT 1") or die("Error $upd");
mysql_close();
}else if($type==2){
$op=$_POST[op];
$type_ads=$_POST[type_ads];
$keyword=$_POST[keyword];
$url=$_POST[url];
$start_date=$_POST[start_date];
$finish_date=$_POST[finish_date];
$name=$_POST[name];
$tel=$_POST[tel];
$email=$_POST[email];
$file1=$_FILES["file1"]["name"];
$tmp1=$_FILES["file1"]["tmp_name"];

if($file1!=""){
$part1="../ads-img/$op";
@unlink ($part1);
 
$time=date("YnjHis");
$rename="$time-$file1";
@copy($tmp1,"../ads-img/$rename"); 
}else{ 
$img=$op; 
}
$upd=mysql_query("UPDATE `ads_a1` SET `type` =  '$type', `type_ads` =  '$type_ads', `adsense` =  '', `name` =  '$name', `tel` =  '$tel', `email` =  '$email', `url` =  '$url', `keyword` =  '$keyword', `img` =  '$rename', `start_date` =  '$start_date', `finish_date` =  '$finish_date' WHERE `id` =1 LIMIT 1") or die("Error $upd");
mysql_close();
}
print "<meta http-equiv=refresh content=0;URL=ads-a1.php>";
?>
