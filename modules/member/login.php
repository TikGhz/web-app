<div id="content">
	<div id="login">
<form action="index.php?mo=member&do=check_user" method="post" enctype="multipart/form-data" name="form1">
	<table width="100%" border="0">
	<tr>
	  <td colspan="3"><div style="font-size:24px; font-family:RSU; border-bottom:1px solid #ccc;">Member Login</div></td>
	  </tr>
	<tr>
	  <td colspan="3"><div style="font-size:18px; font-family:RSU;">Please register with us before to make sure that you will enjoy your store experience with us.</div></td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td rowspan="5">
	  		<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
                <a href="<?=$logoutUrl?>">Logout</a>
            <?php }else{ //  ถ้ายังไม่ได้ล็อกอิน แสดงลิ้งค์สำหรับ Login ?>

                <a href="<?=$loginUrl?>"><img src="images/web/sign_facebook.png" width="195"></a>

            <?php } ?></td>
	  </tr>
	<tr>
	  <td width="90"><div style="font-size:18px; font-family:RSU;">Username : </div></td>
	  <td><input type="text" name="username" id="username" size="27" style="padding:5px;"></td>
	  </tr>
	<tr>
	  <td><div style="font-size:18px; font-family:RSU;">Password : </div></td>
	  <td><input type="password" name="password" id="password" size="27" style="padding:5px;"></td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="image" name="Submit" value="Submit" src="images/web/button_sign_in.png" alt="Button" onClick="submit" style="margin-top:5px;" width="215">
	    <div style="font-size:16px; font-family:RSU;">Not member? <a href="index.php?mo=member&do=register">Register</a></div></td>
	  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	</table>
</form>
	</div>
</div>