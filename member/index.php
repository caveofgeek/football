<?php
session_start();
if(!isset($_SESSION["member_login"])) {
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
<title>ระบบจัดการข้อมูลสมาชิก | <?php echo $titler[1]; ?></title>
<meta name="robots"  content="index,nofollow">
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
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">ระบบจัดการข้อมูลสมาชิก</td>
                </tr>
                <tr>
                  <td align="center"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><?php
$sp="select member.*, province.PROVINCE_NAME from member ";
$sp.="inner join province on member.province_id=province.PROVINCE_ID ";
$sp.="where id='$_SESSION["m_id"]'";
$rep=mysql_query($sp) or die("ERROR $sp");
$rp=mysql_fetch_row($rep);
?>
                                  <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="30" align="left"><font size="2" color="#0066FF"><strong>:: ข้อมูลการติดต่อ :: </strong></font></td>
                                    </tr>
                                    <tr>
                                      <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="130" height="20" align="right"><strong><font size="2">ชื่อที่ใช้เรียก </font></strong></td>
                                            <td width="10" height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><font size="2">
                                              <?php echo $rp[1]; ?>
                                            </font></td>
                                          </tr>
                                          <tr>
                                            <td width="130" height="20" align="right"><strong><font size="2">ที่อยู่</font></strong></td>
                                            <td width="10" height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><font size="2">
                                              <?php echo $rp[2]; ?>
                                            </font></td>
                                          </tr>
                                          <tr>
                                            <td width="130" height="20" align="right"><strong><font size="2">จังหวัด</font></strong></td>
                                            <td width="10" height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><font size="2">
                                              <?php echo $rp[10]; ?>
                                            </font></td>
                                          </tr>
                                          <tr>
                                            <td width="130" height="20" align="right"><strong><font size="2">เบอร์โทรศัพท์</font></strong></td>
                                            <td width="10" height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><font size="2">
                                              <?php echo $rp[4]; ?>
                                            </font></td>
                                          </tr>
                                          <tr>
                                            <td width="130" height="20" align="right"><strong><font size="2">Email</font></strong></td>
                                            <td width="10" height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><font size="2">
                                              <?php echo $rp[5]; ?>
                                            </font></td>
                                          </tr>
                                          <tr>
                                            <td height="20" align="right"><strong><font size="2">รูป Avatar </font></strong></td>
                                            <td height="20" align="center"><font size="2">:</font></td>
                                            <td width="580" height="20" align="left"><?php if($rp[6]!=""){ ?>
                                                <img src="avatar/<?php echo $rp[6]; ?>" width="120" height="19" />
                                                <?php }else{ ?>
                                                <font size="2" color="#FF0000">ไม่พบรูป Avatar</font>
                                                <?php } ?></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                </table></td>
                            </tr>
                            <tr>
                              <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="30" align="left"><font size="2" color="#0066FF"><strong>:: ข้อมูลการเข้าสู่ระบบ :: </strong></font></td>
                                  </tr>
                                  <tr>
                                    <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td width="130" height="20" align="right"><strong><font size="2">ชื่อผู้ใช้</font></strong></td>
                                          <td width="10" height="20" align="center"><font size="2">:</font></td>
                                          <td width="580" height="20" align="left"><font size="2">
                                            <?php echo $rp[7]; ?>
                                          </font></td>
                                        </tr>
                                        <tr>
                                          <td width="130" height="20" align="right"><strong><font size="2">รหัสผ่าน</font></strong></td>
                                          <td width="10" height="20" align="center"><font size="2">:</font></td>
                                          <td width="580" height="20" align="left"><font size="2">
                                            <?php echo $rp[8]; ?>
                                          </font></td>
                                        </tr>
                                        <tr>
                                          <td width="130" height="20" align="right" valign="top">&nbsp;</td>
                                          <td width="10" height="20" align="center" valign="top">&nbsp;</td>
                                          <td width="580" height="20" align="right"><a href="edit-personal.php" title="แก้ไขข้อมูล"><img src="../img/edit-button.jpg" width="77" height="22" border="0" title="แก้ไขข้อมูล" alt="แก้ไขข้อมูล" /></a></td>
                                        </tr>
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
