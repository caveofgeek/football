<?php 
@session_start(); 
include "../inc/config.inc.php";
if(!isset($_SESSION[mod_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลวิเคราะห์บอล ::.</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><div align="center">
      <table width="980" border="0" cellspacing="1" cellpadding="1">
        <tr valign="top">
          <td width="490"><div align="left"><font color="#000000" size="2">:: ยินดีต้อนรับเข้าสู่ ระบบจัดการ<font color="#333333">ข้อมูลวิเคราะห์บอล</font> :: | 
				<?php
				$dm=date("d/m");
				$y=date("Y")+543;
				$date="$dm/$y";
				$time=date("H:i:s");
				echo "$date $time";
				?> ::.<br />
                หน้าปัจจุบันของคุณ 
          :</font><font size="2"> <font color="#333333"><a href="main.php">หน้าหลัก</a> </font></font></div></td>
          <td width="490"><div align="right"><font color="#000000" size="2"><a href="../index.php" target="_blank"><font color="#000033">ไปยังหน้าเว็บไซต์</font></a> | <a href="logout.php"><font color="#000033">ออกจากระบบ</font></a></font></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100" align="center"><a href="main.php"><img src="img/adminuser.jpg" width="66" height="66" border="0" /></a></td>
            <td width="100" align="center"><a href="add-analyze.php"><img src="img/orderico.jpg" width="66" height="66" border="0" /></a></td>
            <td width="100" align="center"><a href="all-post-analyze.php"><img src="img/cate.jpg" width="66" height="66" border="0" /></a></td>
          </tr>
          <tr>
            <td width="100" height="20" align="center"><div align="center"><font size="2">ข้อมูลส่วนตัว</font></div></td>
            <td width="100" height="20" align="center"><div align="center"><font size="2">เพิ่มบทวิเคราะห์</font></div></td>
            <td width="100" align="center"><div align="center"><font size="2">รายการบทวิเคราะห์</font></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left"><font size="4"><strong>ข้อความ</strong></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
