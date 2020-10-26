<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
	$sql_type_location="SELECT * FROM type_location ORDER BY type_location_id";
	$result_type_location=mysql_query($sql_type_location)or die(mysql_error());
	$num=mysql_num_rows($result_type_location);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="20" class="header">ลำดับ</th>
    <th class="header">ประเภทสถานที่</th>
    <th class="header">รูปไอคอน</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_location);
?>
  <tr>
    <td align="center"><?=$row['type_location_id']?></td>
    <td><?=$row['type_location_name']?></td>
    <td align="center"><img src="images/icon_map/<? echo $row['type_location_image']; ?>" width="42" height="52"></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=restaurants&do=edit_type_location&id=<?=$row['type_location_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index.php?mo=restaurants&do=delete_type_location&id=<?=$row['type_location_id']?>" onclick="return confirm('ลบประเภทสถานที่ <?=$row['type_name']?> ?')">
      	<img src="images/web/delete_icon.png"class="action" title="ลบ"/>
      </a>
    </td>
  </tr>
<?
  }
}
else if($num==0){
?>
  <tr>
    <td colspan="5" align="center">ไม่มีข้อมูล</td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="5">จำนวน : <?=$num?></th>
  </tr>
</table>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มประเภทสถานที่</th>
  </tr>
  <tr>
    <td colspan="2"><form action="index.php?mo=restaurants&do=insert_type_location" method="post" enctype="multipart/form-data" name="user">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="100"><span class="header">ประเภทสถานที่</span></td>
          <td><input type="text" name="type_location_name"></td>
        </tr>
        <tr>
          <td><span class="header">รูปไอคอน</span></td>
          <td><input type="file" name="fpix" id="fpix"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="เพิ่ม"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<? }} ?>
