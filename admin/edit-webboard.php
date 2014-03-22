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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="all-webboard.php">จัดการข้อมูลรายการเว็บบอร์ด</a></font></strong><strong><font size="2"> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลรายการเว็บบอร์ด</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><?php
$topic_id=$_GET["id"];
$strWB="SELECT * FROM `webboard` WHERE id='$topic_id'";
$WBQuery=mysql_query($strWB) or die("ERROR บรรทัด 131");
$WBResult=mysql_fetch_row($WBQuery);
?>
                            <form action="p-edit-webboard.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                              <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="30" align="left"><strong><font size="2">หัวข้อ</font></strong></td>
                                </tr>
                                <tr>
                                  <td height="30" align="left"><input name="title" type="text" id="title" style="width:700px;" value="<?php echo $WBResult[3]; ?>" /></td>
                                </tr>
                                <tr>
                                  <td height="30" align="left"><strong><font size="2">เลือกหมวดหมู่</font></strong></td>
                                </tr>
                                <tr>
                                  <td height="30" align="left"><select name="cate" id="cate" style="width:350px;">
                                      <option value="">- กรุณาเลือกหมวดหมู่ -</option>
                                      <?php
$scate="SELECT * FROM `webboard_category` ORDER BY id ASC";
$recate=mysql_query($scate) or die("ERROR $scate");
while($rcate=mysql_fetch_row($recate)){
?>
                                      <option value="<?php echo $rcate[0]; ?>" <?php if($WBResult[2]==$rcate[0]){ echo "selected";} ?>>
                                      <?php echo $rcate[1]; ?>
                                      </option>
                                      <?php } ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="30" align="left"><strong><font size="2">รายละเอียด</font></strong></td>
                                </tr>
                                <tr>
                                  <td align="left" class="cleditorMain">
								  <?php $msg=stripslashes($WBResult[4]); ?>
								  <textarea id="input" name="input" style="width:720px; height:450px;"><?php echo $msg; ?></textarea>
								  </td>
                                </tr>
                                <tr>
                                  <td height="30" align="left"><?php if($WBResult[5]!=""){?>
                                      <img src="../board-img/<?php echo $WBResult[5]; ?>" width="50" />
                                      <input type="hidden" id="op" name="op" value="<?php echo $WBResult[5]; ?>" />
                                      <?php } ?>
                                      <strong><font size="2">ไฟล์ภาพ
                                        <input name="file1" type="file" id="file1" />
                                      </font></strong><font size="2" color="#FF0000">* ขนาดภาพไม่เกิน 200kb
                                        <input type="hidden" name="topic_id" id="topic_id" value="<?php echo $topic_id; ?>" />
                                    </font></td>
                                </tr>
                                <tr>
                                  <td height="30" align="center"><input type="submit" name="Submit" value="แก้ไขข้อมูล" /></td>
                                </tr>
                              </table>
                            </form></td>
                      </tr>
                    </table></td>
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
