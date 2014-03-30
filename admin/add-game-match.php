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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="all-game-match.php">จัดการข้อมูลรายการแข่งขัน</a> <img src="images/arrow.gif" width="7" height="11" /> เพิ่มข้อมูลรายการแข่งขัน</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <form action="p-add-game-match.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <div class="form-group">
                              <label for="league_id" class="col-sm-2 control-label">เลือกลีก</label>
                              <div class="col-sm-5">
                                <select name="league_id" id="league_id" class="form-control">
                                      <option selected="selected" value="">- กรุณาเลือก -</option>
<?php
$sql="SELECT * FROM `game_league` ORDER BY `id` ASC";
$result=mysql_query($sql) or die("Error $sql");
while($row=mysql_fetch_row($result)){
?>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
<?php } ?>
                                    </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="days" class="col-sm-2 control-label">วันที่แข่งขัน</label>
                              <div class="col-sm-5 form-inline">
                                <select name="days" id="days" class="form-control">
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
                                        <select name="months" id="months" class="form-control">
                                          <option value="1" <?php $mm=date("m"); if($mm==1){ ?>selected="selected" <?php } ?> >มกราคม</option>
                                          <option value="2" <?php $mm=date("m"); if($mm==2){ ?>selected="selected" <?php } ?> >กุมภาพันธ์</option>
                                          <option value="3" <?php $mm=date("m"); if($mm==3){ ?>selected="selected" <?php } ?> >มีนาคม</option>
                                          <option value="4" <?php $mm=date("m"); if($mm==4){ ?>selected="selected" <?php } ?> >เมษายน</option>
                                          <option value="5" <?php $mm=date("m"); if($mm==5){ ?>selected="selected" <?php } ?> >พฤษภาคม</option>
                                          <option value="6" <?php $mm=date("m"); if($mm==6){ ?>selected="selected" <?php } ?> >มิถุนายน</option>
                                          <option value="7" <?php $mm=date("m"); if($mm==7){ ?>selected="selected" <?php } ?> >กรกฏาคม</option>
                                          <option value="8" <?php $mm=date("m"); if($mm==8){ ?>selected="selected" <?php } ?> >สิงหาคม</option>
                                          <option value="9" <?php $mm=date("m"); if($mm==9){ ?>selected="selected" <?php } ?> >กันยายน</option>
                                          <option value="10" <?php $mm=date("m"); if($mm==10){ ?>selected="selected" <?php } ?> >ตุลาคม</option>
                                          <option value="11" <?php $mm=date("m"); if($mm==11){ ?>selected="selected" <?php } ?> >พฤศจิกายน</option>
                                          <option value="12" <?php $mm=date("m"); if($mm==12){ ?>selected="selected" <?php } ?> >ธันวาคม</option>
                                        </select>
                                        <select name="years" id="years" class="form-control">
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
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="game_time" class="col-sm-2 control-label">เวลาแข่งขัน</label>
                                    <div class="col-sm-5">
                                      <input name="game_time" type="text" id="game_time" class="form-control" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="home" class="col-sm-2 control-label">ทีมเจ้าบ้าน</label>
                                    <div class="col-sm-5">
                                      <input name="home" type="text" id="home" class="form-control" />
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="away" class="col-sm-2 control-label">ทีมเยือน</label>
                                    <div class="col-sm-5">
                                      <input name="away" type="text" id="away" class="form-control" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
                                    </div>
                                  </div>
                                </form>
                            </td>
                              </tr>
                            </table>
                        </td>
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
