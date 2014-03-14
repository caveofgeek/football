<?
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
<title>ติดต่อเรา ติดต่อลงโฆษณา | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> ติดต่อเรา ติดต่อลงโฆษณา <?=$titler[11];?>">
<meta name="robots"  content="index,follow">
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(http://<?=$titler[13];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? }if($bgr[4]==1){ ?>	
	background-attachment:fixed;
	<? } ?>
}
a:link {
	color: #<?=$linkr[1];?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?=$linkr[2];?>;
}
a:hover {
	text-decoration: underline;
	color: #<?=$linkr[3];?>;
}
a:active {
	text-decoration: none;
	color: #<?=$linkr[4];?>;
}
-->
</style>
</head>

<body>
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><? include "menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?
$sads8="SELECT * FROM `ads_a8` ORDER BY id ASC";
$reads8=mysql_query($sads8) or die("Error $sads8");
while($rads8=mysql_fetch_row($reads8)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">
						  <? 
						  if($rads8[1]==1){ 
						  $ads8=stripslashes($rads8[3]); 
						  echo $ads8;
						  }else if($rads8[1]==2){ 
						  ?>
                              <a href="<?=$rads8[7];?>" title="<?=$rads8[8];?>" target="_blank">
                              <? if($rads8[2]==1){  ?>
                              <img src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" alt="<?=$rads8[8];?>" width="728" border="0" title="<?=$rads8[8];?>" />
                              <? }else if($rads8[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                                <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" />
                                <param name="quality" value="high" />
                                <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object>
                              <? }} ?>
                            </a></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<? } ?>
				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">ติดต่อเรา</td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="360" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="30" align="left"><font size="2"><strong>หากท่านต้องการแนะนำ ติชม แจ้งปัญหาการใช้งาน ติดต่อลงโฆษณา หรือสอบถามข้อมูลการให้บริการ ท่านสามารถติดต่อเราผ่านช่องทาง ดังต่อไปนี้</strong></font></td>
                            </tr>
                            <tr>
                              <td><?
$s9="SELECT * FROM `web_detail`";
$re9=mysql_query($s9)or die("Err $s9 บรรทัด103");
$r9=mysql_fetch_row($re9);
?>
                                  <table width="340" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td align="left"><font size="2" color="#0000FF"><strong>
                                        <?=$r9[1];?>
                                      </strong></font></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><font size="2">ที่อยู่
                                        <?=$r9[2];?>
                                      </font></td>
                                    </tr>
                                    <tr>
                                      <td align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td align="left"><font size="2">เบอร์โทรศัพท์
                                        <?=$r9[3];?>
                                            <? if($r9[5]!=""){ echo "แฟกซ์ $r9[5]";} ?>
                                      </font></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><font size="2">Email :
                                        <?=$r9[4];?>
                                      </font></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><font size="2">หรือ ผ่านฟอร์มการติดต่ออนไลน์ ในหน้านี้ </font></td>
                                    </tr>
                                    <tr>
                                      <td height="10" align="left"></td>
                                    </tr>
                                </table></td>
                            </tr>
                        </table></td>
                        <td width="10" valign="top">&nbsp;</td>
                        <td width="340" valign="top"><table width="340" border="0" align="right" cellpadding="0" cellspacing="2" bgcolor="#CCCCCC">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="5"></td>
                                  </tr>
                                </table>
                                  <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left"><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left"><font size="2" color="#333333"><strong>ฟอร์มการติดต่อออนไลน์ี้</strong></font></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td><form action="p-contact.php" method="post" name="checkForm" id="checkForm" onsubmit="return check1()" style="height:270px;">
                                          <table width="320" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="100" height="25" align="left"><font size="2">เรื่องที่ติดต่อ</font></td>
                                              <td width="220" height="25" align="left"><select name="title" id="title">
                                                  <option value="">-โปรดเลือกหัวข้อที่ติดต่อ-</option>
                                                  <option value="แนะนำ ติชม">แนะนำ ติชม</option>
                                                  <option value="แจ้งปัญหาการใช้งาน">แจ้งปัญหาการใช้งาน</option>
                                                  <option value="ติดต่อลงโฆษณา">ติดต่อลงโฆษณา</option>
                                                  <option value="ติดต่อสอบถามเรื่องอื่นๆ">ติดต่อสอบถามเรื่องอื่นๆ</option>
                                                </select>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="25" align="left"><font size="2">ชื่อผู้ติดต่อ</font></td>
                                              <td width="220" height="25" align="left"><input name="name" type="text" id="name" size="30" /></td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="25" align="left"><font size="2">Email</font></td>
                                              <td width="220" height="25" align="left"><input name="email" type="text" id="email" size="30" /></td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="25" align="left"><font size="2">เบอร์โทรศัพท์</font></td>
                                              <td width="220" height="25" align="left"><input name="tel" type="text" id="tel" /></td>
                                            </tr>
                                            <tr>
                                              <td height="25" colspan="2" align="left"><font size="2">รายละเอียด/ข้อความถึงเรา</font></td>
                                            </tr>
                                            <tr>
                                              <td colspan="2" align="center"><textarea name="detail" rows="5" id="detail" style="width:300px;"></textarea></td>
                                            </tr>
                                            <tr>
                                              <td width="100" height="25" align="left"><font size="2">หาผลบวกของ
                                                <?
$a=rand(0,9);
$b=rand(0,9);
$s=$a+$b;
echo "$a+$b";
?>
                                              </font></td>
                                              <td width="220" height="25" align="left"><input name="ans" type="text" id="ans" size="5" maxlength="2" />
                                                  <font color="#FF0000" size="2">&lt;==ใส่คำตอบ</font>
                                                  <input type="hidden" id="ask" name="ask" value="<?=$s;?>" /></td>
                                            </tr>
                                            <tr>
                                              <td height="25" colspan="2" align="center"><label>
                                                <input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" />
                                              </label></td>
                                            </tr>
                                          </table>
                                        <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณาเลือกหัวข้อเรื่องที่ติดต่อด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}
