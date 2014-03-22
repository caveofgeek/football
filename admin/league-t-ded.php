<?php
@session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$l_id=$_GET["l_id"];
if(isset($_GET["tDate"]))
{
  $tdate=$_GET["tDate"];
}
$s="SELECT * FROM `league` where id='$l_id'";
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="t-ded.php?l_id=<?php echo $l_id; ?>">จัดการข้อมูลทีเด็ด<?php echo $r[1]; ?>
                    </a> <img src="images/arrow.gif" width="7" height="11" /> รายการข้อมูลทีเด็ด<?php echo $r[1]; ?> วันที่ <?php $postDate=$tdate; echo DateThai($postDate); ?></font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="375" align="left"><font size="2" color="#333333"><strong>:: รายการข้อมูลทีเด็ด<?php echo $r[1]; ?> วันที่ <?php $postDate=$tdate; echo DateThai($postDate); ?>
                              :: </strong></font></td>
                            <td width="375" align="right"><font size="2" color="#333333"><strong>
							[ <a href="add-t-ded.php?l_id=<?php echo $l_id; ?>">เพิ่มข้อมูลข้อมูลทีเด็ด<?php echo $r[1]; ?></a> ]
							</strong></font></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                          <tr>
                            <td width="50" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">เวลา</font></strong></td>
                            <td width="100" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีมเจ้าบ้าน</font></strong></td>
                            <td width="50" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ผล</font></strong></td>
                            <td width="100" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีมเยือน</font></strong></td>
                            <td width="100" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ราคาบอล</font></strong></td>
                            <td width="150" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ทีเด็ดฟุตบอล</font></strong></td>
                            <td width="100" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">ถ่ายทอดสด</font></strong></td>
                            <td width="100" height="25" align="center" bgcolor="#CCCCCC"><strong><font size="2">การการทำ</font></strong></td>
                          </tr>
<?php
$sql="SELECT * FROM `t_ded` where l_id='$l_id' AND post_date='$tdate' ORDER BY id ASC";
$result=mysql_query($sql) or die("ERROR $sql");
while($row=mysql_fetch_row($result)){
?>
                          <tr>
                            <td width="50" height="20" align="center" bgcolor="#E6E6E6"><font size="2"><?php echo $row[7]; ?></font></td>
                            <td width="100" height="20" align="center" bgcolor="#E6E6E6">
							<?php if($row[5]==1){ ?><font size="2" color="#FF0000"><strong><?php echo $row[2]; ?></strong></font>
							<?php }else{ ?><font size="2"><?php echo $row[2]; ?></font><?php } ?>
							</td>
                            <td width="50" height="20" align="center" bgcolor="#E6E6E6">
							<font size="2"><?php echo $row[9]; ?></font>
							</td>
                            <td width="100" height="20" align="center" bgcolor="#E6E6E6">
							<?php if($row[5]==2){ ?><font size="2" color="#FF0000"><strong><?php echo $row[3]; ?></strong></font>
							<?php }else{ ?><font size="2"><?php echo $row[3]; ?></font><?php } ?>
							</td>
                            <td width="100" height="20" align="center" bgcolor="#E6E6E6"><font size="2">
                              <?php echo $row[4]; ?>
                            </font></td>
                            <td width="150" height="20" align="left" bgcolor="#E6E6E6"><font size="2">
                              &nbsp;&nbsp;<?php echo $row[6]; ?>
                            </font></td>
                            <td width="100" height="20" align="center" bgcolor="#E6E6E6"><font size="2">
                              <?php echo $row[8]; ?>
                            </font></td>
                            <td width="100" height="20" align="center" valign="middle" bgcolor="#E6E6E6"><font size="2"><a href="edit-t-ded.php?id=<?php echo $row[0]; ?>"><img src="images/edit.gif" width="40" height="15" border="0" /></a> <a href="del-ball-ded.php?id=<?php echo $row[0]; ?>&l_id=<?php echo $l_id; ?>&tdate=<?php echo $tdate; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"> <img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                          </tr>
<?php } ?>
                        </table></td>
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
