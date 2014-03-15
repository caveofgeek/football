<?
session_start();
if(!isset($_SESSION[member_login])) {
echo "<meta http-equiv='refresh' content='0;url=../index.php'>" ;
exit() ;
}
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบจัดการข้อมูลสมาชิก | <?=$titler[1];?></title>
<meta name="robots"  content="index,follow">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">ประวัติการเล่นเกมส์</td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">

                      <tr>
                        <td><table width="630" border="0" align="center" cellpadding="1" cellspacing="1">
                            <tr>
                              <td width="95" bgcolor="#FFFF00"><font color="#FFFFFF" size="2">&nbsp;</font></td>
                              <td width="5">&nbsp;</td>
                              <td width="215"><font color="#232323" size="2">คุณเลือกทายชนะ</font></td>
                              <td width="95" bgcolor="#80F1A5">&nbsp;</td>
                              <td width="5">&nbsp;</td>
                              <td width="215"><font color="#232323" size="2">คุณเลือกทายเสมอ</font></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
                            <tr bgcolor="#990000">
                              <td width="15%" height="29"><div align="center"><font color="#FFFFFF" size="2">วันที่</font></div></td>
                              <td width="20%"><div align="center"><font color="#FFFFFF" size="2">เจ้าบ้าน</font></div></td>
                              <td width="14%"><div align="center"><font color="#FFFFFF" size="2">ผล</font></div></td>
                              <td width="21%"><div align="center"><font color="#FFFFFF" size="2">ทีมเยือน</font></div></td>
                              <td width="15%"><div align="center"><font color="#FFFFFF" size="2">ผลการทาย</font></div></td>
                            </tr>
<?
$strSQL = "SELECT game_match.game_date, game_match.home, game_match.away, game_match.score, game_match.result, game_play.result FROM `game_play` ";
$strSQL .="INNER JOIN game_match ON game_play.game_id=game_match.id ";
$strSQL .="WHERE game_play.member_id='$_SESSION[m_id]' ";
$strSQL .="ORDER BY game_play.id DESC ";
$objQuery = mysql_query($strSQL) or die("ERROR $strSQL");
$i=1;
while($objResult = mysql_fetch_row($objQuery)){
?>
                            <tr bgcolor="#990000">
                              <td height="20" align="center" bgcolor="#CCCCCC" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#000000;"><? echo DateThai($objResult[0]); ?> </td>
                              <td height="20" align="center" bgcolor="<? if($objResult[5]==1){ echo "#FFFF00"; }else if($objResult[5]==3){ echo "#80F1A5"; }else{ echo "#CCCCCC"; } ?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FF0000;"><?=$objResult[1];?></td>
                              <td height="20" align="center" bgcolor="#CCCCCC" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#000000;"><?=$objResult[3];?></td>
                              <td height="20" align="center" bgcolor="<? if($objResult[5]==2){ echo "#FFFF00";}else if($objResult[5]==3){ echo "#80F1A5"; }else{ echo "#CCCCCC"; } ?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FF0000;"><?=$objResult[2];?></td>
                              <td height="20" align="center" bgcolor="#CCCCCC" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#000000;">คุณทาย :
                                <? if($objResult[5]==$objResult[4]){ echo "ถูก";}else{ echo "ผิด"; } ?></td>
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
