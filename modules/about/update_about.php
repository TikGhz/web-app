<div id="content">
<? 
	$add_time=date("Y-m-d : H:i:s");
	$ins_about="UPDATE about SET about_detail='$_POST[about_detail]', about_date='$addtime'";
	if(mysql_query($ins_about) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		echo "<script type='text/javascript'>window.location='index.php?mo=about';</script>";
	}
	else{echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
	}
	mysql_close();
?>
</div>