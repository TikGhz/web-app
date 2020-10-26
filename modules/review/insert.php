<div class="content">
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >
	<? 	
	  	$sql_store="SELECT store_id,store_name FROM store WHERE store_id='$_GET[id]'";
		$result_store=mysql_query($sql_store) or die (mysql_error());
		list($store_id,$store_name)=mysql_fetch_row($result_store);
	?>
    เขียนรีวิวถึงร้าน <? echo $store_name;?></th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=review&do=insert_review" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>ร้านที่ต้องการรีวิว </td>
    <td><a href="index.php?mo=restaurants&do=detail&id=<? echo $store_id;?>"><? echo $store_name;?></a></td>
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
    <td><input type="hidden" name="select_review" value="<? echo $_GET[id];?>" /></td>
    <td><input type="submit" value="เขียนรีวิว"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
</div>