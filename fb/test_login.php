<?php
include("fb_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample FB Login</title>
</head>

<body>
<?php
//pre($fb_user);
?>
   <!--<h1>php-sdk 3.1.1</h1>-->

<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
	<a href="<?=$logoutUrl?>">Logout</a>
<?php }else{ //  ถ้ายังไม่ได้ล็อกอิน แสดงลิ้งค์สำหรับ Login ?>
    <div>
    
    <a href="<?=$loginUrl?>">Login with Facebook</a>
    </div>
<?php } ?>


    <h3>PHP Session</h3>
    <pre><?php //print_r($_SESSION); ?></pre>

<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงข้อมูลของคนๆ นั้น ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?=$fb_user?>/picture">

      <h3>Your User Object (/me)</h3>
      <?php 
	  pre($fb_userData); 
	  ?>
      
<?php }else{ //  ถ้ายังไม่ได้ล็อกอิน  ?>
      <strong><em>You are not Connected.</em></strong>

<?php } 
echo "<script type='text/javascript'>window.location='http://nonh.cis-training.com/project/index.php'</script>";
?>

</body>
</html>