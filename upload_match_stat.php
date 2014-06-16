<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><table width="620" border="0" align="center" cellpadding="0" cellspacing="1">
</head>
</html>

<link href="./css/football.css" rel="stylesheet" type="text/css">
<style>
	#trSched, #tr1HF2HF1, #tr1HF2HF2, #trHT, #trFin { display: none;}
	td.mg_at { display: none;}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$("table.text_teble2 tr").removeAttr("onclick");
		$("table.text_teble2 tr").removeAttr("title");
		$("table.text_teble2 tr").removeAttr("style");

		$("table.text_teble2 td img").each(function(){
		});
	});

</script>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

function get_data($url) {
	$ch = curl_init();
	$timeout = 10;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_REFERER, 'http://football.kapook.com');
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
$data = get_data('http://football.kapook.com/match/match_live.php?mid=270566');

$data = iconv('windows-874','utf-8',$data);


preg_match('/<table width="620" border="0" align="center" cellpadding="0" cellspacing="1">[\s\d\w_ก-๙เๆแไใ&;<\/>,.#-^!@%*()+"\']{0,}<\/table>/',$data,$team);
$team = str_replace(array('display:none'),array(''),$team[0]);
$team = str_replace('style="background:url(images_match/bg_score2.png) top center no-repeat;"','',$team);
$team = str_replace('<img src="images_match/vs.png" width="88" height="58"/>','',$team);
$team = str_replace('<img src="images_match/frame_b01.jpg" width="6" height="6" />','',$team);
$team = str_replace('<img src="images_match/table_04.png" width="327" height="14" />','',$team);
$team = str_replace('<img src="images_match/goal_icon.gif" width="14" height="13" />','',$team);
$team = str_replace('<img src="images_match/sec_01.png" width="114" height="31" />','',$team);
$team = str_replace('<img src="images_match/led_gif.gif" width="13" height="13" align="absmiddle" />','',$team);
$team = str_replace('<span><img src="../../images/space.gif" width="5" height="8" /></span>','',$team);
$team = str_replace('style="background:url(images_match/table_01.png) top center no-repeat;"','',$team);
$team = str_replace('style="background:url(images_match/table_02.png) top center repeat-y;"','',$team);
$team = str_replace('<img src="images_match/frame_b03.jpg" width="6" height="6" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b02.jpg) top left repeat-x"','',$team);
$team = str_replace('<img src="images_match/frame_b02.jpg" width="1" height="6" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b04.jpg) top left repeat-y"','',$team);
$team = str_replace('<img src="images_match/frame_b04.jpg" width="6" height="1" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b05.jpg) top left repeat-y"','',$team);
$team = str_replace('<img src="images_match/frame_b05.jpg" width="6" height="1" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b07.jpg) top left repeat-x"','',$team);
$team = str_replace('<img src="images_match/frame_b07.jpg" width="1" height="6" />','',$team);
$team = str_replace('<img src="images_match/frame_b08.jpg" width="6" height="6" />','',$team);
$team = str_replace('<img src="images_match/frame_b06.jpg" width="6" height="6" />','',$team);

preg_match('/<table width="97\%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:none" id="tbDetail">[\s\d\w_ก-๙เๆแไใ&;<\/>,.#-^!@%*()+"\']{0,}<\/table>/',$data,$stat);
$stat = str_replace(array('display:none','97%'),array('','30%'),$stat[0]);


echo $team."<br>";

?>