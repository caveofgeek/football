<?php
session_start();
include "../inc/config.inc.php";
include "../function/datethai.php";
include "../function/datetime.php";
include "../function/function.php";
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

$topic_id=$_GET["topic_id"];
$cate_id=$_GET["cate_id"];
$topic=$_GET["topic"];
$sBOARD="SELECT webboard.*, member.name, webboard_category.cate_name FROM `webboard` ";
$sBOARD.="INNER JOIN member ON webboard.member_id=member.id ";
$sBOARD.="INNER JOIN webboard_category ON webboard.cate_id=webboard_category.id ";
$sBOARD.="WHERE webboard.id='$topic_id' ";
$reBOARDE=mysql_query($sBOARD) or die("ERROR $sBOARD บรรทัด 30");
$rBOARD=mysql_fetch_row($reBOARDE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูล | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $titler[12]; ?>"> 
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> แก้ไขข้อมูล <?php echo $titler[11]; ?>">
<meta name="robots"  content="index,follow">
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:950, height:450, useCSS:true})[0].focus();
      });
</script>
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
    <td align="center" valign="top"><?php include "../header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="32" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;"><table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left"><strong><font size="3" color="#FFFFFF">แก้ไขข้อมูลเว็บบอร์ด</font></strong></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <form action="p-edit-webboard.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="20" align="left"><strong><font size="2">หัวข้อ</font></strong></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><input name="title" type="text" id="title" style="width:950px;" value="<?php echo $rBOARD[3]; ?>" /></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><strong><font size="2">เลือกหมวดหมู่</font></strong></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><select name="cate" id="cate" style="width:350px;">
                        <option value="">- กรุณาเลือกหมวดหมู่ -</option>
                        <?php
		$scate="SELECT * FROM `webboard_category` ORDER BY id ASC";
		$recate=mysql_query($scate) or die("Error $scate");
		while($rcate=mysql_fetch_row($recate)){
		?>
                        <option value="<?php echo $rcate[0]; ?>" <?php if($cate_id==$rcate[0]){echo "selected";} ?>>
                        <?php echo $rcate[1]; ?>
                        </option>
                        <?php } ?>
                      </select>
                        <input type="hidden" name="topic_id" id="topic_id" value="<?php echo $topic_id; ?>" /></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><strong><font size="2">รายละเอียด</font></strong></td>
                  </tr>
                  <tr>
                    <td align="left"><textarea class="cleditorMain" id="input" name="input" style="width:950px; height:450px;"><?php echo $rBOARD[4]; ?>
        </textarea></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><strong><font size="2">ไฟล์ภาพ
                      <input name="file1" type="file" id="file1" />
                            <?php if($rBOARD[5]!=""){?>
                            <a href="http://<?php echo $titler[13]; ?>/webboard/board-img/<?php echo $rBOARD[5]; ?>" title="" target="_blank">คลิกที่นี่เพื่อดูภาพประกอบ</a>
                            <input type="hidden" name="op" id="op" value="<?php echo $rBOARD[5]; ?>" />
                            <?php } ?>
                    </font></strong><font size="2" color="#FF0000">* ขนาดภาพไม่เกิน 200kb </font></td>
                  </tr>
                  <tr>
                    <td height="20" align="left"><table width="640" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="100"><table width="100" border="0" align="right" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                              <tr>
                                <td align="center"><strong><font size="3" color="#B00D0E">
                                  <?php 
$rand = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789'),0,4);
echo $rand;
?>
                                </font></strong></td>
                              </tr>
                          </table></td>
                          <td width="10">&nbsp;</td>
                          <td width="530"><input name="capcha" type="text" id="capcha" style="width:100px;" />
                              <font size="2" color="#FF0000">* &lt;= กรอกรหัสยืนยัน</font>
                              <input type="hidden" name="rands" id="rands" value="<?php echo $rand; ?>" /></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="20" align="center"><span style="text-align:center">
                      <input type="submit" name="Submit" value="แก้ไขข้อมูล" />
                    </span></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5"></td>
                  </tr>
                </table>
              </form></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><?php include "../top-footer.php"; ?></td>
  </tr>
</table>
<?php include "../footer.php"; ?>
</body>
</html>
