<? 
@session_start(); 
include "../inc/config.inc.php";
include "../function/datethai.php";
if(!isset($_SESSION[admin_login])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ; 
exit() ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์ ::.</title>
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
.style4 {font-size: small; font-weight: bold; }
.style5 {font-size: small}
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
                  <?
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
              <td width="220" align="center" valign="top"><? include "menu.php"; ?></td>
              <td width="760" align="center" valign="top" bgcolor="#FFFFFF"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="all-game-match.php">จัดการข้อมูลรายการแข่งขัน</a> <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลรายการแข่งขัน</font></strong>
<?
$id=$_GET[id];
$type=$_GET[type];
$spost="SELECT * FROM `game_match` WHERE id='$id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);
?>
					</td>
                  </tr>
                  <tr>
                    <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><form action="p-edit-game-match.php" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td></td>
                              </tr>
                            </table>
                            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="25" align="center"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="150" align="right"><span class="style4">เลือกลีก</span></td>
                                    <td width="10">&nbsp;</td>
                                    <td width="390"><select name="league_id" id="league_id">
<?
$s="SELECT * FROM `game_league` ORDER BY `id` ASC";
$re=mysql_query($s) or die("Error $s");
while($r=mysql_fetch_row($re)){
?>
									  <option value="<?=$r[0];?>" <? if($rpost[1]==$r[0]){ ?>selected="selected" <? } ?> ><?=$r[1];?></option>
<? } ?>
                                    </select>                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">วันที่แข่งขัน</span></td>
                                    <td>&nbsp;</td>
                                    <td><select name="days" id="days">
                                      <?
								  $a=1;
								  while($a<=31){
								  ?>
                                      <option value="<?=$a;?>" <? if($a==$rpost[6]){ ?>selected="selected" <? } ?> >
                                      <?=$a;?>
                                      </option>
                                      <? $a++;} ?>
                                    </select>
                                      <select name="months" id="months">
                                        <option value="1" <? if($rpost[7]==1){ ?>selected="selected" <? } ?> >มกราคม</option>
                                        <option value="2" <? if($rpost[7]==2){ ?>selected="selected" <? } ?> >กุมภาพันธ์</option>
                                        <option value="3" <? if($rpost[7]==3){ ?>selected="selected" <? } ?> >มีนาคม</option>
                                        <option value="4" <? if($rpost[7]==4){ ?>selected="selected" <? } ?> >เมษายน</option>
                                        <option value="5" <? if($rpost[7]==5){ ?>selected="selected" <? } ?> >พฤษภาคม</option>
                                        <option value="6" <? if($rpost[7]==6){ ?>selected="selected" <? } ?> >มิถุนายน</option>
                                        <option value="7" <? if($rpost[7]==7){ ?>selected="selected" <? } ?> >กรกฏาคม</option>
                                        <option value="8" <? if($rpost[7]==8){ ?>selected="selected" <? } ?> >สิงหาคม</option>
                                        <option value="9" <? if($rpost[7]==9){ ?>selected="selected" <? } ?> >กันยายน</option>
                                        <option value="10" <? if($rpost[7]==10){ ?>selected="selected" <? } ?> >ตุลาคม</option>
                                        <option value="11" <? if($rpost[7]==11){ ?>selected="selected" <? } ?> >พฤศจิกายน</option>
                                        <option value="12" <? if($rpost[7]==12){ ?>selected="selected" <? } ?> >ธันวาคม</option>
                                      </select>
                                      <select name="years" id="years">
                                        <?
								  $y=date("Y");
								  $ny=date("Y")+1;
								  while($y<=$ny){
								  ?>
                                        <option value="<?=$y;?>" <? if($y==$rpost[8]){ ?>selected="selected" <? } ?> >
                                        <?=$y;?>
                                        </option>
                                        <? $y++;} ?>
                                      </select></td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">เวลาแข่งขัน</span></td>
                                    <td>&nbsp;</td>
                                    <td>
									<input name="game_time" type="text" id="game_time" value="<?=$rpost[10];?>" />
									<input type="hidden" name="id" id="id" value="<?=$id;?>" />
									<input type="hidden" name="type" id="type" value="<?=$type;?>" />
									</td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">ทีมเจ้่าบ้าน</span></td>
                                    <td>&nbsp;</td>
                                    <td><input name="home" type="text" id="home" value="<?=$rpost[2];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">ทีมเยือน</span></td>
                                    <td>&nbsp;</td>
                                    <td><input name="away" type="text" id="away" value="<?=$rpost[3];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">สกอร์</span></td>
                                    <td>&nbsp;</td>
                                    <td><input name="score" type="text" id="score" value="<?=$rpost[4];?>" /></td>
                                  </tr>
                                  <tr>
                                    <td align="right"><span class="style4">ผลการแข่งขัน</span></td>
                                    <td>&nbsp;</td>
                                    <td><input name="result" type="radio" value="1" <? if($rpost[5]==1){ echo "checked"; } ?> />
                                      <span class="style5"><?=$rpost[2];?> ชนะ 
                                      <input name="result" type="radio" value="2" <? if($rpost[5]==2){ echo "checked"; } ?> />
                                      <?=$rpost[3];?> ชนะ 
                                      <input name="result" type="radio" value="3" <? if($rpost[5]==3){ echo "checked"; } ?> />
                                      เสมอกัน</span></td>
                                  </tr>
                                  <tr>
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td><input type="submit" name="Submit" value="บันทึกข้อมูล" /></td>
                                  </tr>

                                </table></td>
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
