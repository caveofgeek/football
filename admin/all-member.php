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
	border: 1px solid #cccccc;
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
	border: 1px solid #cccccc;
	background-color: #cccccc;
	color: #000000;
	text-decoration: underline;
	}
	a.current {
	border: 1px solid #cccccc;
	font: bold .7em Arial,Helvetica,sans-serif;
	padding: 2px 6px 2px 6px;
	cursor: default;
	background:#cccccc;
	color: #000000;
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลรายชื่อสมาชิก</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="650" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                      <tr bgcolor="#F7FDEE">
                        <td width="75" height="28" align="center" bgcolor="#DDDDDD"><strong><font size="2">รหัส</font></strong></td>
                        <td width="205" height="28" align="center" bgcolor="#DDDDDD"><strong><font size="2">ชื่อที่ใช้เรียก / ฉายา</font></strong></td>
                        <td width="120" align="center" bgcolor="#DDDDDD"><strong><font size="2">รูป Avatar </font></strong></td>
                        <td width="125" height="28" align="center" bgcolor="#DDDDDD"><strong><font size="2">วันสมัคร</font></strong></td>
                        <td width="125" height="28" align="center" bgcolor="#DDDDDD"><strong><font size="2">การจัดการ</font></strong></td>
                      </tr>
                      <?php
$strSQL="SELECT id, reg_date, name, img FROM `member` ";
$objQuery=mysql_query($strSQL) or die("ERROR บรรทัด 208");
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

		$strSQL .=" order  by id ASC LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL);
		while($objResult = mysql_fetch_row($objQuery))
		{
?>
                      <tr>
                        <td width="75" height="25" align="center" bgcolor="#F4F4F4"><font size="2">
                          <?php echo $objResult[0]; ?>
                        </font></td>
                        <td width="205" height="25" align="left" bgcolor="#F4F4F4">&nbsp;&nbsp;<font size="2"><?php echo "$objResult[2]"; ?></font></td>
                        <td width="120" height="25" align="center" bgcolor="#F4F4F4"><?php if($objResult[3]!=""){ ?>
                          <img src="../member/avatar/<?php echo $objResult[3]; ?>" width="110" height="18" />
                          <?php }else{ ?>
                          <span style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#333333;">Avatar</span>
                          <?php } ?></td>
                        <td width="125" height="25" align="center" bgcolor="#F4F4F4"><font size="2">
                          <?php
				  $regDate = $objResult[1];
				  echo DateThai($regDate);
				  ?>
                        </font></td>
                        <td width="125" height="25" align="center" bgcolor="#F4F4F4"><select name="status" id="status" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                            <option value="" selected="selected">- เลือก -</option>
                            <option value="member-detail.php?member_id=<?php echo $objResult[0]; ?>">ดูรายละเอียด</option>
                            <option value="del-member.php?member_id=<?php echo $objResult[0]; ?>">ลบข้อมูล</option>
                        </select></td>
                      </tr>
                      <?php } ?>
                    </table>
                    <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
                        </tr>
                      </table>
                      <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center"><font size="2" color="#000000">มีสมาชิก</font><font size="2" color="#000000">ทั้งหมด
                            <?php echo $Num_Rows; ?>
                            ราย : แสดงผลหน้าละ
                            <?php echo $Per_Page; ?>
                            ราย จำนวนทั้งหมด
                            <?php echo $Num_Pages; ?>
                            หน้า</font></td>
                        </tr>
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
                      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td></td>
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
