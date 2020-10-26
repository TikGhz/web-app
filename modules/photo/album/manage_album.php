
<?
$sql="SELECT * FROM articles ORDER BY articles_id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">บทความ</th>
    <th width="150" class="header">วันที่อัพเดท</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){$row=mysql_fetch_array($result);
?>
  <tr>
    <td align="center"><?=$row['articles_id']?></td>
    <td><? echo "<a href='index.php?mo=articles&do=detail&id=$row[articles_id]'>",$row['articles_name'],"</a>"?></td>
    <td align="center"><?=substr($row['articles_date'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=articles&do=edit_articles&id=<?=$row['type_store_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index.php?mo=articles&do=delete_articles&id=<?=$row['type_store_id']?>" onclick="return confirm('ลบหมวดหมู่ <?=$row['type_name']?> ?')">
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
    <th class="header" colspan="3" >เพิ่มบทความใหม่</th>
  </tr>
  <tr>
    <td colspan="2"><form action="index.php?mo=articles&do=insert_articles" method="post" enctype="multipart/form-data" name="user">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="100">หัวเรื่อง</td>
          <td><input type="text" name="articles_name"></td>
        </tr>
        <tr>
          <td valign="top">เนื้อหา</td>
          <td><textarea class="ckeditor" name="articles_detail" id="articles_detail"><? echo $about_detail; ?></textarea></td>
        </tr>
        <tr>
          <td>รูปหน้าปก</td>
          <td><input type="file" name="articles_pix" id="articles_pix"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="เพิ่มบทความ"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</table>