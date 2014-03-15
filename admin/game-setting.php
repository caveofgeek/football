<?php 
@session_start(); 
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 

exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
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
.style4 {font-size: small; font-weight: bold; }
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลตั้งค่าเกมส์</font></strong>
<?php
$s="SELECT * FROM `game_config` where id='1'";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
?>
					</td>
                  </tr>
                  <tr>
                    <td><form action="p-game-setting.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                      <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="200" align="right"><span class="style4">กำหนดทายผลก่อนเวลา</span></td>
                              <td width="10">&nbsp;</td>
                              <td width="300"><input name="gametime" type="text" id="gametime" value="<?php echo $r[1]; ?>" /></td>
                            </tr>
                            <tr>
                              <td width="200" align="right"><span class="style4">กำหนดคะแนนทายถูก</span></td>
                              <td width="10">&nbsp;</td>
                              <td width="300"><input name="win" type="text" id="win" value="<?php echo $r[2]; ?>" /></td>
                            </tr>
                            <tr>
                              <td align="right"><span class="style4">กำหนดคะแนนทายผิด</span></td>
                              <td>&nbsp;</td>
                              <td><input name="lost" type="text" id="lost" value="<?php echo $r[3]; ?>" /></td>
                            </tr>

                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="100" align="left" valign="top"><font color="#000000" size="2">Title</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="350" align="left"><textarea name="title" cols="50" rows="3" id="title"><?php echo $r[4]; ?></textarea></td>
                            </tr>
                            <tr>
                              <td width="100" align="left" valign="top"><font color="#000000" size="2">Description</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="350" align="left"><textarea name="description" cols="50" rows="3" id="description"><?php echo $r[5]; ?></textarea></td>
                            </tr>
                            <tr>
                              <td width="100" align="left" valign="top"><font color="#000000" size="2">Keyword</font></td>
                              <td width="10">&nbsp;</td>
                              <td width="350" align="left"><textarea name="keyword" cols="50" rows="3" id="keyword"><?php echo $r[6]; ?></textarea></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30" align="center"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
                      <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.user.value=="") {
alert("กรุณากรอกชื่อผู้ใช้ด้วยนะครับ") ;
document.checkForm.user.focus() ;
return false ;
}else if(document.checkForm.pass.value=="") {
alert("กรุณากรอกรหัสผ่านด้วยนะครับ") ;
document.checkForm.pass.focus() ;
return false ;
}
else
return true ;
}
                      </script>
                    </form></td>
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
