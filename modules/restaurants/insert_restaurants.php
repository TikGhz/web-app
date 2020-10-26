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
	}elseif($_POST[res_name]==""){
		echo "<script language='javascript'>alert('ไม่มีข้อมูล')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif(strlen($_POST[res_name])<10 ){
		echo "<script language='javascript'>alert('ข้อมูลต้องมากกว่า 10 ตัวขึ้นไป')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}else{
		if($_SESSION[login_type]=='1'){
	
		$imageupload_name_logo_pix = $_FILES['res_logo']['name'];
			if($imageupload_name_logo_pix !=""){
				$imageupload = $_FILES['res_logo']['tmp_name'];
				$imageupload_name = $_FILES['res_logo']['name'];
				$path = "images/logo";
				$newwidth=85;
				
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
				$res_logo_pix=$filename.".".$filetype;
			}
		
		
		$imageupload_name_res_pix = $_FILES['res_res']['name'];
			if($imageupload_name_res_pix !=""){
				$imageupload = $_FILES['res_res']['tmp_name'];
				$imageupload_name = $_FILES['res_res']['name'];
				$path = "images/restaurant";
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
				$res_res_pix=$filename.".".$filetype;
			}
		
		
		$imageupload_name_review_pix = $_FILES['res_review']['name'];
			if($imageupload_name_review_pix !=""){
				$imageupload = $_FILES['res_review']['tmp_name'];
				$imageupload_name = $_FILES['res_review']['name'];
				$path = "images/review";
				$newwidth=185;
				
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
				$res_review_pix=$filename.".".$filetype;
			}
		
		
		$imageupload_name_cat_pix = $_FILES['res_cat']['name'];
			if($imageupload_name_cat_pix !=""){
				$imageupload = $_FILES['res_cat']['tmp_name'];
				$imageupload_name = $_FILES['res_cat']['name'];
				$path = "images/category";
				$newwidth=100;
				
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
				$res_cat_pix=$filename.".".$filetype;
			}
			
	
	$sql="INSERT INTO store VALUES(
						'', 
						'$_POST[res_business]',
						'$_POST[res_name]',
						'$_POST[res_address]',
						'$_POST[res_phone]',
						'$_POST[res_email]',
						'$_POST[res_web]',
						'$res_logo_pix',
						'$_POST[res_lati]',
						'$_POST[res_long]',
						'0',
						'0',
						'0',
						'$_POST[res_type_store]',
						'$_POST[res_mem]',
						'$_POST[res_type_location]',
						'$res_res_pix',
						'$res_review_pix',
						'$res_cat_pix'
				)";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index_a.php?mo=restaurants&do=manage_restaurants&active=1';</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index_a.php?mo=restaurants&do=manage_restaurants';</script>";
	}
		}
	}
?>