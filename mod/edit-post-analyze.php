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
</style>
</head>

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
            <td align="left"><font size="4"><strong>แก้ไขบทวิเคราะห์บอล</strong></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #999999; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
          <tr>
            <td>
              <?php
$id=$_GET["id"];
$spost="select * from `analyze` where id='$id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);
?>
              <form action="p-edit-analyze.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name ="checkForm" id="checkForm" onsubmit="return check1()">
                <br>
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">หัวข้อ</label>
                  <div class="col-sm-8">
                    <input name="title" class="form-control" type="text" id="title" value="<?php echo $rpost[2]; ?>"  />
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">รายละเอียด</label>
                  <div class="col-sm-8">
                    <textarea class="cleditorMain form-control" id="input" name="input" rows="5" cols="10"><?php echo $rpost[3]; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="status_comment" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-8">
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="1" <?php if($rpost[4]==1){ ?>checked="checked"<?php } ?> />
                        Comment ได้ทุกคน
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="2" <?php if($rpost[4]==2){ ?>checked="checked"<?php } ?> />
                        เฉพาะสมาชิก
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="3" <?php if($rpost[4]==3){ ?>checked="checked"<?php } ?> />
                        ไม่ให้ Comment
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
                  </div>
                </div>
              </form>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
              <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณากรอกชื่อหัวข้อด้วยนะครับ") ;
document.checkForm.title.focus() ;
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
</table>
</body>
</html>
