<?php 
@session_start(); 
include "../inc/config.inc.php";
include "../function/function.php";
include "../function/datetime.php";
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
                    <td height="25"><strong><font size="2"><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> จัดการข้อมูลรายการเว็บบอร์ด</font></strong></td>
                  </tr>
                  <tr>
                    <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>
                        <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="35" bgcolor="#EFEFED"><table width="730" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="35" align="left"><font color="#000000" size="3"><strong>กระดานข่าวแยกตามหมวดหมู่</strong></font></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td><table width="750" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#EFEFED">
                                  <?php
$scate="SELECT * FROM `webboard_category` ORDER BY id ASC";
$recate=mysql_query($scate) or die("ERROR $scate");
while($rcate=mysql_fetch_row($recate)){
$url=rewrite($rcate[1]);
?>
                                  <tr>
                                    <td width="650" height="25" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="left"><font size="2"><strong><img src="../img/icon_bullet_arrow_small.gif" width="9" height="9" /> <a href="../wcate-<?php echo $rcate[0]; ?>/<?php echo $url?>" title="<?php echo $rcate[1]; ?>" target="_blank"><?php echo $rcate[1]; ?></a></strong></font></td>
                                        </tr>
                                    </table></td>
                                    <td width="100" height="25" align="center" bgcolor="#FFFFFF"><font size="2">
                                      <?php
$strCATE="SELECT * FROM `webboard` WHERE cate_id='$rcate[0]' ";
$QueryCATE=mysql_query($strCATE) or die("ERROR $strCATE บรรทัด 221");
$NumCATE = mysql_num_rows($QueryCATE);	
echo $NumCATE;
?>
                                      กระทู้</font></td>
                                  </tr>
                                  <?php } ?>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="30"><table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="450"><table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="30" align="left"><font size="2"><strong><img src="../webboard/img/stick.gif" width="25" height="20" /></strong></font></td>
                                            <td width="80" align="left"><font size="2">หัวข้อปักหมุด</font></td>
                                            <td width="20" align="left"><font size="2"><strong><img src="../webboard/img/boardans.gif" width="16" height="11" /></strong></font></td>
                                            <td width="125" align="left"><font size="2">กระทู้ยังไม่ได้ถูกตอบ</font></td>
                                            <td width="20" align="left"><font size="2"><strong><img src="../webboard/img/boardunans.gif" width="16" height="11" /></strong></font></td>
                                            <td width="90" align="left"><font size="2">กระทู้ที่ถูกตอบ</font></td>
                                            <td width="20" align="left"><font size="2"><img src="../webboard/img/Logout.gif" width="16" height="16" /></font></td>
                                            <td width="65" align="left"><font size="2">ผู้ตั้งกระทู้</font></td>
                                          </tr>
                                      </table></td>
                                      <td width="290" align="right"><a href="../webboard/new-topic.php" title="ตั้งคำถามใหม่" target="_blank"><img src="../webboard/img/new_topic.gif" width="114" height="23" border="0" /></a></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                                    <tr>
                                      <td width="300" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>หัวข้อปักหมุด</strong></font></td>
                                      <td width="130" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>เมื่อ</strong></font></td>
                                      <td width="75" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>อ่าน</strong></font></td>
                                      <td width="75" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>ตอบ</strong></font></td>
                                      <td width="170" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>การกระทำ</strong></font></td>
                                    </tr>
                                    <?php
$swb="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.cate_id FROM `webboard` ";
$swb.="INNER JOIN member ON webboard.member_id=member.id ";
$swb.="WHERE webboard.sticky='1' ORDER BY webboard.upd_date DESC";
$rewb=mysql_query($swb) or die("ERROR $swb");
while($rwb=mysql_fetch_row($rewb)){
$url=rewrite($rwb[1]);
?>
                                    <tr>
                                      <td width="300" height="45"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="20" align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td width="30" align="left"><img src="../webboard/img/stick.gif" width="25" height="20" /></td>
                                                  <td width="270" align="left"><font size="2"><strong><a href="../board-<?php echo $rwb[0]; ?>-<?php echo $rwb[5]; ?>/<?php echo $url; ?>.html" title="<?php echo $rwb[1]; ?>" target="_blank"><?php echo $rwb[1]; ?> </a></strong> <img src="../webboard/img/Logout.gif" width="16" height="16" />
                                                    <?php echo $rwb[4]; ?>
                                                  </font></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td height="20" align="left"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="10" align="left"><img src="../webboard/img/arrow.gif" width="11" height="8" /></td>
                                                  <td width="230" align="left"><?php
$strWB="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB.="WHERE ans_webboard.topic_id='$rwb[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery=mysql_query($strWB) or die("ERROR บรรทัด 437");
$WBResult=mysql_fetch_row($WBQuery);
$NumWB = mysql_num_rows($WBQuery);
?>
                                                      <font size="2">ตอบล่าสุดโดย
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
                                      <td width="130" height="40" align="center"><font size="2">
                                        <?php
								$postDate = $rwb[2];
								echo DateTime($postDate);
								?>
                                      </font></td>
                                      <td width="75" height="40" align="center"><font size="2">
                                        <?php echo $rwb[3]; ?>
                                      </font></td>
                                      <td width="75" height="40" align="center"><font size="2">
                                        <?php echo $NumWB; ?>
                                      </font></td>
                                      <td width="170" align="center"><select name="type" id="type" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                                          <option value="">- เลือกการกระทำ -</option>
                                          <option value="sticky.php?id=<?php echo $rwb[0]; ?>&amp;type=1">ถอนหมุด</option>
                                          <option value="edit-webboard.php?id=<?php echo $rwb[0]; ?>">แก้ไขข้อมูล</option>
                                          <option value="del-webboard.php?id=<?php echo $rwb[0]; ?>">ลบข้อมูล</option>
                                      </select></td>
                                    </tr>
                                    <?php } ?>
                                </table></td>
                              </tr>
                              <tr>
                                <td><table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E9E9E6">
                                    <tr>
                                      <td width="300" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>หัวข้อ</strong></font></td>
                                      <td width="130" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>เมื่อ</strong></font></td>
                                      <td width="75" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>อ่าน</strong></font></td>
                                      <td width="75" height="35" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>ตอบ</strong></font></td>
                                      <td width="170" align="center" bgcolor="#EFEFED"><font color="#000000" size="2"><strong>การกระทำ</strong></font></td>
                                    </tr>
                                    <?php
