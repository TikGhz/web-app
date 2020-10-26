<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
			
	$sql="UPDATE alerts SET aleats_read='1'	WHERE alerts_id='$_GET[id]' and member_id='$_SESSION[login_id]'";
		
	if(mysql_query($sql) or die (mysql_error())){
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=alerts&do=read_alerts&id=$_GET[id]';</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถอัพเดทข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=alerts&do=read_alerts&id=$_GET[id]';</script>";
	}
		
	}
?>