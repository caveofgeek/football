<?php
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
<title>อันดับคะแนนสมาชิก | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $rgame[6]; ?>"> 
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> อันดับคะแนนสมาชิก <?php echo $rgame[5]; ?>">
<meta name="robots"  content="index,follow">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
<!--
body {
	background-color: #<?php echo $bgr[1]; ?>;
	<?php if($bgr[2]!=""){ ?>background-image: url(http://<?php echo $titler[13]; ?>/bg-img/<?php echo $bgr[2]; ?>);
	background-repeat: <?php echo $bgr[3]; ?>;
	<?php }if($bgr[4]==1){ ?>	
	background-attachment:fixed;
	<?php } ?>
}
a:link {
	color: #<?php echo $linkr[1]; ?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?php echo $linkr[2]; ?>;
}
a:hover {
	text-decoration: underline;
	color: #<?php echo $linkr[3]; ?>;
}
a:active {
	text-decoration: none;
	color: #<?php echo $linkr[4]; ?>;
}
.style6 {font-size: small; font-weight: bold; color: #FFFFFF; }
-->
</style>
</head>

<body>
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include "../header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><?php include "../menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">อันดับคะแนนสมาชิก 100 คนล่าสุด </td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                      <tr style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;">
                        <td width="75" height="30" align="center"><span class="style6">อันดับ</span></td>
                        <td width="200" height="30" align="center"><span class="style6">ชื่อที่ใช้เรียก / ฉายา </span></td>
                        <td width="75" height="30" align="center"><span class="style6">ถูก</span></td>
                        <td width="75" height="30" align="center"><span class="style6">ผิด</span></td>
                        <td width="75" height="30" align="center"><span class="style6">คะแนน</span></td>
                      </tr>
<?php	


$strSQL = "SELECT member_id, SUM(yes), SUM(no), SUM(point) FROM `game_member_score` GROUP BY member_id ORDER BY SUM(point) DESC, member_id DESC LIMIT 0,100";
$objQuery = mysql_query($strSQL) or die("ERROR $strSQL");
$i=1;
while($objResult = mysql_fetch_row($objQuery)){
?>
                      <tr>
                        <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                          <?php echo $i; ?>
                        </font></td>
                        <td width="200" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                          <?php 
$smem = "SELECT name, img FROM `member` WHERE id='$objResult[0]'";
$remem = mysql_query($smem) or die("ERROR $smem");
$rmem = mysql_fetch_row($remem);
if($rmem[1]!=""){ ?>
                          <img src="http://<?php echo $titler[13]; ?>/member/avatar/<?php echo $rmem[1]; ?>" width="120" height="19" />
                          <?php }else{ ?>
                          <?php echo $rmem[0]; ?>
                          <?php } ?>
                        </font> </td>
                        <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                          <?php echo $objResult[1]; ?>
                        </font></td>
                        <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                          <?php echo $objResult[2]; ?>
                        </font></td>
                        <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                          <?php echo $objResult[3]; ?>
                        </font></td>
                      </tr>
                      <?php $i++; } ?>
                    </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><?php include "../top-footer.php"; ?></td>
  </tr>
</table>
<?php include "../footer.php"; ?>
</body>
</html>
