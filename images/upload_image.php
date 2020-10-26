<?php
	$namePath=$_REQUEST['imageNamePath'];
    $storeID=$_REQUEST['storeID'];
	$imageName=$_REQUEST['imageName'];
	$albumID=$_REQUEST['albumID'];
    $base=$_REQUEST['image'];
	$face_id = $_POST["face_id"];
	$mem_id = $_POST["mem_id"];
	
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen($namePath, 'w');
    fwrite($file, $binary);
    fclose($file);
	
	echo $storeID;
	echo $imageName;
	echo $albumID;
    echo 'Image upload complete!!';
	
	mysql_connect("localhost","cistrain_nonh","1qaz2wsx");
	mysql_select_db("cistrain_nonh");
	mysql_query("SET NAMES UTF8");
	$add_times=date("Y-m-d H:i:s");
	
	$sql6 = "SELECT member_id,member_user,member_pass FROM member WHERE member_pass = '$mem_id' ";
	$result2 = mysql_query($sql6);	
	list($member_id,$member_user,$member_pass) = mysql_fetch_row($result2);
	
	if($mem_id == $member_pass ){
	
	$sql="INSERT INTO image VALUES('','$imageName',
									  '$namePath',
									  '$add_times',
									  '$albumID',
									  '$storeID',
									  '',
										'$member_id'
	)";   
	mysql_query($sql);
	
	
	}else{
	$sql="INSERT INTO image VALUES('','$imageName',
									  '$namePath',
									  '$add_times',
									  '$albumID',
									  '$storeID',
									  '',
										'$mem_id'
	)";   
	mysql_query($sql);
	
	
	
	}
	

	
	
	
	
?>

