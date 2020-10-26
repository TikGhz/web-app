<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}elseif($_POST[member_user]=="" || $_POST[member_pass]==""){
		echo "<script language='javascript'>alert('ไม่มีข้อมูล')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif(strlen($_POST[member_user])<6 || strlen($_POST[member_pass])<6){
		echo "<script language='javascript'>alert('ชื่อผูใช้และรหัสผ่านต้องมากกว่า 6 ตัวขึ้นไป')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}else{
	
		if($_SESSION[login_type]=='1'){	
			$add_time=date("Y-m-d : H:i:s");
			$imageupload_name = $_FILES['ffff']['name'];
			if($imageupload_name !=""){
				$imageupload = $_FILES['ffff']['tmp_name'];
				$imageupload_name = $_FILES['ffff']['name'];
				$path = "images/profile";
				$newwidth=200;
				
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
				$member_pix=$filename.".".$filetype;
				$member_pix=",member_image='$member_pix'";
			}
			
			
				$sql="UPDATE member SET	member_user='$_POST[member_user]',
									member_pass='$_POST[member_pass]',
									member_name='$_POST[member_name]',
									member_surename='$_POST[member_surename]',
									member_idcard='$_POST[member_idcard]',
									member_address='$_POST[member_address]',
									member_tel='$_POST[member_tel]',
									member_email='$_POST[member_email]'
									$member_pix
				WHERE member_id='$_GET[id]'
				";
				
		}else{
			$add_time=date("Y-m-d : H:i:s");
			$imageupload_name = $_FILES['ffff']['name'];
			if($imageupload_name !=""){
				$imageupload = $_FILES['ffff']['tmp_name'];
				$imageupload_name = $_FILES['ffff']['name'];
				$path = "images/profile";
				$newwidth=200;
				
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
			}
			$member_pix=$filename.".".$filetype;
			$member_pix=",member_image='$member_pix'";
			
			$sql="UPDATE member SET	member_user='$_POST[member_user]',
									member_pass='$_POST[member_pass]',
									member_name='$_POST[member_name]',
									member_surename='$_POST[member_surename]',
									member_idcard='$_POST[member_idcard]',
									member_address='$_POST[member_address]',
									member_tel='$_POST[member_tel]',
									member_email='$_POST[member_email]'
									$member_pix
				WHERE member_id='$_SESSION[login_id]'
				";
		}
		
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการอัพเดทข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถอัพเดทข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
}
	
?>