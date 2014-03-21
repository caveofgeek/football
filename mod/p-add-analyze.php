<?php
session_start();
include "../inc/config.inc.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$title=$_POST[title];
$detail=addslashes($_POST["input"]);
$status_comment=$_POST[status_comment];
$date=date("Y-m-d H:i:s");

$insert=mysql_query("INSERT INTO `analyze` (`mod_id` ,`title` ,`detail` ,`status_comment` ,`post_date`) VALUES ('$_SESSION[mod_id]', '$title', '$detail', '$status_comment', '$date')") or die("ERROR $insert บรรทัดที่ 12");
mysql_close();

print "<meta http-equiv=refresh content=0;URL=all-post-analyze.php>";

?>
