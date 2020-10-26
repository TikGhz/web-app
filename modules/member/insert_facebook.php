<div id="content">
<?
	$sql_member_check="SELECT * FROM member WHERE member_user='$_POST[fusername]' AND member_pass='$_POST[fpassword]'";
	$result_member_check=mysql_query($sql_member_check) or die (mysql_error());
	$num_member_check=mysql_num_rows($result_member_check);
	if($num_member_check==1){
		echo "<meta charset='utf-8'>";
		if(empty($_POST[username]) || empty($_POST[username])){
			echo "กลับไปกรอกข้อมูลด้วยนะ";
		}
		else{
	
		$sql="SELECT member_id,member_user, member_pass, type_id FROM member WHERE member_user='$_POST[username]' AND member_pass='$_POST[password]'";
		$result=mysql_query($sql);
		$num=mysql_num_rows($result);
		list($user_id,$user,$pass,$user_type)=mysql_fetch_row($result);
	
			if($user==$_POST[username] && $pass==$_POST[password]){
				$_SESSION[login_status]="valid_user";
				$_SESSION[login_type]=$user_type;
				$_SESSION[login_name]=$user;
				$_SESSION[login_id]=$user_id;
				mysql_free_result($result);
				mysql_close();
					echo "<script type='text/javascript'>window.location='index.php'</script>";
			}
			else{
				echo "ล็อคอินไม่สำเร็จ กรุณากรอก username และ password ให้ถูกต้อง";
			}
		}
	echo "<script type='text/javascript'>window.location='index.php';</script>";
	}else{
	
		$add_time=date("Y-m-d : H:i:s");
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
		$_SESSION[username_facebook]=$_POST[fusername];
		$_SESSION[password_facebook]=$_POST[fpassword];
		echo "<script language='javascript'>alert('ระบบได้ทำการเพิ่มข้อมูลเรียบร้อยแล้ว')</script>";
		echo "<script type='text/javascript'>window.location='index.php?mo=member&do=login_facebook';</script>";
	}
	else{echo "<script language='javascript'>alert('ไม่สามารถเพิ่มข้อมูลได้')</script>";}
	
	mysql_close();
	}
?>
</body>
</html>