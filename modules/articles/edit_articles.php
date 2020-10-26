<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_SESSION[login_type]>'2' || $_SESSION[login_type]<'1'){ 
		echo "<script language='javascript'>alert('ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){
			
$sql="SELECT * FROM articles WHERE articles_id='$_GET[id]'";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){echo"<script>window.location='index_a.php';</script>";}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขรีวิว
        <div style="float:right;">
  <a href="index_a.php?mo=review&do=delete_review&id=<?=$row['articles_id']?>" onclick="return confirm('ลบบทความ <?=$row['articles_name']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=articles&do=update_articles&id=<?=$row['articles_id']?>" method="post" name="user" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>หัวเรื่อง</td>
    <td><input name="articles_name" type="text" value="<?=$row['articles_name']?>" size="70"></td>
  </tr>
  <tr>
    <td valign="top">เนื้อหา</td>
    <td><textarea class="ckeditor" name="articles_detail" id="articles_detail"><?=$row['articles_detail']?>
    </textarea></td>
  </tr>
  <tr>
    <td>รูปหน้าปก</td>
    <td><input type="file" name="articles_pix" id="articles_pix"></td>
  </tr>
  <tr>
    <td width="150"><input type="hidden" name="id" value="<?=$row['articles_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>