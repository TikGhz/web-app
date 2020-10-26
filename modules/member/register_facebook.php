<?php
	$sql_member_check="SELECT member_user,member_pass FROM member WHERE member_user='$fb_userData[username]' AND member_pass='$fb_userData[id]'";
	$result_member_check=mysql_query($sql_member_check) or die (mysql_error());
	$num_member_check=mysql_num_rows($result_member_check);
	if($num_member_check==1){
		echo "<meta charset='utf-8'>";
	
	$sql="SELECT member_id,member_user, member_pass, type_id FROM member WHERE member_user='$fb_userData[username]' AND member_pass='$fb_userData[id]'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	list($user_id,$user,$pass,$user_type)=mysql_fetch_row($result);
	
		if($user==$fb_userData[username] && $pass==$fb_userData[id]){
			$_SESSION[login_status]="valid_user";
			$_SESSION[login_type]=$user_type;
			$_SESSION[login_name]=$user;
			$_SESSION[login_id]=$user_id;
			mysql_free_result($result);
			mysql_close();
				echo "<script type='text/javascript'>window.location='index.php'</script>";
		}
		else{ echo "คุณอยู่ในระบบแล้ว"; }
	}
	else{
?>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มสมาชิกใหม่</th>
  </tr>
  <tr>
    <td colspan="3">
<form action="index.php?mo=member&do=insert_facebook" method="post" enctype="multipart/form-data" name="form1">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="txtback">
	<tbody>
		<tr>
			<td height="35" colspan="3" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="select_status" type="hidden" id="select_status" value="<? echo 3;?>">
                <div align="center"><span class="style1 style5 style3">* สำหรับท่านที่ เป็นสมาชิกแล้ว กรุณาติดต่อ...</span>
                	
                <!--<a href="fb/test_login.php">หากต้องการล็อคอินแบบ facebook</a>-->
                </div>
					<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
                    <?php }else{ //  ถ้ายังไม่ได้ล็อกอิน แสดงลิ้งค์สำหรับ Login ?>
                        <div style="text-align:center;">
                        <!--Login using OAuth 2.0 handled by the PHP SDK:-->
                        <a href="<?=$loginUrl?>"><img src="images/web/sign_facebook_small.png" width="189"></a>
                        </div>
                    <?php } ?>
           	  </td>
        </tr>
        <tr>
          <td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            <span class="style6"><strong>
              <input name="fusername" type="hidden" id="fusername" value="<?php echo $fb_userData[username];?>" onBlur="checkUser();" onKeyPress="CheckNum()">
              <input name="fpassword" type="hidden" id="fpassword" onBlur="checkPass();" value="<?php echo $fb_userData[id]; ?>">
              <input name="cfpass" type="hidden" id="cfpass" value="<?php echo $fb_userData[id]; ?>" onBlur="checkCon();">
              * ชื่อ</strong></span>
            </td>
          <td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            <input name="fname" type="text" id="fname" value="<?php echo $fb_userData[first_name]; ?>">&nbsp;
            </td>
        </tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* นามสกุล</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="flastname" type="text" id="flastname" value="<?php echo $fb_userData[last_name]; ?>">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <span class="style6"><strong>* บัตรประชาชน </strong>
				<br> ( <font color="#ff0000">ควรเป็นตัวเลขเท่านั้น </font> )
              </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fidcard" type="text" id="fidcard" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* ที่อยู่ปัจจุบัน</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="faddress" type="text" id="faddress" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* เบอร์โทรศัพท์ติดต่อ </strong>
                <br> ( <font color="#ff0000">ควรเป็นตัวเลขเท่านั้น </font> )
                </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fphone" type="text" id="fphone" value="">&nbsp;
			</td>
		</tr>
        <tr>
		  <td height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			<span class="style6"> <strong>* อีเมล </strong>
                <br> ( <font color="#ff0000"> ควรเป็นอีมเล ที่ใช้งานได้จริง</font> ) 
            </span>
			</td>
          <td align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->"><input name="femail" type="text" id="femail" value="<?php echo $fb_userData[email]; ?>">
            &nbsp; </td>
        </tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <span class="style6"><strong>* รูปประจำตัว หรือ โลโก้ร้าน </strong>
				<br> 
				( <font color="#ff0000"> ควรมีขนาดมากกว่า 80px และไม่เกิน 200px </font> ) 
              </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <input type="file" name="fpix" id="fpix">&nbsp;
			</td>
		</tr>
	</tbody>
</table>
<p align="center"><input type="submit" name="button" id="button" value="ยืนยัน"></p>
</form>
    </td>
  </tr>
</table>
<?		
	}
?>