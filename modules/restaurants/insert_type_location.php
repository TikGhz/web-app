<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_SESSION[login_type]!='1'){
		echo "<script language='javascript'>alert('คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ 
		echo "<script language='javascript'>alert('ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_POST[type_location_name]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
	
	$type_location_pix=$_FILES['fpix']['name'];
	$type_location_tmp=$_FILES['fpix']['tmp_name'];
	copy($type_location_tmp,"images/icon_map/$type_location_pix");
	
	$sql="INSERT INTO type_location VALUES('', '$_POST[type_location_name]','$type_location_pix')";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=manage_type_location&active=1';</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=manage_type_location';</script>";
	}
		}
	}
?>