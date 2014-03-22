<?php
session_start();
include "inc/config.inc.php";
include "function/datethai.php";
include "function/function.php";
$title="select * from web_detail where id=1";
$titlere=mysql_query($title) or die("ERROR $title บรททัด4");
$titler=mysql_fetch_row($titlere);
$link="select * from link where id=1";
$linkre=mysql_query($link) or die("ERROR $link บรททัด7");
$linkr=mysql_fetch_row($linkre);
$banner="select * from site_logo where id=1";
$bannerre=mysql_query($banner) or die("ERROR $banner บรททัด10");
$bannerr=mysql_fetch_row($bannerre);
$bg="select * from bg where id=1";
$bgre=mysql_query($bg) or die("ERROR $bg บรททัด13");
$bgr=mysql_fetch_row($bgre);
$footer="select * from footer_logo where id=1";
$refooter=mysql_query($footer) or die("ERROR $footer บรททัด10");
$rfooter=mysql_fetch_row($refooter);
$fb="select * from fanpage where id=1";
$fbre=mysql_query($fb) or die("ERROR $fb บรททัด16");
$fbr=mysql_fetch_row($fbre);
$st="select * from stats where id=1";
$stre=mysql_query($st) or die("ERROR $st บรททัด19");
$str=mysql_fetch_row($stre);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลงทะเบียนสมัครสมาชิก | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $titler[12]; ?>">
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> ลงทะเบียนสมัครสมาชิก <?php echo $titler[11]; ?>">
<meta name="robots"  content="index,follow">
<?php
$check=$_POST['check'];
if($check!=1){
?>
<script language="JavaScript" type="text/javascript">
	alert('ขอโทษครับ ท่านยังไม่ได้ยอมรับเงื่อนไขข้อตกลงในการสมัครสมาชิกครับ');
	window.location = 'member-condition.php';
</script>
<?php exit(); } ?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
body {
	background-color: #<?php echo $bgr[1]; ?>;
	<?php if($bgr[2]!=""){ ?>background-image: url(http://<?php echo $titler[13]; ?>/bg-img/<?php echo $bgr[2]; ?>);
	background-repeat: <?php echo $bgr[3]; ?>;
	<?php }if($bgr[4]==1){ ?>
	background-attachment:fixed;
	<?php } ?>
}
a:link {
	color: #<?php echo $linkr[1]; ?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?php echo $linkr[2]; ?>;
}
a:hover {
	text-decoration: underline;
	color: #<?php echo $linkr[3]; ?>;
}
a:active {
	text-decoration: none;
	color: #<?php echo $linkr[4]; ?>;
}
-->
</style>
</head>

<body>
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include "header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><?php include "menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?php
$sads8="SELECT * FROM `ads_a8` ORDER BY id ASC";
$reads8=mysql_query($sads8) or die("Error $sads8");
while($rads8=mysql_fetch_row($reads8)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">
						  <?php
						  if($rads8[1]==1){
						  $ads8=stripslashes($rads8[3]);
						  echo $ads8;
						  }else if($rads8[1]==2){
						  ?>
                              <a href="<?php echo $rads8[7]; ?>" title="<?php echo $rads8[8]; ?>" target="_blank">
                              <?php if($rads8[2]==1){  ?>
                              <img src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" alt="<?php echo $rads8[8]; ?>" width="728" border="0" title="<?php echo $rads8[8]; ?>" />
                              <?php }else if($rads8[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                                <param name="movie" value="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" />
                                <param name="quality" value="high" />
                                <embed src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object>
                              <?php }} ?>
                            </a></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<?php } ?>
				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">ลงทะเบียนสมัครสมาชิก</td>
                </tr>
                <tr>
                  <td>
                    <form class="form-horizontal" role="form" action="p-register.php" method="post" enctype="multipart/form-data" name ="checkForm1" id="checkForm1" onsubmit="return check2()">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">:: ข้อมูลการติดต่อ :: </label>
                      </div>

                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">ชื่อที่ใช้เรียก / ฉายา <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="name" class="form-control" type="text" id="name"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">ที่อยู่ </label>
                        <div class="col-sm-5">
                          <textarea class="form-control" name="add" id="add" row="3" col="3"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="province" class="col-sm-3 control-label">จังหวัด <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <select class="form-control" id="province" name="province" onchange = "list_province(this.value)" >
                                          <option selected="selected" value="">- กรุณาเลือกจังหวัด -</option>
                                          <?php
  $strSQL = "SELECT * FROM province ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  while($objResult = mysql_fetch_array($objQuery))
  {
  ?>
                                          <option value="<?php echo $objResult["PROVINCE_ID"]; ?>">
                                          <?php echo $objResult["PROVINCE_NAME"]; ?>
                                          </option>
                                          <?php
  }
  ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="tel" class="col-sm-3 control-label">เบอร์โทรศัพท์ <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="tel" type="text" id="tel" class="form-control"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="email" type="text" id="email" class="form-control"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="file1" class="col-sm-3 control-label">รูป Avatar <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="file1" type="file" id="file1" class="form-control"/>
                          <span class="help-block"><font size="2" color="#FF0000">* ขนาด 120x19 px ไม่เกิน 50kb </font></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="file1" class="col-sm-3 control-label">:: ข้อมูลการเข้าสู่ระบบ ::</label>
                      </div>

                      <div class="form-group">
                        <label for="user" class="col-sm-3 control-label">ชื่อผู้ใช้ <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="user" type="text" id="user" class="form-control"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="pass" class="col-sm-3 control-label">รหัสผ่าน <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="pass" type="password" id="pass" class="form-control"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="repass" class="col-sm-3 control-label">ยืนยันรหัสผ่าน <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-5">
                          <input name="repass" type="password" id="repass" class="form-control"/>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="capcha" class="col-sm-3 control-label">
<?php
$rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,4);
echo $rand;
?> <font size="2" color="#FF0000">*</font></label>
                        <div class="col-sm-3">
                          <input name="capcha" type="text" id="capcha" class="form-control"/>
                          <span class="help-block"><font size="2" color="#FF0000">* กรอกรหัสยืนยัน</font></span>
                          <input type="hidden" name="rands" id="rands" value="<?php echo $rand; ?>" />
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                          <input class="btn btn-success" type="submit" name="Submit" value="สมัครสมาชิก" />
                          <input class="btn btn-danger" type="reset" name="Submit2" value="ยกเลิก"  />
                        </div>
                      </div>

                    </form>
                      </td>
                        </tr>
                      </table>
                      <script language="JavaScript" type="text/javascript">

function check2() {
if(document.checkForm1.name.value=="") {
alert("กรุณากรอก ชื่อที่ใช้เรียก / ฉายา ด้วยนะครับ") ;
document.checkForm1.name.focus() ;
return false ;
}
else if(document.checkForm1.add.value=="") {
alert("กรุณากรอกที่อยู่ด้วยนะครับ") ;
document.checkForm1.add.focus() ;
return false ;
}
else if(document.checkForm1.province.value=="") {
alert("กรุณาเลือกจังหวัดด้วยนะครับ") ;
document.checkForm1.province.focus() ;
return false ;
}
else if(document.checkForm1.tel.value=="") {
alert("กรุณากรอกเบอร์โทรศัพท์ด้วยนะครับ") ;
document.checkForm1.tel.focus() ;
return false ;
}
else if(document.checkForm1.email.value=="") {
alert("กรุณากรอก Email ด้วยนะครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('@')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(checkForm1.email.value.indexOf('.')==-1) {
alert("Email ของคุณไม่ถูกต้องครับ") ;
document.checkForm1.email.focus() ;
return false ;
}
else if(document.checkForm1.user.value=="") {
alert("กรุณากรอกชื่อที่ใช้เข้าระบบของคุณด้วยนะครับ") ;
document.checkForm1.user.focus() ;
return false ;
}
else if(document.checkForm1.pass.value=="") {
alert("กรุณากรอกรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm1.pass.focus() ;
return false ;
}
else if(document.checkForm1.repass.value=="") {
alert("กรุณากรอกยืนยันรหัสผ่านของคุณด้วยนะครับ") ;
document.checkForm1.repass.focus() ;
return false ;
}
else if(document.checkForm1.pass.value != document.checkForm1.repass.value) {
alert("รหัสผ่านของคุณกรอกไม่ตรงกันครับ") ;
document.checkForm1.repass.focus() ;
return false ;
}
else if(document.checkForm1.capcha.value=="") {
alert("กรุณากรอกรหัสยืนยันด้วยนะครับ") ;
document.checkForm1.capcha.focus() ;
return false ;
}
else if(document.checkForm1.capcha.value != <?php echo $rand; ?>) {
alert("คุณกรอกรหัสยืนยันไม่ถูกต้องครับ") ;
document.checkForm1.capcha.focus() ;
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
      </table></td>
  </tr>
  <tr>
    <td align="center"><?php include "top-footer.php"; ?></td>
  </tr>
</table>
<?php include "footer.php"; ?>
</body>
</html>
