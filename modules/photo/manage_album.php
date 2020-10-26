
<?
$sql="SELECT * FROM album ORDER BY album_id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">ชื่ออัลบั้ม</th>
    <th width="150" class="header">วันที่อัพเดท</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){$row=mysql_fetch_array($result);
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td><? echo "<a href='index.php?mo=photo&do=details&id=$row[album_id]'>",$row['album_name'],"</a>"?><? if($_GET[active]==1){ 
			$sql_max="SELECT max(album_id) FROM album";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['album_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}?></td>
    <td align="center"><?=substr($row['album_datestart'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index_a.php?mo=photo&do=edit_album&id=<?=$row['album_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index_a.php?mo=photo&do=delete_album&id=<?=$row['album_id']?>" onclick="return confirm('ลบหมวดหมู่ <?=$row['album_name']?> ?')">
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
    <th class="header" colspan="3" >เพิ่มอัลบั้มใหม่</th>
  </tr>
  <tr>
    <td colspan="2"><form action="index_a.php?mo=photo&do=insert_album" method="post" enctype="multipart/form-data" name="user">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="100">ชื่ออัลบั้ม</td>
          <td><input type="text" name="photo_name"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="เพิ่มอัลบั้ม"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</table>
