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

$topic_id=mysql_real_escape_string($_GET["topic_id"]);
$cate_id=mysql_real_escape_string($_GET["cate_id"]);
$topic=mysql_real_escape_string($_GET["topic"]);
$sBOARD="SELECT webboard.*, member.name, webboard_category.cate_name, member.img FROM `webboard` ";
$sBOARD.="INNER JOIN member ON webboard.member_id=member.id ";
$sBOARD.="INNER JOIN webboard_category ON webboard.cate_id=webboard_category.id ";
$sBOARD.="WHERE webboard.id='$topic_id' ";
$reBOARDE=mysql_query($sBOARD) or die("ERROR $sBOARD บรรทัด 30");
$rBOARD=mysql_fetch_row($reBOARDE);
$url=rewrite($rBOARD[13]);

$new_view=$rBOARD[7]+1;
$upd_view=mysql_query("UPDATE webboard SET view='$new_view' WHERE id='$topic_id'") or die("ERROE $upd_view");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $rBOARD[3]; ?> | <?php echo $titler[1]; ?></title>
<META NAME="keywords" CONTENT="<?php echo $titler[12]; ?>">
<META NAME="description" CONTENT="<?php echo $titler[1]; ?> <?php echo $rBOARD[3]; ?> <?php echo $titler[11]; ?>">
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/justified-nav.css" rel="stylesheet">
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
          <td><table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="30" style="border-bottom:2px solid #333333;">
				 <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" style="color:#232323; font-size:16px; font-weight:bold; word-wrap:break-word;"><?php echo $rBOARD[3]; ?></td>
                    </tr>
                 </table>
				</td>
              </tr>
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                  </table>
                    <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                      <?php if($rBOARD[5]!=""){?>
                      <tr>
                        <td align="center"><img src="http://<?php echo $titler[13]; ?>/webboard/board-img/<?php echo $rBOARD[5]; ?>" />
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="5"></td>
                              </tr>
                          </table></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td>
<?php
   $wordchange = ("<font color=red>***</font>") ; // ข้อความที่ต้องการแทนที่คำหยาบ
   $sql = "select * from ban_word ";
   $dbquery = mysql_query($sql);
   $num_rows = mysql_num_rows($dbquery);
   $msg=stripslashes($rBOARD[4]);

   $i=0;
   while ($i < $num_rows)
   {
   $result= mysql_fetch_array($dbquery);
   $msg= eregi_replace ("$result[word]" ,$wordchange ,$msg );
   $i++;
   }
   echo $msg ;
   ?>
                        </td>
                      </tr>
                      <tr>
                        <td height="25"><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="500" align="left"><a href="http://<?php echo $titler[13]; ?>/webboard/webboard-replay.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>" title="ตอบคำถาม"><img src="http://<?php echo $titler[13]; ?>/webboard/img/reply.gif" width="114" height="23" border="0" /></a> <a href="http://<?php echo $titler[13]; ?>/webboard/new-topic.php?cate_id=<?php echo $cate_id; ?>" title="ตั้งคำถามใหม่"><img src="http://<?php echo $titler[13]; ?>/webboard/img/new_topic.gif" width="114" height="23" border="0" /></a></td>
                              <td width="450" align="right"><span class='st_fblike_hcount' displaytext='Facebook Like'></span><span class='st_facebook_hcount' displaytext='Facebook'></span> <span class='st_twitter_hcount' displaytext='Tweet'></span> <span class='st_googleplus_hcount' displaytext='Google +'></span></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="20"><font size="2"><img src="http://<?php echo $titler[13]; ?>/webboard/img/calendar-icon.png" width="16" height="16" /> เมื่อ
                          <?php
				$postDate = $rBOARD[6];
				echo DateTime($postDate);
				?>
                              <img src="http://<?php echo $titler[13]; ?>/webboard/img/userinfo.gif" width="16" height="16" /> โดย
                          <?php echo $rBOARD[12]; ?>
                          </font><font size="2">
                          <?php if($rBOARD[14]!=""){ ?>
                          <img src="http://<?php echo $titler[13]; ?>/member/avatar/<?php echo $rBOARD[14]; ?>" width="120" height="19" />
                          <?php } ?>
                        </font></td>
                      </tr>
                      <tr>
                        <td height="20"><font size="2"><img src="http://<?php echo $titler[13]; ?>/webboard/img/read_icon.gif" width="16" height="16" /> อ่าน
                          <?php echo $rBOARD[7]; ?>
                              <img src="http://<?php echo $titler[13]; ?>/webboard/img/msnchat.gif" width="16" height="16" /> ตอบ
                          <?php
$strSQL="SELECT * FROM `ans_webboard` WHERE topic_id='$topic_id' ";
$objQuery=mysql_query($strSQL) or die("ERROR บรรทัด 344");
$Num_Rows = mysql_num_rows($objQuery);
echo $Num_Rows;
?>
                              <?php if($_SESSION["m_id"]==$rBOARD[1]){ ?>
                              <a href="http://<?php echo $titler[13]; ?>/webboard/edit-webboard.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;topic=<?php echo $topic; ?>" title="แก้ไขข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/edit_icon.png" width="16" height="16" border="0" /></a> <a href="http://<?php echo $titler[13]; ?>/webboard/del-webboard.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;cate=<?php echo $url; ?>" title="ลบข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" /></a>
                              <?php }else if(isset($_SESSION["admin_login"])){ ?>
                              <a href="http://<?php echo $titler[13]; ?>/webboard/edit-webboard.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;topic=<?php echo $topic; ?>" title="แก้ไขข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/edit_icon.png" width="16" height="16" border="0" /></a> <a href="http://<?php echo $titler[13]; ?>/webboard/del-webboard.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;cate=<?php echo $url; ?>" title="ลบข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" /></a>
                              <?php } ?>
                        </font></td>
                      </tr>
                  </table></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><?php
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

		$strSQL .=" ORDER BY id ASC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL);
		while($objResult = mysql_fetch_row($objQuery))
		{
?>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
            <table width="970" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" style="background-image:url(http://<?php echo $titler[13]; ?>/img/bg-tab-login.png); background-repeat:repeat-x;"><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="830" align="left"><font size="3" color="#FFFFFF"><strong>RE :
                          <?php echo $rBOARD[3]; ?>
                        </strong></font></td>
                        <td width="120" align="right"><a href="http://<?php echo $titler[13]; ?>/webboard/webboard-replay.php?topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>" title="ตอบคำถาม"><img src="http://<?php echo $titler[13]; ?>/webboard/img/reply.gif" width="114" height="23" border="0" /></a></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                      <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                        <?php if($objResult[4]!=""){?>
                        <tr>
                          <td align="center"><img src="http://<?php echo $titler[13]; ?>/webboard/board-img/<?php echo $objResult[4]; ?>" />
                              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="5"></td>
                                </tr>
                            </table></td>
                        </tr>
                        <?php } ?>
                        <tr>
                          <td><?php
   $wordchange = ("<font color=red>***</font>") ; // ข้อความที่ต้องการแทนที่คำหยาบ
   $sql = "select * from ban_word ";
   $dbquery = mysql_query($sql);
   $num_rows = mysql_num_rows($dbquery);
   $msg=stripslashes($objResult[3]);

   $i=0;
   while ($i < $num_rows)
   {
   $result= mysql_fetch_array($dbquery);
   $msg= eregi_replace ("$result[word]" ,$wordchange ,$msg );
   $i++;
   }
   echo $msg ;
   ?>
                          </td>
                        </tr>
                        <tr>
                          <td height="25" align="left"><font size="2"> <img src="http://<?php echo $titler[13]; ?>/webboard/img/userinfo.gif" width="16" height="16" /> โดย
                            <?php
   $snickname="SELECT name, img FROM `member` WHERE id='$objResult[2]'";
   $renickname=mysql_query($snickname) or die("Error $snickname");
   $rnickname=mysql_fetch_row($renickname);
   echo $rnickname[0];
   ?>
                                <?php if($rnickname[1]!=""){ ?>
                                <img src="http://<?php echo $titler[13]; ?>/member/avatar/<?php echo $rnickname[1]; ?>" width="120" height="19" />
                                <?php } ?>
                                <img src="http://<?php echo $titler[13]; ?>/webboard/img/calendar-icon.png" width="16" height="16" /> เมื่อ
                            <?php
   $postDate = $objResult[5];
   echo DateTime($postDate);
   ?>
                                <?php if($_SESSION["m_id"]==$objResult[2]){ ?>
                                <a href="http://<?php echo $titler[13]; ?>/webboard/edit-webboard-reply.php?id=<?php echo $objResult[0]; ?>&amp;topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>" title="แก้ไขข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/edit_icon.png" width="16" height="16" border="0" /></a> <a href="http://<?php echo $titler[13]; ?>/webboard/del-webboard-reply.php?id=<?php echo $objResult[0]; ?>&amp;topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;topic=<?php echo $topic; ?>" title="ลบข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" /></a>
                                <?php }else if(isset($_SESSION["admin_login"])){ ?>
                                <a href="http://<?php echo $titler[13]; ?>/webboard/edit-webboard-reply.php?id=<?php echo $objResult[0]; ?>&amp;topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>" title="แก้ไขข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/edit_icon.png" width="16" height="16" border="0" /></a> <a href="http://<?php echo $titler[13]; ?>/webboard/del-webboard-reply.php?id=<?php echo $objResult[0]; ?>&amp;topic_id=<?php echo $topic_id; ?>&amp;cate_id=<?php echo $cate_id; ?>&amp;topic=<?php echo $topic; ?>" title="ลบข้อมูล"><img src="http://<?php echo $titler[13]; ?>/webboard/img/Delete.gif" width="16" height="16" border="0" /></a>
                                <?php } ?>
                          </font> </td>
                        </tr>
                    </table></td>
                </tr>
              </table>
            <?php } ?>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="5"></td>
                </tr>
              </table>
            <table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center"><ul class="pagination  pagination-sm"><?php
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&topic_id=$topic_id&cate_id=$cate_id&topic=$topic&Page=";

$pages->paginate();

echo $pages->display_pages()
?>
</ul>
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
