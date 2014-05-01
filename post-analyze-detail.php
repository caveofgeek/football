<?php
header("Referer: http://football.kapook.com");
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

$topic_id=mysql_real_escape_string($_GET["topic_id"]);
$topic=mysql_real_escape_string($_GET["topic"]);
$spost="SELECT * FROM `analyze` WHERE id='$topic_id'";
$repost=mysql_query($spost) or die("ERROR $spost");
$rpost=mysql_fetch_row($repost);

$new_view=$rpost[6]+1;
$upd_view=mysql_query("UPDATE `analyze` SET view='$new_view' WHERE id='$topic_id'") or die("ERROR $upd_view");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $rpost[2]; ?> | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="วิเคราะห์บอล,วิเคราะห์บอลวันนี้,ผลบอล,7m,ผลบอลมีเสียง,polball,ทีเด็ดฟุตบอล,ผลฟุตบอล,ทีเด็ด,ผลบอลสด,ฟุตบอล,ล้มโต๊ะ,ทีเด็ดฟุตบอลวันนี้,ราคาบอล,lomtoe,ราคาบอลวันนี้,คลิปฟุตบอล,คลิปบอล">
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> วิเคราะห์บอล วิเคราะห์ฟุตบอล วิเคราะห์บอลวันนี้ ผลบอล ผลบอลสด 7M livescore ผลบอลมีเสียง เกมส์ฟุตบอล เกมส์ทายผลฟุตบอล ทีเด็ด ทีเด็ดวันนี้ ราคาบอล">
<meta name="robots"  content="index,follow">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<link href="../css/football.css" rel="stylesheet" type="text/css">
<script>
  $(document).ready(function(){
    $("table.text_teble2 tr").removeAttr("onclick");
    $("table.text_teble2 tr").removeAttr("title");
    $("table.text_teble2 tr").removeAttr("style");

    $("table.text_teble2 td img").each(function(){
      console.log($(this).attr("title"));
      if ($(this).attr("title") == ''){
        $(this).attr("src",'../img/football.jpeg');
        $(this).css("width","29px");
      }
    });
  });

</script>
<style type="text/css">
  #trSched, #tr1HF2HF1, #tr1HF2HF2, #trHT, #trFin { display: none;}
  td.mg_at { display: none;}

  p#analyze_text {
    margin-top:10px;
    text-indent: 30px;
    font-size: 15px;
  }
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
                  <td align="left" style="font-size:12px; color:#666666;"><a href="http://<?php echo $titler[13]; ?>" title="หน้าแรก" style="color:#666666;">หน้าแรก</a> » <a href="http://<?php echo $titler[13]; ?>/analyze-วิเคราะห์บอลวันนี้" title="วิเคราะห์บอลย้อนหลัง" style="color:#666666;">วิเคราะห์บอลย้อนหลัง</a> » <?php echo $rpost[2]; ?></td>
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
                                  <?php echo DateTime($rpost[5]); ?>
                                  น. เข้าชม
                                  <?php echo $rpost[6]; ?>
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
error_reporting(E_ALL);
ini_set('display_errors', 'On');

