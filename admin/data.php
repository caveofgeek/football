<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$s="SELECT * FROM `web_detail` WHERE id='1'";
$re=mysql_query($s) or die("Error $s");
$r=mysql_fetch_row($re);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> ข้อมูลเว็บไซต์ </font></strong></td>
                  </tr>
                  <tr>
                    <td>
                      <form id="form1" name="form1" method="post" action="p-data.php" class="form-horizontal" role="form">
                        <div class="form-group">
                          <label for="name" class="col-sm-2 control-label">ชื่อเว็บไซต</label>
                          <div class="col-sm-8">
                            <input name="name" class="form-control" type="text" id="name" value="<?php echo $r[1]; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="add" class="col-sm-2 control-label">ที่อยู่</label>
                          <div class="col-sm-8">
                            <input name="add"  class="form-control" type="text" id="add" value="<?php echo $r[2]; ?>"/>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="url" class="col-sm-2 control-label">URL http:// </label>
                          <div class="col-sm-8">
                            <input name="url" class="form-control" type="text" id="url" value="<?php echo $r[13]; ?>"/>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tel" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                          <div class="col-sm-8">
                            <input name="tel" class="form-control" type="text" id="tel" value="<?php echo $r[3]; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="tel" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                          <div class="col-sm-8">
                            <input name="tel" class="form-control" type="text" id="tel" value="<?php echo $r[3]; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="email" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-8">
                            <input name="email" class="form-control" type="text" id="email" value="<?php echo $r[4]; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="fax" class="col-sm-2 control-label">แฟกซ์</label>
                          <div class="col-sm-5">
                            <input name="fax" class="form-control" type="text" id="fax" value="<?php echo $r[5]; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="fax" class="col-sm-2 control-label">วันทำการ</label>
                          <div class="col-sm-5 form-inline">
                            <select name="date_s" id="date_s" class="form-control">
                              <option value="อาทิตย์" <?php if($r[6]=="อาทิตย์"){ echo "selected";} ?>>อาทิตย์</option>
                              <option value="จันทร์" <?php if($r[6]=="จันทร์"){ echo "selected";} ?>>จันทร์</option>
                              <option value="อังคาร" <?php if($r[6]=="อังคาร"){ echo "selected";} ?>>อังคาร</option>
                              <option value="พุธ" <?php if($r[6]=="พุธ"){ echo "selected";} ?>>พุธ</option>
                              <option value="พฤหัสบดี" <?php if($r[6]=="พฤหัสบดี"){ echo "selected";} ?>>พฤหัสบดี</option>
                              <option value="ศุกร์" <?php if($r[6]=="ศุกร์"){ echo "selected";} ?>>ศุกร์</option>
                              <option value="เสาร์" <?php if($r[6]=="เสาร์"){ echo "selected";} ?>>เสาร์</option>
                            </select>
                            -
                            <select name="date_f" id="date_f" class="form-control">
                              <option value="อาทิตย์" <?php if($r[7]=="อาทิตย์"){ echo "selected";} ?>>อาทิตย์</option>
                              <option value="จันทร์" <?php if($r[7]=="จันทร์"){ echo "selected";} ?>>จันทร์</option>
                              <option value="อังคาร" <?php if($r[7]=="อังคาร"){ echo "selected";} ?>>อังคาร</option>
                              <option value="พุธ" <?php if($r[7]=="พุธ"){ echo "selected";} ?>>พุธ</option>
                              <option value="พฤหัสบดี" <?php if($r[7]=="พฤหัสบดี"){ echo "selected";} ?>>พฤหัสบดี</option>
                              <option value="ศุกร์" <?php if($r[7]=="ศุกร์"){ echo "selected";} ?>>ศุกร์</option>
                              <option value="เสาร์" <?php if($r[7]=="เสาร์"){ echo "selected";} ?>>เสาร์</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="time_s" class="col-sm-2 control-label">เวลาทำการ</label>
                          <div class="col-sm-8 form-inline">
                            <input name="time_s" class="form-control" type="text" id="time_s" value="<?php echo $r[8]; ?>" />
                            -
                            <input name="time_f" class="form-control" type="text" id="time_f" value="<?php echo $r[9]; ?>" /> น.
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="fax" class="col-sm-2 control-label">Title</label>
                          <div class="col-sm-8">
                            <textarea name="title" class="form-control" cols="50" rows="3" id="title"><?php echo $r[10]; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="description" class="col-sm-2 control-label">Description</label>
                          <div class="col-sm-8">
                            <textarea name="description" class="form-control" cols="50" rows="5" id="description"><?php echo $r[11]; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="keyword" class="col-sm-2 control-label">Keyword</label>
                          <div class="col-sm-8">
                            <textarea name="keyword" class="form-control" cols="50" rows="3" id="keyword"><?php echo $r[12]; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="Submit" value="บันทึกข้อมูล" class="btn btn-success" />
                          </div>
                        </div>
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
