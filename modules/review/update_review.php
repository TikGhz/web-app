<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_SESSION[login_type]>'2' || $_SESSION[login_type]<'1'){ 
		echo "<script language='javascript'>alert('ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
	}
	elseif($_POST[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
			
	$sql="UPDATE review SET	review_name='$_POST[review_name]', 
							review_detail='$_POST[review_detail]',
							store_id='$_POST[store_list]' 
					WHERE review_id='$_POST[id]'";
		
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการอัพเดทข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
		echo "<script type='text/javascript'>window.location='index_a.php?mo=review&do=manage_review';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index_a.php?mo=review&do=list_review';</script>";
		}
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถอัพเดทข้อมูลได้')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
		echo "<script type='text/javascript'>window.location='index_a.php?mo=review&do=manage_review';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index_a.php?mo=review&do=list_review';</script>";
		}
	}
		
	}
?>