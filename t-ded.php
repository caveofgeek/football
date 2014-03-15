<?
session_start();
include "inc/config.inc.php";
include "function/datethai.php";
include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysql_query($title) or die("ERROR $title บรททัด4");
$titler=mysql_fetch_row($titlere);
$link="select * from link where id=1";
$linkre=mysql_query($link) or die("ERROR $link บรททัด7");
$linkr=mysql_fetch_row($linkre);
$banner="select * from site_logo where id=1";
$bannerre=mysql_query($banner) or die("ERROR $banner บรททัด10");
$bannerr=mysql_fetch_row($bannerre);
$bg="select * from bg where id=1";
$bgre=mysql_query($bg) or die("ERROR $bg บรททัด13");
$bgr=mysql_fetch_row($bgre);
$footer="select * from footer_logo where id=1";
$refooter=mysql_query($footer) or die("ERROR $footer บรททัด10");
$rfooter=mysql_fetch_row($refooter);
$fb="select * from fanpage where id=1";
$fbre=mysql_query($fb) or die("ERROR $fb บรททัด16");
$fbr=mysql_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysql_query($st) or die("ERROR $st บรททัด19");
$str=mysql_fetch_row($stre);

$date=$_GET[tDate];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ทีเด็ดฟุตบอล วิเคราะห์บอล ราคาบอล ประจำวันที่ <? $postDate=$date; echo DateThai($postDate); ?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="ทีเด็ดบอล, ทีเด็ดฟุตบอล, ทีเด็ดบอลวันนี้ ทีเด็ดบอลฟรี, ทีเด็ดบอลลีก, ทีเด็ดย้อนหลัง">
<META NAME="description" CONTENT="<?=$titler[1];?> ทีเด็ดฟุตบอล วิเคราะห์บอล ราคาบอล ประจำวันที่ <? $postDate=$date; echo DateThai($postDate); ?> ">
<meta name="robots"  content="index,follow">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(http://<?=$titler[13];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? }if($bgr[4]==1){ ?>
	background-attachment:fixed;
	<? } ?>
}
a:link {
	color: #<?=$linkr[1];?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?=$linkr[2];?>;
}
a:hover {
	text-decoration: underline;
	color: #<?=$linkr[3];?>;
}
a:active {
	text-decoration: none;
	color: #<?=$linkr[4];?>;
}
-->
</style>
</head>

