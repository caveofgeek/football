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
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:600, height:450, useCSS:true})[0].focus();
      });
</script>
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
                    <td height="25">
<?php
$cate_id=$_GET["cate_id"];
$scate="SELECT cate_name FROM `category` WHERE id='$cate_id'";
$recate=mysql_query($scate) or die("ERROR $scate");
$rcate=mysql_fetch_row($recate);
?>
                      <strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" />
<?php if($cate_id>21){ ?><a href="all-other-category.php?cate_id=<?php echo $cate_id; ?>"><?php }else if($cate_id<=21){ ?><a href="all-main-category.php?cate_id=<?php echo $cate_id; ?>"><?php } ?>จัดการข้อมูลหมวดหมู่<?php echo $rcate[0]; ?></a>
                      <img src="images/arrow.gif" width="7" height="11" /> </font><font color="#000000" size="2">เพิ่มข้อมูลหมวดหมู่<?php echo $rcate[0]; ?></font></strong></td>
                  </tr>
                  <tr>
                    <td>


					<form action="p-add-data-category.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name ="checkForm" id="checkForm" onsubmit="return check1()">
					  <div class="form-group">
              <label for="title" class="col-sm-2 control-label">หัวข้อ</label>
              <div class="col-sm-5">
                <input name="title" class="form-control" type="text" id="title" />
                <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $cate_id; ?>" />
              </div>
            </div>

            <div class="form-group">
              <label for="short_detail" class="col-sm-2 control-label">รายละเอียดย่อ</label>
              <div class="col-sm-5">
                <textarea name="short_detail" class="form-control" id="short_detail" style="width:600px; height:75px;"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="input" class="col-sm-2 control-label">รายละเอียด</label>
              <div class="col-sm-5">
                <textarea name="input" class="form-control" id="input" style="width:600px; height:450px;"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="file1" class="col-sm-2 control-label">รูปภาพ</label>
              <div class="col-sm-5">
                <input name="file1" class="form-control" type="file" id="file1" />
                <span class="help-block"><font color="#FF0000" size="2">* ขนาดไม่เกิน 50 KB </font></span>
              </div>
            </div>

            <div class="form-group">
              <label for="status_comment" class="col-sm-2 control-label">สถานะ</label>
              <div class="col-sm-8 form-inline">
                <div class="radio">
                  <label>
                    <input name="status_comment" type="radio" value="1" checked="checked" /> Comment ได้ทุกคน
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="status_comment" type="radio" value="2" /> เฉพาะสมาชิก
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input name="status_comment" type="radio" value="3" /> ไม่ให้ Comment
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="tag1" class="col-sm-2 control-label">TAG</label>
              <div class="col-sm-10 form-inline">
                <div class="col-sm-4">
                  1. <input class="form-control" name="tag1" type="text" id="tag1" />
                </div>
                <div class="col-sm-4">
                  2. <input class="form-control" name="tag2" type="text" id="tag2" />
                </div>
                <div class="col-sm-4">
                  3. <input class="form-control" name="tag3" type="text" id="tag3" />
                </div>

              </div>
            </div>

            <div class="form-group">
              <label for="file1" class="col-sm-2 control-label"></label>
              <div class="col-sm-10 form-inline">
                <div class="col-sm-4">
                  4. <input class="form-control" name="tag4" type="text" id="tag4" />
                </div>
                <div class="col-sm-4">
                  5. <input class="form-control" name="tag5" type="text" id="tag5" />
                </div>
                <div class="col-sm-4">
                  6. <input class="form-control" name="tag6" type="text" id="tag6" />
                </div>

              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
              </div>
            </div>
          </form>
<script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณากรอกชื่อหัวข้อด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}else if(document.checkForm.short_detail.value=="") {
alert("กรุณากรอกรายละเอียดย่อด้วยนะครับ") ;
document.checkForm.short_detail.focus() ;
return false ;
}else if(document.checkForm.detail.value=="") {
alert("กรุณากรอกรายละเอียดด้วยนะครับ") ;
document.checkForm.detail.focus() ;
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
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2014 &copy; Ruk-Com.in.th</font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
