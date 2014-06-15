<?php
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$id=mysql_real_escape_string($_GET["id"]);
$sql="SELECT * FROM `t_ded` where id='$id'";
$result=mysql_query($sql) or die("ERROR $sql");
$row=mysql_fetch_row($result);

$s="SELECT * FROM `league` where id='$row[1]'";
$re=mysql_query($s) or die("ERROR $s");
$r=mysql_fetch_row($re);
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="t-ded.php?l_id=<?php echo $row[1]; ?>">จัดการข้อมูลทีเด็ด<?php echo $r[1]; ?>
                    </a>                          <img src="images/arrow.gif" width="7" height="11" /> แก้ไขข้อมูลทีเด็ด<?php echo $r[1]; ?></font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
                          <form action="p-edit-t-ded.php" class="form-horizontal" role="form" method="post" enctype="multipart/form-data" name ="checkForm" id="checkForm" onsubmit="return check1()">
                            <div class="form-group">
                              <label for="days" class="col-sm-2 control-label">วันที่แข่งขัน</label>
                              <div class="col-sm-10 form-inline">
                                <select class="form-control" name="days" id="days">
                                  <?php
                  $a=1;
                  while($a<=31){
                  ?>
                                  <option value="<?php echo $a; ?>" <?php if($a==$row[10]){ ?>selected="selected" <?php } ?> >
                                  <?php echo $a; ?>
                                  </option>
                                  <?php $a++;} ?>
                                </select>
                                  <select class="form-control" name="months" id="months">
                                    <option value="1" <?php if($row[11]==1){ ?>selected="selected" <?php } ?> >มกราคม</option>
                                    <option value="2" <?php if($row[11]==2){ ?>selected="selected" <?php } ?> >กุมภาพันธ์</option>
                                    <option value="3" <?php if($row[11]==3){ ?>selected="selected" <?php } ?> >มีนาคม</option>
                                    <option value="4" <?php if($row[11]==4){ ?>selected="selected" <?php } ?> >เมษายน</option>
                                    <option value="5" <?php if($row[11]==5){ ?>selected="selected" <?php } ?> >พฤษภาคม</option>
                                    <option value="6" <?php if($row[11]==6){ ?>selected="selected" <?php } ?> >มิถุนายน</option>
                                    <option value="7" <?php if($row[11]==7){ ?>selected="selected" <?php } ?> >กรกฏาคม</option>
                                    <option value="8" <?php if($row[11]==8){ ?>selected="selected" <?php } ?> >สิงหาคม</option>
                                    <option value="9" <?php if($row[11]==9){ ?>selected="selected" <?php } ?> >กันยายน</option>
                                    <option value="10" <?php if($row[11]==10){ ?>selected="selected" <?php } ?> >ตุลาคม</option>
                                    <option value="11" <?php if($row[11]==11){ ?>selected="selected" <?php } ?> >พฤศจิกายน</option>
                                    <option value="12" <?php if($row[11]==12){ ?>selected="selected" <?php } ?> >ธันวาคม</option>
                                  </select>
                                  <select class="form-control" name="years" id="years">
                                    <?php
                  $y=date("Y");
                  $ny=date("Y")+1;
                  while($y<=$ny){
                  ?>
                                    <option value="<?php echo $y; ?>" <?php if($y==$row[12]){ ?>selected="selected" <?php } ?> >
                                    <?php echo $y; ?>
                                    </option>
                                    <?php $y++;} ?>
                                  </select>
                                  <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="l_id" id="l_id" value="<?php echo $row[1];; ?>" />

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="home" class="col-sm-2 control-label">ทีมเจ้าบ้าน</label>
                              <div class="col-sm-5">
                                <input name="home" class="form-control" type="text" id="home" value="<?php echo $row[2]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="away" class="col-sm-2 control-label">ทีมเยือน</label>
                              <div class="col-sm-5">
                                <input name="away" class="form-control" type="text" id="away" value="<?php echo $row[3]; ?>"  />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="odds_ball" class="col-sm-2 control-label">ราคาบอล</label>
                              <div class="col-sm-5">
                                <input name="odds_ball" class="form-control" type="text" id="odds_ball" value="<?php echo $row[4]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="detail" class="col-sm-2 control-label">ทีมที่ต่อ</label>
                              <div class="col-sm-10 form-inline">
                                <div class="radio">
                                    <input name="t_ded" type="radio" value="1" <?php if($row[5]==1){ echo "checked"; } ?>/> ทีมเจ้าบ้าน
                                </div>
                                <div class="radio">
                                    <input name="t_ded" type="radio" value="2" <?php if($row[5]==2){ echo "checked"; } ?> /> ทีมเยือน
                                </div>
                                <div class="radio">
                                    <input name="t_ded" type="radio" value="0" c<?php if($row[5]==0){ echo "checked"; } ?> /> เสมอ
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="time_live" class="col-sm-2 control-label">ทีเด็ด</label>
                              <div class="col-sm-8">
                                <input name="time_live" class="form-control" type="text" id="time_live" value="<?php echo $row[6]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="time_live" class="col-sm-2 control-label">เวลาแข่งขัน</label>
                              <div class="col-sm-5">
                                <input name="time_live" class="form-control" type="text" id="time_live" value="<?php echo $row[7]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="ch_live" class="col-sm-2 control-label">ช่องที่ถ่ายทอดสด</label>
                              <div class="col-sm-5">
                                <input name="ch_live" class="form-control" type="text" id="ch_live" value="<?php echo $row[8]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="score" class="col-sm-2 control-label">ผลบอล</label>
                              <div class="col-sm-5">
                                <input name="score" class="form-control" type="text" id="score" value="<?php echo $row[9]; ?>" />
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
                              </div>`
                            </div>

                          <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.user.value=="") {
alert("กรุณากรอกชื่อผู้ใช้ด้วยนะครับ") ;
document.checkForm.user.focus() ;
return false ;
}else if(document.checkForm.pass.value=="") {
alert("กรุณากรอกรหัสผ่านด้วยนะครับ") ;
document.checkForm.pass.focus() ;
return false ;
}
else
return true ;
}
                      </script>
                        </form></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2014 &copy; scriptweb2u  Modify By Ruk-Com.In.Th</font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
