<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: ระบบจัดการข้อมูลเว็บไซต์์ ::.</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/justified-nav.css" rel="stylesheet">
<style type="text/css">
<!--
body {
	background-color: #EBEBEB;
}
-->
</style></head>

<body>
  <div class="container" style="margin-top:150px;">
    <form class="form-horizontal col-sm-offset-2" role="form" id="form1" name="form1" method="post" action="login.php">
      <div class="form-group">
        <h2 class='col-sm-offset-1'>ระบบจัดการข้อมูลวิเคราะห์บอล</h2>
      </div>
      <div class="form-group">
        <label for="user" class="col-sm-2 control-label">ชื่อผู้ใช้งาน</label>
        <div class="col-sm-5">
          <input name='user' type="text" class="form-control" id="user" placeholder="Username" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label for="pass" class="col-sm-2 control-label">รหัสผ่าน</label>
        <div class="col-sm-5">
          <input name="pass" type="password" class="form-control" id="pass" placeholder="Password" autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-5">
          <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
