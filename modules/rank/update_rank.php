<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}elseif($_POST[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' AND $_POST[id]!=""){
			$average=$_POST[score] / $_POST[people];
			if($average>5 || $_POST[average] >5){ 
				echo "<script language='javascript'>alert('ค่าเฉลี่ยเกินระดับ 5 แล้วกรุณากรอกใหม่อีกครั้ง')</script>"; 
				echo "<script type='text/javascript'>document.location=document.referrer;</script>";
			}else{
				echo $sql="UPDATE store SET	vote_score='$_POST[score]',
										vote_value='$_POST[people]',
										vote_aveage='$average'
						WHERE store_id=$_POST[id]";
				if(mysql_query($sql) or die (mysql_error())){
					echo "<script language='javascript'>alert('ระบบได้ทำการอัพเดทข้อมูลเรียบร้อยแล้ว')</script>";
					mysql_close();
					//echo "<script type='text/javascript'>document.location=document.referrer;</script>";
				}
				else{
					echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
					mysql_close();
					//echo "<script type='text/javascript'>document.location=document.referrer;</script>";
				}
			}
		}
	}
?>