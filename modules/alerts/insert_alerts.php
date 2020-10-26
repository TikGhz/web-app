<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_POST[alerts_name]=="" || $_POST[alerts_detail]==""){
		echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
		else{
	$add_time=date("Y-m-d : H:i:s");
	
	$sql="INSERT INTO alerts VALUES('', '$_POST[alerts_name]', '$_POST[alerts_detail]', '$add_time', '$_POST[id]', '$_SESSION[login_id]', '0')";
	
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