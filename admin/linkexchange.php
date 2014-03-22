<?php
@session_start();
include "../inc/config.inc.php";
if(!isset($_SESSION["admin_login"])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;

exit() ;
}
$shop="select url from web_detail where id=1";
$shopre=mysql_query($shop) or die("ERROR $shop บรททัด8");
$shopr=mysql_fetch_row($shopre);
$s1="select data from link_admin where id=2";
$re1=mysql_query($s1) or die("ERROR $s1 บรททัด11");
$r1=mysql_fetch_row($re1);
$s2="select data, img from link_admin where id=1";
$re2=mysql_query($s2) or die("ERROR $s2 บรททัด15");
$r2=mysql_fetch_row($re2);
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลเว็บเพื่อนบ้าน</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="450" valign="top"><table width="100%" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td></td>
                                  </tr>
                                </table>
                                  <table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td align="left"><font size="2" color="#333333"><strong>Text Link =&gt; <a href="http://<?php echo $shopr[0]; ?>" title="<?php echo $r1[0]; ?>" target="_blank"  rel="dofollow "><strong>
                                        <?php echo $r1[0]; ?>
                                      </strong></a></strong></font></td>
                                    </tr>
                                    <tr>
                                      <td align="center"><input name="code" type="text" id="code" readonly="readonly" value="&lt;a href=&quot;http://<?php echo $shopr[0]; ?>&quot; title=&quot;<?php echo $r1[0]; ?>&quot; target=&quot;_blank&quot;  rel=&quot;dofollow &quot;&gt;&lt;strong&gt;<?php echo $r1[0]; ?>&lt;/strong&gt;&lt;/a&gt;" size="45" onclick="this.focus();this.select()" /></td>
                                    </tr>
                                    <tr>
                                      <td><form id="form1" name="form1" method="post" action="p-link-exchange.php">
                                          <table width="360" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="90" align="right"><font size="2" color="#333333"><strong>ข้อความ</strong></font></td>
                                              <td width="10">&nbsp;</td>
                                              <td width="260" align="left"><input name="data" type="text" id="data" value="<?php echo $r1[0]; ?>" />
                                                  <input type="hidden" id="links" name="links" value="1" /></td>
                                            </tr>
                                            <tr>
                                              <td width="90" align="right">&nbsp;</td>
                                              <td width="10">&nbsp;</td>
                                              <td width="260" align="left"><input type="submit" name="Submit" value="บันทึก Link" /></td>
                                            </tr>
                                          </table>
                                      </form></td>
                                    </tr>
                                </table></td>
                              <td width="450" valign="top"><table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left"><font size="2" color="#333333"><strong>Banner Link =&gt; <a href="http://<?php echo $shopr[0]; ?>" title="<?php echo $r2[0]; ?>" target="_blank"><img src="http://<?php echo $shopr[0]; ?>/banner/<?php echo $r2[1]; ?>" alt="<?php echo $r2[0]; ?>" width="88" height="31" border="0" title="<?php echo $r2[0]; ?>" /></a></strong></font></td>
                                  </tr>
                                  <tr>
                                    <td align="center"><input name="code" type="text" id="code" readonly="readonly" value="&lt;a href=&quot;http://<?php echo $shopr[0]; ?>&quot; title=&quot;<?php echo $r2[0]; ?>&quot; target=&quot;_blank&quot;  rel=&quot;dofollow &quot;&gt;&lt;img src=&quot;http://<?php echo $shopr[0]; ?>/banner/<?php echo $r2[1]; ?>&quot; title=&quot;<?php echo $r2[0]; ?>&quot; alt=&quot;<?php echo $r2[0]; ?>&quot; border=&quot;0&quot;&gt;&lt;/a&gt;" size="45" onclick="this.focus();this.select()" /></td>
                                  </tr>
                                  <tr>
                                    <td><form action="p-link-exchange.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                        <table width="360" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="90" align="right"><font size="2" color="#333333"><strong>ข้อความ</strong></font></td>
                                            <td width="10">&nbsp;</td>
                                            <td width="260" align="left"><input name="data" type="text" id="data" value="<?php echo $r2[0]; ?>" />
                                                <input type="hidden" id="links" name="links" value="2" /></td>
                                          </tr>
                                          <tr>
                                            <td width="90" align="right"><font size="2" color="#333333"><strong>ภาพ Banner </strong></font></td>
                                            <td width="10">&nbsp;</td>
                                            <td width="260" align="left"><input name="file1" type="file" id="file1" />
                                                <input type="hidden" id="op" name="op" value="<?php echo $r2[1]; ?>" />                                            </td>
                                          </tr>
                                          <tr>
                                            <td width="90" align="right">&nbsp;</td>
                                            <td width="10">&nbsp;</td>
                                            <td width="260" align="left"><input type="submit" name="Submit2" value="บันทึก Link" /></td>
                                          </tr>
                                        </table>
                                    </form></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="460" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#666666">
                            <tr>
                              <td height="30" align="left" bgcolor="#CCCCCC">&nbsp;&nbsp;<font size="2" color="#333333"><strong>เพิ่มเว็บเพื่อนบ้าน</strong></font></td>
                            </tr>
                            <tr>
                              <td><form id="form2" name="form2" method="post" action="p-link-exchange.php">
                                  <table width="100%" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td></td>
                                    </tr>
                                  </table>
                                <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="150" align="right"><font size="2" color="#333333"><strong>ชื่อ-สกุล</strong></font></td>
                                      <td width="10">&nbsp;</td>
                                      <td width="290" align="left"><input name="name" type="text" id="name" size="30" />
                                          <input type="hidden" id="links" name="links" value="3" /></td>
                                    </tr>
                                    <tr>
                                      <td width="150" align="right"><font size="2" color="#333333"><strong>Email</strong></font></td>
                                      <td width="10">&nbsp;</td>
                                      <td width="290" align="left"><input name="email" type="text" id="email" size="30" /></td>
                                    </tr>
                                    <tr>
                                      <td width="150" align="right"><font size="2" color="#333333"><strong>เว็บไซต์ที่นำไปติด http:// </strong></font></td>
                                      <td width="10">&nbsp;</td>
                                      <td width="290" align="left"><input name="url" type="text" id="url" size="40" /></td>
                                    </tr>
                                    <tr>
                                      <td width="150" align="right" valign="top"><font size="2" color="#333333"><strong>โค๊ด</strong></font></td>
                                      <td width="10" valign="top">&nbsp;</td>
                                      <td width="290" align="left" valign="top"><textarea name="code" cols="40" rows="5" id="code"></textarea></td>
                                    </tr>
                                    <tr>
                                      <td width="150" align="right"><font size="2" color="#333333"><strong>ประเภท</strong></font></td>
                                      <td width="10">&nbsp;</td>
                                      <td width="290" align="left"><select name="type" id="type">
                                          <option value="1">Text Link</option>
                                          <option value="2">Banner Link</option>
                                        </select>                                      </td>
                                    </tr>
                                    <tr>
                                      <td width="150" align="right">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td width="290" align="left"><input name="Submit" type="submit" id="Submit" value="บันทึกข้อมูล" /></td>
                                    </tr>
                                  </table>
                              </form></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="30"><font size="2" color="#333333"><strong>:: เว็บเพื่อนบ้านรอการอนุมัติ :: </strong></font></td>
                      </tr>
                      <tr>
                        <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                          <tr>
                            <td width="25" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>#</strong></font></td>
                            <td width="75" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>ชนิด</strong></font></td>
                            <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>Text/Banner</strong></font></td>
                            <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>เว็บไซต์ที่ติด</strong></font></td>
                            <td width="220" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>ข้อมูลผู้ติดต่อ</strong></font></td>
                            <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>วันที่ติดต่อ</strong></font></td>
                            <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>การกระทำ</strong></font></td>
                          </tr>
                          <?php
