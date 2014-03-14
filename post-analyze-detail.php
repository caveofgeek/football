<?
session_start();
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
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

$topic_id=$_GET[topic_id];
$topic=$_GET[topic];
$spost="SELECT * FROM `analyze` WHERE id='$topic_id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);

$new_view=$rpost[6]+1;
$upd_view=mysql_query("UPDATE `analyze` SET view='$new_view' WHERE id='$topic_id'") or die("ERROR $upd_view");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rpost[2];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="วิเคราะห์บอล,วิเคราะห์บอลวันนี้,ผลบอล,7m,ผลบอลมีเสียง,polball,ทีเด็ดฟุตบอล,ผลฟุตบอล,ทีเด็ด,ผลบอลสด,ฟุตบอล,ล้มโต๊ะ,ทีเด็ดฟุตบอลวันนี้,ราคาบอล,lomtoe,ราคาบอลวันนี้,คลิปฟุตบอล,คลิปบอล">
<META NAME="description" CONTENT="<?=$titler[1];?> วิเคราะห์บอล วิเคราะห์ฟุตบอล วิเคราะห์บอลวันนี้ ผลบอล ผลบอลสด 7M livescore ผลบอลมีเสียง เกมส์ฟุตบอล เกมส์ทายผลฟุตบอล ทีเด็ด ทีเด็ดวันนี้ ราคาบอล">
<meta name="robots"  content="index,follow">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
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
<? } ?>
				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" style="font-size:12px; color:#666666;"><a href="http://<?=$titler[13];?>" title="หน้าแรก" style="color:#666666;">หน้าแรก</a> » <a href="http://<?=$titler[13];?>/analyze-วิเคราะห์บอลวันนี้" title="วิเคราะห์บอลย้อนหลัง" style="color:#666666;">วิเคราะห์บอลย้อนหลัง</a> » <?=$rpost[2];?></td>
                </tr>
                <tr>
                  <td align="left" style="border-bottom:2px solid #333333;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:18px; font-weight:bold; color:#333333;"><?=$rpost[2];?></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="300" align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#666666;">โพสต์เมื่อ
                                  <?=DateTime($rpost[5]);?>
                                  น. เข้าชม
                                  <?=$rpost[6];?>
                                  ครั้ง</td>
                                <td width="428" align="right"><span class='st_fblike_hcount' displaytext='Facebook Like'></span><span class='st_facebook_hcount' displaytext='Facebook'></span> <span class='st_twitter_hcount' displaytext='Tweet'></span> <span class='st_googleplus_hcount' displaytext='Google +'></span></td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td>
						  <?
						  $msg=stripslashes($rpost[3]);
						  echo $msg;
						  ?>						  </td>
                        </tr>

                        <tr>
                          <td height="30" align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px;"><font size="2">
                          <? if(isset($_SESSION[admin_login])){ ?>
                          <a href="http://<?=$titler[13];?>/admin/del-post-analyze.php?id=<?=$rpost[0];?>&mod_id=<?=$rpost[1];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?=$titler[13];?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <? }else if(isset($_SESSION[mod_login])&&$_SESSION[mod_id]==$rpost[1]){ ?>
                          <a href="http://<?=$titler[13];?>/mod/del-post-analyze.php?id=<?=$rpost[0];?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?=$titler[13];?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <? }else{ ?>
                          <a href="http://<?=$titler[13];?>/confirm-del-post-analyze.php?topic_id=<?=$topic_id;?>" onclick="javascript:if(!confirm('ต้องการแจ้งลบข่าวสาร')){return false;}">แจ้งลบ</a>
                          <? } ?>
                          </font></td>
                        </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><div id="fb-root"></div>
                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                              <div class="fb-comments" data-href="http://<?=$titler[13];?>/post-<?=$topic_id;?>/<?=$topic;?>.html" data-num-posts="10" data-width="728"></div></td>
                        </tr>
                      </table>
                    </td>
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
