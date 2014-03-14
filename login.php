<? @session_start();  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include "inc/config.inc.php";
$user=$_POST[user];
$pass=$_POST[pass];
$date=date("Y-n-j H:i:s");
//echo "$user<br>$pass";
//login
$s="SELECT id, name, user, pass FROM `member` where user='$user' and pass='$pass'";
$re=mysql_query($s) or die("ERROR $s");
$num=mysql_num_rows($re);
$r=mysql_fetch_row($re);

if($num<=0){
?>
<script language="JavaScript"> 	
	alert('ขออภัยครับ ท่านกรอก ชื่อผู้ใช้ และ/หรือ รหัสผ่าน ไม่ถูกต้องครับ'); 	
	history.back();
</script>
<?
}
else {
$_SESSION[member_login]="member_login";
$_SESSION[m_id]="$r[0]";
$_SESSION[m_name]="$r[1]";
$_SESSION[m_user]="$r[2]";
$_SESSION[m_pass]="$r[3]";
echo "<meta http-equiv=refresh content=0;URL=member/index.php>"; 
}
?>