function get_data($url) {
  $ch = curl_init();
  $timeout = 10;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  curl_setopt($ch, CURLOPT_REFERER, 'http://football.kapook.com');
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
if ($rpost[8] != "") {
$link = explode("||",$rpost[8]);
$data = get_data($link[1]);

$data = iconv('windows-874','utf-8',$data);


preg_match('/<table width="620" border="0" align="center" cellpadding="0" cellspacing="1">[\s\d\w_ก-๙เๆแไใ&;<\/>,.#-^!@%*()+"\']{0,}<\/table>/',$data,$team);
$team = str_replace(array('display:none'),array(''),$team[0]);
$team = str_replace('style="background:url(images_match/bg_score2.png) top center no-repeat;"','',$team);
$team = str_replace('<img src="images_match/vs.png" width="88" height="58"/>','',$team);
$team = str_replace('<img src="images_match/frame_b01.jpg" width="6" height="6" />','',$team);
$team = str_replace('<img src="images_match/table_04.png" width="327" height="14" />','',$team);
$team = str_replace('<img src="images_match/goal_icon.gif" width="14" height="13" />','',$team);
$team = str_replace('<img src="images_match/sec_01.png" width="114" height="31" />','',$team);
$team = str_replace('<img src="images_match/led_gif.gif" width="13" height="13" align="absmiddle" />','',$team);
$team = str_replace('<span><img src="../../images/space.gif" width="5" height="8" /></span>','',$team);
$team = str_replace('style="background:url(images_match/table_01.png) top center no-repeat;"','',$team);
$team = str_replace('style="background:url(images_match/table_02.png) top center repeat-y;"','',$team);
$team = str_replace('<img src="images_match/frame_b03.jpg" width="6" height="6" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b02.jpg) top left repeat-x"','',$team);
$team = str_replace('<img src="images_match/frame_b02.jpg" width="1" height="6" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b04.jpg) top left repeat-y"','',$team);
$team = str_replace('<img src="images_match/frame_b04.jpg" width="6" height="1" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b05.jpg) top left repeat-y"','',$team);
$team = str_replace('<img src="images_match/frame_b05.jpg" width="6" height="1" />','',$team);
$team = str_replace('style="background:url(images_match/frame_b07.jpg) top left repeat-x"','',$team);
$team = str_replace('<img src="images_match/frame_b07.jpg" width="1" height="6" />','',$team);
$team = str_replace('<img src="images_match/frame_b08.jpg" width="6" height="6" />','',$team);
$team = str_replace('<img src="images_match/frame_b06.jpg" width="6" height="6" />','',$team);
$team = str_replace('<font color="#FF6600">ดูผลงานย้อนหลัง</font>','',$team);
preg_match('/<table width="97\%" border="0" align="center" cellpadding="0" cellspacing="0" style="display:none" id="tbDetail">[\s\d\w_ก-๙เๆแไใ&;<\/>,.#-^!@%*()+"\']{0,}<\/table>/',$data,$stat);
$stat = str_replace(array('display:none','97%'),array('','30%'),$stat[0]);

echo $team."<br>";
}
?>
                            <br><br>
                            <h3>วิเคราะห์ฟุตบอล</h3>
                            <p id="analyze_text"><?php echo $rpost[3]; ?></p>

						  				  	</td>
                        </tr>

                        <tr>
                          <td height="30" align="right" style="font-family:'Times New Roman', Times, serif; font-size:12px;"><font size="2">
                          <?php if(isset($_SESSION["admin_login"])){ ?>
                          <a href="http://<?php echo $titler[13]; ?>/admin/del-post-analyze.php?id=<?php echo $rpost[0]; ?>&mod_id=<?php echo $rpost[1]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <?php }else if(isset($_SESSION['mod_login'])&&$_SESSION['mod_id']==$rpost[1]){ ?>
                          <a href="http://<?php echo $titler[13]; ?>/mod/del-post-analyze.php?id=<?php echo $rpost[0]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" />ลบ</a>
                          <?php }else{ ?>
                          <a href="http://<?php echo $titler[13]; ?>/confirm-del-post-analyze.php?topic_id=<?php echo $topic_id; ?>" onclick="javascript:if(!confirm('ต้องการแจ้งลบข่าวสาร')){return false;}">แจ้งลบ</a>
                          <?php } ?>
                          </font></td>
                        </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><div id="fb-root"></div>
                              <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
                              <div class="fb-comments" data-href="http://<?php echo $titler[13]; ?>/post-<?php echo $topic_id; ?>/<?php echo $topic; ?>.html" data-num-posts="10" data-width="728"></div></td>
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
    <td align="center"><?php include "top-footer.php"; ?></td>
  </tr>
</table>
<?php include "footer.php"; ?>
</body>
</html>
