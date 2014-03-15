<?
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}
$s="select * from link where id=1";
$re=mysql_query($s) or die("ERROR $s บรททัด12");
$r=mysql_fetch_row($re);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<script type="text/javascript" src="jscolor.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
a:link {
	color: #<?=$r[1];?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?=$r[2];?>;
}
a:hover {
	text-decoration: underline;
	color: #<?=$r[3];?>;
}
a:active {
	text-decoration: none;
	color: #<?=$r[4];?>;
}
body {
	background-color: #888888;
}
.style1 {color: #000000}
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
                  <?
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
              <td width="220" align="center" valign="top"><? include "menu.php"; ?></td>
              <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลสีลิงค์</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="20"><font size="2"><strong><span class="style1">:: ตัวอย่าง ::</span></strong></font><font size="2" color="#333333"><strong> <a href="#">ลิงค์ของท่าน</a></strong></font></td>
                      </tr>
                      <tr>
                        <td><form id="form1" name="form1" method="post" action="p-linkcolor.php">
                            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="295" align="left"><font size="2" color="#333333"><strong>Link Color</strong></font>
                                          <input name="color" class="color" id="color" value="<?=$r[1];?>" maxlength="6" /></td>
                                      <td width="10" align="left">&nbsp;</td>
                                      <td width="295" align="left"><font size="2" color="#333333"><strong>Rollover Link
                                        <input name="rollover" class="color" id="rollover" value="<?=$r[3];?>" maxlength="6" />
                                      </strong></font></td>
                                    </tr>
                                    <tr>
                                      <td width="295" align="left"><font size="2" color="#333333"><strong>Visited Link
                                        <input name="visit" class="color" id="visit" value="<?=$r[2];?>" maxlength="6" />
                                      </strong></font></td>
                                      <td width="10" align="left">&nbsp;</td>
                                      <td width="295" align="left"><font size="2" color="#333333"><strong>Active Link
                                        <input name="active" class="color" id="active" value="<?=$r[4];?>" maxlength="6" />
                                      </strong></font></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center"><label>
                                  <input type="submit" name="Submit" value="บันทึกข้อมูล" />
                                </label></td>
                              </tr>
                            </table>
                        </form></td>
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
