<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_POST[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2'){
			
	$add_time=date("Y-m-d : H:i:s");
	
	if($_POST[album_list]==1){
		$photo_pix = $_FILES['photo_images1']['name'];
			if($photo_pix !=""){
				$imageupload = $_FILES['photo_images1']['tmp_name'];
				$imageupload_name = $_FILES['photo_images1']['name'];
				$path = "images/articles";
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
				$photo_pix=$filename.".".$filetype;
				$photo_pix=",image_path='$photo_pix'";
			}
	}
	
	if($_POST[album_list]==2){
		$photo_pix = $_FILES['photo_images1']['name'];
			if($photo_pix !=""){
				$imageupload = $_FILES['photo_images1']['tmp_name'];
				$imageupload_name = $_FILES['photo_images1']['name'];
				$path = "images/restaurant";
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
				$photo_pix=$filename.".".$filetype;
				$photo_pix=",image_path='$photo_pix'";
			}
	}
	
	if($_POST[album_list]==3){
		$photo_pix = $_FILES['photo_images1']['name'];
			if($photo_pix !=""){
				$imageupload = $_FILES['photo_images1']['tmp_name'];
				$imageupload_name = $_FILES['photo_images1']['name'];
				$path = "images/upload";
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
				$photo_pix=$filename.".".$filetype;
				$photo_pix=",image_path='$photo_pix'";
			}
	}
	
	if($_POST[album_list]==4){
		$photo_pix = $_FILES['photo_images1']['name'];
			if($photo_pix !=""){
				$imageupload = $_FILES['photo_images1']['tmp_name'];
				$imageupload_name = $_FILES['photo_images1']['name'];
				$path = "images/reviews";
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
				$photo_pix=$filename.".".$filetype;
				$photo_pix=",image_path='$photo_pix'";
			}
	}
	
	if($_POST[album_list]==5){
		$photo_pix = $_FILES['photo_images1']['name'];
			if($photo_pix !=""){
				$imageupload = $_FILES['photo_images1']['tmp_name'];
				$imageupload_name = $_FILES['photo_images1']['name'];
				$path = "images/articles";
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
				$photo_pix=$filename.".".$filetype;
				$photo_pix=",image_path='$photo_pix'";
			}
	}
	
		$sql="UPDATE image SET	image_name='$_POST[photo_name]',
								store_id='$_POST[store_list]',
								review_id='$_POST[review_list]'
								$photo_pix
		WHERE image_id='$_POST[id]'
		";
		
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการอัพเดทข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
			echo "<script type='text/javascript'>window.location='index_a.php?mo=photo&do=manage_photo';</script>";
		}else{
			echo "<script type='text/javascript'>window.location='index.php?mo=photo&do=list_photo';</script>";
		}
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถอัพเดทข้อมูลได้')</script>";
		mysql_close();
		if($_SESSION[login_id]==1){
			echo "<script type='text/javascript'>window.location='index_a.php?mo=photo&do=manage_photo';</script>";
		}else{
			echo "<script type='text/javascript'>window.location='index.php?mo=photo&do=list_photo';</script>";
		}
	}
		}
	}
?>