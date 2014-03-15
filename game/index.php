<?
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/function.php";
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
$sgame="select * from game_config where id=1";
$regame=mysql_query($sgame) or die("ERROR $sgame บรททัด19");
$rgame=mysql_fetch_row($regame);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rgame[4];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$rgame[6];?>">
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$rgame[5];?>">
<meta name="robots"  content="index,follow">
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
    <td align="center" valign="top"><? include "../header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><? include "../menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">เกมส์ทายผลบอล</td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">

                      <tr>
                        <td><div align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FF0000;">**
                          สมาชิกสามารถที่จะทายผลบอลวันต่อวันก่อนเวลา
                          <?=$rgame[1];?>
                          น.เท่านั้น **<br />
                          ท่านสามารถทายผลได้ไม่เกินวันละ 5 คู่ และเมื่อทายแล้วในคู่นั้น จะไม่สามารถเปลี่ยนการทายผลได้<br />
                          ทายถูกจะได้
                          <?=$rgame[2];?>
                          คะแนน ทายผิดจะได้
                          <?=$rgame[3];?>
                          คะแนน</div></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="50%" align="left"><div align="left"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FF0000; font-weight:bold;">ทายผลประจำวันที่</span> <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323; font-weight:bold;">
                                <? $today_date=date("Y-m-d"); $game_date=DateThai($today_date); echo $game_date; ?>
                            </span></div></td>
                            <td width="50%" align="right"><div align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323; font-weight:bold;">[ <a href="http://<?=$titler[13];?>/game/level.php" title="อันดับคะแนนสมาชิก">อันดับคะแนนสมาชิก</a> ]</div></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                            <tr style="background-image:url(http://<?=$titler[13];?>/img/bg-tab-login.png); background-repeat:repeat-x;">
                              <td width="7%" height="29"><div align="center"></div></td>
                              <td width="12%"><div align="center"><font color="#FFFFFF" size="2">เวลา</font></div></td>
                              <td width="21%"><div align="center"><font color="#FFFFFF" size="2">เจ้าบ้าน</font></div></td>
                              <td width="11%"><div align="center"><font color="#FFFFFF" size="2">ผล</font></div></td>
                              <td width="23%"><div align="center"><font color="#FFFFFF" size="2">ทีมเยือน</font></div></td>
                              <td width="11%"><div align="center"><font color="#FFFFFF" size="2">#</font><font color="#333333" size="2"> </font></div></td>
                            </tr>
<?
$sgm="select * from game_match where game_date = '$today_date' order by id asc";
$regm=mysql_query($sgm) or die("ERROR ");
$ngm=mysql_num_rows($regm);
if($ngm>=1){
$i=0;
while($rgm=mysql_fetch_row($regm)){
$i++;
if($i%2==0){
	$bg="#CCCCCC";
}else{
	$bg="#999999";
}
?>
                            <tr bgcolor="<?=$bg;?>">
                              <td align="center"><img src="images/pinn.gif" width="14" height="14" /></td>
                              <td align="center"><font color="#000000" size="2">
                                <?=$rgm[10];?>
                              </font></td>
                              <td align="center"><font color="#ff0000" size="2">
                                <?=$rgm[2];?>
                              </font></td>
                              <td align="center"><font color="#000000" size="2">
                                <?=$rgm[4];?>
                              </font></td>
                              <td align="center"><font color="#ff0000" size="2">
                                <?=$rgm[3];?>
                              </font></td>
                              <td align="center"><font color="#000033" size="2">
                                <?
								if($rgm[11]==1){
								  if(!isset($_SESSION[member_login])){
								  echo "เข้าระบบ!!!";
								  }else{
								  	if(date('H:m:s') >= "$rgame[1]"){
								  	echo "ปิดทายผล";
								  	}else{
								  	echo "<a href=playgame.php?id=$rgm[0]>ทายผล</a>";
								  	}
								  }
								}else{
								echo "ปิดทายผล";
								}
								?>
                              </font> </td>
                            </tr>
                            <? }}else{ ?>
                            <tr>
                              <td height="30" colspan="6" align="center"><font color="#666666" size="2"><strong>ยังไม่มีการเพิ่มข้อมูลค่ะ</strong></font></td>
                            </tr>
                            <? } ?>
                        </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><? include "../top-footer.php"; ?></td>
  </tr>
</table>
<? include "../footer.php"; ?>
</body>
</html>