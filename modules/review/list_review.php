<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
	$sql_type_store="SELECT * FROM review ORDER BY review_id";
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">หัวข้อรีวิว</th>
    <th width="150" class="header">วันที่อัพเดท</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_store);
?>
  <tr>
    <td align="center"><?=$row['review_id']?></td>
    <td><? echo $row['review_name']; 
		if($_GET[active]==1){ 
			$sql_max="SELECT max(review_id) FROM type_store";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['review_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
        
    </td>
    <td align="center"><?=substr($row['review_date'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=review&do=edit_review&id=<?=$row['review_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนข้อมูล"/>
      </a>
      <a href="index.php?mo=review&do=delete_review&id=<?=$row['review_id']?>" onclick="return confirm('ลบรีวิว <?=$row['type_name']?> ?')">
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
    <td colspan="4" align="center">ไม่มีข้อมูล</td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="4">จำนวน : <?=$num?></th>
  </tr>
</table>

<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มรีวิวใหม่</th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=review&do=insert_review" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>เลือกร้านที่ต้องการรีวิว</td>
    <td><select name="select_review" id="select_promotion">
      <? 	$sql_promotion="SELECT * FROM store";
		$result_promotion=mysql_query($sql_promotion) or die (mysql_error());
		while(list($a,$b,$c)=mysql_fetch_row($result_promotion)){
	?>
      <option value="<?=$a; ?>" selected>
        <?=$c;?>
        </option>
      <? } ?>
    </select></td>
  </tr>
  <tr>
    <td width="130">หัวข้อรีวิว</td>
    <td><input name="review_name" type="text" size="80"></td>
  </tr>
  <tr>
    <td valign="top">รายละเอียด</td>
    <td><textarea class="ckeditor" name="review_detail"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="เพิ่ม"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>
