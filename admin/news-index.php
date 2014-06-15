<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$s="SELECT * FROM `news_index` WHERE id='1'";
$re=mysql_query($s) or die("Error $s");
$r=mysql_fetch_row($re);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:720, height:450, useCSS:true})[0].focus();
      });
</script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลประกาศหน้าเว็บบอร์ด</font></strong></td>
                  </tr>
                  <tr>
                    <td><form id="form1" name="form1" method="post" action="p-news-index.php">
                      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="left">
						  <?php $msg=stripslashes($r[1]); ?>
						  <textarea class="cleditorMain" id="input" name="input" style="width:720px; height:450px;"><?php echo $msg; ?></textarea>
						  </td>
                        </tr>
                        <tr>
                          <td align="center"><br><input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' /></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2014 &copy; scriptweb2u  Modify By Ruk-Com.In.Th</font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
