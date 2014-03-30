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
$cate_id=mysql_real_escape_string($_GET["cate_id"]);
$scate="SELECT * FROM `category` WHERE id='$cate_id'";
$recate=mysql_query($scate) or die("ERROR $scate");
$rcate=mysql_fetch_row($recate);
?>
					<strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" />
					<?php if($cate_id>33){ ?>
					<a href="all-other-category.php?cate_id=<?php echo $cate_id; ?>">
					<?php }else if($cate_id<=33){ ?>
					<a href="all-main-category.php?cate_id=<?php echo $cate_id; ?>">
					<?php } ?>
					จัดการข้อมูลหมวดหมู่<?php echo $rcate[1]; ?>
					</a> <img src="images/arrow.gif" width="7" height="11" /> </font><font color="#000000" size="2">แก้ไขข้อมูลหมวดหมู่<?php echo $rcate[1]; ?>
					</font></strong></td>
                  </tr>
                  <tr>
                    <td>
                      <form class="form-horizontal" role="form" action="p-edit-category.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                        <div class="form-group">
                          <label for="cate_name" class="col-sm-3 control-label">ชื่อหมวดหมู่</label>
                          <div class="col-sm-5">
                            <input name="cate_name" class="form-control" type="text" id="cate_name" value="<?php echo $rcate[1]; ?>" />
                            <input type="hidden" name="cate_id" id="cate_id" value="<?php echo $cate_id; ?>" />
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="title" class="col-sm-3 control-label">Title</label>
                          <div class="col-sm-5">
                            <textarea name="title" class="form-control" id="title"><?php echo $rcate[2]; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="description" class="col-sm-3 control-label">Description</label>
                          <div class="col-sm-5">
                            <textarea name="description" class="form-control" id="description"><?php echo $rcate[3]; ?></textarea>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="keyword" class="col-sm-3 control-label">Keyword</label>
                          <div class="col-sm-5">
                            <textarea name="keyword" class="form-control" id="keyword"><?php echo $rcate[4]; ?></textarea>
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
if(document.checkForm.cate_name.value=="") {
alert("กรุณากรอกชื่อหมวดหมู่ด้วยนะครับ") ;
document.checkForm.cate_name.focus() ;
return false ;
}else if(document.checkForm.title.value=="") {
alert("กรุณากรอก Title ด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}else if(document.checkForm.description.value=="") {
alert("กรุณากรอก Description ด้วยนะครับ") ;
document.checkForm.description.focus() ;
return false ;
}else if(document.checkForm.keyword.value=="") {
alert("กรุณากรอก Keyword ด้วยนะครับ") ;
document.checkForm.keyword.focus() ;
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
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2014 &copy; scriptweb2u  Modify By Ruk-Com.In.Th</font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
