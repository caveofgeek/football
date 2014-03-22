<?php
session_start();
include "../inc/config.inc.php";
include "../function/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id=$_POST[id];
$title=$_POST[title];
$detail=addslashes($_POST["input"]);
$status_comment=$_POST[status_comment];

$insert=mysql_query("UPDATE `analyze` SET `title`='$title' ,`detail`='$detail' ,`status_comment`='$status_comment' WHERE id='$id'") or die("ERROR $insert บรรทัดที่ 12");

$spost="select * from `analyze` where id='$id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);
$url=rewrite($rpost[2]);
mysql_close();

print "<meta http-equiv=refresh content=0;URL=../post-$rpost[0]/$url.html>";

?>
