<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_POST[id]=="" || $_POST[comment_now]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
			$add_time=date("Y-m-d : H:i:s");
	$sql="INSERT INTO comment VALUES('', '$_POST[comment_now]','$add_time','$_POST[id]','$_POST[id]','$_SESSION[login_id]')";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	}
?>