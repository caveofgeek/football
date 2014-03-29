<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}

$type=$_GET['type'];
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /></font><font color="#000000" size="2"> <a href="ads-a2.php">จัดการข้อมูลพื้นที่โฆษณาตำแหน่ง A2 ขนาด 980 px</a></font><font size="2">  <img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูล </font><font color="#000000" size="2">พื้นที่โฆษณาตำแหน่ง A2</font></strong></td>
                  </tr>
                  <tr>
                    <td align="center"><form id="form1" name="form1" method="post" action="p-add-ads-a2.php" enctype="multipart/form-data">
                      <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ประเภทโฆษณา</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500"><select name="type" id="type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                              <option value="">- เลือกประเภทโฆษณา -</option>
                              <option value="add-ads-a2.php?type=1" <?php if($type==1){ echo "selected"; } ?>>HTML CODE</option>
                              <option value="add-ads-a2.php?type=2" <?php if($type==2){ echo "selected"; } ?>>ผู้ลงโฆษณาทั่วไป</option>
                            </select>
                          </td>
                        </tr>
                      </table>
<?php
if(isset($_GET['type'])){
if($type==1){
?>
                      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><table width="660" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="150" align="right"><font color="#000000" size="2">HTML CODE</font></td>
                                <td width="10">&nbsp;</td>
                                <td width="500"><input type="hidden" name="type_id" id="type_id" value="1" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td><textarea name="adsense" rows="10" id="adsense" style="width: 630px;"></textarea></td>
                        </tr>
                        <tr>
                          <td align="center"><input type="submit" name="Submit2" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
                      <?php }else if($type==2){ ?>
                      <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">เลือกประเภท</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="type_ads" type="radio" value="1" checked="checked"/>
                              <font color="#000000" size="2">รูปภาพ
                                <input name="type_ads" type="radio" value="2"/>
                                แฟลช </font>
                              <input type="hidden" name="type_id" id="type_id" value="2" /></td>
                        </tr>
                        <tr>
                          <td align="right"><font color="#000000" size="2">ไฟล์โฆษณา</font></td>
                          <td>&nbsp;</td>
                          <td align="left"><input name="file1" type="file" id="file1" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">คำอธิบาย</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="keyword" type="text" id="keyword" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ลิงค์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="url" type="text" id="url" size="50" />
                              <br />
                              <font size="2" color="#FF0000">ใส่ http:// ด้วย เช่น http://www.domain.com </font></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">วันที่</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="start_date" type="text" id="start_date" />
                              <font color="#000000" size="2">ถึง
                                <input name="finish_date" type="text" id="finish_date" />
                            </font></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">ชื่อลูกค้า</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="name" type="text" id="name" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">เบอร์โทรศัพท์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="tel" type="text" id="tel" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right"><font color="#000000" size="2">อีเมล์</font></td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="email" type="text" id="email" /></td>
                        </tr>
                        <tr>
                          <td width="150" align="right">&nbsp;</td>
                          <td width="10">&nbsp;</td>
                          <td width="500" align="left"><input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" /></td>
                        </tr>
                      </table>
                      <?php }}else{ echo "<br>เลือกประเภทโฆษณาก่อนนะครับ";} ?>
                    </form></td>
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
