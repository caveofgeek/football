<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION['mod_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลวิเคราะห์บอล ::.</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
        <td height="30" align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left"><font size="4"><strong>ข้อมูลส่วนตัว</strong></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center">
          <?php
$modid = $_SESSION['mod_id'];
$sql="SELECT * FROM `admin_analyze` WHERE id='$modid'";
$result=mysql_query($sql) or die("ERROR $sql");
$row=mysql_fetch_row($result);
?>
          <form action="p-edit-admin-analyze.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">ชื่อที่ใช้เรียก / ฉายา</label>
              <div class="col-sm-8">
                <input name="name" class="form-control" type="text" id="name" value="<?php echo $row[1]; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="file1" class="col-sm-2 control-label">รูป Avatar</label>
              <div class="col-sm-8">
                <input name="file1" class="form-control" type="file" id="file1" />
              </div>
              <br><br>
              <?php if($row[2]!=""){ ?>
                <img src="../mod/avatar/<?php echo $row[2]; ?>" width="110" height="18" />
                <font size="2" color="#FF0000">* ขนาด 110x18 px ไม่เกิน 50kb </font>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="user" class="col-sm-2 control-label">ชื่อผู้ใช้</label>
              <div class="col-sm-8">
                <input name="user" class="form-control" type="text" id="user" value="<?php echo $row[3]; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="pass" class="col-sm-2 control-label">รหัสผ่าน</label>
              <div class="col-sm-8">
                <input name="pass" class="form-control" type="text" id="pass" value="<?php echo $row[4]; ?>" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-8">
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
    </table></td>
  </tr>
</table>
</body>
</html>
