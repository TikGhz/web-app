<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
	$sql_store="SELECT * FROM store ORDER BY store_id";
	$result_store=mysql_query($sql_store)or die(mysql_error());
	$num=mysql_num_rows($result_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="20" class="header">ลำดับ</th>
    <th class="header">ชื่อร้าน</th>
    <th class="header">ละติจูด</th>
    <th width="150" class="header">ลองติจูด</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_store);
?>
  <tr>
    <td align="center"><?=$row['store_id']?></td>
    <td><?=$row['store_name']?></td>
    <td align="center"><? echo $row['store_latitude']; ?>
    </td>
    <td align="center"><?=$row['store_longtitude']?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=restaurants&do=edit_restaurants&id=<?=$row['store_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index.php?mo=restaurants&do=delete_restaurants&id=<?=$row['store_id']?>" onclick="return confirm('ลบหมวดหมู่ <?=$row['type_name']?> ?')">
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
<? }} ?>
