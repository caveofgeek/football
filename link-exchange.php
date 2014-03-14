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
<title>เว็บเพื่อนบ้าน | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$titler[12];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> เว็บเพื่อนบ้าน <?=$titler[11];?>">
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
                  <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; border-bottom:2px solid #333333;">เว็บเพื่อนบ้าน</td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="5"></td>
                            </tr>
                          </table>
                            <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="left"><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="360" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="30" align="left"><font size="2" color="#0000FF"><strong>ข้อตกลงและเงื่อนไขการแลกลิงค์เว็บเพื่อนบ้าน ดังนี้ </strong></font></td>
                                          </tr>
                                          <tr>
                                            <td><table width="340" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td><font size="2">1. เรายินดีแลกลิงค์กับทุกเวบไซต์ ที่ต้องการแลกกับเรา และเว็บของท่านต้องไม่ใช่ เว็บโป๊ ลามก ทำงานผ่านเน็ต ลดน้ำหนัก และผิดกฏหมายใดๆ ทั้งสิ้น </font></td>
                                                </tr>
                                                <tr>
                                                  <td><font size="2">2. เว็บของท่านต้องเสร็จสมบูรณ์ สามารถใช้งานเว็บได้</font></td>
                                                </tr>
                                                <tr>
                                                  <td><font size="2">3. การแลกลิงค์แบบBanner Link ขนาดของแบนเนอร์ ต้องมีขนาด 88x31 เท่านั้น ถ้ามีขนาดอื่นระบบลบออกทันที</font></td>
                                                </tr>
                                                <tr>
                                                  <td><font size="2" color="#FF0000">4. กรุณานำโค๊ดลิงค์ของเรา ไปติดในเว็บของท่าน หากเราตรวจสอบแล้ว ไม่มีลิงค์ของเรา ติดในเว็บของท่าน ระบบจะลบลิงค์แบนเนอร์ของท่านออก โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</font></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><?
