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

$id=$_GET["id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เล่นเกมส์ทายผลบอล | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $rgame[6]; ?>"> 
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> เล่นเกมส์ทายผลบอล <?php echo $rgame[5]; ?>">
<meta name="robots"  content="index,follow">
<?php
//เช็คทายผลรายคู่
$s="SELECT * FROM `game_play` WHERE member_id='$_SESSION["m_id"]' AND game_id='$id'";
$re=mysql_query($s) or die("ERROR $s");
$n=mysql_num_rows($re);
if($n>=1){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ท่านได้ทำการทายผลคู่นี้ไปแล้วครับ'); 	
		window.location = 'index.php'; 
	</script> 
<?php
exit();
}
//เช็คเวลาเล่นเกมส์
$time=date("H:i:s");
$s3="SELECT gametime FROM `game_config`";
$re3=mysql_query($s3) or die("ERROR $s3");
$r3=mysql_fetch_row($re3);
if($time>$r3[0]){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ หมดเวลาทายผลแล้วครับ'); 	
		window.location = 'index.php'; 
	</script> 
<?php
exit();
}
//เช็คจำนวนทายผลรายวัน
$today_date=date("Y-m-d");
$s2="SELECT * FROM `game_play` WHERE member_id='$_SESSION["m_id"]' AND dategame='$today_date'";
$re2=mysql_query($s2) or die("ERROR $s2");
$n2=mysql_num_rows($re2);
if($n2>=5){
?>
	<script language="JavaScript"> 	
		alert('ขอโทษครับ ท่านได้ทำการทายผลเกิน 5 คู่ต่อวันแล้ว ร่วมสนุกใหม่วันพรุ่งนี้นะครับ'); 	
		window.location = 'index.php'; 
	</script> 
<?php
exit();
}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">ทายผลบอล</td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1">

                      <tr>
                        <td><div align="left"><span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FF0000; font-weight:bold;">ทายผลประจำวันที่</span> <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#232323; font-weight:bold;">
                            <?php $game_date=DateThai($today_date); echo $game_date; ?>
                        </span></div></td>
                      </tr>
                      <tr>
                        <td align="center"><form method="post" action="playgame-save.php">
                            <?php
$sql="select game_league.league, game_match.game_date, game_match.game_time, game_match.home, game_match.away from game_match ";
$sql.="inner join game_league on game_match.league_id=game_league.id ";
$sql.="where game_match.id='$id'";
$db_resule=mysql_query($sql);
$row=mysql_fetch_row($db_resule);
?>
                            <table width="97%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
                              <tr bgcolor="#FFFFFF">
                                <td width="20%" height="20"><div align="right"><font color="#333333" size="3">ลีกบอล
                                  :</font></div></td>
                                <td width="80%" height="20"><font color="#990000" size="3">
                                  <?php echo $row[0]; ?>
                                  </font>
                                    <input type="hidden" name="game_id" value="<?php echo $id; ?>" />                                </td>
                              </tr>
                              <tr bgcolor="#FFFFFF">
                                <td height="20"><div align="right"><font color="#333333" size="3">ประจำวันที่
                                  :</font></div></td>
                                <td height="20"><font color="#990000" size="3">
                                  <?php echo Datethai($row[1]); ?>
                                </font></td>
                              </tr>
                              <tr bgcolor="#FFFFFF">
                                <td height="20"><div align="right"><font color="#333333" size="3">เวลาแข่งขัน
                                  :</font></div></td>
                                <td height="20"><font color="#990000" size="3">
                                  <?php echo $row[2]; ?>
                                  น. </font></td>
                              </tr>
                              <tr bgcolor="#FFFFFF">
                                <td height="20"><div align="right"><font color="#333333" size="3">เจ้าบ้าน
                                  :</font></div></td>
                                <td height="20"><font color="#990000" size="3">
                                  <?php echo $row[3]; ?>
                                </font></td>
                              </tr>
                              <tr bgcolor="#FFFFFF">
                                <td height="20"><div align="right"><font color="#333333" size="3">ทีมเยือน
                                  :</font></div></td>
                                <td height="20"><font color="#990000" size="3">
                                  <?php echo $row[4]; ?>
                                </font></td>
                              </tr>
                              <tr bgcolor="#FFFFCC">
                                <td height="20"><div align="right"><strong><font color="#FF0000" size="3">ทายผล
                                  :</font></strong></div></td>
                                <td height="20"><font size="3">
                                  <input type="radio" name="result" value="1" />
                                  <?php echo $row[3]; ?>
                                  ชนะ
                                  <input type="radio" name="result" value="2" />
                                  <?php echo $row[4]; ?>
                                  ชนะ
                                  <input type="radio" name="result" value="3" />
                                  เสมอกัน </font></td>
                              </tr>
                              <tr bgcolor="#FFFFCC"></tr>
                              <tr bgcolor="#FFFFFF">
                                <td height="20">&nbsp;</td>
                                <td height="20"><input type="submit" name="Submit" value="บันทุกข้อมูล" /></td>
                              </tr>
                            </table>
                        </form>
                            </div></td>
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
    <td align="center"><?php include "../top-footer.php"; ?></td>
  </tr>
</table>
<?php include "../footer.php"; ?>
</body>
</html>
