<div id="content">

<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th colspan="3" ><span class="review-icon icon"></span>เขียนรีวิวใหม่</th>
  </tr>
  <tr>
    <td colspan="3">
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
</div>