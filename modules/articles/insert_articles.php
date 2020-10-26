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
	}
	elseif($_POST[articles_name]=="" || $_POST[articles_detail]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
	$add_time=date("Y-m-d : H:i:s");
		
		$imageupload = $_FILES['articles_pix']['tmp_name'];
		$imageupload_name = $_FILES['articles_pix']['name'];
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
		$articles_pix=$filename.".".$filetype;
		}
		
	$sql="INSERT INTO articles VALUES('', '$_POST[articles_name]', '$_POST[articles_detail]', '$articles_pix','$add_time')";
	
	if(mysql_query($sql) or die (mysql_error())){
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index_a.php?mo=articles&do=manage_articles&active=1';</script>";
	}
	else{
		echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";
		mysql_close();
		echo "<script type='text/javascript'>window.location='index_a.php?mo=articles&do=manage_articles';</script>";
	}
		}
	}
?>