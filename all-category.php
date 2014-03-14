<?
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

$cate_id=$_GET[cate_id];
$cate=$_GET[cate];
$sct="select * from category where id='$cate_id'";
$rect=mysql_query($sct) or die("ERROR $sct");
$rct=mysql_fetch_row($rect);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rct[2];?> | <?=$titler[1];?></title>
<META NAME="keywords" CONTENT="<?=$rct[4];?>"> 
<META NAME="description" CONTENT="<?=$titler[1];?> <?=$rct[3];?>">
<meta name="robots"  content="index,follow">
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<style type="text/css">
<!--
body {
	background-color: #<?=$bgr[1];?>;
	<? if($bgr[2]!=""){ ?>background-image: url(http://<?=$titler[13];?>/bg-img/<?=$bgr[2];?>);
	background-repeat: <?=$bgr[3];?>;
	<? }if($bgr[4]==1){ ?>	
	background-attachment:fixed;
	<? } ?>
}
a:link {
	color: #<?=$linkr[1];?>;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #<?=$linkr[2];?>;
}
a:hover {
	text-decoration: underline;
	color: #<?=$linkr[3];?>;
}
a:active {
	text-decoration: none;
	color: #<?=$linkr[4];?>;
}
-->
</style>
<? 
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
			$this->return .= (($this->current_page != 1 And $this->items_total >= 10)) ? "<a class=\"paginate\" href=\"".$this->url_next.$prev_page."\">&laquo; ก่อนหน้า</a>\n":"<span class=\"inactive\" href=\"#\">&laquo; ก่อนหน้า</span>\n";

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
				if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
				if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
				{
					$this->return .= ($i == $this->current_page And $_GET['Page'] != 'All') ? "<a title=\"หน้า $i จาก $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"ไปที่หน้า $i จาก $this->num_pages\" href=\"".$this->url_next.$i."\">$i</a> ";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
			}
			$this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET['Page'] != 'All')) ? "<a class=\"paginate\" href=\"".$this->url_next.$next_page."\">ถัดไป &raquo;</a>\n":"<span class=\"inactive\" href=\"#\">ถัดไป &raquo;</span>\n";
		}
		else
		{
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"".$this->url_next.$i."\">$i</a> ";
			}
		}
		$this->low = ($this->current_page-1) * $this->items_per_page;
		$this->high = ($_GET['ipp'] == 'All') ? $this->items_total:($this->current_page * $this->items_per_page)-1;
		$this->limit = ($_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
	}

	function display_pages()
	{
		return $this->return;
	}
} 
?>
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
    <td align="center" valign="top"><? include "header.php"; ?></td>
  </tr>
  <tr>
    <td style="background-color:#FFFFFF;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
      <table width="985" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="250" align="center" valign="top"><? include "menu.php"; ?></td>
          <td width="7" align="center" valign="top">&nbsp;</td>
          <td width="728" align="center" valign="top"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center">
<?
$sads8="SELECT * FROM `ads_a8` ORDER BY id ASC";
$reads8=mysql_query($sads8) or die("Error $sads8");
while($rads8=mysql_fetch_row($reads8)){
?>
                    <table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle">
						  <? 
						  if($rads8[1]==1){ 
						  $ads8=stripslashes($rads8[3]); 
						  echo $ads8;
						  }else if($rads8[1]==2){ 
						  ?>
                              <a href="<?=$rads8[7];?>" title="<?=$rads8[8];?>" target="_blank">
                              <? if($rads8[2]==1){  ?>
                              <img src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" alt="<?=$rads8[8];?>" width="728" border="0" title="<?=$rads8[8];?>" />
                              <? }else if($rads8[2]==2){ ?>
                              <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="728" border="0">
                                <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" />
                                <param name="quality" value="high" />
                                <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads8[9];?>" width="728" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
                              </object>
                              <? }} ?>
                            </a></td>
                        </tr>
                      </table>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
<? } ?>
				  </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="30" align="left" style="border-bottom:2px solid #333333;"><table width="728" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="300" align="left" style="font-family:'Times New Roman', Times, serif; font-size:16px; font-weight:bold; color:#020202; "><?=$rct[1];?></td>
                        <td width="428" align="right"><span class='st_fblike_hcount' displaytext='Facebook Like'></span><span class='st_facebook_hcount' displaytext='Facebook'></span> <span class='st_twitter_hcount' displaytext='Tweet'></span> <span class='st_googleplus_hcount' displaytext='Google +'></span></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align="center">
<?	
$strSQL="SELECT id, title, img, short_detail, view FROM `post` WHERE cate_id='$cate_id' ";
		/*$strSQL1="SELECT category.*, sub_category.sub_cate_name FROM category ";
		$strSQL1.="INNER JOIN sub_category ON category.id=sub_category.cate_id";*/
		$objQuery = mysql_query($strSQL) or die("ERROR $strSQ1 บรรทัด 240-248");
		$Num_Rows = mysql_num_rows($objQuery);	
		
		$Per_Page = 20;   // Per Page

		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
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
		$strSQL .=" ORDER BY id DESC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL);
		while($objResult = mysql_fetch_row($objQuery)){
		$url=rewrite($objResult[1]);
?>
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                    <table width="725" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td valign="top"><table width="725" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="725" border="0" align="center" cellpadding="0" cellspacing="0"  onmouseover="this.style.backgroundColor='#DDDDDD';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                                  <tr>
                                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="5"></td>
                                        </tr>
                                      </table>
                                        <table width="715" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="150" align="center" valign="top"><a href="http://<?=$titler[13];?>/topic-<?=$objResult[0];?>/<?=$url;?>.html" title="<?=$objResult[1];?>">
                                              <? if($objResult[2]==""){ ?>
                                              <img src="http://<?=$titler[13];?>/post-s-img/NoPic.png" alt="<?=$objResult[1];?>" width="150" height="115" border="0" title="<?=$objResult[1];?>" />
                                              <? }else{ ?>
                                              <img src="http://<?=$titler[13];?>/post-s-img/<?=$objResult[2];?>" alt="<?=$objResult[1];?>" width="150" height="115" border="0" title="<?=$objResult[1];?>" />
                                              <? } ?>
                                            </a></td>
                                            <td width="5" align="center" valign="top">&nbsp;</td>
                                            <td width="560" align="center" valign="top"><table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td align="left"><strong><font size="2"><a href="http://<?=$titler[13];?>/topic-<?=$objResult[0];?>/<?=$url;?>.html" title="<?=$objResult[1];?>"><?=$objResult[1];?></a></font></strong></td>
                                                </tr>
                                                <tr>
                                                  <td align="left"><font size="2" color="#999999">
                                                    <?=$objResult[3];?>
                                                  </font></td>
                                                </tr>
                                                <tr>
                                                  <td align="left"><font size="2" color="#960105">เข้าชม :
                                                    <?=$objResult[4];?>
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
                    <? } ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="5"></td>
                      </tr>
                    </table>
                    <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30" align="center" valign="middle"><? 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&cate_id=$cate_id&cate=$cate&Page=";

$pages->paginate();

echo $pages->display_pages()
?></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><? include "top-footer.php"; ?></td>
  </tr>
</table>
<? include "footer.php"; ?>
</body>
</html>
