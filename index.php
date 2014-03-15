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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$titler[10];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>">
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/justified-nav.css" rel="stylesheet">
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
          <td><table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="250" align="center" valign="top"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="40" style="background-image:url(http://<?=$titler[13];?>/img/bg-menu-left.png); border-top-right-radius:5px; border-top-left-radius:5px; -moz-border-radius-topright:5px; -moz-border-radius-topleft:5px; -webkit-border-top-right-radius:5px; -webkit-border-top-left-radius:5px;"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="42" align="center"><img src="http://<?=$titler[13];?>/img/icon-menu-left.png" width="42" height="33" /></td>
                                <td width="5">&nbsp;</td>
                                <td width="193" align="left" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#FFFFFF;"><?=DateThai(date("Y-m-d"));?></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td style="background-color:#000000; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                              <?
$scate="select id, cate_name from category order by id asc";
$recate=mysql_query($scate) or die("ERROR $scate");
while($rcate=mysql_fetch_row($recate)){
$urlcate=rewrite($rcate[1]);
?>
                              <tr>
                                <td><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="10" height="20" align="left"><img src="http://<?=$titler[13];?>/img/icon-arrow.png" width="10" height="9" /></td>
                                      <td width="5" height="20" align="left">&nbsp;</td>
                                      <td width="225" height="20" align="left"><a href="http://<?=$titler[13];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;"><?=$rcate[1];?></a></td>
                                    </tr>
                                  </table>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5" style="border-bottom:1px solid #1b1c1e;"></td>
                                      </tr>
                                  </table></td>
                              </tr>
<? } ?>
                              <tr>
                                <td><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10" height="20" align="left"><img src="http://<?=$titler[13];?>/img/icon-arrow.png" width="10" height="9" /></td>
                                    <td width="5" height="20" align="left">&nbsp;</td>
                                    <td width="225" height="20" align="left"><a href="http://<?=$titler[13];?>/webboard" title="เว็บบอร์ด" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">เว็บบอร์ด</a></td>
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
                    </table></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                        <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center"><a href="http://<?=$titler[13];?>/game" title="เกมส์ทายผลบอล"><img src="http://<?=$titler[13];?>/img/bt-game-ball.png" alt="เกมส์ทายผลบอล" width="250" height="105" border="0" title="เกมส์ทายผลบอล" /></a></td>
                          </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                        <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center"><img src="http://<?=$titler[13];?>/img/title-top-score.png" width="250" height="38" border="0" /></td>
                                </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="35" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">No.</td>
                                  <td width="150" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">ID</td>
                                  <td width="65" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">คะแนน</td>
                                </tr>
                            </table></td>
                          </tr>
                          <?
$slevel = "SELECT member_id, SUM(point) FROM `game_member_score` GROUP BY member_id ORDER BY SUM(point) DESC, member_id DESC LIMIT 0, 10";
$relevel = mysql_query($slevel) or die("ERROR $slevel");
$i=1;
while($rlevel = mysql_fetch_row($relevel)){
if($i%2==0)
{
$bgscore="bgcolor='#ebd7aa'";
}
else
{
$bgscore="bgcolor='#d1b36c'";
}
?>
                          <tr <?=$bgscore;?>>
                            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="35" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><?=$i;?></td>
                                  <td width="150" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><?
$smem = "SELECT name, img FROM `member` WHERE id='$rlevel[0]'";
$remem = mysql_query($smem) or die("ERROR $smem");
$rmem = mysql_fetch_row($remem);
if($rmem[1]!=""){
?>
                                      <img src="http://<?=$titler[13];?>/member/avatar/<?=$rmem[1];?>" width="120" height="19" />
                                      <? }else{ ?>
                                      <?=$rmem[0];?>
                                      <? } ?>
                                  </td>
                                  <td width="65" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><?=$rlevel[1];?></td>
                                </tr>
                            </table></td>
                          </tr>
                          <? $i++;} ?>
                      </table></td>
                  </tr>
                </table>
                </td>
              <td width="7" align="center" valign="top">&nbsp;</td>
              <td width="728" align="center" valign="top">
			   <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="75" align="center" valign="bottom" style="background-image:url(http://<?=$titler[13];?>/img/bg-shotded.png); background-repeat:no-repeat; background-color:#000000; border-top-right-radius:10px; border-top-left-radius:10px; -moz-border-radius-topright:10px; -moz-border-radius-topleft:10px; -webkit-border-top-right-radius:10px; -webkit-border-top-left-radius:10px;"><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="20" align="right" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">อ่านข่าวทั้งหมด <a href="http://<?=$titler[13];?>/cate-1/ช็อตเด็ดกีฬาดัง" title="อ่านข่าวทั้งหมด" style="color:#dc0800;">คลิกที่นี่</a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td align="center" style="background-color:#000000;"><table width="720" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="300" align="center" valign="top">