<body>
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><? include "menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?
$sads8="SELECT * FROM `ads_a8` ORDER BY id ASC";
$reads8=mysql_query($sads8) or die("Error $sads8");
while($rads8=mysql_fetch_row($reads8)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">
						  <?
						  if($rads8[1]==1){
						  $ads8=stripslashes($rads8[3]);
						  echo $ads8;
						  }else if($rads8[1]==2){
						  ?>
                              <a href="<?=$rads8[7];?>" title="<?=$rads8[8];?>" target="_blank">
                              <? if($rads8[2]==1){  ?>
                              <img src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" alt="<?=$rads8[8];?>" width="728" border="0" title="<?=$rads8[8];?>" />
                              <? }else if($rads8[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                                <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" />
                                <param name="quality" value="high" />
                                <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object>
                              <? }} ?>
                            </a></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<? } ?>				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="45" style="background-image:url(img/bg-title-tded.png); background-repeat:no-repeat;"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="620" align="left" style="font-size:14px; color:#FFFFFF; font-weight:bold;">ทีเด็ดฟุตบอล วิเคราะห์บอล ราคาบอล ประจำวันที่<? $postDate=$date; echo DateThai($postDate); ?></td>
                        <td width="100" align="right"><a href="tded-ทีเด็ดบอลวันนี้" title="ดูย้อนหลัง" style="color:#010101; font-size:12px; font-weight:bold; font-family:'Times New Roman', Times, serif;">» ดูย้อนหลัง</a></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td style="background-image:url(img/bg-tded.png); background-repeat:repeat-y; background-color:#d55508; border-bottom-right-radius:10px; border-bottom-left-radius:10px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:10px; -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px;"><table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" style="background-color:#FFFFFF; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                          </table>
                            <table width="708" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center"><table width="708" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                                    <tr>
                                      <td width="40" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">เวลา</font></strong></td>
                                      <td width="136" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีมเจ้าบ้าน</font></strong></td>
                                      <td width="50" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ผล</font></strong></td>
                                      <td width="137" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีมเยือน</font></strong></td>
                                      <td width="90" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ราคาบอล</font></strong></td>
                                      <td width="160" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีเด็ดฟุตบอล</font></strong></td>
                                      <td width="95" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ถ่ายทอดสด</font></strong></td>
                                    </tr>
                                  </table>
<?
$slg="SELECT * FROM `league` order by id asc";
$relg=mysql_query($slg) or die("ERROR $slg");
while($rlg=mysql_fetch_row($relg)){

$std="SELECT * FROM `t_ded` WHERE l_id='$rlg[0]' AND post_date='$date' order by id asc";
$retd=mysql_query($std) or die("ERROR $std");
$ntd=mysql_num_rows($retd);
if($ntd>=1){
?>
                                    <table width="708" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(img/bg-inbox-tded.png); background-repeat:no-repeat;">
                                      <tr>
                                        <td width="30" height="30" align="center"><img src="league-icon/<?=$rlg[2];?>" width="30" height="30" /></td>
                                        <td width="5" height="30">&nbsp;</td>
                                        <td width="573" height="30" align="left" style="font-size:14px; color:#FFFFFF; font-weight:bold;"><?=$rlg[1];?></td>
                                      </tr>
                                    </table>
                                  <table width="708" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                                      <? while($rtd=mysql_fetch_row($retd)){ ?>
                                      <tr>
                                        <td width="40" height="25" align="center" bgcolor="#DFDFDF"><font size="2">
                                          <?=$rtd[7];?>
                                        </font></td>
                                        <td width="136" height="25" align="center" bgcolor="#DFDFDF"><? if($rtd[5]==1){ ?>
                                            <font size="2" color="#FF0000"><strong>
                                            <?=$rtd[2];?>
                                            </strong></font>
                                            <? }else{ ?>
                                            <font size="2">
                                            <?=$rtd[2];?>
                                            </font>
                                            <? } ?>                                        </td>
                                        <td width="50" height="25" align="center" bgcolor="#DFDFDF"><font size="2">
                                          <?=$rtd[9];?>
                                        </font></td>
                                        <td width="137" height="25" align="center" bgcolor="#DFDFDF"><? if($rtd[5]==2){ ?>
                                            <font size="2" color="#FF0000"><strong>
                                            <?=$rtd[3];?>
                                            </strong></font>
                                            <? }else{ ?>
                                            <font size="2">
                                            <?=$rtd[3];?>
                                            </font>
                                            <? } ?>                                        </td>
                                        <td width="90" height="25" align="center" bgcolor="#DFDFDF"><font size="2">
                                          <?=$rtd[4];?>
                                        </font></td>
                                        <td width="160" height="25" align="left" bgcolor="#DFDFDF"><font size="2">&nbsp;&nbsp;
                                              <?=$rtd[6];?>
                                        </font></td>
                                        <td width="95" height="25" align="center" bgcolor="#DFDFDF"><font size="2">
                                          <?=$rtd[8];?>
                                        </font></td>
                                      </tr>
                                      <? } ?>
                                    </table>
                                  <? } } ?>								 </td>
                              </tr>
                            </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                          </table></td>
                      </tr>
                    </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                    </table></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><div id="fb-root"></div>
                      <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                      <div class="fb-comments" data-href="http://<?=$titler[13];?>/t-ded.php?tDate=<?=$date?>" data-num-posts="10" data-width="728"></div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><? include "top-footer.php"; ?></td>
  </tr>
</table>
<? include "footer.php"; ?>
</body>
</html>
