<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="195" align="center" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-header.jpg); background-position:left; background-repeat:no-repeat; background-color:#FFFFFF; border-top-right-radius:10px; border-top-left-radius:10px; -moz-border-radius-topright:10px; -moz-border-radius-topleft:10px; -webkit-border-top-right-radius:10px; -webkit-border-top-left-radius:10px;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
        <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="250" align="center" valign="top"><a href="http://<?php echo $titler[13]; ?>" title="<?php echo $titler[1]; ?>"><img src="http://<?php echo $titler[13]; ?>/logo-img/<?php echo $bannerr[1]; ?>" width="250" border="0" title="<?php echo $titler[1]; ?>" alt="<?php echo $titler[1]; ?>" /></a></td>
            <td width="7" align="center" valign="top">&nbsp;</td>
            <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
                    <div class="masthead">
                      <ul class="nav nav-justified">
                        <li><a href="http://<? echo $titler[13]; ?>">หน้าแรก</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/tded-ทีเด็ดบอลวันนี้">ทีเด็ดบอล</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/analyze-วิเคราะห์บอลวันี้">วิเคราะห์บอล</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/ball-1/โปรแกรมบอลวันนี้">โปรแกรมบอล</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/ball-2/ผลบอลสด">ผลบอลสด</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/ball-3/ดูบอลออนไลน์">ดูบอลออนไลน์</a></li>
                        <li><a href="http://<? echo $titler[13]; ?>/contact.php">ติดต่อโฆษณา</a></li>
                      </ul>
                    </div>
                    <!--
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<? echo $titler[13]; ?>/img/bg-menu-top.png); background-repeat:no-repeat; height:42px;">
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-menu-top.png); background-repeat:no-repeat; height:42px;">
                      <tr>
                        <td align="center" valign="top"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="23" align="center" valign="bottom" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#FFFFFF;">
                                <a href="http://<?php echo $titler[13]; ?>" title="หน้าแรก" style="color:#FFFFFF;">หน้าแรก</a>
                                | <a href="http://<?php echo $titler[13]."/tded-ทีเด็ดบอลวันนี้"; ?>" title="ทีเด็ดบอล" style="color:#FFFFFF;">ทีเด็ดบอล</a>
                                | <a href="http://<?php echo $titler[13]."/analyze-วิเคราะห์บอลวันี้"; ?>" title="วิเคราะห์บอล" style="color:#FFFFFF;">วิเคราะห์บอล</a>
                                | <a href="http://<?php echo $titler[13]."/ball-1/โปรแกรมบอลวันนี้"; ?>" title="โปรแกรมบอล" style="color:#FFFFFF;">โปรแกรมบอล</a>
                                | <a href="http://<?php echo $titler[13]."/ball-2/ผลบอลสด"; ?>" title="ผลบอลสด" style="color:#FFFFFF;">ผลบอลสด</a>
                                | <a href="http://<?php echo $titler[13]."/ball-3/ดูบอลออนไลน์"; ?>" title="ดูบอลออนไลน์" style="color:#FFFFFF;">ดูบอลออนไลน์</a>
                                | <a href="http://<?php echo $titler[13]."/contact.php"; ?>" title="ติดต่อโฆษณา" style="color:#FFFFFF;">ติดต่อโฆษณา</a>
                              </td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                    -->
                  </td>
                </tr>
                <tr>
                  <td height="20" align="center"></td>
                </tr>
                <tr>
                  <td align="center">
<?php
$sads1="SELECT * FROM `ads_a1` WHERE id='1'";
$reads1=mysql_query($sads1) or die("Error $sads1");
$rads1=mysql_fetch_row($reads1);
if($rads1[1]==1){
$ads1=stripslashes($rads1[3]);
echo $ads1;
}else if($rads1[1]==2){
?>
                      <a href="<?php echo $rads1[7]; ?>" title="<?php echo $rads1[8]; ?>" target="_blank">
                      <?php if($rads1[2]==1){  ?>
                      <img src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads1[9]; ?>" width="728" height="90" border="0" title="<?php echo $rads1[8]; ?>" alt="<?php echo $rads1[8]; ?>" />
                      <?php }else if($rads1[2]==2){ ?>
                      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" height="90" border="0">
                        <param name="movie" value="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads1[9]; ?>" />
                        <param name="quality" value="high" />
                        <embed src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads1[9]; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="728" height="90"></embed>
                      </object>
                      <?php } ?>
                      </a>
                      <?php } ?></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" style="background-color:#FFFFFF;">
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="http://<?php echo $titler[13]; ?>" class="navbar-brand" title="<?php echo $titler[1]; ?>"><?php echo $titler[1]; ?></a>
          </div>
          <? if(isset($_SESSION["member_login"])){ ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="http://<? echo $titler[13]; ?>/member/index.php" title="ข้อมูลส่วนตัว">ข้อมูลส่วนตัว</a></li>
              <li><a href="http://<? echo $titler[13]; ?>/member/list-webboard.php" title="ข้อมูลกระทู้">ข้อมูลกระทู้</a></li>
              <li><a href="http://<? echo $titler[13]; ?>/game/list-play-game.php" title="ประวัติการทายผล">ประวัติการทายผล</a></li>
              <li><a href="http://<? echo $titler[13]; ?>/member/logout.php" title="ออกจากระบบ">ออกจากระบบ</a></li>
            </ul>
          <? }else { ?>
            <form class="navbar-form navbar-right" role="form" id="form1" name="form1" method="post" action="http://<? echo $titler[13]; ?>/login.php">
              <div class="form-group">
                <input type="text" name="user" placeholder="Username" id="user" class="form-control" />
              </div>
              <div class="form-group">
                <input type="password" name="pass" id="pass" placeholder="Password" class="form-control">
              </div>
              <button type="submit" class="btn btn-success">เข้าสู่ระบบ</button>
              <a href="http://<? echo $titler[13]; ?>/forgot-pass.php" title="ลืมรหัสผ่าน" class="btn btn-danger">ลืมรหัสผ่าน</a>
              <a href="http://<? echo $titler[13]; ?>/member-condition.php" title="สมัครสมาชิกใหม่" class="btn btn-info">สมัครสมาชิก</a>
            </form>
          <? } ?>
        </div>
      </div>
    </td>
  </tr>
</table>