<?
$stab1="SELECT id, title, img, short_detail FROM `post` where cate_id='1' ORDER BY id DESC LIMIT 0,1";
$retab1=mysql_query($stab1) or die("ERROR $stab1");
$rtab1=mysql_fetch_row($retab1);
$urltab1=rewrite($rtab1[1]);
?>
                                <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center"><a href="topic-<?=$rtab1[0];?>/<?=$urltab1;?>.html" title="<?=$rtab1[1];?>">
                                            <? if($rtab1[2]==""){ ?>
                                            <img src="post-s-img/no-img.png" width="300" height="200" border="0" />
                                            <? }else{ ?>
                                            <img src="post-s-img/<?=$rtab1[2];?>" width="300" height="200" border="0" />
                                            <? } ?>
                                          </a> </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                        <table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left"><a href="topic-<?=$rtab1[0];?>/<?=$urltab1;?>.html" title="<?=$rtab1[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"><?=$rtab1[1];?></a></td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#FFFFFF;"><?=$rtab1[3];?></td>
                                          </tr>
                                        </table>
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                      </table></td>
                                  </tr>
                              </table></td>
                            <td width="5" align="center" valign="top">&nbsp;</td>
                            <td width="410" align="center" valign="top">
<?
$stab1_1="SELECT id, title, img, short_detail FROM `post` where cate_id='1' ORDER BY id DESC LIMIT 1,3";
$retab1_1=mysql_query($stab1_1) or die("Error $stab1_1");
while($rtab1_1=mysql_fetch_row($retab1_1)){
$urltab1_1=rewrite($rtab1_1[1]);
?>
<table width="410" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#1c1c1c; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                  <tr>
                                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="100" align="center" valign="top"><table width="100" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#a2a2a2">
                                            <tr>
                                              <td align="center" bgcolor="#1C1C1C"><a href="topic-<?=$rtab1_1[0];?>/<?=$urltab1_1;?>.html" title="<?=$rtab1_1[1];?>">
                                                <? if($rtab1_1[2]==""){ ?>
                                                <img src="post-s-img/no-img.png" alt="<?=$rtab1_1[1];?>" width="100" height="75" border="0" title="<?=$rtab1_1[1];?>" />
                                                <? }else{ ?>
                                                <img src="post-s-img/<?=$rtab1_1[2];?>" alt="<?=$rtab1_1[1];?>" width="100" height="75" border="0" title="<?=$rtab1_1[1];?>" />
                                                <? } ?>
                                              </a></td>
                                            </tr>
                                          </table></td>
                                          <td width="10" align="center" valign="top">&nbsp;</td>
                                          <td width="290" align="center" valign="top"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="left"><a href="topic-<?=$rtab1_1[0];?>/<?=$urltab1_1;?>.html" title="<?=$rtab1_1[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#dc0800;"><?=$rtab1_1[1];?></a></td>
                                            </tr>
                                            <tr>
                                              <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;"><?=$rtab1_1[3];?></td>
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
                                </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
<? } ?>
							  </td>
                            <td width="5" align="center" valign="top">&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="left"><?
$stab1_2="SELECT id, title, img FROM `post` where cate_id='1' ORDER BY id DESC LIMIT 4,10";
$retab1_2=mysql_query($stab1_2) or die("Error $stab1_2");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows1_2=0;
while($rtab1_2=mysql_fetch_row($retab1_2))
{
$urltab1_2=rewrite($rtab1_2[1]);
echo "<td width='142' align='center' valign='top'>";
$intRows1_2++;
?>
<table width="138" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="138" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#a2a2a2">
                                <tr>
                                  <td align="center" bgcolor="#1C1C1C"><a href="topic-<?=$rtab1_2[0];?>/<?=$urltab1_2;?>.html" title="<?=$rtab1_2[1];?>">
                                    <? if($rtab1_2[2]==""){ ?>
                                    <img src="post-s-img/no-img.png" alt="<?=$rtab1_2[1];?>" width="138" height="110" border="0" title="<?=$rtab1_2[1];?>" />
                                    <? }else{ ?>
                                    <img src="post-s-img/<?=$rtab1_2[2];?>" alt="<?=$rtab1_2[1];?>" width="138" height="110" border="0" title="<?=$rtab1_2[1];?>" />
                                    <? } ?>
                                  </a><a href="topic-<?=$rtab1_1[0];?>/<?=$urltab1_1;?>.html" title="<?=$rtab1_1[1];?>"></a></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="left"><a href="topic-<?=$rtab1_2[0];?>/<?=$urltab1_2;?>.html" title="<?=$rtab1_2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;"><?=$rtab1_2[1];?></a></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                          </table>
                          <?
			echo"</td>";
			if(($intRows1_2)%5==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="15" align="center" style="background-color:#000000; background-image:url(img/bg-line-shotded.png); background-repeat:repeat-x;"></td>
                </tr>
                <tr>
                  <td height="15" align="center" style="background-color:#000000; border-bottom-right-radius:10px; border-bottom-left-radius:10px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:10px; -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px;"></td>
                </tr>
              </table>
			 </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center"><?
$sads2="SELECT * FROM `ads_a2`";
$reads2=mysql_query($sads2) or die("Error $sads2");
while($rads2=mysql_fetch_row($reads2)){
?>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
            <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" valign="middle"><?
						if($rads2[1]==1){
						$ads2=stripslashes($rads2[3]);
						echo $ads2;
						}else if($rads2[1]==2){
						?>
                    <a href="<?=$rads2[7];?>" title="<?=$rads2[8];?>" target="_blank">
                    <? if($rads2[2]==1){  ?>
                    <img src="http://<?=$titler[13];?>/ads-img/<?=$rads2[9];?>" alt="<?=$rads2[8];?>" width="980" border="0" title="<?=$rads2[8];?>" />
                    <? }else if($rads2[2]==2){ ?>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="980" border="0">
                      <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads2[9];?>" />
                      <param name="quality" value="high" />
                      <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads2[9];?>" width="980" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                    </object>
                    <? }} ?>
                  </a></td>
              </tr>
            </table>
          <? } ?></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
            <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="670" align="center" valign="top">
				 <table width="670" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?=$titler[13];?>/img/bg-tded-zean.png); background-repeat:repeat-y; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;">
                  <tr>
                    <td height="75" align="center" valign="bottom" style="background-image:url(http://<?=$titler[13];?>/img/bg-title-tded-zean.png); background-repeat:no-repeat; border-top-right-radius:10px; border-top-left-radius:10px; -moz-border-radius-topright:10px; -moz-border-radius-topleft:10px; -webkit-border-top-right-radius:10px; -webkit-border-top-left-radius:10px;"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20" align="right" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">ทางเว็บไม่สนับสนุนการพนันทุกชนิด เป็นเพียงการให้ทรรศนะเท่านั้น</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="660" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#e0e4ce; background-repeat:repeat-y; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;">
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                        </table>
                          <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center">
							  <? $today=date("Y-m-d"); ?>
                                <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="250" align="center" valign="top">
									 <table width="250" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?=$titler[13];?>/img/bg-box-tded-zean.png); background-repeat:repeat-y; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                      <tr>
                                        <td height="30" style="border-bottom:3px solid #ceb57a;"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#010101;">
<?
$szn1="SELECT name FROM `zean_name` WHERE id=1";
$rezn1=mysql_query($szn1) or die("ERROR $szn1");
$rzn1=mysql_fetch_row($rezn1);
echo $rzn1[0];
?>											</td>
                                          </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="5"></td>
                                          </tr>
                                        </table>
                                          <table width="240" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#f8f3e8; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                            <tr>
                                              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="5"></td>
                                                </tr>
                                              </table>
<?
$stz1="SELECT * FROM `tded_zean` WHERE post_date='$today' AND zean_id=1";
$retz1=mysql_query($stz1) or die("ERROR $stz1");
$ntz1=mysql_num_rows($retz1);
$rtz1=mysql_fetch_row($retz1);
if($ntz1==0){
?>
                                                <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;">ไม่พบข้อมูล</td>
                                                  </tr>
                                                </table>
                                                <? }else{ ?>
                                                <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 1.
                                                      <?=$rtz1[2];?>
                                                        <? if($rtz1[3]==0){ ?>
                                                        <img src="img/icon-false.gif" width="30" />
                                                        <? }else if($rtz1[3]==1){ ?>
                                                        <img src="img/icon-true.gif" width="30" />
                                                        <? } ?>                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 2.
                                                      <?=$rtz1[4];?>
                                                        <? if($rtz1[5]==0){ ?>
                                                        <img src="img/icon-false.gif" width="30" />
                                                        <? }else if($rtz1[5]==1){ ?>
                                                        <img src="img/icon-true.gif" width="30" />
                                                        <? } ?>                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 3.
                                                      <?=$rtz1[6];?>
                                                        <? if($rtz1[7]==0){ ?>
                                                        <img src="img/icon-false.gif" width="30" />
                                                        <? }else if($rtz1[7]==1){ ?>
                                                        <img src="img/icon-true.gif" width="30" />
                                                        <? } ?>                                                    </td>
                                                  </tr>
                                                </table>
                                                <? } ?>
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
                                     </table>									</td>
                                    <td width="150" align="center" valign="top"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="50" align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#010101;">วันที่ <?=DateThai($today);?>                                        </td>
                                      </tr>
                                      <tr>
                                        <td align="center" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;">ทีเด็ดประจำวัน <?=$titler[1];?></td>
                                      </tr>
                                    </table></td>
                                    <td width="250" align="center" valign="top"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?=$titler[13];?>/img/bg-box-tded-zean.png); background-repeat:repeat-y; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                      <tr>
                                        <td height="30" style="border-bottom:3px solid #ceb57a;"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#010101;">
<?
$szn2="SELECT name FROM `zean_name` WHERE id=2";
$rezn2=mysql_query($szn2) or die("ERROR $szn2");
$rzn2=mysql_fetch_row($rezn2);
echo $rzn2[0];
?>                                              </td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                            <table width="240" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#f8f3e8; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                              <tr>
                                                <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="5"></td>
                                                    </tr>
                                                  </table>
