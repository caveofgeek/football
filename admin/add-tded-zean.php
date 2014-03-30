<?php
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
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
                    <td height="25"><strong><font size="2">
<?php
$zean_id=$_GET['zean_id'];
$szn="SELECT * FROM `zean_name` WHERE id='$zean_id'";
$rezn=mysql_query($szn) or die("ERROR $szn");
$rzn=mysql_fetch_row($rezn);
?>
                      <img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="tded-zean.php?zean_id=<?php echo $zean_id; ?>">จัดการข้อมูลทีเด็ด <?php echo $rzn[1]; ?></a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูลทีเด็ด <?php echo $rzn[1]; ?></font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><form action="p-add-tded-zean.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <table width="100%" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td></td>
                              </tr>
                            </table>
                            <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="25" align="center" bgcolor="#999999"><table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="150" align="right"><span class="style4">วันที่แข่งขัน</span></td>
                                    <td width="10">&nbsp;</td>
                                    <td width="390" class="form-inline"><select class="form-control" name="days" id="days">
                                  <?php
								  $dd=date("j");
								  $a=1;
								  while($a<=31){
								  ?>
                                        <option value="<?php echo $a; ?>" <?php if($a==$dd){ ?>selected="selected" <?php } ?> >
                                          <?php echo $a; ?>
                                          </option>
                                        <?php $a++;} ?>
                                      </select>
                                        <select class="form-control" name="months" id="months">
                                          <option value="01" <?php $mm=date("m"); if($mm==1){ ?>selected="selected" <?php } ?> >มกราคม</option>
                                          <option value="02" <?php $mm=date("m"); if($mm==2){ ?>selected="selected" <?php } ?> >กุมภาพันธ์</option>
                                          <option value="03" <?php $mm=date("m"); if($mm==3){ ?>selected="selected" <?php } ?> >มีนาคม</option>
                                          <option value="04" <?php $mm=date("m"); if($mm==4){ ?>selected="selected" <?php } ?> >เมษายน</option>
                                          <option value="05" <?php $mm=date("m"); if($mm==5){ ?>selected="selected" <?php } ?> >พฤษภาคม</option>
                                          <option value="06" <?php $mm=date("m"); if($mm==6){ ?>selected="selected" <?php } ?> >มิถุนายน</option>
                                          <option value="07" <?php $mm=date("m"); if($mm==7){ ?>selected="selected" <?php } ?> >กรกฏาคม</option>
                                          <option value="08" <?php $mm=date("m"); if($mm==8){ ?>selected="selected" <?php } ?> >สิงหาคม</option>
                                          <option value="09" <?php $mm=date("m"); if($mm==9){ ?>selected="selected" <?php } ?> >กันยายน</option>
                                          <option value="10" <?php $mm=date("m"); if($mm==10){ ?>selected="selected" <?php } ?> >ตุลาคม</option>
                                          <option value="11" <?php $mm=date("m"); if($mm==11){ ?>selected="selected" <?php } ?> >พฤศจิกายน</option>
                                          <option value="12" <?php $mm=date("m"); if($mm==12){ ?>selected="selected" <?php } ?> >ธันวาคม</option>
                                        </select>
                                        <select class="form-control" name="years" id="years">
                                  <?php
								  $yy=date("Y");
								  $y=date("Y");
								  $ny=date("Y")+1;
								  while($y<=$ny){
								  ?>
                                          <option value="<?php echo $y; ?>" <?php if($y==$yy){ ?>selected="selected" <?php } ?> >
                                            <?php echo $y; ?>
                                            </option>
                                          <?php $y++;} ?>
                                      </select></td>
                                  </tr>

                                </table></td>
                              </tr>
                              <tr>
                                <td align="center"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="90" height="25" align="right" bgcolor="#CCCCCC"><input type="hidden" name="zean_id" id="zean_id" value="<?php echo $zean_id; ?>" /></td>
                                    <td width="170" height="25" align="center" bgcolor="#999999"><span class="style4">ทีมที่ 1 </span></td>
                                    <td width="170" height="25" align="center" bgcolor="#CCCCCC"><span class="style4">ทีมที่ 2 </span></td>
                                    <td width="170" height="25" align="center" bgcolor="#999999"><span class="style4">ทีมที่ 3 </span></td>
                                    </tr>
                                  <tr>
                                    <td width="90" height="20" align="center" bgcolor="#CCCCCC"><span class="style4">ชื่อทีม</span></td>
                                    <td width="170" height="20" align="center" bgcolor="#999999"><input class="form-control" name="team1" type="text" id="team1" style="width:120px;" /></td>
                                    <td width="170" height="20" align="center" bgcolor="#CCCCCC"><input class="form-control" name="team2" type="text" id="team2" style="width:120px;" /></td>
                                    <td width="170" height="20" align="center" bgcolor="#999999"><input class="form-control" name="team3" type="text" id="team3" style="width:120px;" /></td>
                                    </tr>
                                  <tr>
                                    <td width="90" height="20" align="center" bgcolor="#CCCCCC"><span class="style4">ทีเด็ด</span></td>
                                    <td width="170" height="20" align="center" bgcolor="#999999"><input name="t_ded1" type="radio" value="1" checked="checked" />
                                      <span class="style5">ถูก
                                      <input name="t_ded1" type="radio" value="0" />
                                      ผิด</span></td>
                                    <td width="170" height="20" align="center" bgcolor="#CCCCCC"><input name="t_ded2" type="radio" value="1" checked="checked" />
                                      <span class="style5">ถูก
                                      <input name="t_ded2" type="radio" value="0" />
ผิด</span></td>
                                    <td width="170" height="20" align="center" bgcolor="#999999"><input name="t_ded3" type="radio" value="1" checked="checked" />
                                      <span class="style5">ถูก
                                      <input name="t_ded3" type="radio" value="0" />
ผิด</span></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td align="center" bgcolor="#CCCCCC"><br><input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' /></td>
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
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2014 &copy; Ruk-Com.in.th</font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
