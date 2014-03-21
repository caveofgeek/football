<?php
session_start();
include "inc/config.inc.php";
include "function/datethai.php";
include "function/datetime.php";
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

$topic_id=$_GET["topic_id"];
$topic=$_GET["topic"];
$spost="select post.*, tag_post.* from post ";
$spost.="inner join tag_post on post.id=tag_post.post_id ";
$spost.="where post.id='$topic_id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);


$new_view=$rpost[8]+1;
$upd_view=mysql_query("UPDATE post SET view='$new_view' WHERE id='$topic_id'") or die("ERROE $upd_view");

$sct="select id, cate_name from category where id='$rpost[1]'";
$rect=mysql_query($sct) or die("ERROR $sct");
$rct=mysql_fetch_row($rect);
$url=rewrite($rct[1]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $rpost[2]; ?> | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php if($rpost[11]!=""){ echo "$rpost[11], ";} if($rpost[12]!=""){ echo "$rpost[12], ";} if($rpost[13]!=""){ echo "$rpost[13], ";} if($rpost[14]!=""){ echo "$rpost[14], ";} if($rpost[15]!=""){ echo "$rpost[15], ";} if($rpost[16]!=""){ echo "$rpost[16], ";} ?>">
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> <?php echo $rpost[3]; ?>">
<meta name="robots"  content="index,follow">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
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
                  <td align="left" style="font-size:12px; color:#666666;"><a href="http://<?php echo $titler[13]; ?>" title="หน้าแรก" style="color:#666666;">หน้าแรก</a> » <a href="http://<?php echo $titler[13]; ?>/cate-<?php echo $rct[0]; ?>/<?php echo $url; ?>" title="<?php echo $rct[1]; ?>" style="color:#666666;"><?php echo $rct[1]; ?></a> » <?php echo $rpost[2]; ?></td>
                </tr>
                <tr>
                  <td align="left" style="border-bottom:2px solid #333333;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" style="font-family:'Times New Roman', Times, serif; font-size:18px; font-weight:bold; color:#333333;"><?php echo $rpost[2]; ?></td>
                    </tr>
                    <tr>
                      <td height="30"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="300" align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#666666;">โพสต์เมื่อ
                              <?php echo DateTime($rpost[7]); ?>
                              น. เข้าชม
                              <?php echo $rpost[8]; ?>
                              ครั้ง</td>
                            <td width="428" align="right"><span class='st_fblike_hcount' displaytext='Facebook Like'></span><span class='st_facebook_hcount' displaytext='Facebook'></span> <span class='st_twitter_hcount' displaytext='Tweet'></span> <span class='st_googleplus_hcount' displaytext='Google +'></span></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>
						<?php
						$msg=stripslashes($rpost[4]);
						echo $msg;
						?>
                        </td>
                      </tr>
                      <tr>
                        <td height="30" align="left" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:232323;"><strong>TAG : </strong>
<?php
if($rpost[12]!=""){ $tag2=rewrite($rpost[12]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag2' style='color:#000000'>$rpost[12]</a>, ";}
if($rpost[13]!=""){ $tag3=rewrite($rpost[13]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag3' style='color:#000000'>$rpost[13]</a>, ";}
if($rpost[14]!=""){ $tag4=rewrite($rpost[14]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag4' style='color:#000000'>$rpost[14]</a>, ";}
if($rpost[15]!=""){ $tag5=rewrite($rpost[15]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag5' style='color:#000000'>$rpost[15]</a>, ";}
if($rpost[16]!=""){ $tag6=rewrite($rpost[16]); echo "<a href='http://$titler[13]/search-tag.php?tag=$tag6' style='color:#000000'>$rpost[16]</a>, ";}
?>
                        </font></td>
                      </tr>
                      <tr>
                        <td align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px;">
                          <?php if(isset($_SESSION["admin_login"])){ ?>
                          <a href="http://<?php echo $titler[13]; ?>/admin/del-data-category.php?id=<?php echo $rpost[0]; ?>&amp;cate_id=<?php echo $rpost[1]; ?>&amp;op=<?php echo $rpost[5]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <?php }else{ ?>
                          <a href="http://<?php echo $titler[13]; ?>/confirm-del-post.php?topic_id=<?php echo $topic_id; ?>" onclick="javascript:if(!confirm('ต้องการแจ้งลบข่าวสาร')){return false;}" title="แจ้งลบ">แจ้งลบ</a>
                          <?php } ?>
                        </td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;">
					    <table width="710" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="left"><span style="font-size:14px; font-weight:bold; color:#FFFFFF;">เรื่องที่เกี่ยวข้อง</span></td>
                          </tr>
                       </table>
					  </td>
                    </tr>
                    <tr>
                      <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                        </table>
<?php
$strSQL="SELECT id, title, img, short_detail, view FROM `post` WHERE cate_id='$rpost[1]' ORDER BY RAND() LIMIT 0, 4";
$objQuery = mysql_query($strSQL) or die("ERROR $strSQ1");
echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";
$intRows= 0;
while($objResult = mysql_fetch_row($objQuery))
{
$url=rewrite($objResult[1]);
	echo "<td width='360' align='center' valign='top'>";
	$intRows++;
?>
                          <table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td valign="top"><table width="357" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                  <tr>
                                    <td bgcolor="#FFFFFF"><table width="357" border="0" align="center" cellpadding="0" cellspacing="0"  onmouseover="this.style.backgroundColor='#DDDDDD';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                                        <tr>
                                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td height="5"></td>
                                              </tr>
                                            </table>
                                              <table width="347" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="100" align="center" valign="top"><a href="http://<?php echo $titler[13]; ?>/topic-<?php echo $objResult[0]; ?>/<?php echo $url; ?>.html" title="<?php echo $objResult[1]; ?>">
                                                    <?php if($objResult[2]==""){ ?>
                                                    <img src="http://<?php echo $titler[13]; ?>/post-s-img/NoPic.png" alt="<?php echo $objResult[1]; ?>" width="100" height="100" border="0" title="<?php echo $objResult[1]; ?>" />
                                                    <?php }else{ ?>
                                                    <img src="http://<?php echo $titler[13]; ?>/post-s-img/<?php echo $objResult[2]; ?>" alt="<?php echo $objResult[1]; ?>" width="100" height="100" border="0" title="<?php echo $objResult[1]; ?>" />
                                                    <?php } ?>
                                                  </a></td>
                                                  <td width="5" align="center" valign="top">&nbsp;</td>
                                                  <td width="242" align="center" valign="top"><table width="242" border="0" align="center" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td align="left"><a href="http://<?php echo $titler[13]; ?>/topic-<?php echo $objResult[0]; ?>/<?php echo $url; ?>.html" title="<?php echo $objResult[1]; ?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#03379b;"><?php echo $objResult[1]; ?></a></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="left"><font size="2" color="#999999"> <?php echo mb_substr("$objResult[3]", 0,120,"UTF-8"); ?> </font></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="left"><font size="2" color="#960105">เข้าชม :
                                                          <?php echo $objResult[4]; ?>
                                                          ครั้ง</font></td>
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
                              </table></td>
                            </tr>
                          </table>
                        <?php
			echo"</td>";
			if(($intRows)%2==0)
			{
				echo"</tr>";
			}
		}
		echo"</tr></table>";
	?></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center"><?php if($rpost[6]==1){ ?>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><div id="fb-root"></div>
                            <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-comments" data-href="http://<?php echo $titler[13]; ?>/topic-<?php echo $topic_id; ?>/<?php echo $topic; ?>.html" data-num-posts="10" data-width="720"></div></td>
                      </tr>
                    </table>
                    <?php
			}else if($rpost[6]==2){
				if(isset($_SESSION["member_login"])){
			?>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><div id="fb-root"></div>
                            <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-comments" data-href="http://<?php echo $titler[13]; ?>/topic-<?php echo $topic_id; ?>/<?php echo $topic; ?>.html" data-num-posts="10" data-width="720"></div></td>
                      </tr>
                    </table>
                    <?php }else{ ?>
                    <table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
                      <tr>
                        <td height="30" align="center" bgcolor="#CCCCCC"><font size="2" color="#FF0000"><strong>กรุณาล็อกอินเข้าสู่ระบบก่อนถึงจะแสดงความคิดเห็นได้</strong></font></td>
                      </tr>
                    </table>
                    <?php }} ?></td>
                </tr>
              </table>
              </td>
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
