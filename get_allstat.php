<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">


	<link rel="stylesheet" href="css/all-football.css" type="text/css">
	<link rel="stylesheet" href="css/all-football2.css" type="text/css">
	<link rel="stylesheet" href="css/all-football3.css" type="text/css">
</head>
<style>
	div.unshow, div.menu_tab, div.breaking_news_container { display: none; }
	div#wrap {
		border:0px solid black !important;
		margin-top:0px !important;
		margin-left: 0px !important;
		width:650px !important;
	}
	div#detail-stat {
		display: none !important;
	}
</style>
</head>
<body>
	<?php
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		function  upload_data($url)
		{
			$urlWithoutProtocol = $url;
	    $request         = "";
	    $isRequestHeader = false;

	    $exHeaderInfoArr   = array();
	    $exHeaderInfoArr[] = "Content-type: text/xml";
	    $exHeaderInfoArr[] = "Authorization: "."Basic ".base64_encode("authen_user:authen_pwd");

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
	    curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    $response = curl_exec($ch);
	    curl_close($ch);

	    return $response;
		}
			$data = upload_data("http://www.olegoal.com/");
			if ($data != null) {
				preg_match('/<div id="content">(.*?)<\/div>(.*?)<div id="right">/s',$data,$stat);

				$stat = str_replace(array('id="tabcontent1"','id="tabcontent2"','id="tabcontent3"','id="tabcontent4"'),array('class="unshow"','class="unshow"','class="unshow"','class="unshow"'),$stat[0]);
				$stat = str_replace(array('id="top"','id="header"','id="hornav"','id="minimenu"'),array('class="unshow"','class="unshow"','class="unshow"','class="unshow"'),$stat);
				$stat = str_replace(array('id="DIV_YNG_34278"','id="subminimenu"','id="right"','id="footer_top"','id="footer"'),array('class="unshow"','class="unshow"','class="unshow"','class="unshow"','class="unshow"'),$stat);
				$stat = str_replace(array('class="fblike"','class=" fb_reset"'),array('class="unshow"','class="unshow"'),$stat);
				$stat = str_replace(array('style="margin:0px 3px 0px 2px; padding:3px; background-color:#eef5e5;"'),array('class="unshow"'),$stat);
				$stat = str_replace(array('style="background-color: #cdcdcd; width:160px; float: left; position: fixed; left:0px; top:0px; z-index: 1"'),array('class="unshow"'),$stat);
				$stat = str_replace(array('style="background-color: #cdcdcd; width:160px; float: left; position: fixed; right:0px; top:0px; z-index: 1"'),array('class="unshow"'),$stat);
				$stat = str_replace(array('style="margin:2px;  padding:6px; height:260px; text-align:center; display:block; background-color:#006401;border-top:1px solid #006401;border-bottom:1px solid #006401;"'),array('class="unshow"'),$stat);
				$stat = str_replace(array('บ้านผลบอล โปรแกรมบอลวันนี้ วิเคราะห์บอลวันนี้ บ้านบอล ข้อมูล สถิติฟุตบอล'),array(''),$stat);
				echo $stat;
			} else {
				echo "ไม่สามารถโหลดข้อมูลได้";
			}

	?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(window).load(function(){
		$(".match img").each(function(){
			var old_src = $(this).attr("src");
			$(this).attr("src","http://www.olegoal.com"+old_src);
		});
		$('.unshow').remove();
		$('.clear').remove();

		$('.hilight a').click(function(e){
			var url = $(this).attr("href");
			window.location = "./get_detailstat.php?url="+url;
			e.preventDefault();
		});
	});
</script>
</body>