else if(document.checkForm.name.value=="") {
alert("กรุณาระบุชิ่อผู้ติดต่อด้วยนะครับ") ;
document.checkForm.name.focus() ;
return false ;
}
else if(document.checkForm.email.value=="") {
alert("กรุณาระบุอีเมล์ด้วยนะครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('@')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(checkForm.email.value.indexOf('.')==-1) {
alert("อีเมล์ของคุณไม่ถูกต้องครับ") ;
document.checkForm.email.focus() ;
return false ;
}
else if(document.checkForm.tel.value=="") {
alert("กรุณาระบุเบอร์โทรศัพท์ด้วยนะครับ") ;
document.checkForm.tel.focus() ;
return false ;
}
else if(document.checkForm.detail.value=="") {
alert("กรุณาระบุรายละเอียดที่ติดต่อด้วยนะครับ") ;
document.checkForm.detail.focus() ;
return false ;
}
else if(document.checkForm.ans.value=="") {
alert("กรุณากรอกคำตอบด้วยนะครับ") ;
document.checkForm.ans.focus() ;
return false ;
}
else if(isNaN(document.checkForm.ans.value)) {
alert("กรุณากรอกคำตอบด้วยตัวเลขเท่านั้นครับ") ;
document.checkForm.ans.focus() ;
return false ;
}
else if(document.checkForm.ans.value != <?=$s;?>) {
alert("คุณบวกเลขไม่ถูกต้องครับ") ;
document.checkForm.ans.focus() ;
return false ;
}
else 
return true ;  
}

                                          </script>
                                      </form></td>
                                    </tr>
                                  </table>
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                </table></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><? include "top-footer.php"; ?></td>
  </tr>
</table>
<? include "footer.php"; ?>
</body>
</html>