$strSQL="SELECT webboard.id, webboard.title, webboard.date, webboard.view, member.name, webboard.cate_id FROM `webboard` ";
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
                                      <td width="300" height="45"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td height="20" align="left"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td width="30" align="center"><?php
$strWB2="SELECT member.name, ans_webboard.date FROM `ans_webboard` ";
$strWB2.="INNER JOIN member ON ans_webboard.member_id=member.id ";
$strWB2.="WHERE ans_webboard.topic_id='$objResult[0]' ORDER BY ans_webboard.id DESC ";
$WBQuery2=mysql_query($strWB2) or die("ERROR บรรทัด 531");
$WBResult2=mysql_fetch_row($WBQuery2);
$NumWB2=mysql_num_rows($WBQuery2);
if($NumWB2<=0){
?>
                                                      <img src="../webboard/img/boardans.gif" width="16" height="11" />
                                                      <?php }else{ ?>
                                                      <img src="../webboard/img/boardunans.gif" width="16" height="11" />
                                                      <?php } ?></td>
                                                  <td width="270" align="left"><font size="2"><strong><a href="../board-<?php echo $objResult[0]; ?>-<?php echo $objResult[5]; ?>/<?php echo $url; ?>.html" target="_blank"><?php echo $objResult[1]; ?></a></strong> <img src="../webboard/img/Logout.gif" width="16" height="16" />
                                                    <?php echo $objResult[4]; ?>
                                                  </font></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                          <tr>
                                            <td height="20" align="left"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="10" align="left"><img src="../webboard/img/arrow.gif" width="11" height="8" /></td>
                                                  <td width="230" align="left"><font size="2">ตอบล่าสุดโดย
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
                                      <td width="130" height="40" align="center"><font size="2">
                                        <?php
								$postDate = $objResult[2];
								echo DateTime($postDate);
								?>
                                      </font></td>
                                      <td width="75" height="40" align="center"><font size="2">
                                        <?php echo $objResult[3]; ?>
                                      </font></td>
                                      <td width="75" height="40" align="center"><font size="2">
                                        <?php echo $NumWB2; ?>
                                      </font></td>
                                      <td width="170" align="center"><select name="select" id="select" onchange="window.open(this.options[this.selectedIndex].value,'_self')">
                                          <option value="">- เลือกการกระทำ -</option>
                                          <option value="sticky.php?id=<?php echo $objResult[0]; ?>&amp;type=2">ปักหมุด</option>
                                          <option value="edit-webboard.php?id=<?php echo $objResult[0]; ?>">แก้ไขข้อมูล</option>
                                          <option value="del-webboard.php?id=<?php echo $objResult[0]; ?>">ลบข้อมูล</option>
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
                                        <td align="center"><font size="2" color="#000000">รายการข้อมูลเว็บบอร์ด ทั้งหมด
                                          <?php echo $Num_Rows; ?>
                                          รายการ : แสดงผลหน้าละ
                                          <?php echo $Per_Page; ?>
                                          รายการ จำนวนทั้งหมด
                                          <?php echo $Num_Pages; ?>
                                          หน้า</font></td>
                                      </tr>
                                      <tr>
                                        <td height="30" align="center" valign="middle"><?php 
$pages = new Paginator;
$pages->items_total = $Num_Rows;
$pages->mid_range = 10;
$pages->current_page = $Page;
$pages->default_ipp = $Per_Page;
$pages->url_next = $_SERVER["PHP_SELF"]."?QueryString=value&Page=";

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