$s="SELECT * FROM `link_exchange` WHERE actived='0'";
$re=mysql_query($s) or die("ERROR $s");
$x=1;
while($r=mysql_fetch_row($re)){
?>
                          <tr>
                            <td width="25" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                              <?php echo $x; ?>
                            </font></td>
                            <td width="75" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                              <?php if($r[5]==1){ echo "Text Link";}else if($r[5]==2){ echo "Banner Link";} ?>
                            </font></td>
                            <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                              <?php echo $r[4]; ?>
                            </font></td>
                            <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2"><a href="http://<?php echo $r[3]; ?>" target="_blank">
                              <?php echo $r[3]; ?>
                            </a></font></td>
                            <td width="220" height="45" align="center" bgcolor="#FFFFFF"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td align="left"><font size="2" color="#333333"><strong>ชื่อ-สกุล</strong>
                                        <?php echo $r[1]; ?>
                                  </font></td>
                                </tr>
                                <tr>
                                  <td align="left"><font color="#333333" size="2"><strong>Email</strong> <a href="mailto:<?php echo $r[2]; ?>">
                                    <?php echo $r[2]; ?>
                                  </a></font></td>
                                </tr>
                            </table></td>
                            <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                              <?php echo $r[6]; ?>
                            </font></td>
                            <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font size="2"> <a href="active-link-exchange.php?id=<?php echo $r[0]; ?>"><img src="images/actived.jpg" width="42" height="15" border="0" /></a> <a href="del-link-exchange.php?id=<?php echo $r[0]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                          </tr>
                          <?php $x++;} ?>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="30"><font size="2" color="#333333"><strong>:: เว็บเพื่อนบ้านที่อนุมัติแล้ว :: </strong></font></td>
                      </tr>
                      <tr>
                        <td><table width="720" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#999999">
                            <tr>
                              <td width="25" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>#</strong></font></td>
                              <td width="75" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>ชนิด</strong></font></td>
                              <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>Text/Banner</strong></font></td>
                              <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>เว็บไซต์ที่ติด</strong></font></td>
                              <td width="220" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>ข้อมูลผู้ติดต่อ</strong></font></td>
                              <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>วันที่ติดต่อ</strong></font></td>
                              <td width="100" height="30" align="center" bgcolor="#cccccc"><font size="2" color="#333333"><strong>การกระทำ</strong></font></td>
                            </tr>
                            <?php
		$strSQL = "SELECT * FROM link_exchange WHERE actived='1'";
		$objQuery = mysql_query($strSQL);
		$Num_Rows = mysql_num_rows($objQuery);

		$Per_Page = 10;   // Per Page


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

		$strSQL .=" order  by id desc LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysql_query($strSQL);
		$a=1;
		while($objResult = mysql_fetch_row($objQuery)){
?>
                            <tr>
                              <td width="25" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                                <?php echo $a; ?>
                              </font></td>
                              <td width="75" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                                <?php if($objResult[5]==1){ echo "Text Link";}else if($objResult[5]==2){ echo "Banner Link";} ?>
                              </font></td>
                              <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                                <?php echo $objResult[4]; ?>
                              </font></td>
                              <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2"><a href="http://<?php echo $objResult[3]; ?>" target="_blank">
                                <?php echo $objResult[3]; ?>
                              </a></font></td>
                              <td width="220" height="45" align="center" bgcolor="#FFFFFF"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left"><font size="2" color="#333333"><strong>ชื่อ-สกุล</strong>
                                          <?php echo $objResult[1]; ?>
                                    </font></td>
                                  </tr>
                                  <tr>
                                    <td align="left"><font color="#333333" size="2"><strong>Email</strong> <a href="mailto:<?php echo $objResult[2]; ?>">
                                      <?php echo $objResult[2]; ?>
                                    </a></font></td>
                                  </tr>
                              </table></td>
                              <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font color="#333333" size="2">
                                <?php echo $objResult[6]; ?>
                              </font></td>
                              <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font size="2"><a href="del-link-exchange.php?id=<?php echo $objResult[0]; ?>" onclick="javascript:if(!confirm('ท่านต้องการลบข้อมูลจริงหรือไม่')){return false;}"><img src="images/del.gif" width="40" height="15" border="0" /></a></font></td>
                            </tr>
                            <?php $a++;} ?>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td align="center"><font size="2" color="#000000">รายการเว็บเพื่อนบ้านที่อนุมัติแล้ว

                                  ทั้งหมด
                                  <?php echo $Num_Rows; ?>
                                  รายการ : แสดงผลหน้าละ
                                  <?php echo $Per_Page; ?>
                                  รายการ จำนวนทั้งหมด
                                  <?php echo $Num_Pages; ?>
                                  หน้า</font></td>
                              </tr>
                              <tr>
                                <td height="30" align="center" valign="middle"><ul class="pagination  pagination-sm">
<?php
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

$pages->paginate();

echo $pages->display_pages()
?>
</ul></td>
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
        <td height="30" align="center" bgcolor="#666666"><strong><font size="2" color="#ffffff">Copyright 2012 &copy; ScritpWeb2U </font></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
