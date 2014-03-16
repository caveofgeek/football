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
	color: #999999;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	background-color: #888888;
}
.ui-datepicker{
	width:150px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
.style6 {font-size: small; font-weight: bold; color: #FFFFFF; }
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลอันดับสมาชิก</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="30"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td width="375" align="left"><font size="2" color="#333333"><strong>:: ข้อมูลรายการคะแนนอันดับสมาชิก :: </strong></font></td>
                            <td width="375" align="right"><font size="2" color="#333333"><strong>[ <a href="reset-score.php" onclick="javascript:if(!confirm('ท่านต้องการรีเซ็ทข้อมูลคะแนน จริงหรือไม่')){return false;}">รีเซ็ทข้อมูลคะแนน</a> ]</strong></font></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
                          <tr>
                            <td width="75" height="30" align="center" bgcolor="#990000"><span class="style6">อันดับ</span></td>
                            <td width="200" height="30" align="center" bgcolor="#990000"><span class="style6">ชื่อที่ใช้เรียก / ฉายา </span></td>
                            <td width="75" height="30" align="center" bgcolor="#990000"><span class="style6">ถูก</span></td>
                            <td width="75" height="30" align="center" bgcolor="#990000"><span class="style6">ผิด</span></td>
                            <td width="75" height="30" align="center" bgcolor="#990000"><span class="style6">คะแนน</span></td>
                          </tr>
<?php	


$strSQL = "SELECT member_id, SUM(yes), SUM(no), SUM(point) FROM `game_member_score` GROUP BY member_id ORDER BY SUM(point) DESC";
$objQuery = mysql_query($strSQL) or die("ERROR $strSQL");
$i=1;
while($objResult = mysql_fetch_row($objQuery)){
?>
                          <tr>
                            <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                              <?php echo $i; ?>
                            </font></td>
                            <td width="200" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                              <?php
$smem = "SELECT name, img FROM `member` WHERE id='$objResult[0]'";
$remem = mysql_query($smem) or die("ERROR $smem");
$rmem = mysql_fetch_row($remem);
if($rmem[1]!=""){ ?>
                              <img src="../member/avatar/<?php echo $rmem[1]; ?>" width="80" height="18" />
                              <?php }else{ ?>
                              <?php echo $rmem[0]; ?>
                              <?php } ?>
                            </font> </td>
                            <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                              <?php echo $objResult[1]; ?>
                            </font></td>
                            <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                              <?php echo $objResult[2]; ?>
                            </font></td>
                            <td width="75" height="22" align="center" bgcolor="#CCCCCC"><font size="2">
                              <?php echo $objResult[3]; ?>
                            </font></td>
                          </tr>
                          <?php $i++; } ?>
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