<?
$stz2="SELECT * FROM `tded_zean` WHERE post_date='$today' AND zean_id=2";
$retz2=mysql_query($stz2) or die("ERROR $stz2");
$ntz2=mysql_num_rows($retz2);
$rtz2=mysql_fetch_row($retz2);
if($ntz2==0){
?>
                                                    <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;">ไม่พบข้อมูล</td>
                                                      </tr>
                                                    </table>
                                                  <? }else{ ?>
                                                    <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 1.
                                                          <?=$rtz2[2];?>
                                                            <? if($rtz2[3]==0){ ?>
                                                            <img src="img/icon-false.gif" width="30" />
                                                            <? }else if($rtz2[3]==1){ ?>
                                                            <img src="img/icon-true.gif" width="30" />
                                                            <? } ?>                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 2.
                                                          <?=$rtz2[4];?>
                                                            <? if($rtz2[5]==0){ ?>
                                                            <img src="img/icon-false.gif" width="30" />
                                                            <? }else if($rtz2[5]==1){ ?>
                                                            <img src="img/icon-true.gif" width="30" />
                                                            <? } ?>                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td height="20" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#dc0800;"> 3.
                                                          <?=$rtz2[6];?>
                                                            <? if($rtz2[7]==0){ ?>
                                                            <img src="img/icon-false.gif" width="30" />
                                                            <? }else if($rtz2[7]==1){ ?>
                                                            <img src="img/icon-true.gif" width="30" />
                                                            <? } ?>                                                        </td>
                                                      </tr>
                                                    </table>
                                                  <? } ?>
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
                                </table></td>
                            </tr>
                            <tr>
                              <td height="30" align="center"></td>
                            </tr>
                            <tr>
                              <td height="75" align="left" style="background-image:url(http://<?=$titler[13];?>/img/bg-title-tded-zean-01.png); background-repeat:no-repeat;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                              </table>
                                <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?=$titler[13];?>/img/bg-box-tded-zean-01.png); background-repeat:repeat-y; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">

                                <tr>
                                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="5"></td>
                                      </tr>
                                    </table>
                                      <table width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#f8f3e8; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                                        <tr>
                                          <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td height="5"></td>
                                              </tr>
                                            </table>
                                              <table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td><table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td width="150" align="left" valign="top"><span style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#010101; font-weight:bold;"><?=$rzn1[0];?></span></td>
                                                      <td width="480" align="center" valign="top"><table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                            <td align="center"><?