$s1="select data from link_admin where id=2";
$re1=mysql_query($s1) or die("ERROR $s1");
$r1=mysql_fetch_row($re1);
$s2="select data, img from link_admin where id=1";
$re2=mysql_query($s2) or die("ERROR $s2");
$r2=mysql_fetch_row($re2);
?>
                                                      <table width="280" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="110" align="right"><strong><font color="#0000FF" size="2">Banner Link</font></strong></td>
                                                          <td width="10">&nbsp;</td>
                                                          <td width="160" align="left"><font size="2"><strong><a href="http://<?=$titler[13];?>" title="<?=$r2[0];?>" target="_blank"><img src="http://<?=$titler[13];?>/banner/<?=$r2[1];?>" title="<?=$r2[0];?>" alt="<?=$r2[0];?>" border="0" /></a></strong></font></td>
                                                        </tr>
                                                    </table></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><input name="code3" type="text" id="code3" readonly="readonly" value="&lt;a href=&quot;http://<?=$titler[13];?>&quot; title=&quot;<?=$r2[0];?>&quot; target=&quot;_blank&quot;  rel=&quot;dofollow &quot;&gt;&lt;img src=&quot;http://<?=$titler[13];?>/banner/<?=$r2[1];?>&quot; title=&quot;<?=$r2[0];?>&quot; alt=&quot;<?=$r2[0];?>&quot; border=&quot;0&quot;&gt;&lt;/a&gt;" size="50" onclick="this.focus();this.select()" /></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><table width="280" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="110" align="right"><strong><font color="#0000FF" size="2">Text Link</font></strong></td>
                                                        <td width="10">&nbsp;</td>
                                                        <td width="160" align="left"><font size="2"><strong><a href="http://<?=$titler[13];?>" title="<?=$r1[0];?>" target="_blank"  rel="dofollow "><strong>
                                                          <?=$r1[0];?>
                                                        </strong></a></strong></font></td>
                                                      </tr>
                                                  </table></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><input name="code2" type="text" id="code2" readonly="readonly" value="&lt;a href=&quot;http://<?=$titler[13];?>&quot; title=&quot;<?=$r1[0];?>&quot; target=&quot;_blank&quot;  rel=&quot;dofollow &quot;&gt;&lt;strong&gt;<?=$r1[0];?>&lt;/strong&gt;&lt;/a&gt;" size="50" onclick="this.focus();this.select()" /></td>
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
                                                          <td align="left"><font size="2" color="#333333"><strong>ฟอร์มแลกลิงค์เว็บเพื่อนบ้าน</strong></font></td>
                                                        </tr>
                                                    </table></td>
                                                  </tr>
                                                  <tr>
                                                    <td><form action="p-link.php" method="post" name="checkForm" id="checkForm" onsubmit="return check1()" style="height:250px;">
                                                        <table width="320" border="0" align="center" cellpadding="0" cellspacing="0">
                                                          <tr>
                                                            <td width="100" height="25" align="left"><font size="2">ชื่อ-สกุล</font></td>
                                                            <td width="220" height="25" align="left"><input name="name" type="text" id="name" size="30" /></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="100" height="25" align="left"><font size="2">Email</font></td>
                                                            <td width="220" height="25" align="left"><input name="email" type="text" id="email" size="30" /></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="100" height="25" align="left"><font size="2">เว็บที่ติด http:// </font></td>
                                                            <td width="220" height="25" align="left"><input name="url" type="text" id="url" size="30" /></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="100" height="25" align="left" valign="top"><font size="2">โค๊ดของท่าน</font></td>
                                                            <td width="220" height="25" align="left" valign="top"><textarea name="code" rows="5" id="code" style="width:200px;"></textarea></td>
                                                          </tr>
                                                          <tr>
                                                            <td width="100" height="25" align="left"><font size="2">ประเภท</font></td>
                                                            <td width="220" height="25" align="left"><select name="type" id="type">
                                                                <option value="1">Text Link</option>
                                                                <option value="2">Banner Link</option>
                                                            </select></td>
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
                                                            <td height="25" align="center"><label></label></td>
                                                            <td height="25" align="left"><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                                                          </tr>
                                                        </table>
                                                      <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.name.value=="") {
alert("กรุณาระบุ ชื่อ-นามสกุล ด้วยนะครับ") ;
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
else if(document.checkForm.url.value=="") {
alert("กรุณาระบุเว็บไซต์ที่ท่านนำโค้ดของเราไปติดด้วยนะครับ") ;
document.checkForm.url.focus() ;
return false ;
}
else if(document.checkForm.code.value=="") {
alert("กรุณาระบุโค้ดด้วยนะครับ") ;
document.checkForm.code.focus() ;
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
                      <tr>
                        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="10"></td>
                            </tr>
                          </table>
                            <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="30" style="background-image:url(img/bg-tab-login.png); background-repeat:repeat-x;">
								  <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left"><span style="font-size:15px; font-weight:bold; color:#FFFFFF;">เว็บเพื่อนบ้าน แบบBanner Link</span></td>
                                    </tr>
                                 </table>
								</td>
                              </tr>
                              <tr>
                                <td align="center"><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="center"><?
		$strSQL1="SELECT code FROM link_exchange WHERE type='2' AND actived='1' ORDER BY id ASC";
		$objQuery1 = mysql_query($strSQL1) or die("ERROR บรรทัด 281");
		echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
		$intRows1= 0;
		while($objResult1 = mysql_fetch_row($objQuery1))
		{
			echo "<td width='90' align='center' valign='top'>"; 
			$intRows1++;
	?>
                                          <table width="90" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td height="35" align="center"><?=$objResult1[0];?></td>
                                            </tr>
                                          </table>
                                        <?
			echo"</td>";
			if(($intRows1)%7==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="10"></td>
                              </tr>
                              <tr>
                                <td height="30" style="background-image:url(img/bg-tab-login.png); background-repeat:repeat-x;">
								  <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left"><span style="font-size:15px; font-weight:bold; color:#FFFFFF;">เว็บเพื่อนบ้าน แบบText Link</span></td>
                                    </tr>
                                 </table>
								</td>
                              </tr>
                              <tr>
                                <td><table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><table border="0" align="left" cellpadding="0" cellspacing="0">
                                          <?
		$strSQL="SELECT code FROM link_exchange WHERE type='1' AND actived='1' ORDER BY id ASC";
		$objQuery = mysql_query($strSQL) or die("ERROR บรรทัด 317");
		$x=1;
		while($objResult = mysql_fetch_row($objQuery)){
	?>
                                          <tr>
                                            <td align="left"><font size="2">
                                              <?=$x;?>
                                              .
                                              <?=$objResult[0];?>
                                            </font></td>
                                          </tr>
                                          <? $x++;} ?>
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
      </table></td>
  </tr>
  <tr>
    <td align="center"><? include "top-footer.php"; ?></td>
  </tr>
</table>
<? include "footer.php"; ?>
</body>
</html>
