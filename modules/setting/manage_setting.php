<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
	$sql="SELECT * FROM setting"; 
	$result=mysql_query($sql) or die(mysql_error());
	$i=0;
	list($set_logo,$set_title,$set_description,$set_keyword,$set_bottom,$set_advertise1,$set_advertise2,$set_advertise3,$set_advertise4,$set_advertise5)=mysql_fetch_row($result);
?>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >ระบบจัดการข้อมูลของเว็บไซต์</th>
  </tr>
  <tr>
    <td colspan="2"><form action="index_a.php?mo=setting&do=update_setting" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="txtback">
    <tbody>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* โลโก้ประจำเว็บ </strong> <br>
(<font color="#ff0000">ความกว้างของรูปต้องมีขนาด 276 pixel</font>)</span></td>
        <td align="left" valign="middle" ><img src="images/<? echo $set_logo;?>" width="200">          <input type="file" name="set_logo" id="set_logo"></td>
      </tr>
      <tr>
        <td width="284" height="35" align="right" ><span class="style6"> <strong>* ชื่อเว็บไซต์ </strong> <br>
        </span></td>
        <td width="259" align="left" valign="middle" ><input name="set_title" type="text" id="set_title" value="<? echo $set_title;?>">
          &nbsp; </td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* เนื้อหาและรายละเอียดเกี่ยวกับเว็บไซน์ </strong> <br>
        </span></td>
        <td align="left" valign="middle" ><input name="set_description" type="text" id="set_description" value="<? echo $set_description;?>"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* คำที่เกี่ยวกับเว็บไซน์ </strong> (keyword)<br>
        </span></td>
        <td align="left" valign="middle" ><input name="set_keyword" type="text" id="set_keyword" value="<? echo $set_keyword;?>"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ข้อมูลรายละเอียดด้านล่างเว็บไซต์ </strong><br>
        </span></td>
        <td align="left" valign="middle" ><input name="set_bottom" type="text" id="set_bottom" value="<? echo $set_bottom;?>"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ป้ายโฆษณา 1</strong><br>
(<font color="#ff0000"> รูปต้องมีขนาดความกว้าง 200 pixel และความสูง 165 pixel </font>)</span></td>
        <td align="left" valign="middle" ><img src="images/adver/<? echo $set_advertise1;?>" width="200">          <input type="file" name="set_advertise1" id="set_advertise1"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ป้ายโฆษณา 2</strong><br>
          (<font color="#ff0000"> รูปต้องมีขนาดความกว้าง 200 pixel และความสูง 165 pixel </font>)</span></td>
        <td align="left" valign="middle" ><img src="images/adver/<? echo $set_advertise2;?>" width="200">          <input type="file" name="set_advertise2" id="set_advertise2"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ป้ายโฆษณา 3</strong><br>
          (<font color="#ff0000"> รูปต้องมีขนาดความกว้าง 200 pixel และความสูง 165 pixel </font>)</span></td>
        <td align="left" valign="middle" ><img src="images/adver/<? echo $set_advertise3;?>" width="200">          <input type="file" name="set_advertise3" id="fadver5"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ป้ายโฆษณา 4</strong><br>
          (<font color="#ff0000"> รูปต้องมีขนาดความกว้าง 200 pixel และความสูง 165 pixel </font>)</span></td>
        <td align="left" valign="middle" ><img src="images/adver/<? echo $set_advertise4;?>" width="200">          <input type="file" name="set_advertise4" id="fadver6"></td>
      </tr>
      <tr>
        <td height="35" align="right" ><span class="style6"><strong>* ป้ายโฆษณา 5</strong><br>
          (<font color="#ff0000"> รูปต้องมีขนาดความกว้าง 360 pixel และความสูง 230 pixel </font>)</span></td>
        <td align="left" valign="middle" ><img src="images/adver/<? echo $set_advertise5;?>" width="200">          <input type="file" name="set_advertise5" id="fadver4"></td>
      </tr>
      </tbody>
  </table>
  <p align="center">
    <input type="submit" name="button" id="button" value="Submit">
  </p>
</form>&nbsp;</td>
  </tr>
</table>
<? }} ?>
