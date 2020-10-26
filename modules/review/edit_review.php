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
		if($_SESSION[login_type]=='1' || $_SESSION[login_type]=='2'){
			
$sql="SELECT * FROM review WHERE review_id='$_GET[id]'";
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
  <a href="index_a.php?mo=review&do=delete_review&id=<?=$row['review_id']?>" onclick="return confirm('ลบรีวิว <?=$row['review_name']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=review&do=update_review&id=<?=$row['review_id']?>" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>เลือกร้านที่ต้องการรีวิว</td>
    <td> <? $sql1="SELECT * FROM store"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="store_list" id="store_list">
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[store_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
        </select>
    </td>
  </tr>
  <tr>
    <td>หัวข้อรีวิว</td>
    <td><input name="review_name" type="text" size="80" value="<?=$row['review_name']?>"></td>
  </tr>
  <tr>
    <td valign="top">รายละเอียด</td>
    <td><textarea class="ckeditor" name="review_detail"><?=$row['review_detail']?></textarea></td>
  </tr>
  <tr>
    <td width="150"><input type="hidden" name="id" value="<?=$row['review_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>