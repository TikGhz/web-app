<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_POST[promotion_name]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2'){
	
		$imageupload_name_promotion_pix = $_FILES['fpix']['name'];
			if($imageupload_name_promotion_pix !=""){
				$imageupload = $_FILES['fpix']['tmp_name'];
				$imageupload_name = $_FILES['fpix']['name'];
				$path = "images/activity";
				$newwidth=500;
				
				if($imageupload){
				$arraypic = explode(".",$imageupload_name);
				$filename = strtolower($arraypic[0]); //แปลงเป็นตัวพิมพ์เล็ก
				$filetype = strtolower($arraypic[1]);
				if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png"
				|| $filetype=="gif"){
				
				if($filetype=="jpg" || $filetype=="jpeg"){
				$src = imagecreatefromjpeg($imageupload);
				}
				else if($filetype=="png"){
				$src = imagecreatefrompng($imageupload);
				}
				else if($filetype=="gif"){
				$src = imagecreatefromgif($imageupload);
				}
				
				list($width,$height)=getimagesize($imageupload);
				$newheight=($height/$width)*$newwidth;
				$tmp=imagecreatetruecolor($newwidth,$newheight);
				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				
				if($filetype=="jpg" || $filetype=="jpeg"){
				imagejpeg($tmp,$path."/".$filename.".".$filetype);
				}
				else if($filetype=="png"){
				imagepng($tmp,$path."/".$filename.".".$filetype);
				}
				else{
				imagegif($tmp,$path."/".$filename.".".$filetype);
				}
				
				}else {
				echo "<div><center><h3>ERROR : ไม่สามารถ Upload รูปภาพได้</h3></center></div>";
				}
				}
				$promotion_pix=$filename.".".$filetype;
			}
		
	
	$now_date=date('Y-m-d',strtotime("now"));
	$end_date=date('Y-m-d',strtotime("+7 day"));
	$sql="INSERT INTO promotion VALUES('', '$_POST[promotion_name]','$_POST[promotion_detail]','$promotion_pix','$_POST[select_promotion]','$_SESSION[login_id]','$now_date','$end_date')";
	
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		if($_SESSION[login_type]=='1'){
	echo "<script type='text/javascript'>window.location='index_a.php?mo=promotion&do=manage_promotion&active=1';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=list_promotion&active=1';</script>";
		}
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		if($_SESSION[login_type]=='1'){
	echo "<script type='text/javascript'>window.location='index_a.php?mo=promotion&do=manage_promotion';</script>";
		}else{
		echo "<script type='text/javascript'>window.location='index.php?mo=promotion&do=list_promotion';</script>";
		}
	}
		}
	}
?>