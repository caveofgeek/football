<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$s="select * from bg where id=1";
$re=mysql_query($s) or die("ERROR $s บรททัด12");
$r=mysql_fetch_row($re);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
<script type="text/javascript" src="jscolor.js"></script>
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลพื้นหลังเว็บไซต์ </font></strong></td>
                  </tr>
                  <tr>
                    <td>
                      <form action="p-bg.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <div class="form-group">
                          <label for="color" class="col-sm-2 control-label">สีพื้นหลัง</label>
                          <div class="col-sm-8 form-inline">
                            <input name="color" class="color form-control" id="color" value="<?php echo $r[1]; ?>" maxlength="6" />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="file1" class="col-sm-2 control-label">ภาพพื้นหลัง</label>
                          <div class="col-sm-8 form-inline">
                            <input name="file1" type="file" class="form-control" id="file1" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="file1" class="col-sm-2 control-label">เลื่อนตาม Scrollbar</label>
                          <div class="col-sm-8 form-inline">
                            <div class="radio">
                              <label>
                                <input name="fix" type="radio" value="2" <?php if($r[4]==2){ echo "checked";} ?> /> เลื่อน
                                <input name="fix" type="radio" value="1" <?php if($r[4]==1){ echo "checked";} ?> /> ไม่เลื่อน
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="file1" class="col-sm-2 control-label">repeat</label>
                          <div class="col-sm-8 form-inline">
                            <div class="checkbox">
                              <label>
                                <select name="repeat" id="repeat">
                                  <option value="no-repeat" <?php if($r[3]=="no-repeat"){ echo "selected";} ?>>no-repeat</option>
                                  <option value="repeat" <?php if($r[3]=="repeat"){ echo "selected";} ?>>repeat</option>
                                  <option value="repeat-x" <?php if($r[3]=="repeat-x"){ echo "selected";} ?>>repeat-x</option>
                                  <option value="repeat-y" <?php if($r[3]=="repeat-y"){ echo "selected";} ?>>repeat-y</option>
                                </select>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-8 form-inline">
                            <input type="hidden" id="op" name="op" value="<?php echo $r[2]; ?>" />
                            <br />
                            <?php if($r[2]!=""){ ?>
                            <font size="2" color="#333333"><strong><a href="../bg-img/<?php echo $r[2]; ?>" target="_blank">คลิกที่นี่</a> เพื่อดูภาพพื้นหลัง หรือ <a href="del-bg.php?img=<?php echo $r[2]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}">ลบภาพพื้นหลัง</a> </strong></font>
                            <?php } ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" name="Submit" value="บันทึกข้อมูล" class="btn btn-success" />
                          </div>
                        </div>
                      </form>
                    </td>
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
