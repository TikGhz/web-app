<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2' ){
			
	$sql="DELETE FROM promotion WHERE promotion_id='$_GET[id]'";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการลบข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		if($_SESSION[login_type]=='1'){
		echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=manage_promotion';</script>";
		}else{
			echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=list_promotion';</script>";
		}
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถลบข้อมูลได้')</script>";
		mysql_close();
		if($_SESSION[login_type]=='1'){
		echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=manage_promotion';</script>";
		}else{
			echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=list_promotion';</script>";
		}
	}
		}
	}
?>