<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="195" align="center" style="background-image:url(http://<?=$titler[13];?>/img/bg-header.jpg); background-position:left; background-repeat:no-repeat; background-color:#FFFFFF; border-top-right-radius:10px; border-top-left-radius:10px; -moz-border-radius-topright:10px; -moz-border-radius-topleft:10px; -webkit-border-top-right-radius:10px; -webkit-border-top-left-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
        <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="250" align="center" valign="top"><a href="http://<?=$titler[13];?>" title="<?=$titler[1];?>"><img src="http://<?=$titler[13];?>/logo-img/<?=$bannerr[1];?>" width="250" border="0" title="<?=$titler[1];?>" alt="<?=$titler[1];?>" /></a></td>
            <td width="7" align="center" valign="top">&nbsp;</td>
            <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?=$titler[13];?>/img/bg-menu-top.png); background-repeat:no-repeat; height:42px;">
                      <tr>
                        <td align="center" valign="top"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="23" align="center" valign="bottom" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#FFFFFF;"><a href="http://<?=$titler[13];?>" title="หน้าแรก" style="color:#FFFFFF;">หน้าแรก</a> | <a href="http://<?=$titler[13];?>/tded-ทีเด็ดบอลวันนี้" title="ทีเด็ดบอล" style="color:#FFFFFF;">ทีเด็ดบอล</a> | <a href="http://<?=$titler[13];?>/analyze-วิเคราะห์บอลวันี้" title="วิเคราะห์บอล" style="color:#FFFFFF;">วิเคราะห์บอล</a> | <a href="http://<?=$titler[13];?>/ball-1/โปรแกรมบอลวันนี้" title="โปรแกรมบอล" style="color:#FFFFFF;">โปรแกรมบอล</a> | <a href="http://<?=$titler[13];?>/ball-2/ผลบอลสด" title="ผลบอลสด" style="color:#FFFFFF;">ผลบอลสด</a> | <a href="http://<?=$titler[13];?>/ball-3/ดูบอลออนไลน์" title="ดูบอลออนไลน์" style="color:#FFFFFF;">ดูบอลออนไลน์</a> | <a href="http://<?=$titler[13];?>/contact.php" title="ติดต่อโฆษณา" style="color:#FFFFFF;">ติดต่อโฆษณา</a></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="20" align="center"></td>
                </tr>
                <tr>
                  <td align="center">
<?
$sads1="SELECT * FROM `ads_a1` WHERE id='1'";
$reads1=mysql_query($sads1) or die("Error $sads1");
$rads1=mysql_fetch_row($reads1);
if($rads1[1]==1){ 
$ads1=stripslashes($rads1[3]);
echo $ads1;
}else if($rads1[1]==2){ 
?>
                      <a href="<?=$rads1[7];?>" title="<?=$rads1[8];?>" target="_blank">
                      <? if($rads1[2]==1){  ?>
                      <img src="http://<?=$titler[13];?>/ads-img/<?=$rads1[9];?>" width="728" height="90" border="0" title="<?=$rads1[8];?>" alt="<?=$rads1[8];?>" />
                      <? }else if($rads1[2]==2){ ?>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" height="90" border="0">
                        <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads1[9];?>" />
                        <param name="quality" value="high" />
                        <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads1[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="728" height="90"></embed>
                      </object>
                      <? } ?>
                      </a>
                      <? } ?></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="45" align="center" style="background-image:url(http://<?=$titler[13];?>/img/bg-tab-login.png); border-top-right-radius:5px; border-top-left-radius:5px; -moz-border-radius-topright:5px; -moz-border-radius-topleft:5px; -webkit-border-top-right-radius:5px; -webkit-border-top-left-radius:5px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
                <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="150" align="left"><a href="http://<?=$titler[13];?>" title="<?=$titler[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:14; font-weight:bold; color:#FFFFFF;">
                      <?=$titler[1];?>
                    </a></td>
                    <td width="820" align="center"><? if(isset($_SESSION[member_login])){ ?>
                        <table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="right" style="font-family:'Times New Roman', Times, serif; color:#FFFFFF; font-size:12px;"><strong>ยินดีต้อนรับ
                              <?=$_SESSION[m_name];?>
                              :</strong> <a href="http://<?=$titler[13];?>/member/index.php" title="ข้อมูลส่วนตัว" style="color:#FFFFFF;">ข้อมูลส่วนตัว</a> | <a href="http://<?=$titler[13];?>/member/list-webboard.php" title="ข้อมูลกระทู้" style="color:#FFFFFF;">ข้อมูลกระทู้</a> | <a href="http://<?=$titler[13];?>/game/list-play-game.php" title="ประวัติการทายผล" style="color:#FFFFFF;">ประวัติการทายผล</a> | <a href="http://<?=$titler[13];?>/member/logout.php" title="ออกจากระบบ" style="color:#FFFFFF;">ออกจากระบบ</a></td>
                          </tr>
                        </table>
                      <? }else{ ?>
                        <table width="820" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="120" align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">สวัสดีครับ, บุคคลทั่วไป</td>
                            <td width="700" align="left"><form id="form1" name="form1" method="post" action="http://<?=$titler[13];?>/login.php">
                                <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="430" align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;"> ชื่อผู้ใช้ :
                                      <input name="user" type="text" id="user" />
                                      รหัสผ่าน :
                                      <input name="pass" type="text" id="pass" />
                                    </td>
                                    <td width="270" align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                        <table width="270" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td align="left"><input type="image" name="Submit" id="Submit" value="Submit" src="http://<?=$titler[13];?>/img/bt-login.png" />
                                              <a href="http://<?=$titler[13];?>/forgot-pass.php" title="ลืมรหัสผ่าน"><img src="http://<?=$titler[13];?>/img/bt-forgot-pass.png" alt="ลืมรหัสผ่าน" width="70" height="24" border="0" title="ลืมรหัสผ่าน" /></a> <a href="http://<?=$titler[13];?>/member-condition.php" title="สมัครสมาชิกใหม่"><img src="http://<?=$titler[13];?>/img/bt-register.png" alt="สมัครสมาชิกใหม่" width="107" height="24" border="0" title="สมัครสมาชิกใหม่" /></a></td>
                                          </tr>
                                      </table></td>
                                  </tr>
                                </table>
                            </form></td>
                          </tr>
                        </table>
                      <? } ?></td>
                  </tr>
              </table></td>
          </tr>
      </table></td>
  </tr>
</table>
