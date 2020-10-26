<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_SESSION[login_type]!='1'){
		echo "<script language='javascript'>alert('คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
	}
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ 
		echo "<script language='javascript'>alert('ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
			
$sql="SELECT * FROM news WHERE news_id='$_GET[id]'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){echo"<script>window.location='index.php';</script>";}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขหัวข้อ
        <div style="float:right;">
  <a href="index_a.php?mo=news&do=delete_news&id=<?=$row['news_id']?>" onclick="return confirm('ลบข่าว <?=$row['news_title']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=news&do=update_news" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="150">หัวข้อ</td>
    <td><input name="news_name" type="text" id="news_name" value="<?=$row['news_title']?>" size="80"/></td>
  </tr>
  <tr>
    <td>รายละเอียด</td>
    <td><textarea class="ckeditor" name="news_detail" id="news_detail"><?=$row['news_detail']?></textarea></td>
  </tr>
  <tr>
    <td>ประเภท</td>
    <td>
    <select name="res_type_news" id="res_type_news">
    <? 	$sql_select_type_news="SELECT * FROM type_news";
		$result_select_type_news=mysql_query($sql_select_type_news) or die (mysql_error());
		while(list($type_news_id,$type_news_name,$type_news_image)=mysql_fetch_row($result_select_type_news)){
	?>
      	<option value="<?=$type_news_id; ?>" selected><?=$type_news_name;?></option>
    <? } ?>
    </select>
    </td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['news_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>