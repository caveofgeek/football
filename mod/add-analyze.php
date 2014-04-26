<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
@session_start();
header('Content-Type: text/html; charset=utf-8');
include "../inc/config.inc.php";
if(!isset($_SESSION['mod_login'])) {
echo "<meta http-equiv='refresh' content='0;url=index.php'>" ;
exit() ;
}

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
$data = get_data('http://football.kapook.com/livescore/match.php?event=&type=next');

$data = iconv('windows-874','utf-8',$data);

preg_match_all("/<td><img src='.+?' border='0' alt='(.+?)'/", $data,$league);
preg_match_all("/<font color='#FFFFFF'>วันนี้<br>(.+?)<\/font>/", $data,$date);
preg_match_all("/<font title='(.+?)'/", $data, $team);
preg_match_all("/onClick=\"window\.open\('(.+?)'/",$data,$view);

$t = 0; // team
$index = 0;
foreach ($league[1] as $leg) {
  $leagueindex = str_replace(" ", "", $leg);
  $match[$index]["id"] = $t;
  $match[$index]["league"] = $leg;
  $show_team[$leagueindex]["team"][] = $team[1][$t] . " vs " . $team[1][ ($t + 1) ];
  $show_team[$leagueindex]["link"][] = $view[1][$t];
  $t+=2;
  $index++;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลวิเคราะห์บอล ::.</title>
<link href="jquery.cleditor.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery.cleditor.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor({width:600, height:450, useCSS:true})[0].focus();
      });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td><div align="center">
      <table width="980" border="0" cellspacing="1" cellpadding="1">
        <tr valign="top">
          <td width="490"><div align="left"><font color="#000000" size="2">:: ยินดีต้อนรับเข้าสู่ ระบบจัดการ<font color="#333333">ข้อมูลวิเคราะห์บอล</font> :: |
				<?php
				$dm=date("d/m");
				$y=date("Y")+543;
				$date="$dm/$y";
				$time=date("H:i:s");
				echo "$date $time";
				?> ::.<br />
                หน้าปัจจุบันของคุณ
          :</font><font size="2"> <font color="#333333"><a href="main.php">หน้าหลัก</a> </font></font></div></td>
          <td width="490"><div align="right"><font color="#000000" size="2"><a href="../index.php" target="_blank"><font color="#000033">ไปยังหน้าเว็บไซต์</font></a> | <a href="logout.php"><font color="#000033">ออกจากระบบ</font></a></font></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="100" align="center"><a href="main.php"><img src="img/adminuser.jpg" width="66" height="66" border="0" /></a></td>
            <td width="100" align="center"><a href="add-analyze.php"><img src="img/orderico.jpg" width="66" height="66" border="0" /></a></td>
            <td width="100" align="center"><a href="all-post-analyze.php"><img src="img/cate.jpg" width="66" height="66" border="0" /></a></td>
          </tr>
          <tr>
            <td width="100" height="20" align="center"><div align="center"><font size="2">ข้อมูลส่วนตัว</font></div></td>
            <td width="100" height="20" align="center"><div align="center"><font size="2">เพิ่มบทวิเคราะห์</font></div></td>
            <td width="100" align="center"><div align="center"><font size="2">รายการบทวิเคราะห์</font></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left"><font size="4"><strong>เพิ่มบทวิเคราะห์บอล</strong></font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><table width="750" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #999999; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px;">
          <tr>
            <td>
              <br>
              <form action="p-add-analyze.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" name ="checkForm" id="checkForm" onsubmit="return check1()">
                <div class="form-group">
                  <label for="title" class="col-sm-2 control-label">หัวข้อ</label>
                  <div class="col-sm-8">
                    <input name="title" class="form-control" type="text" id="title" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="league_name" class="col-sm-2 control-label">เลือกลีค</label>
                  <div class="col-sm-8">
                    <?php
                      $unique_league = array();
                      foreach ($match as $m) {
                        $unique_league[] = $m["league"];
                      }

                      $unique_league = array_unique($unique_league);

                      echo "<select name='league_name' id='league_selector' class='form-control'>";
                      foreach ($unique_league as $u) {
                        $leagueindex = str_replace(" ", "", $u);
                        echo "<option value=".$leagueindex.">".$u."</option>";
                        $already_add = $u;
                      }
                      echo "</select>";
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="team_link" class="col-sm-2 control-label">เลือกทีม</label>
                  <div class="col-sm-8">
                    <select id="team_link" name='team_link' class='form-control'>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">รายละเอียด</label>
                  <div class="col-sm-8">
                    <textarea class="cleditorMain form-control" id="input" name="input" rows="5" cols="10"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="status_comment" class="col-sm-2 control-label">สถานะ</label>
                  <div class="col-sm-8">
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="1" checked="checked" />
                        Comment ได้ทุกคน
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="2" />
                        เฉพาะสมาชิก
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input name="status_comment" type="radio" value="3" />
                        ไม่ให้ Comment
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="Submit" value="บันทึกข้อมูล" class='btn btn-success' />
                  </div>
                </div>
              </form>

              <script language="JavaScript" type="text/javascript">

function check1() {
if(document.checkForm.title.value=="") {
alert("กรุณากรอกชื่อหัวข้อด้วยนะครับ") ;
document.checkForm.title.focus() ;
return false ;
}else if(document.checkForm.detail.value=="") {
alert("กรุณากรอกรายละเอียดด้วยนะครับ") ;
document.checkForm.detail.focus() ;
return false ;
}
else
return true ;
}

    var all_team_arr =  <?php echo json_encode($show_team); ?>;
    var now_showing_league = "";
    function load_match_selector() {
      $("#title").val("");
      var html_content = "";
      html_content = "<option>กรุณาเลือกคู่ที่มีการแข่งขัน</option>"
      for(var i = 0; i < all_team_arr[now_showing_league]["team"].length; i++)
      {
        html_content += "<option value='" + all_team_arr[now_showing_league]["team"][i] + "||" + all_team_arr[now_showing_league]["link"][i] + "'>" + all_team_arr[now_showing_league]["team"][i] + "</option>";
      }

      $("#team_link").html(html_content);
    }
    $(document).ready(function(){
      now_showing_league = $.trim($("#league_selector").val());
      load_match_selector();
    });
    $( "#league_selector" ).change(function() {
      now_showing_league = $.trim($(this).val());
      load_match_selector();
    });
    $( "#team_link" ).change(function() {
      var name = $(this).val().split("||");
      if(name != "กรุณาเลือกคู่ที่มีการแข่งขัน") {
        $("#title").val("วิเคราะห์บอลคู่ระหว่าง " + name[0]);
      }
      else
      {
        $("#title").val("");
      }
    });
            </script>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
