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
			
$sql="SELECT * FROM type_store WHERE type_store_id='$_GET[id]'";
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
      แก้ไขหมวดหมู่
<div style="float:right;">
  <a href="index.php?mo=category&do=delete_category&id=<?=$row['type_store_id']?>" onclick="return confirm('ลบหมวดหมู่ <?=$row['type_name']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=category&do=update_category&id=<?=$row['type_store_id']?>" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="150">ชื่อหมวดหมู่</td>
    <td><input name="category_name" type="text" id="category_name" value="<?=$row['type_name']?>" maxlength="20"/></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['type_store_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<div style="width:100%;margin:10px auto 0 auto;text-align:left;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>
<? }} ?>