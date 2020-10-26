<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]>'2' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2'){

	$sql_type_store="SELECT * FROM promotion WHERE member_id='$_SESSION[login_id]' ORDER BY promotion_id ASC";
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">ร้าน</th>
    <th class="header">ชื่อโปรโมชั่น</th>
    <th width="110" class="header">รูป</th>
    <th width="50" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_store);
?>
  <tr>
    <td align="center"><? echo $i?></td>
    <td><? 
    $sql_store="SELECT store_name FROM store WHERE store_id='$row[store_id]'";
	$result_store=mysql_query($sql_store)or die(mysql_error());
	list($store_name)=mysql_fetch_row($result_store);
	echo $store_name;
	?>
    </td>
    <td><? echo $row['promotion_name']; 
		if($_GET[active]==1){ 
			$sql_max="SELECT max(promotion_id) FROM promotion";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['promotion_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
        
    </td>
    <td align="center"><img src="images/activity/<?=$row[promotion_image]?>" width="100"></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=promotion&do=edit_promotion&id=<?=$row['promotion_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
    </a></td>
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
    <th class="header" colspan="3" >เพิ่มโปรโมชั่นใหม่</th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=promotion&do=insert_promotion" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="100">ชื่อโปรโมชั่น</td>
    <td><input type="text" name="promotion_name"></td>
    </tr>
  <tr>
    <td>รายละเอียด</td>
    <td><textarea name="promotion_detail" cols="40"></textarea></td>
  </tr>
  <tr>
    <td>รูปโปรโมท</td>
    <td><input type="file" name="fpix" id="fpix"></td>
  </tr>
  <tr>
    <td>เลือกร้านค้า</td>
    <td><select name="select_promotion" id="select_promotion">
    <? 	$sql_promotion="SELECT * FROM store WHERE member_id='$_SESSION[login_id]'";
		$result_promotion=mysql_query($sql_promotion) or die (mysql_error());
		while(list($a,$b,$c)=mysql_fetch_row($result_promotion)){
	?>
      <option value="<?=$a; ?>" selected><?=$c;?></option>
    <? } ?>
    </select></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="เพิ่ม"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>
