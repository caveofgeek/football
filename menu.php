<table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" style="background-image:url(http://<?=$titler[13];?>/img/bg-menu-left.png); border-top-right-radius:5px; border-top-left-radius:5px; -moz-border-radius-topright:5px; -moz-border-radius-topleft:5px; -webkit-border-top-right-radius:5px; -webkit-border-top-left-radius:5px;"><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="42" align="center"><img src="http://<?=$titler[13];?>/img/icon-menu-left.png" width="42" height="33" /></td>
            <td width="5">&nbsp;</td>
            <td width="193" align="left" style="font-family:'Times New Roman', Times, serif; font-size:14px; font-weight:bold; color:#FFFFFF;"><?=DateThai(date("Y-m-d"));?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td style="background-color:#000000; border-bottom-right-radius:5px; border-bottom-left-radius:5px; -moz-border-radius-bottomright:10px; -moz-border-radius-bottomleft:5px; -webkit-border-bottom-right-radius:5px; -webkit-border-bottom-left-radius:5px;"><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
          <?
$scate="select id, cate_name from category order by id asc";
$recate=mysql_query($scate) or die("ERROR $scate");
while($rcate=mysql_fetch_row($recate)){
$urlcate=rewrite($rcate[1]);
?>
          <tr>
            <td><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10" height="20" align="left"><img src="http://<?=$titler[13];?>/img/icon-arrow.png" width="10" height="9" /></td>
                  <td width="5" height="20" align="left">&nbsp;</td>
                  <td width="225" height="20" align="left"><a href="http://<?=$titler[13];?>/cate-<?=$rcate[0];?>/<?=$urlcate;?>" title="<?=$rcate[1];?>" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">
                    <?=$rcate[1];?>
                  </a></td>
                </tr>
              </table>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="5" style="border-bottom:1px solid #1b1c1e;"></td>
                  </tr>
              </table></td>
          </tr>
          <? } ?>
          <tr>
            <td><table width="240" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="10" height="20" align="left"><img src="http://<?=$titler[13];?>/img/icon-arrow.png" width="10" height="9" /></td>
                  <td width="5" height="20" align="left">&nbsp;</td>
                  <td width="225" height="20" align="left"><a href="http://<?=$titler[13];?>/webboard" title="เว็บบอร์ด" style="font-family:'Times New Roman', Times, serif; font-size:12px; color:#FFFFFF;">เว็บบอร์ด</a></td>
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
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><a href="http://<?=$titler[13];?>/game" title="เกมส์ทายผลบอล"><img src="http://<?=$titler[13];?>/img/bt-game-ball.png" alt="เกมส์ทายผลบอล" width="250" height="105" border="0" title="เกมส์ทายผลบอล" /></a></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center"><img src="http://<?=$titler[13];?>/img/title-top-score.png" width="250" height="38" border="0" /></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="35" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">No.</td>
                  <td width="150" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">ID</td>
                  <td width="65" height="25" align="center" bgcolor="#ebd7aa" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#020202;">คะแนน</td>
                </tr>
            </table></td>
          </tr>
<?	
$slevel = "SELECT member_id, SUM(point) FROM `game_member_score` GROUP BY member_id ORDER BY SUM(point) DESC, member_id DESC LIMIT 0, 10";
$relevel = mysql_query($slevel) or die("ERROR $slevel");
$i=1;
while($rlevel = mysql_fetch_row($relevel)){
if($i%2==0)
{
$bgscore="bgcolor='#ebd7aa'";
}
else
{
$bgscore="bgcolor='#d1b36c'";
}
?>
          <tr <?=$bgscore;?>>
            <td><table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="35" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><?=$i;?></td>
                  <td width="150" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><? 
$smem = "SELECT name, img FROM `member` WHERE id='$rlevel[0]'";
$remem = mysql_query($smem) or die("ERROR $smem");
$rmem = mysql_fetch_row($remem);
if($rmem[1]!=""){ 
?>
                      <img src="http://<?=$titler[13];?>/member/avatar/<?=$rmem[1];?>" width="120" height="19" />
                      <? }else{ ?>
                      <?=$rmem[0];?>
                      <? } ?>
                  </td>
                  <td width="65" height="25" align="center" style="font-family:'Times New Roman', Times, serif; font-size:12px; font-weight:bold; color:#232323;"><?=$rlevel[1];?></td>
                </tr>
            </table></td>
          </tr>
          <? $i++;} ?>
      </table></td>
  </tr>
<? 
$sads9="SELECT * FROM `ads_a9` ORDER BY id ASC";
$reads9=mysql_query($sads9) or die("Error $sads9");
while($rads9=mysql_fetch_row($reads9)){
?>
  <tr>
    <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="5"></td>
      </tr>
    </table>
        <?
if($rads9[1]==1){ 
$ads9=stripslashes($rads9[3]);
echo $ads9;
}else if($rads9[1]==2){ 
?>
        <a href="<?=$rads9[7];?>" title="<?=$rads9[8];?>" target="_blank">
        <? if($rads9[2]==1){  ?>
        <img src="http://<?=$titler[13];?>/ads-img/<?=$rads9[9];?>" width="250" border="0" title="<?=$rads9[8];?>" alt="<?=$rads9[8];?>" />
        <? }else if($rads9[2]==2){ ?>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="250" border="0">
          <param name="movie" value="http://<?=$titler[13];?>/ads-img/<?=$rads9[9];?>" />
          <param name="quality" value="high" />
          <embed src="http://<?=$titler[13];?>/ads-img/<?=$rads9[9];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="250"></embed>
        </object>
        <? } ?>
        </a>
        <? } ?></td>
  </tr>
  <? } ?>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>
