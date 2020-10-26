<div id="content">
<?
	if($_POST[fusername]=="" || $_POST[fpassword]==""){
		echo "<script language='javascript'>alert('ไม่มีข้อมูล')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	elseif($_POST[fpassword]!=$_POST[cfpass]){
		echo "<script language='javascript'>alert('รหัสผ่านไม่ตรงกัน')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";	
	}
	elseif(strlen($_POST[fusername])<6 || strlen($_POST[fpassword])<6){
		echo "<script language='javascript'>alert('ชื่อผูใช้และรหัสผ่านต้องมากกว่า 6 ตัวขึ้นไป')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}else{
	$add_time=date("Y-m-d : H:i:s");/*
	$member_pix=$_FILES['fpix']['name'];
	$member_tmp=$_FILES['fpix']['tmp_name'];
	copy($member_tmp,"images/profile/$member_pix");*/
	
		$imageupload = $_FILES['fpix']['tmp_name'];
		$imageupload_name = $_FILES['fpix']['name'];
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
		$member_pix=$filename.".".$filetype;
		}
		
	
	$sql="INSERT INTO member VALUES('','$_POST[fusername]', '$_POST[fpassword]', '$_POST[fname]', '$_POST[flastname]', '$_POST[fidcard]', '$_POST[faddress]', '$_POST[fphone]', '$_POST[femail]', '$member_pix', '$add_time', '$_POST[select_status]')";
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		echo "<script type='text/javascript'>window.location='index.php?mo=index';</script>";
	}
	else{echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";}
	
	mysql_close();
	}
?>
</body>
</html>