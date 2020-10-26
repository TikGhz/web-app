<?
echo "<meta charset='utf-8'>";
if(empty($_SESSION[username_facebook]) || empty($_SESSION[password_facebook])){
	echo "กลับไปกรอกข้อมูลด้วยนะ";
}
else{
	$user_face=$_SESSION[username_facebook];
	$pass_face=$_SESSION[password_facebook];
	$sql="SELECT member_id,member_user, member_pass, type_id FROM member WHERE member_user='$user_face' AND member_pass='$pass_face'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	list($user_id,$user,$pass,$user_type)=mysql_fetch_row($result);
	
	if($user==$_SESSION[username_facebook] && $pass==$_SESSION[password_facebook]){
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

?>