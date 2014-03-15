<?php
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

$id=$_GET["id"];
$name=$_GET["name"];
$sct="select * from football where id='$id'";
$rect=mysql_query($sct) or die("ERROR $sct");
$rct=mysql_fetch_row($rect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $rct[2]; ?> | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $rct[4]; ?>"> 
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> <?php echo $rct[3]; ?>">
<meta name="robots"  content="index,follow">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
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
    <td align="center" valign="top"><?php include "header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><?php include "menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?php
$sads8="SELECT * FROM `ads_a8` ORDER BY id ASC";
$reads8=mysql_query($sads8) or die("Error $sads8");
while($rads8=mysql_fetch_row($reads8)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">
						  <?php 
						  if($rads8[1]==1){ 
						  $ads8=stripslashes($rads8[3]); 
						  echo $ads8;
						  }else if($rads8[1]==2){ 
						  ?>
                              <a href="<?php echo $rads8[7]; ?>" title="<?php echo $rads8[8]; ?>" target="_blank">
                              <?php if($rads8[2]==1){  ?>
                              <img src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" alt="<?php echo $rads8[8]; ?>" width="728" border="0" title="<?php echo $rads8[8]; ?>" />
                              <?php }else if($rads8[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                                <param name="movie" value="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" />
                                <param name="quality" value="high" />
                                <embed src="http://<?php echo $titler[13]; ?>/ads-img/<?php echo $rads8[9]; ?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object>
                              <?php }} ?>
                            </a></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<?php } ?>
				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" align="left" style="border-bottom:2px solid #333333;"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="300" align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; "><?php echo $rct[1]; ?></td>
                        <td width="428" align="right"><span class='st_fblike_hcount' displaytext='Facebook Like'></span><span class='st_facebook_hcount' displaytext='Facebook'></span> <span class='st_twitter_hcount' displaytext='Tweet'></span> <span class='st_googleplus_hcount' displaytext='Google +'></span></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><?php echo $rct[5]; ?></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
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
  <tr>
    <td align="center"><?php include "top-footer.php"; ?></td>
  </tr>
</table>
<?php include "footer.php"; ?>
</body>
</html>
