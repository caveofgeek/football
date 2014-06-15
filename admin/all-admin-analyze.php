<?php
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
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
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<link href="./css/admin.css" rel="stylesheet">
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลทีมงานวิเคราะห์บอล </font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <form class="form-horizontal" role="form" action="p-admin-analyze.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <div class="form-group">
                              <label for="name" class="col-sm-3 control-label">ชื่อที่ใช้เรียก / ฉายา <font size="2" color="#FF0000">*</font></label>
                              <div class="col-sm-5">
                                <input name="name" class="form-control" type="text" id="name" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="file1" class="col-sm-3 control-label">รูป Avatar <font size="2" color="#FF0000">*</font></label>
                              <div class="col-sm-5">
                                <input name="file1" class="form-control" type="file" id="file1" />
                                <span class="help-block"><font size="2" color="#FF0000">* ขนาด 110x18 px ไม่เกิน 50kb </font></span>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="user" class="col-sm-3 control-label">ชื่อผู้ใช้<font size="2" color="#FF0000">*</font></label>
                              <div class="col-sm-5">
                                <input name="user" class="form-control" type="text" id="user" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="pass" class="col-sm-3 control-label">รหัสผ่าน<font size="2" color="#FF0000">*</font></label>
                              <div class="col-sm-5">
                                <input name="pass" class="form-control" type="password" id="pass" />
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-10">
                                <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
                              </div>
                            </div>
                          </form>

<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.name.value=="") {
alert("กรุณากรอก ชื่อที่ใช้เรียก / ฉายา ด้วยนะครับ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.user.value=="") {
alert("กรุณากรอกชื่อที่ใช้เข้าระบบของคุณด้วยนะครับ") ;
document.checkForm.user.focus() ;
return false ;
}
else if(document.checkForm.pass.value=="") {
alert("กรุณากรอกรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm.pass.focus() ;
return false ;
}
else
return true ;
}

</script>
                        </td>
                      </tr>
                      <tr>
                        <td><table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                              <tr>
                                <td width="150" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">ชื่อที่ใช้เรียก/ฉายา</span></td>
                                <td width="130" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">รูป Avatar </span></td>
                                <td width="100" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">ชื่อผู้ใช้</span></td>
                                <td width="100" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">รหัสผ่าน</span></td>
                                <td width="120" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">วันที่ลงทะเบียน</span></td>
                                <td width="150" height="30" align="center" valign="middle" bgcolor="#EFEFED"><span class="style4">การกระทำ</span></td>
                              </tr>
                              <?php
$s="SELECT * FROM `admin_analyze` ORDER BY id ASC";
$re=mysql_query($s) or die("ERROR $s");
while($r=mysql_fetch_row($re)){
?>
                              <tr>
                                <td width="150" height="25" align="center" valign="middle"><font size="2">
                                  <?php echo $r[1]; ?>
                                </font> </td>
                                <td width="130" height="25" align="center" valign="middle"><font size="2">
                                  <?php if($r[2]==""){ echo "ไม่มีรูป Avatar"; }else{ ?>
                                  <img src="../mod/avatar/<?php echo $r[2]; ?>" width="110" height="18" /></font>
								  <?php } ?>								</td>
                                <td width="100" height="25" align="center" valign="middle"><font size="2">
                                  <?php echo $r[3]; ?>
                                </font></td>
                                <td width="100" height="25" align="center" valign="middle"><font size="2">
                                  <?php echo $r[4]; ?>
                                </font> </td>
                                <td width="120" height="25" align="center" valign="middle"><font size="2">
                                  <?php echo DateThai($r[5]); ?>
                                </font> </td>
                                <td width="200" height="25" align="center" valign="middle">
                                  <font size="2">
                                    <a href="all-post-analyze.php?id=<?php echo $r[0]; ?>" class='btn btn-primary btn-xs white'>ดูโพสต์</a>
                                    <a href="edit-admin-analyze.php?id=<?php echo $r[0]; ?>" class='btn btn-warning btn-xs white'>
                                      <i class="glyphicon glyphicon-pencil"></i> แก้ไข
                                    </a>
                                    <a href="del-admin-analyze.php?id=<?php echo $r[0]; ?>&img=<?php echo $r[2]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}" class='btn btn-danger btn-xs white'>
                                      <i class="glyphicon glyphicon-remove"></i> ลบ
                                    </a>
                                  </font>
                                </td>
                                </tr>
                              <?php } ?>
                          </table></td>
                      </tr>
                    </table></td>
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
