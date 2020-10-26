<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
			
$sql="SELECT * FROM type_location WHERE type_location_id='$_GET[id]'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){echo"<script>window.location='user.php';</script>";}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขร้านค้า
        <div style="float:right;"></div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=restaurants&do=update_type_location&id=<?=$row['type_location_id']?>" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td height="35" colspan="2"><strong>เกี่ยวกับร้าน</strong></td>
  </tr>
  <tr>
    <td width="150">ชื่อบริษัท</td>
    <td><input type="text" name="res_business" id="res_business"></td>
  </tr>
  <tr>
    <td>ชื่อร้านค้า</td>
    <td><input type="text" name="res_name" id="res_name"></td>
  </tr>
  <tr>
    <td>ที่อยู่ติดต่อ</td>
    <td><textarea name="res_address" id="res_address"></textarea></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์</td>
    <td><input type="text" name="res_phone" id="res_phone"></td>
  </tr>
  <tr>
    <td>อีเมล</td>
    <td><input type="text" name="res_email" id="res_email"></td>
  </tr>
  <tr>
    <td>เว็บไซต์ร้าน</td>
    <td><input type="text" name="res_web" id="res_web">
      <span class="style6">(<font color="#ff0000"> เช่น http://www.exxxx.com </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>แผนที่ ( หาจาก Google Map )</strong></td>
  </tr>
  <tr>
    <td>ตำแหน่งละติจูด</td>
    <td><input type="text" name="res_lati" id="textfield9">
      <span class="style6">(<font color="#ff0000"> เช่น. 18.820765 </font>)</span></td>
  </tr>
  <tr>
    <td>ตำแหน่งลองติจูด</td>
    <td><input type="text" name="res_long" id="res_long">
      <span class="style6">(<font color="#ff0000"> เช่น. 98.9617490 </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>รายละเอียดร้าน</strong></td>
  </tr>
  <tr>
    <td>ร้านของสมาชิก</td>
    <td><select name="res_mem" id="res_mem">
      <? 	$sql_select_store="SELECT store_id,store_name FROM store";
		$result_select_store=mysql_query($sql_select_store) or die (mysql_error());
		while(list($store_id,$store_name)=mysql_fetch_row($result_select_store)){
	?>
      <option value="<?=$store_id; ?>" selected>
        <?=$store_name;?>
        </option>
      <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทร้าน</td>
    <td><select name="res_type_store" id="res_type_store">
      <? 	$sql_select_type_store="SELECT * FROM type_store";
		$result_select_type_store=mysql_query($sql_select_type_store) or die (mysql_error());
		while(list($type_store_id,$type_name)=mysql_fetch_row($result_select_type_store)){
	?>
      <option value="<?=$type_store_id; ?>" selected>
        <?=$type_name;?>
        </option>
      <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทสถานที่</td>
    <td><select name="res_type_location" id="res_type_location">
      <? 	$sql_select_type_location="SELECT * FROM type_location";
		$result_select_type_location=mysql_query($sql_select_type_location) or die (mysql_error());
		while(list($type_location_id,$type_location_name,$type_location_image)=mysql_fetch_row($result_select_type_location)){
	?>
      <option value="<?=$type_location_id; ?>" selected>
        <?=$type_location_name;?>
        </option>
      <? } ?>
    </select></td>
  </tr>
  <tr>
    <td height="35"><strong>รูปภาพ</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>รูปโลโก้ร้าน</td>
    <td><input type="file" name="res_logo" id="res_logo">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:85px สูง85px</strong></font> )</span></td>
  </tr>
  <tr>
    <td>รูปหน้าร้านอาหาร</td>
    <td><input type="file" name="res_res" id="res_res">
      <span class="style6">( <font color="#ff0000">ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:200px สูง200px </strong></font>)</span></td>
  </tr>
  <tr>
    <td>รูปหน้ารีวิว</td>
    <td><input type="file" name="res_review" id="res_review">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:185px สูง:185px</strong></font> )</span></td>
  </tr>
  <tr>
    <td>รูปหน้าหมวดหมู่</td>
    <td><input type="file" name="res_cat" id="res_cat">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:100px สูง:100px</strong></font> )</span></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['type_store_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<div style="width:100%;margin:10px auto 0 auto;text-align:left;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>
<? } ?>