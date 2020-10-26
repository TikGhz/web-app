<!--<script type="text/javascript">
	function checkUser()
	{
		var elem = document.getElementById('fusername').value;
		if(!elem.match(/^([a-z0-9\_])+$/i))
		{
			alert("กรอกได้เฉพาะช่อง Username : a-Z, A-Z, 0-9 และ _ (understand) ");
			document.getElementById('fusername').value = "";
		}
	}
	
	function checkPass()
	{
		var elem = document.getElementById('fpassword').value;
		if(!elem.match(/^([a-z0-9\_])+$/i))
		{
			alert("กรอกได้เฉพาะช่อง Password : a-Z, A-Z, 0-9 และ _ (understand) ");
			document.getElementById('fpassword').value = "";
		}
	}
	
	function checkCon()
	{
		var elem = document.getElementById('cfpass').value;
		if(!elem.match(/^([a-z0-9\_])+$/i))
		{
			alert("กรอกได้เฉพาะช่อง Confirm Password : a-Z, A-Z, 0-9 และ _ (understand) ");
			document.getElementById('cfpass').value = "";
		}
	}
</script>-->
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >สมัครสมาชิกใหม่</th>
  </tr>
  <tr>
    <td colspan="3">
<form action="index.php?mo=member&do=insert_member" method="post" enctype="multipart/form-data" name="form1">

					<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
                    <?php echo "<script type='text/javascript'>window.location='$logoutUrl'</script>"; ?>
                       
                    <?php }else{ //  ถ้ายังไม่ได้ล็อกอิน แสดงลิ้งค์สำหรับ Login ?>
                        <div style="text-align:center;">
                        <a href="<?=$loginUrl?>" style="color: rgb(0, 140, 218);">
                        <img src="images/web/sign_facebook_small.png" width="189"></a>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="txtback">
	<tbody>
		<tr>
			<td height="35" colspan="3" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="select_status" type="hidden" id="select_status" value="<? echo 3;?>">
                <div align="center"><span class="style1 style5 style3">* สำหรับท่านที่ เป็นสมาชิกแล้ว กรุณาติดต่อ...</span>  
                <!--<a href="fb/test_login.php">หากต้องการล็อคอินแบบ facebook</a>-->
                </div>
           	  </td>
        </tr>
		<tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6">
                <strong>* Username </strong>
                <br> 
                ( <font color="#ff0000">ควรกรอกภาษาอังกฤษ,ตัวเลข มากกว่า 4 อักษร</font> ) </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
           	  <input name="fusername" type="text" id="fusername" value="" onblur="checkUser();" onKeyPress="CheckNum()">&nbsp;
			</td>
		</tr>
    <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
       	    <span class="style6"><strong>* Password </strong>
                <br> 
              (<font color="#ff0000"> ควรกรอกภาษาอังกฤษ,ตัวเลข มากกว่า 4 อักษร</font> ) </span>
		  </td>
  <td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->"><input name="fpassword" type="password" id="fpassword" onBlur="checkPass();" value="">    &nbsp;
			</td>
	  </tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* Confirm <strong>Password </strong> <br>
</strong>(<font color="#ff0000"> ควรกรอกภาษาอังกฤษ,ตัวเลข มากกว่า 4 อักษร</font> )</span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="cfpass" type="password" id="cfpass" value="" onblur="checkCon();">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* ชื่อ</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fname" type="text" id="fname" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* นามสกุล</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="flastname" type="text" id="flastname" value="">&nbsp;
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
          <td align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->"><input name="femail" type="text" id="femail" value="">
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
</div>
                    <?php } ?>
</form>
    </td>
  </tr>
</table>