<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_POST['rating']==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
			
			$add_time=date("Y-m-d : H:i:s");
			$sql="SELECT * FROM vote WHERE member_id='$_POST[memberid]' AND store_id='$_POST[storeid]'";
			$result=mysql_query($sql) or die (mysql_error());
			$num=mysql_num_rows($result);
			if($num>=1){ 
			echo "<script language='javascript'>alert('ไม่สามารถโหวตได้ เนื่องจากคุณเคยโหวตแล้ว')</script>";
			mysql_close();
			echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=detail&id=$_POST[storeid]';</script>";
			}
	else{
	if($_POST[rating]==1){ 
		$sql_vote="INSERT INTO vote VALUES('', '$_POST[rating]','','','','' "; 
		$sql_vote.=" ,'$add_time','$_POST[memberid]','$_POST[storeid]')";
	}
	if($_POST[rating]==2){ 
		$sql_vote="INSERT INTO vote VALUES('', '','$_POST[rating]','','','' ";
		$sql_vote.=" ,'$add_time','$_POST[memberid]','$_POST[storeid]')";
	}
	if($_POST[rating]==3){ 
		$sql_vote="INSERT INTO vote VALUES('', '','','$_POST[rating]','','' ";
		$sql_vote.=" ,'$add_time','$_POST[memberid]','$_POST[storeid]')";
	}
	if($_POST[rating]==4){ 
		$sql_vote="INSERT INTO vote VALUES('', '','','','$_POST[rating]','' "; 
		$sql_vote.=" ,'$add_time','$_POST[memberid]','$_POST[storeid]')";
	}
	if($_POST[rating]==5){ 
		$sql_vote="INSERT INTO vote VALUES('', '','','','','$_POST[rating]' ";
		$sql_vote.=" ,'$add_time','$_POST[memberid]','$_POST[storeid]')";
	}
	mysql_query($sql_vote) or die (mysql_error());
	
	$sql_select_vote="SELECT vote_id, SUM(vote_1), SUM(vote_2), SUM(vote_3), SUM(vote_4), SUM(vote_5) FROM vote WHERE store_id='$_POST[storeid]' GROUP BY store_id ";
	$result_select_vote=mysql_query($sql_select_vote) or die (mysql_error());
	
	list($v,$v1,$v2,$v3,$v4,$v5)=mysql_fetch_row($result_select_vote);
	$vote_score=$v1+$v2+$v3+$v4+$v5; //จำนวนคะแนนโหวตทั้งหมด
	
	$sql_select_vote="SELECT vote_id FROM vote WHERE store_id='$_POST[storeid]'";
	$result_select_vote=mysql_query($sql_select_vote) or die (mysql_error());
	$vote_value=mysql_num_rows($result_select_vote); //จำนวนคนโหวต
	
	$vote_aveage=$vote_score/$vote_value;//ค่าเฉลี่ย
	$vote_aveage1=substr($vote_aveage,0,6);
	$sql_update_store="UPDATE store SET 
										vote_score='$vote_score',
										vote_value='$vote_value',
										vote_aveage='$vote_aveage1'
					WHERE store_id='$_POST[storeid]'";
	
	if(mysql_query($sql_update_store) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการโหวตข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=detail&id=$_POST[storeid]';</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index.php?mo=restaurants&do=detail&id=$_POST[storeid]';</script>";
	}
	}
		}
?>