<?php 
@session_start(); 
include "../inc/config.inc.php";
include "../function/datethai.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
$member_id=$_GET[member_id];
$s5="SELECT member.*, province.PROVINCE_NAME FROM member ";
$s5.="INNER JOIN province ON member.province_id = province.PROVINCE_ID ";
$s5.="WHERE member.id='$member_id'";
$re5=mysql_query($s5) or die("ERROR บรรทัด 5-9");
$r5=mysql_fetch_row($re5);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
	color: #000000;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: underline;
	color: #FFFFFF;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	background-color: #888888;
}
-->
</style></head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="90" bgcolor="#666666"><div align="center">
            <table width="960" border="0" cellspacing="1" cellpadding="1">
              <tr valign="top">
                <td width="690"><div align="left"><font color="#ffffff" size="4">.:: ยินดีต้อนรับเข้าสู่ ระบบจัดการข้อมูลเว็บไซต์ ::
                  <?php
				$dm=date("d/m");
				$y=date("Y")+543;
				$date="$dm/$y";
				$time=date("H:i:s");
				echo "$date $time";
				?>
                  ::.</font></div></td>
                <td width="270"><div align="right"><font color="#ffffff" size="4"><a href="../index.php" target="_blank"><font color="#ffffff">ไปยังหน้าเว็บไซต์</font></a> | <a href="logout.php"><font color="#ffffff">ออกจากระบบ</font></a></font></div></td>
              </tr>
            </table>
        </div></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="220" align="center" valign="top"><?php include "menu.php"; ?></td>
              <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="all-member.php">จัดการข้อมูลรายชื่อสมาชิก</a></font></strong><strong><font size="2"> <img src="images/arrow.gif" width="7" height="11" /> </font><font color="#000000" size="2">รายละเอียดข้อมูลสมาชิก</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="70" align="left" valign="middle"><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="left" valign="top"><table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td></td>
                                  </tr>
                                </table>
                                  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="150" height="20" align="right"><strong> <font color="#000000" size="2">วันที่สมัครสมาชิก</font> </strong></td>
                                      <td height="20" align="center">:</td>
                                      <td width="540" height="20" align="left"><table width="530" border="0" align="left" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left"><font size="2">
                                              <?php
							  $regDate = $r5[9];
							  echo DateThai($regDate);
							  ?>
                                            </font></td>
                                            <td width="50" align="right"><font size="2"><a href="del-member.php?member_id=<?php echo $member_id; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td width="150" height="20" align="right"><strong><font color="#000000" size="2">ชื่อที่ใช้เรียก / ฉายา</font></strong> </td>
                                      <td height="20" align="center">:</td>
                                      <td width="540" height="20" align="left"><font color="#000000" size="2"><?php echo $r5[1]; ?> </font><font size="2"></font></td>
                                    </tr>
                                    <tr>
                                      <td width="150" height="20" align="right"><strong><font color="#000000" size="2">ที่อยู่</font></strong></td>
                                      <td width="10" height="20" align="center">:</td>
                                      <td width="540" height="20" align="left"><font size="2">
                                        <?php echo $r5[2]; ?>
                                      </font></td>
                                    </tr>

                                    <tr>
                                      <td width="150" height="20" align="right"><strong><font color="#000000" size="2">จังหวัด</font></strong></td>
                                      <td width="10" height="20" align="center">&nbsp;</td>
                                      <td height="20" align="left"><font size="2">
                                        <?php echo $r5[10]; ?>
                                      </font></td>
                                    </tr>
                                    <tr>
                                      <td width="150" height="20" align="right"><strong><font color="#000000" size="2">เบอร์โทรศัพท์</font> </strong></td>
                                      <td width="10" height="20" align="center">:</td>
                                      <td width="540" height="20" align="left"><font color="#000000" size="2"><?php echo "$r5[4]"; ?></font></td>
                                    </tr>
                                    <tr>
                                      <td width="150" height="20" align="right"><strong> <font color="#000000" size="2">Email</font> </strong></td>
                                      <td width="10" height="20" align="center">:</td>
                                      <td width="540" height="20" align="left"><font color="#000000" size="2"><?php echo "$r5[5]"; ?></font></td>
                                    </tr>
                                    <tr>
                                      <td height="20" align="right"><strong> <font color="#000000" size="2">รูป Avatar </font> </strong></td>
                                      <td height="20" align="center">:</td>
                                      <td height="20" align="left"><?php if($r5[6]!=""){ ?>
                                        <img src="../member/avatar/<?php echo $r5[6]; ?>" width="110" height="18" />
                                        <?php }else{ ?>
                                        <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#333333;">Avatar</span>
                                        <?php } ?></td>
                                    </tr>

                                    <tr>
                                      <td height="20" align="right">&nbsp;</td>
                                      <td height="20" align="center">&nbsp;</td>
                                      <td align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td height="20" align="right"><strong> <font color="#000000" size="2">ชื่อผู้ใช้</font> </strong></td>
                                      <td height="20" align="center">:</td>
                                      <td height="20" align="left"><font size="2">
                                        <?php echo $r5[7]; ?>
                                      </font></td>
                                    </tr>
                                    <tr>
                                      <td height="20" align="right"><strong><font color="#000000" size="2">รหัสผ่าน</font></strong></td>
                                      <td height="20" align="center">:</td>
                                      <td height="20" align="left"><font size="2">
                                        <?php echo $r5[8]; ?>
                                      </font></td>
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
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; ScritpWeb2U </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
