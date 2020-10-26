<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]>2 || $_SESSION[login_type]<1){ echo "คุณไม่มีร้านในรายการ กรุณาลงทะเบียนร้านด้วยค่ะ";}
	else{
	$sql_store="SELECT * FROM store WHERE member_id='$_SESSION[login_id]' ORDER BY store_id";
	$result_store=mysql_query($sql_store)or die(mysql_error());
	$num=mysql_num_rows($result_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="20" class="header">ลำดับ</th>
    <th class="header">ชื่อร้าน</th>
    <th class="header">ที่อยู่</th>
    <th width="100" class="header">เบอร์ติดต่อ</th>
    <th width="50" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_store);
?>
  <tr>
    <td align="center"><?=$i?></td>
    <td><?=$row['store_name']?></td>
    <td><? echo $row['store_address']; 
		if($_GET[active]==1){ 
			$sql_max="SELECT max(store_id) FROM store";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['store_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
        
    </td>
    <td align="center"><?=$row['store_tel']?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=restaurants&do=edit_restaurants&id=<?=$row['store_id']?>">
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
<? } ?>