$today1=date("Y-m-d",strtotime("- 1 day"));
$stz3="SELECT * FROM `tded_zean` WHERE post_date='$today1' AND zean_id=1";
$retz3=mysql_query($stz3) or die("ERROR $stz3");
$ntz3=mysql_num_rows($retz3);
$rtz3=mysql_fetch_row($retz3);
if($ntz3==0){
?>
                                                                <table width="480" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td height="30" align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">ไม่พบข้อมูล</td>
                                                                  </tr>
                                                                </table>
                                                              <? }else{ ?>
                                                                <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#333333;"><?=DateThai($today1);?></td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">1.
                                                                      <?=$rtz3[2];?>
                                                                        <? if($rtz3[3]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[3]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">2.
                                                                      <?=$rtz3[4];?>
                                                                        <? if($rtz3[5]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[5]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">3.
                                                                      <?=$rtz3[6];?>
                                                                        <? if($rtz3[7]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[7]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                              <? } ?></td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center"><?
$today2=date("Y-m-d",strtotime("- 2 day"));
$stz3="SELECT * FROM `tded_zean` WHERE post_date='$today2' AND zean_id=1";
$retz3=mysql_query($stz3) or die("ERROR $stz3");
$ntz3=mysql_num_rows($retz3);
$rtz3=mysql_fetch_row($retz3);
if($ntz3==0){
?>
                                                                <table width="480" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td height="30" align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">ไม่พบข้อมูล</td>
                                                                  </tr>
                                                                </table>
                                                              <? }else{ ?>
                                                                <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                  <tr>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#333333;"><?=DateThai($today2);?></td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">1.
                                                                      <?=$rtz3[2];?>
                                                                        <? if($rtz3[3]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[3]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">2.
                                                                      <?=$rtz3[4];?>
                                                                        <? if($rtz3[5]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[5]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                    <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">3.
                                                                      <?=$rtz3[6];?>
                                                                        <? if($rtz3[7]==0){ ?>
                                                                        <img src="img/icon-false.gif" width="20" />
                                                                        <? }else if($rtz3[7]==1){ ?>
                                                                        <img src="img/icon-true.gif" width="20" />
                                                                        <? } ?>                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                              <? } ?></td>
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
                                                    <table width="630" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td width="150" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#010101; font-weight:bold;"><?=$rzn2[0];?></td>
                                                        <td width="480" align="center" valign="top"><table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                              <td align="center"><?
$today1=date("Y-m-d",strtotime("- 1 day"));
$stz3="SELECT * FROM `tded_zean` WHERE post_date='$today1' AND zean_id=2";
$retz3=mysql_query($stz3) or die("ERROR $stz3");
$ntz3=mysql_num_rows($retz3);
$rtz3=mysql_fetch_row($retz3);
if($ntz3==0){
?>
                                                                  <table width="480" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                      <td height="30" align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">ไม่พบข้อมูล</td>
                                                                    </tr>
                                                                  </table>
                                                                <? }else{ ?>
                                                                  <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#333333;"><?=DateThai($today1);?></td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">1.
                                                                        <?=$rtz3[2];?>
                                                                          <? if($rtz3[3]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[3]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">2.
                                                                        <?=$rtz3[4];?>
                                                                          <? if($rtz3[5]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[5]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">3.
                                                                        <?=$rtz3[6];?>
                                                                          <? if($rtz3[7]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[7]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                    </tr>
                                                                  </table>
                                                                <? } ?></td>
                                                            </tr>
                                                            <tr>
                                                              <td align="center"><?
$today2=date("Y-m-d",strtotime("- 2 day"));
$stz3="SELECT * FROM `tded_zean` WHERE post_date='$today2' AND zean_id=2";
$retz3=mysql_query($stz3) or die("ERROR $stz3");
$ntz3=mysql_num_rows($retz3);
$rtz3=mysql_fetch_row($retz3);
if($ntz3==0){
?>
                                                                  <table width="480" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                      <td height="30" align="center" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">ไม่พบข้อมูล</td>
                                                                    </tr>
                                                                  </table>
                                                                <? }else{ ?>
                                                                  <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#333333;"><?=DateThai($today2);?></td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">1.
                                                                        <?=$rtz3[2];?>
                                                                          <? if($rtz3[3]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[3]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">2.
                                                                        <?=$rtz3[4];?>
                                                                          <? if($rtz3[5]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[5]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                      <td width="120" height="30" align="left" valign="top" style="font-family:'Times New Roman', Times, serif; font-size:14px; color:#dc0800;">3.
                                                                        <?=$rtz3[6];?>
                                                                          <? if($rtz3[7]==0){ ?>
                                                                          <img src="img/icon-false.gif" width="20" />
                                                                          <? }else if($rtz3[7]==1){ ?>
                                                                          <img src="img/icon-true.gif" width="20" />
                                                                          <? } ?>                                                                      </td>
                                                                    </tr>
                                                                  </table>
                                                                <? } ?></td>
                                                            </tr>
                                                        </table></td>
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
                                      </table>
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                    </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="30"></td>
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
                 </table>
				</td>
                <td width="5" align="center" valign="top">&nbsp;</td>
                <td width="310" align="center" valign="top">
				<?
				$ssco="select code from football where id=4";
				$resco=mysql_query($ssco) or die("ERROR $ssco");
				$rsco=mysql_fetch_row($resco);
				echo $rsco[0];
				?>
				</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="5"></td>
            </tr>
          </table>
            <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?
$sads3="SELECT * FROM `ads_a3` ORDER BY id ASC";
$reads3=mysql_query($sads3) or die("Error $sads3");
while($rads3=mysql_fetch_row($reads3)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle">
						  <?
						  if($rads3[1]==1){
						  $ads3=stripslashes($rads3[3]);
						  echo $ads3;
						  }else if($rads3[1]==2){
						  ?>
                            <a href="<?=$rads3[7];?>" title="<?=$rads3[8];?>" target="_blank">
                            <? if($rads3[2]==1){  ?>
                            <img src="http://<?=$titler[13];?>/ads-img/<?=$rads3[9];?>" alt="<?=$rads3[8];?>" width="728" border="0" title="<?=$rads3[8];?>" />
                            <? }else if($rads3[2]==2){ ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                              <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads3[9];?>" />
                              <param name="quality" value="high" />
                              <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads3[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="45" style="background-image:url(img/bg-title-tded.png); background-repeat:no-repeat;">
						  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="360" align="left"><img src="img/title-tded.png" width="350" height="35" /></td>
                              <td width="360" align="right"><a href="tded-ทีเด็ดบอลวันนี้" title="ดูย้อนหลัง" style="color:#010101; font-size:12px; font-weight:bold; font-family:'Times New Roman', Times, serif;">» ดูย้อนหลัง</a></td>
                            </tr>
                         </table>
					   </td>
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
<?
$date=date("Y-m-d");
$s="SELECT * FROM `t_ded` where post_date='$date'";
$re=mysql_query($s) or die("ERROR $s");
$n=mysql_num_rows($re);
if($n>=1){
?>
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
                                  <? } } ?></td>
                              </tr>
                              <? }else{ ?>
                              <tr>
                                <td align="center"><iframe src="http://www.108goal.com/program/show.php?order=today_yesterday" frameborder="0" style="height:500px; width:708px; overflow-x: hidden; overflow-y: auto;"></iframe></td>
                              </tr>
                              <? } ?>
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
                    </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center">
<?
$sads4="SELECT * FROM `ads_a4` ORDER BY id ASC";
$reads4=mysql_query($sads4) or die("Error $sads4");
while($rads4=mysql_fetch_row($reads4)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle"><?
						  if($rads4[1]==1){
						  $ads4=stripslashes($rads4[3]);
						  echo $ads4;
						  }else if($rads4[1]==2){
						  ?>
                            <a href="<?=$rads4[7];?>" title="<?=$rads4[8];?>" target="_blank">
                            <? if($rads4[2]==1){  ?>
                            <img src="http://<?=$titler[13];?>/ads-img/<?=$rads4[9];?>" alt="<?=$rads4[8];?>" width="728" border="0" title="<?=$rads4[8];?>" />
                            <? }else if($rads4[2]==2){ ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                              <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads4[9];?>" />
                              <param name="quality" value="high" />
                              <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads4[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="45" style="background-image:url(img/bg-title-analyze.png); background-repeat:no-repeat;"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="360" height="45" align="left" valign="top"><img src="img/title-analyze.png" width="350" height="35" /></td>
                            <td width="360" height="45" align="right"><a href="analyze-วิเคราะห์บอลวันนี้" title="วิเคราะห์บอลย้อนหลัง" style="color:#010101; font-size:12px; font-weight:bold; font-family:'Times New Roman', Times, serif;">» วิเคราะห์บอลย้อนหลัง</a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td style="background-image:url(img/bg-analyze.png); background-repeat:repeat-y; background-color:#1aa6f3; border-bottom-right-radius:10px; border-bottom-left-radius:10px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:10px; -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px;"><table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" style="background-color:#FFFFFF; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                              </table>
<?
		$strSQL = "SELECT * FROM `analyze` ORDER BY id DESC LIMIT 0, 20";
		$objQuery = mysql_query($strSQL) or die("ERROR $strSQL");
		$i=0;
		while($objResult = mysql_fetch_row($objQuery)){
		$url=rewrite($objResult[2]);
		$i++;
		if($i%2==0)
		{
		$bg="#EEEEEE";
		}
		else
		{
		$bg="#FFFFFF";
		}
?>
                                <table width="710" border="0" cellspacing="0" cellpadding="0">
                                  <tr bgcolor="<?=$bg;?>">
                                    <td align="center"><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="50" height="25" align="center"><span style="font-family:'Times New Roman', Times, serif; font-size:12px;">
                                          <?=$objResult[0];?>
                                        </span></td>
                                        <td width="385" height="25" align="center"><table width="385" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="left"><a href="http://<?=$titler[13];?>/post-<?=$objResult[0];?>/<?=$url;?>.html" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#000000;" title="<?=$objResult[2];?>">
                                                <?=$objResult[2];?>
                                                </a> <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#666666;">[
                                                  <?=$objResult[6];?>
                                                  ]</span></td>
                                            </tr>
                                        </table></td>
                                        <td width="125" height="25" align="center"><?
$sql="SELECT name, img FROM `admin_analyze` WHERE id='$objResult[1]'";
$result=mysql_query($sql) or die("ERROR $sql");
$row=mysql_fetch_row($result);
if($row[1]==""){
echo $row[0];
}else{
?>
                                            <img src="http://<?=$titler[13];?>/mod/avatar/<?=$row[1];?>" width="120" height="19" />
                                            <? } ?>                                        </td>
                                        <td width="150" height="25" align="center"><span style="font-family:'Times New Roman', Times, serif; font-size:12px;">
                                          <?=DateTime($objResult[5]);?>
                                        </span></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                </table>
                                <? } ?>
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
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center">
<?
$sads5="SELECT * FROM `ads_a5` ORDER BY id ASC";
$reads5=mysql_query($sads5) or die("Error $sads5");
while($rads5=mysql_fetch_row($reads5)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle">
						  <?
						  if($rads5[1]==1){
						  $ads5=stripslashes($rads5[3]);
						  echo $ads5;
						  }else if($rads5[1]==2){
						  ?>
                            <a href="<?=$rads5[7];?>" title="<?=$rads5[8];?>" target="_blank">
                            <? if($rads5[2]==1){  ?>
                            <img src="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" alt="<?=$rads5[8];?>" width="728" border="0" title="<?=$rads5[8];?>" />
                            <? }else if($rads5[2]==2){ ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                              <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" />
                              <param name="quality" value="high" />
                              <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads5[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="45" style="background-image:url(img/bg-title-premier.png); background-repeat:no-repeat;"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="360" align="left"><img src="img/title-premier.png" width="350" height="35" /></td>
                            <td width="360" align="right"><a href="cate-2/พรีเมียร์ลีก-อังกฤษ" title="อ่านทั้งหมด" style="color:#FFFFFF; font-size:12px; font-weight:bold; font-family:'Times New Roman', Times, serif;">» อ่านทั้งหมด</a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td style="background-image:url(img/bg-premier.png); background-repeat:repeat-y; background-color:#a5a9ae; border-bottom-right-radius:10px; border-bottom-left-radius:10px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:10px; -webkit-border-bottom-right-radius:10px; -webkit-border-bottom-left-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                      <table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" style="background-color:#FFFFFF; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                              </table>
                                <table width="708" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="300" align="center" valign="top"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
<?
$spm="SELECT id, title, short_detail, img FROM `post` where cate_id='2' ORDER BY id DESC LIMIT 0,1";
$repm=mysql_query($spm) or die("ERROR $spm");
$rpm=mysql_fetch_row($repm);
$urlpm=rewrite($rpm[1]);
?>
                                          <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="center"><a href="topic-<?=$rpm[0];?>/<?=$urlpm;?>.html" title="<?=$rpm[1];?>">
                                                      <? if($rpm[3]!=""){ ?>
                                                      <img src="post-s-img/<?=$rpm[3];?>" alt="<?=$rpm[1];?>" title="<?=$rpm[1];?>" width="300" height="200" border="0" />
                                                      <? }else{ ?>
                                                      <img src="post-s-img/no-img.png" alt="<?=$rpm[1];?>" title="<?=$rpm[1];?>" width="300" height="200" border="0" />
                                                      <? } ?>
                                                    </a></td>
                                                  </tr>
                                                </table>
                                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="5"></td>
                                                    </tr>
                                                </table></td>
                                            </tr>
                                            <tr>
                                              <td align="left"><a href="topic-<?=$rpm[0];?>/<?=$urlpm;?>.html" title="<?=$rpm[1];?>" style="color:#6d0019; font-size:12px; font-weight:bold;"><?=$rpm[1];?></a></td>
                                            </tr>
                                            <tr>
                                              <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$rpm[2]", 0,100,"UTF-8"); ?></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="10"></td>
                                          </tr>
                                        </table>
<?
$spm3="SELECT id, title FROM `post` where cate_id='2' ORDER BY id DESC LIMIT 5,5";
$repm3=mysql_query($spm3) or die("Error $spm3");
while($rpm3=mysql_fetch_row($repm3)){
$urlpm3=rewrite($rpm3[1]);
?>
                                          <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                              <td width="5" align="left">&nbsp;</td>
                                              <td width="279" align="left"><a href="topic-<?=$rpm3[0];?>/<?=$urlpm3;?>.html" title="<?=$rpm3[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rpm3[1];?></a></td>
                                            </tr>
                                          </table>
                                          <? } ?>
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table></td>
                                      </tr>
                                    </table></td>
                                    <td width="408" align="center" valign="top">
<?
$spm2="SELECT id, title, img, short_detail FROM `post` where cate_id='2' ORDER BY id DESC LIMIT 1,4";
$repm2=mysql_query($spm2) or die("Error $spm2");
while($rpm2=mysql_fetch_row($repm2)){
$urlpm2=rewrite($rpm2[1]);
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" align="center" valign="top"><table width="100" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#a2a2a2">
      <tr>
        <td align="center" bgcolor="#FFFFFF"><a href="topic-<?=$rpm2[0];?>/<?=$urlpm2;?>.html" title="<?=$rpm2[1];?>">
          <? if($rpm2[2]==""){ ?>
          <img src="post-s-img/no-img.png" alt="<?=$rpm2[1];?>" width="100" height="75" border="0" title="<?=$rpm2[1];?>" />
          <? }else{ ?>
          <img src="post-s-img/<?=$rpm2[2];?>" alt="<?=$rpm2[1];?>" width="100" height="75" border="0" title="<?=$rpm2[1];?>" />
          <? } ?>
        </a></td>
      </tr>
    </table></td>
    <td width="10" align="center" valign="top">&nbsp;</td>
    <td width="290" align="center" valign="top"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left"><a href="topic-<?=$rpm2[0];?>/<?=$urlpm2;?>.html" title="<?=$rpm2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#6d0019;">
          <?=$rpm2[1];?>
        </a></td>
      </tr>
      <tr>
        <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rpm2[3];?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                      <? } ?></td>
                                  </tr>
                                </table>
                                </td>
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
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="360" align="center" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="45" align="center" valign="top" style="background-image:url(img/bg-title-laliga.png); background-repeat:no-repeat;"><img src="img/title-laliga.png" width="350" height="35" /></td>
                        </tr>
                        <tr>
                          <td style="background-image:url(img/bg-league.png); background-repeat:repeat-y; background-color:#abb0b6; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="center" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td height="10"></td>
                                      </tr>
                                    </table>
                                      <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center">
<?
$slg="SELECT id, title, short_detail, img FROM `post` where cate_id='3' ORDER BY id DESC LIMIT 0,1";
$relg=mysql_query($slg) or die("ERROR $slg");
$rlg=mysql_fetch_row($relg);
$urllg=rewrite($rlg[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td align="center"><a href="topic-<?=$rlg[0];?>/<?=$urllg;?>.html" title="<?=$rlg[1];?>">
                                                        <? if($rlg[3]!=""){ ?>
                                                        <img src="post-s-img/<?=$rlg[3];?>" alt="<?=$rlg[1];?>" title="<?=$rlg[1];?>" width="330" height="205" border="0" />
                                                        <? }else{ ?>
                                                        <img src="post-s-img/no-img.png" alt="<?=$rlg[1];?>" title="<?=$rlg[1];?>" width="330" height="205" border="0" />
                                                        <? } ?>
                                                      </a></td>
                                                    </tr>
                                                  </table>
                                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="5"></td>
                                                      </tr>
                                                  </table></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><a href="topic-<?=$rlg[0];?>/<?=$urllg;?>.html" title="<?=$rlg[1];?>" style="color:#025458; font-size:12px; font-weight:bold;"><?=$rlg[1];?></a></td>
                                              </tr>
                                              <tr>
                                                <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$rlg[2]", 0,100,"UTF-8"); ?></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
<?
$slg2="SELECT id, title FROM `post` where cate_id='3' ORDER BY id DESC LIMIT 1,5";
$relg2=mysql_query($slg2) or die("Error $slg2");
while($rlg2=mysql_fetch_row($relg2)){
$urllg2=rewrite($rlg2[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                                <td width="5" align="left">&nbsp;</td>
                                                <td width="309" align="left"><a href="topic-<?=$rlg2[0];?>/<?=$urllg2;?>.html" title="<?=$rlg2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rlg2[1];?></a></td>
                                              </tr>
                                            </table>
                                            <? } ?></td>
                                        </tr>
                                        <tr>
                                          <td align="right"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">» <a href="http://<?=$titler[13];?>/cate-3/ลาลีกา-สเปน" title="อ่านข่าวทั้งหมด" style="color:#010101;">อ่านข่าวทั้งหมด</a></span></td>
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
                      <td width="8" align="center" valign="top">&nbsp;</td>
                      <td width="360" align="center" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="45" align="center" valign="top" style="background-image:url(img/bg-title-serie-a.png); background-repeat:no-repeat;"><img src="img/title-serie-a.png" width="350" height="35" /></td>
                        </tr>
                        <tr>
                          <td style="background-image:url(img/bg-league.png); background-repeat:repeat-y; background-color:#abb0b6; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="10"></td>
                                    </tr>
                                  </table>
                                    <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
<?
$sgi="SELECT id, title, short_detail, img FROM `post` where cate_id='4' ORDER BY id DESC LIMIT 0,1";
$regi=mysql_query($sgi) or die("ERROR $sgi");
$rgi=mysql_fetch_row($regi);
$urlgi=rewrite($rgi[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td align="center"><a href="topic-<?=$rgi[0];?>/<?=$urlgi;?>.html" title="<?=$rgi[1];?>">
                                                        <? if($rgi[3]!=""){ ?>
                                                        <img src="post-s-img/<?=$rgi[3];?>" alt="<?=$rgi[1];?>" title="<?=$rgi[1];?>" width="330" height="205" border="0" />
                                                        <? }else{ ?>
                                                        <img src="post-s-img/no-img.png" alt="<?=$rgi[1];?>" title="<?=$rgi[1];?>" width="330" height="205" border="0" />
                                                        <? } ?>
                                                      </a></td>
                                                    </tr>
                                                  </table>
                                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="5"></td>
                                                      </tr>
                                                  </table></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><a href="topic-<?=$rgi[0];?>/<?=$urlgi;?>.html" title="<?=$rgi[1];?>" style="color:#012f53; font-size:12px; font-weight:bold;"><?=$rgi[1];?></a></td>
                                              </tr>
                                              <tr>
                                                <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$rgi[2]", 0,100,"UTF-8"); ?></td>
                                              </tr>
                                          </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
<?
$sgi2="SELECT id, title FROM `post` where cate_id='4' ORDER BY id DESC LIMIT 1,5";
$regi2=mysql_query($sgi2) or die("Error $sgi2");
while($rgi2=mysql_fetch_row($regi2)){
$urlgi2=rewrite($rgi2[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                                <td width="5" align="left">&nbsp;</td>
                                                <td width="309" align="left"><a href="topic-<?=$rgi2[0];?>/<?=$urlgi2;?>.html" title="<?=$rgi2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rgi2[1];?></a></td>
                                              </tr>
                                            </table>
                                          <? } ?></td>
                                      </tr>
                                      <tr>
                                        <td align="right"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">» <a href="http://<?=$titler[13];?>/cate-4/กัลโซ่-เซเรียอา-อิตาลี" title="อ่านข่าวทั้งหมด" style="color:#010101;">อ่านข่าวทั้งหมด</a></span></td>
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
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="360" align="center" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="45" align="center" valign="top" style="background-image:url(img/bg-title-bundes.png); background-repeat:no-repeat;"><img src="img/title-bundes.png" width="350" height="35" /></td>
                        </tr>
                        <tr>
                          <td style="background-image:url(img/bg-league.png); background-repeat:repeat-y; background-color:#abb0b6; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="10"></td>
                                  </tr>
                                </table>
                                  <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><?
$sbd="SELECT id, title, short_detail, img FROM `post` where cate_id='5' ORDER BY id DESC LIMIT 0,1";
$rebd=mysql_query($sbd) or die("ERROR $sbd");
$rbd=mysql_fetch_row($rebd);
$urlbd=rewrite($rbd[1]);
?>
                                          <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="center"><a href="topic-<?=$rbd[0];?>/<?=$urlbd;?>.html" title="<?=$rbd[1];?>">
                                                      <? if($rbd[3]!=""){ ?>
                                                      <img src="post-s-img/<?=$rbd[3];?>" alt="<?=$rbd[1];?>" title="<?=$rbd[1];?>" width="330" height="205" border="0" />
                                                      <? }else{ ?>
                                                      <img src="post-s-img/no-img.png" alt="<?=$rbd[1];?>" title="<?=$rbd[1];?>" width="330" height="205" border="0" />
                                                      <? } ?>
                                                    </a></td>
                                                  </tr>
                                                </table>
                                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="5"></td>
                                                    </tr>
                                                </table></td>
                                            </tr>
                                            <tr>
                                              <td align="left"><a href="topic-<?=$rbd[0];?>/<?=$urlbd;?>.html" title="<?=$rbd[1];?>" style="color:#4e0101; font-size:12px; font-weight:bold;">
                                                <?=$rbd[1];?>
                                              </a></td>
                                            </tr>
                                            <tr>
                                              <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$rbd[2]", 0,100,"UTF-8"); ?></td>
                                            </tr>
                                        </table></td>
                                    </tr>
                                    <tr>
                                      <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="10"></td>
                                          </tr>
                                        </table>
                                          <?
$sbd2="SELECT id, title FROM `post` where cate_id='5' ORDER BY id DESC LIMIT 1,5";
$rebd2=mysql_query($sbd2) or die("Error $sbd2");
while($rbd2=mysql_fetch_row($rebd2)){
$urlbd2=rewrite($rbd2[1]);
?>
                                          <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                              <td width="5" align="left">&nbsp;</td>
                                              <td width="309" align="left"><a href="topic-<?=$rbd2[0];?>/<?=$urlbd2;?>.html" title="<?=$rbd2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;">
                                                <?=$rbd2[1];?>
                                              </a></td>
                                            </tr>
                                          </table>
                                        <? } ?>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="right"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">» <a href="http://<?=$titler[13];?>/cate-5/บุนเดสลีกา-เยอรมัน" title="อ่านข่าวทั้งหมด" style="color:#010101;">อ่านข่าวทั้งหมด</a></span></td>
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
                      </table>
                      </td>
                      <td width="8" align="center" valign="top">&nbsp;</td>
                      <td width="360" align="center" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="45" align="center" valign="top" style="background-image:url(img/bg-title-uefa.png); background-repeat:no-repeat;"><img src="img/title-uefa.png" width="350" height="35" /></td>
                        </tr>
                        <tr>
                          <td style="background-image:url(img/bg-league.png); background-repeat:repeat-y; background-color:#abb0b6; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="10"></td>
                                    </tr>
                                  </table>
                                    <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
<?
$suf="SELECT id, title, short_detail, img FROM `post` where cate_id='6' ORDER BY id DESC LIMIT 0,1";
$reuf=mysql_query($suf) or die("ERROR $suf");
$ruf=mysql_fetch_row($reuf);
$urluf=rewrite($ruf[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td align="center"><a href="topic-<?=$ruf[0];?>/<?=$urluf;?>.html" title="<?=$ruf[1];?>">
                                                        <? if($ruf[3]!=""){ ?>
                                                        <img src="post-s-img/<?=$ruf[3];?>" alt="<?=$ruf[1];?>" title="<?=$ruf[1];?>" width="330" height="205" border="0" />
                                                        <? }else{ ?>
                                                        <img src="post-s-img/no-img.png" alt="<?=$ruf[1];?>" title="<?=$ruf[1];?>" width="330" height="205" border="0" />
                                                        <? } ?>
                                                      </a></td>
                                                    </tr>
                                                  </table>
                                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td height="5"></td>
                                                      </tr>
                                                  </table></td>
                                              </tr>
                                              <tr>
                                                <td align="left"><a href="topic-<?=$ruf[0];?>/<?=$urluf;?>.html" title="<?=$ruf[1];?>" style="color:#4e0101; font-size:12px; font-weight:bold;"><?=$ruf[1];?></a></td>
                                              </tr>
                                              <tr>
                                                <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$ruf[2]", 0,100,"UTF-8"); ?></td>
                                              </tr>
                                          </table></td>
                                      </tr>
                                      <tr>
                                        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                          </table>
<?
$suf2="SELECT id, title FROM `post` where cate_id='6' ORDER BY id DESC LIMIT 1,5";
$reuf2=mysql_query($suf2) or die("Error $suf2");
while($ruf2=mysql_fetch_row($reuf2)){
$urluf2=rewrite($ruf2[1]);
?>
                                            <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                                <td width="5" align="left">&nbsp;</td>
                                                <td width="309" align="left"><a href="topic-<?=$ruf2[0];?>/<?=$urluf2;?>.html" title="<?=$ruf2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$ruf2[1];?></a></td>
                                              </tr>
                                            </table>
<? } ?>
										</td>
                                      </tr>
                                      <tr>
                                        <td align="right"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">» <a href="http://<?=$titler[13];?>/cate-6/ยูฟ่าแชมป์เปี้ยนส์ลีก" title="อ่านข่าวทั้งหมด" style="color:#010101;">อ่านข่าวทั้งหมด</a></span></td>
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
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center">
<?
$sads6="SELECT * FROM `ads_a6` ORDER BY id ASC";
$reads6=mysql_query($sads6) or die("Error $sads6");
while($rads6=mysql_fetch_row($reads6)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle">
						  <?
						  if($rads6[1]==1){
						  $ads6=stripslashes($rads6[3]);
						  echo $ads6;
						  }else if($rads6[1]==2){
						  ?>
                            <a href="<?=$rads6[7];?>" title="<?=$rads6[8];?>" target="_blank">
                            <? if($rads6[2]==1){  ?>
                            <img src="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" alt="<?=$rads6[8];?>" width="728" border="0" title="<?=$rads6[8];?>" />
                            <? }else if($rads6[2]==2){ ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                              <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" />
                              <param name="quality" value="high" />
                              <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads6[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
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
                <tr>
                  <td align="center">
				   <table width="728" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(img/bg-sport-news.png); background-repeat:repeat-y; background-color:#d5e020; border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;">
                    <tr>
                      <td height="50"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="left"><img src="img/title-sport-news.png" width="360" height="45" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                        </table>
                          <table width="718" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" style="background-color:#FFFFFF; border-top-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
                                  <table width="708" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="300" align="center" valign="top"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="center">
<?
$ssn="SELECT id, title, short_detail, img FROM `post` where cate_id='8' ORDER BY id DESC LIMIT 0,1";
$resn=mysql_query($ssn) or die("ERROR $ssn");
$rsn=mysql_fetch_row($resn);
$urlsn=rewrite($rsn[1]);
?>
                                                <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td align="center"><a href="topic-<?=$rsn[0];?>/<?=$urlsn;?>.html" title="<?=$rsn[1];?>">
                                                            <? if($rsn[3]!=""){ ?>
                                                            <img src="post-s-img/<?=$rsn[3];?>" alt="<?=$rsn[1];?>" title="<?=$rsn[1];?>" width="300" height="200" border="0" />
                                                            <? }else{ ?>
                                                            <img src="post-s-img/no-img.png" alt="<?=$rsn[1];?>" title="<?=$rsn[1];?>" width="300" height="200" border="0" />
                                                            <? } ?>
                                                          </a></td>
                                                        </tr>
                                                      </table>
                                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                            <td height="5"></td>
                                                          </tr>
                                                      </table></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left"><a href="topic-<?=$rsn[0];?>/<?=$urlsn;?>.html" title="<?=$rsn[1];?>" style="color:#6d0019; font-size:12px; font-weight:bold;"><?=$rsn[1];?></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="color:#232323; font-size:12px;"><? echo mb_substr("$rsn[2]", 0,100,"UTF-8"); ?></td>
                                                  </tr>
                                              </table></td>
                                          </tr>
                                          <tr>
                                            <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="10"></td>
                                                </tr>
                                              </table>
<?
$ssn3="SELECT id, title FROM `post` where cate_id='8' ORDER BY id DESC LIMIT 5,5";
$resn3=mysql_query($ssn3) or die("Error $ssn3");
while($rsn3=mysql_fetch_row($resn3)){
$urlsn3=rewrite($rsn3[1]);
?>
                                                <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td width="16" align="center"><img src="img/icon-stud.png" width="16" height="16" /></td>
                                                    <td width="5" align="left">&nbsp;</td>
                                                    <td width="279" align="left"><a href="topic-<?=$rsn3[0];?>/<?=$urlsn3;?>.html" title="<?=$rsn3[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rsn3[1];?></a></td>
                                                  </tr>
                                                </table>
<? } ?>
                                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="5"></td>
                                                  </tr>
                                              </table></td>
                                          </tr>
                                      </table></td>
                                      <td width="408" align="center" valign="top">
<?
$ssn2="SELECT id, title, img, short_detail FROM `post` where cate_id='8' ORDER BY id DESC LIMIT 1,4";
$resn2=mysql_query($ssn2) or die("Error $ssn2");
while($rsn2=mysql_fetch_row($resn2)){
$urlsn2=rewrite($rsn2[1]);
?>
                                          <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="100" align="center" valign="top"><table width="100" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#a2a2a2">
                                                  <tr>
                                                    <td align="center" bgcolor="#FFFFFF"><a href="topic-<?=$rsn2[0];?>/<?=$urlsn2;?>.html" title="<?=$rsn2[1];?>">
                                                      <? if($rsn2[2]==""){ ?>
                                                      <img src="post-s-img/no-img.png" alt="<?=$rsn2[1];?>" width="100" height="75" border="0" title="<?=$rsn2[1];?>" />
                                                      <? }else{ ?>
                                                      <img src="post-s-img/<?=$rsn2[2];?>" alt="<?=$rsn2[1];?>" width="100" height="75" border="0" title="<?=$rsn2[1];?>" />
                                                      <? } ?>
                                                    </a></td>
                                                  </tr>
                                              </table></td>
                                              <td width="10" align="center" valign="top">&nbsp;</td>
                                              <td width="290" align="center" valign="top"><table width="290" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="left"><a href="topic-<?=$rsn2[0];?>/<?=$urlsn2;?>.html" title="<?=$rsn2[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#6d0019;"><?=$rsn2[1];?></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323;"><?=$rsn2[3];?></td>
                                                  </tr>
                                              </table></td>
                                            </tr>
                                          </table>
                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
<? } ?>
									  <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="right"><a href="cate-8/ข่าวกีฬา" title="อ่านทั้งหมด" style="color:#232323; font-size:12px; font-weight:bold; font-family:'Times New Roman', Times, serif;">» อ่านทั้งหมด</a></td>
                                        </tr>
                                      </table></td>
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
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
              <td width="7" align="center" valign="top">&nbsp;</td>
              <td width="250" align="center" valign="top"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
<? if($fbr[2]==1){ ?>
                <tr>
                  <td align="center"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="42" align="center"><img src="img/title-fb.png" width="250" height="42" /></td>
                      </tr>
                      <tr>
                        <td align="center" style="background-color:#c7cbce; background-image:url(img/bg-inbox.png); background-repeat:repeat-x; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;">
						 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                        </table>
                          <table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" bgcolor="#FFFFFF"><?=$fbr[1];?></td>
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
<? } ?>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="42" align="center"><img src="img/title-ball-thai.png" width="250" height="42" /></td>
                    </tr>
                    <tr>
                      <td align="center" style="background-color:#c7cbce; background-image:url(img/bg-inbox.png); background-repeat:repeat-x; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                        </table>
                          <table width="240" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                            <tr>
                              <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                              </table>
                                <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="center">
<?
$sft="SELECT id, title, short_detail, img FROM `post` where cate_id='7' ORDER BY id DESC LIMIT 0,1";
$reft=mysql_query($sft) or die("ERROR $sft");
$rft=mysql_fetch_row($reft);
$urlft=rewrite($rft[1]);
?>
                                      <table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="center"><a href="topic-<?=$rft[0];?>/<?=$urlft;?>.html" title="<?=$rft[1];?>">
                                                  <? if($rft[3]!=""){ ?>
                                                  <img src="post-s-img/<?=$rft[3];?>" alt="<?=$rft[1];?>" title="<?=$rft[1];?>" width="230" height="150" border="0" />
                                                  <? }else{ ?>
                                                  <img src="post-s-img/no-img.png" alt="<?=$rft[1];?>" title="<?=$rft[1];?>" width="230" height="150" border="0" />
                                                  <? } ?>
                                                </a></td>
                                              </tr>
                                            </table>
                                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="5"></td>
                                                </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><a href="topic-<?=$rft[0];?>/<?=$urlft;?>.html" title="<?=$rft[1];?>" style="color:#053698; font-size:12px; font-weight:bold;"><?=$rft[1];?></a></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><span style="color:#232323; font-size:12px;"><? echo mb_substr("$rft[2]", 0,100,"UTF-8"); ?></span></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                  <tr>
                                    <td align="center">
<?
$strSQL4="SELECT id, title, img FROM `post` where cate_id='7' ORDER BY id DESC LIMIT 1,6";
		$objQuery4=mysql_query($strSQL4) or die("ERROR $strSQL4 บรรทัด 240-248");
		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows4=0;
		while($objResult4=mysql_fetch_row($objQuery4))
		{
		$url4=rewrite($objResult4[1]);
			echo "<td width='115' align='center' valign='top'>";
			$intRows4++;
?>
                                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                      <table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center"><table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td align="center"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>">
                                                  <? if($objResult4[2]!=""){ ?>
                                                  <img src="post-s-img/<?=$objResult4[2];?>" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                  <? }else{ ?>
                                                  <img src="post-s-img/no-img.png" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                  <? } ?>
                                                </a></td>
                                              </tr>
                                            </table>
                                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td height="5"></td>
                                                </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>" style="color:#0d2962; font-size:12px;"><?=$objResult4[1];?></a></td>
                                        </tr>
                                      </table>
<?
			echo"</td>";
			if(($intRows4)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?></td>
                                  </tr>
                                  <tr>
                                    <td height="20" align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#010101;">» <a href="http://<?=$titler[13];?>/cate-7/ข่าวฟุตบอลไทย" title="อ่านข่าวทั้งหมด" style="color:#010101;">อ่านข่าวทั้งหมด</a></td>
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
                    <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="42" align="center" style="background-image:url(img/bg-picpost.png); background-repeat:no-repeat;"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="100" align="left"><img src="img/title-picpost.png" width="100" height="25" /></td>
                            <td width="130" align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">» <a href="http://<?=$titler[13];?>/cate-10/รูปเซ็กซี่" title="ดูทั้งหมด" style="color:#FFFFFF;">ดูทั้งหมด</a></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="center" style="background-color:#c7cbce; background-image:url(img/bg-inbox.png); background-repeat:repeat-x; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                          </table>
                            <table width="240" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                              <tr>
                                <td align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
<?
$strSQL4="SELECT id, title, img FROM `post` where cate_id='10' ORDER BY id DESC LIMIT 0,10";
		$objQuery4=mysql_query($strSQL4) or die("ERROR $strSQL4 บรรทัด 240-248");
		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows4=0;
		while($objResult4=mysql_fetch_row($objQuery4))
		{
		$url4=rewrite($objResult4[1]);
			echo "<td width='115' align='center' valign='top'>";
			$intRows4++;
?>
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="center"><table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="center"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>">
                                                      <? if($objResult4[2]!=""){ ?>
                                                      <img src="post-s-img/<?=$objResult4[2];?>" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                      <? }else{ ?>
                                                      <img src="post-s-img/no-img.png" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                      <? } ?>
                                                    </a></td>
                                                  </tr>
                                                </table>
                                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="5"></td>
                                                    </tr>
                                                </table></td>
                                            </tr>
                                            <tr>
                                              <td align="left"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>" style="color:#232323; font-size:12px;"><?=$objResult4[1];?></a></td>
                                            </tr>
                                          </table>
<?
			echo"</td>";
			if(($intRows4)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?></td>
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
                    <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="42" align="center" style="background-image:url(img/bg-clip.png); background-repeat:no-repeat;"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" align="left"><img src="img/title-clip.png" width="150" height="25" /></td>
                              <td width="80" align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">» <a href="http://<?=$titler[13];?>/cate-9/คลิปไฮไลท์ฟุตบอล" title="ดูทั้งหมด" style="color:#FFFFFF;">ดูทั้งหมด</a></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="center" style="background-color:#232323; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:5px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                          </table>
                            <table width="240" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF; border-top-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
                              <tr>
                                <td align="center"><table width="230" border="0" align="center" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td align="center">
<?
$strSQL4="SELECT id, title, img FROM `post` where cate_id='9' ORDER BY id DESC LIMIT 0,10";
		$objQuery4=mysql_query($strSQL4) or die("ERROR $strSQL4 บรรทัด 240-248");
		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows4=0;
		while($objResult4=mysql_fetch_row($objQuery4))
		{
		$url4=rewrite($objResult4[1]);
			echo "<td width='115' align='center' valign='top'>";
			$intRows4++;
?>
                                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="5"></td>
                                            </tr>
                                          </table>
                                          <table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td align="center"><table width="110" border="0" align="center" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td align="center"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>">
                                                      <? if($objResult4[2]!=""){ ?>
                                                      <img src="post-s-img/<?=$objResult4[2];?>" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                      <? }else{ ?>
                                                      <img src="post-s-img/no-pic.png" alt="<?=$objResult4[1];?>" width="110" height="75" border="0" title="<?=$objResult4[1];?>" />
                                                      <? } ?>
                                                    </a></td>
                                                  </tr>
                                                </table>
                                                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td height="5"></td>
                                                    </tr>
                                                </table></td>
                                            </tr>
                                            <tr>
                                              <td align="left"><a href="topic-<?=$objResult4[0];?>/<?=$url4;?>.html" title="<?=$objResult4[1];?>" style="color:#232323; font-size:12px;">
                                                <?=$objResult4[1];?>
                                              </a></td>
                                            </tr>
                                          </table>
                                        <?
			echo"</td>";
			if(($intRows4)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
?></td>
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
<?
$sads7="SELECT * FROM `ads_a7` ORDER BY id ASC";
$reads7=mysql_query($sads7) or die("Error $sads7");
while($rads7=mysql_fetch_row($reads7)){
?>
  <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
<?
if($rads7[1]==1){
$ads7=stripslashes($rads7[3]);
echo $ads7;
}else if($rads7[1]==2){
?>
        <a href="<?=$rads7[7];?>" title="<?=$rads7[8];?>" target="_blank">
        <? if($rads7[2]==1){  ?>
        <img src="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" width="250" border="0" title="<?=$rads7[8];?>" alt="<?=$rads7[8];?>" />
        <? }else if($rads7[2]==2){ ?>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="250" border="0">
          <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" />
          <param name="quality" value="high" />
          <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads7[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="250"></embed>
        </object>
        <? } ?>
        </a>
<? } ?>
		 </td>
		</tr>
<? } ?>
              </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </td>
  </tr>
  <tr>
    <td align="center"><? include "top-footer.php"; ?></td>
  </tr>
</table>
<? include "footer.php"; ?>
</body>
</html>
