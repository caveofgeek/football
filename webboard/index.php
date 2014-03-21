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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เว็บบอร์ดพูดคุย แลกเปลี่ยน ทรรศนะฟุตบอล | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $titler[12]; ?>">
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> เว็บบอร์ดพูดคุย แลกเปลี่ยน ทรรศนะฟุตบอล">
<meta name="robots"  content="index,follow">
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
<?php

class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $high;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $url_next;

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 7;
		$this->items_per_page = $this->default_ipp;
		$this->url_next = $this->url_next;
	}
	function paginate()
	{

		if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
		$this->num_pages = ceil($this->items_total/$this->items_per_page);

		if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
		if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;


		if($this->num_pages > 10)
		{
			$this->return .= (($this->current_page != 1 And $this->items_total >= 10)) ? "<li><a href=\"".$this->url_next.$prev_page."\">&laquo; ก่อนหน้า</a></li>\n":"<li class=\"disabled\"><a href=\"#\">&laquo; ก่อนหน้า</a></li>\n";

			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= "<li class=\"disabled\"><a href=\"#\">...</a></li>";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<li class=\"active\"><a title=\"หน้า $i จาก $this->num_pages\"href=\"#\">$i</a></li> ":"<li><a title=\"ไปที่หน้า $i จาก $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a></li> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= "<li class=\"disabled\"><a href=\"#\">...</a></li>";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<li><a href=\"".$this->url_next.$next_page."\">ถัดไป &raquo;</a></li>\n":"<li class=\"disabled\"><a href=\"#\">ถัดไป &raquo;</a></li>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? "<li class=\"active\"><a href=\"#\">$i</a></li> ":"<li><a href=\"".$this->url_next.$i."\">$i</a></li> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = (isset($_GET['ipp']) == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = (isset($_GET['ipp']) == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
	.paginate {
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	}
	a.paginate {
	border: 1px solid #1d73da;
	background-color: #FFFFFF;
	padding: 2px 6px 2px 6px;
	text-decoration: none;
	color: #000000;
	}
	h2 {
		font-size: 12pt;
		color: #003366;
		}

		 h2 {
		line-height: 1.2em;
		letter-spacing:-1px;
		margin: 0;
		padding: 0;
		text-align: left;
		}
	a.paginate:hover {
	border: 1px solid #1d73da;
	background-color: #1d73da;
	color: #FFFFFF;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #1d73da;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#1d73da;
	color: #FFFFFF;
	text-decoration: none;
	}
	span.inactive {
	border: 1px solid #999;
	font-family: Arial, Helvetica, sans-serif;
	font-size: .7em;
	padding: 2px 6px 2px 6px;
	color: #999;
	cursor: default;
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
      <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
<?php
   $sni="select * from news_index where id=1";
   $reni=mysql_query($sni) or die("ERROR $sni บรททัด 89");
   $rni=mysql_fetch_row($reni);
   $msg=stripslashes($rni[1]);
   echo $msg;
?>
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
              <table width="970" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1d73da">
                <tr>
                  <td height="30" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="35" align="left"><img src="http://<?php echo $titler[13]; ?>/img/football-icon.png" /></td>
                        <td width="925" align="left" style="font-size:14px; color:#FFFFFF; font-weight:bold;"> หมวดหมู่เว็บบอร์ด </td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
                        <?php
   $scate="SELECT * FROM `webboard_category` ORDER BY id ASC";
   $recate=mysql_query($scate) or die("Error $scate");
   while($rcate=mysql_fetch_row($recate)){
   $url=rewrite($rcate[1]);
?>
                        <tr>
                          <td width="760" height="20" align="left"><strong><font size="2"><img src="img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="http://<?php echo $titler[13]; ?>/wcate-<?php echo $rcate[0]; ?>/<?php echo $url?>" title="<?php echo $rcate[1]; ?>" target="_blank" style="color:#000000">
                            <?php echo $rcate[1]; ?>
                          </a></font></strong></td>
                          <td width="200" height="20" align="right"><strong><font size="2">
                            <?php
$strCATE="SELECT * FROM `webboard` WHERE cate_id='$rcate[0]' ";
$QueryCATE=mysql_query($strCATE) or die("ERROR $strCATE บรรทัด 221");
$NumCATE = mysql_num_rows($QueryCATE);
echo $NumCATE;
?>
                            กระทู้ </font></strong></td>
                        </tr>
                        <?php } ?>
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
              <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="850"><table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="30" align="left"><font size="2"><strong><img src="img/stick.gif" width="25" height="20" /></strong></font></td>
                        <td width="90" align="left"><font size="2">หัวข้อปักหมุด</font></td>
                        <td width="20" align="left"><font size="2"><strong><img src="img/boardans.gif" width="16" height="11" /></strong></font></td>
                        <td width="145" align="left"><font size="2">กระทู้ยังไม่ได้ถูกตอบ</font></td>
                        <td width="20" align="left"><font size="2"><strong><img src="img/boardunans.gif" width="16" height="11" /></strong></font></td>
                        <td width="100" align="left"><font size="2">กระทู้ที่ถูกตอบ</font></td>
                        <td width="20" align="left"><font size="2"><img src="img/Logout.gif" width="16" height="16" /></font></td>
                        <td width="525" align="left"><font size="2">ผู้ตั้งกระทู้</font></td>
                      </tr>
                  </table></td>
                  <td width="120" align="right"><a href="new-topic.php" title="ตั้งคำถามใหม่"><img src="img/new_topic.gif" width="114" height="23" border="0" /></a></td>
                </tr>
            </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="5"></td>
              </tr>
            </table>
              <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="left"><strong><font size="2" color="#FFFFFF">กระทู้อัพเดทล่าสุด</font></strong></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="970" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                      <tr>
                        <td width="590" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>หัวข้อ</strong></font></td>
                        <td width="125" align="center" bgcolor="#CCCCCC"><font size="2"><strong>รูป Avatar </strong></font></td>
                        <td width="125" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>เมื่อ</strong></font></td>
                        <td width="65" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>อ่าน</strong></font></td>
                        <td width="65" height="30" align="center" bgcolor="#CCCCCC"><font size="2"><strong>ตอบ</strong></font></td>
                      </tr>
                      <?php
$swb="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.upd_date, webboard.status, ";
$swb.="webboard.cate_id, webboard.member_id, member.img FROM `webboard` ";
$swb.="INNER JOIN member ON webboard.member_id=member.id ";
$swb.="WHERE webboard.sticky='1' ORDER BY webboard.upd_date DESC";
$rewb=mysql_query($swb) or die("ERROR $swb");
while($rwb=mysql_fetch_row($rewb)){
$url=rewrite($rwb[1]);
?>
                      <tr>
                        <td width="590" height="40" bgcolor="#FFFFFF"><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="20" align="left"><table width="580" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="30" align="center"><img src="img/stick.gif" width="25" height="20" /></td>
                                    <td width="550" align="left"><font size="2"><a href="http://<?php echo $titler[13]; ?>/board-<?php echo $rwb[0]; ?>-<?php echo $rwb[7]; ?>/<?php echo $url; ?>.html" title="<?php echo $rwb[1]; ?>" target="_blank"><strong>
                                      <?php echo $rwb[1]; ?>
                                      </strong></a> <img src="img/Logout.gif" width="16" height="16" />
                                      <?php echo $rwb[4]; ?>
                                      <?php
$today=date("Y-n-j H:i:s");
$yesterday=date("Y-m-d H:i:s",strtotime("- 1 day"));
//echo $objResult[5];
if($rwb[5]>=$yesterday){
//echo "yes";
	if($rwb[6]==1){
?>
                                      <img src="img/new_icon.gif" width="21" height="9" />
                                      <?php
	}else if($rwb[6]==2){
?>
                                      <img src="img/icon_update.gif" width="42" height="12" />
                                      <?php
	}
}else{
//echo "no";
}
?>
                                    </font></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="20" align="left"><table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10" align="left"><img src="img/arrow.gif" width="11" height="8" /></td>
                                    <td width="510" align="left"><?php
$strWB="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB.="WHERE ans_webboard.topic_id='$rwb[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery=mysql_query($strWB) or die("ERROR บรรทัด 437");
$WBResult=mysql_fetch_row($WBQuery);
$NumWB = mysql_num_rows($WBQuery);
?>
                                        <font size="1">ตอบล่าสุดโดย
                                          <?php if($NumWB<=0){ echo "ยังไม่มีผู้ตอบ"; }else{ echo $WBResult[0]; ?>
                                          เมื่อ
                                          <?php $replyDate = $WBResult[1];
echo DateTime($replyDate);
}
?>
                                      </font></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                        <td width="125" height="40" align="center" bgcolor="#FFFFFF"><?php if($rwb[9]!=""){ ?>
                            <img src="http://<?php echo $titler[13]; ?>/member/avatar/<?php echo $rwb[9]; ?>" width="120" height="19" />
                            <?php }else{ ?>
                            <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#333333;">Avatar</span>
                            <?php } ?></td>
                        <td width="125" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php
								$postDate = $rwb[2];
								echo DateTime($postDate);
								?>
                        </font></td>
                        <td width="65" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php echo $rwb[3]; ?>
                        </font></td>
                        <td width="65" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php echo $NumWB; ?>
                        </font></td>
                      </tr>
                      <?php } ?>
                      <?php
$strSQL="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.upd_date, webboard.status, ";
$strSQL.="webboard.cate_id, webboard.member_id, member.img FROM `webboard` ";
$strSQL.="INNER JOIN member ON webboard.member_id=member.id ";
$strSQL.="WHERE webboard.sticky='0' ";
$objQuery=mysql_query($strSQL) or die("ERROR บรรทัด 344");
$Num_Rows = mysql_num_rows($objQuery);
		$Per_Page = 20;   // Per Page


		if(!isset($_GET["Page"]))
		{
			$Page=1;
		}
		else
		{
			$Page = $_GET["Page"];
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;

		$Page_Start = (($Per_Page*$Page)-$Per_Page);
		if($Num_Rows<=$Per_Page)
		{
			$Num_Pages =1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages =($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages =($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" ORDER BY webboard.upd_date DESC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL) or die("ERROR");
		while($objResult = mysql_fetch_row($objQuery))
		{
		$url=rewrite($objResult[1]);
?>
                      <tr>
                        <td width="590" height="40" bgcolor="#FFFFFF"><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="20" align="left"><table width="580" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="30" align="center"><?php
$strWB2="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB2.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB2.="WHERE ans_webboard.topic_id='$objResult[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery2=mysql_query($strWB2) or die("ERROR $strWB2 บรรทัด 531");
$WBResult2=mysql_fetch_row($WBQuery2);
$NumWB2=mysql_num_rows($WBQuery2);
if($NumWB2<=0){
?>
                                        <img src="img/boardans.gif" width="16" height="11" />
                                        <?php }else{ ?>
                                        <img src="img/boardunans.gif" width="16" height="11" />
                                        <?php } ?></td>
                                    <td width="550" align="left"><font size="2"><a href="http://<?php echo $titler[13]; ?>/board-<?php echo $objResult[0]; ?>-<?php echo $objResult[7]; ?>/<?php echo $url; ?>.html" title="<?php echo $objResult[1]; ?>" target="_blank">
                                      <?php echo $objResult[1]; ?>
                                      </a> <img src="img/Logout.gif" width="16" height="16" />
                                      <?php echo $objResult[4]; ?>
                                      <?php
$today=date("Y-n-j H:i:s");
$yesterday=date("Y-m-d H:i:s",strtotime("- 1 day"));
//echo $objResult[5];
if($objResult[5]>=$yesterday){
//echo "yes";
	if($objResult[6]==1){
?>
                                      <img src="img/new_icon.gif" width="21" height="9" />
                                      <?php
	}else if($objResult[6]==2){
?>
                                      <img src="img/icon_update.gif" width="42" height="12" />
                                      <?php
	}
}else{
//echo "no";
}
?>
                                    </font></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td height="20" align="left"><table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="10" align="left"><img src="img/arrow.gif" width="11" height="8" /></td>
                                    <td width="510" align="left"><font size="1">ตอบล่าสุดโดย
                                      <?php if($NumWB2<=0){ echo "ยังไม่มีผู้ตอบ"; }else{ echo $WBResult2[0]; ?>
                                      เมื่อ
                                      <?php $replyDate = $WBResult2[1];
echo DateTime($replyDate);
}
?>
                                    </font></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                        <td width="125" height="40" align="center" bgcolor="#FFFFFF"><?php if($objResult[9]!=""){ ?>
                            <img src="http://<?php echo $titler[13]; ?>/member/avatar/<?php echo $objResult[9]; ?>" width="120" height="19" />
                            <?php }else{ ?>
                        <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#333333;">Avatar</span>                            <?php } ?></td>
                        <td width="125" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php
								$postDate = $objResult[2];
								echo DateTime($postDate);
								?>
                        </font></td>
                        <td width="65" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php echo $objResult[3]; ?>
                        </font></td>
                        <td width="65" height="40" align="center" bgcolor="#FFFFFF"><font size="2">
                          <?php echo $NumWB2; ?>
                        </font></td>
                      </tr>
                      <?php } ?>
                    </table>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                      </table>
                    <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="30" align="center" valign="middle"><ul class="pagination  pagination-sm"><?php
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?></ul></td>
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
  <tr>
    <td align="center"><?php include "../top-footer.php"; ?></td>
  </tr>
</table>
<?php include "../footer.php"; ?>
</body>
</html>
