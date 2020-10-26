<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo "<script type='text/javascript'>window.location='index.php?mo=member&do=login';</script>";
	}
	elseif($_SESSION[login_type]>'2' || $_SESSION[login_type]<'1'){ 
		echo "<script language='javascript'>alert('ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
	}
	elseif($_POST[select_review]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
	
	$add_time=date("Y-m-d : H:i:s");
	$sql="INSERT INTO review VALUES('', '$_POST[review_name]', '$_POST[review_detail]', '$add_time', '$_POST[select_review]','$_SESSION[login_id]','0')";
	
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=detail&id=$_POST[select_review]#review';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=detail&id=$_POST[select_review]#review';</script>";
		}
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
		echo "<script type='text/javascript'>window.location='index.php?mo=review&do=insert&id=$_POST[select_review]';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index.php?mo=review&do=insert&id=$_POST[select_review]';</script>";
		}
	}
		
	}
?>