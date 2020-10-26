x<?
echo "<meta charset='utf-8'>";
if(empty($_POST[username]) || empty($_POST[username])){
	echo "กลับไปกรอกข้อมูลด้วยนะ";
	echo "<script type='text/javascript'>document.location=document.referrer;</script>";
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
		if($_SESSION[login_type]==1){
			echo "<script type='text/javascript'>window.location='index_a.php'</script>";
		}else{ echo "<script type='text/javascript'>window.location='index.php'</script>"; }
	}
	else{
		echo "ล็อคอินไม่สำเร็จ กรุณากรอก username และ password ให้ถูกต้อง";
		echo "<script type='text/javascript'>document.location=document.referrer;</script>";
	}
}

?>