<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1'){ //admin
$sql="SELECT * FROM image WHERE image_id='$_GET[id]'";
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
      แก้ไขรูปภาพ
        <div style="float:right;">
  <a href="index_a.php?mo=photo&do=delete_photo&id=<?=$row['image_id']?>" onclick="return confirm('ลบรูปภาพ <?=$row['image_name']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=photo&do=update_photo" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
     <? if($row['album_id']==1){ ?>
    	<td align="left"><img src="images/activity/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==2){ ?>
    	<td align="left"><img src="images/restaurant/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==3){ ?>
    	<td align="left"><img src="images/upload/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==4){ ?>
    	<td align="left"><img src="images/review/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==5){ ?>
    	<td align="left"><img src="images/articles/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
  </tr>
  <tr>
    <td width="150">เลือกอัลบั้ม</td>
    <td><? $sql1="SELECT * FROM album"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="album_list" id="album_list" disabled>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[album_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
        </select></td>
  </tr>
  <tr>
    <td>เลือกร้าน</td>
    <td><? $sql1="SELECT * FROM store"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="store_list" id="store_list">
        <option value="0" selected>ไม่เลือก</option>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[store_id]==$a){ ?><option value="<?=$a?>" selected><?=$c?></option>
        <? }else{?> <option value="<?=$a?>"><?=$c?></option>
        <? }} ?>
      </select></td>
  </tr>
  <tr>
    <td>เลือกรีวิว</td>
    <td><? $sql1="SELECT * FROM review"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="review_list" id="review_list">
        <option value="0" selected>ไม่เลือก</option>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[review_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
      </select></td>
  </tr>
  <tr>
    <td>คำอธิบายภาพ</td>
    <td><input name="photo_name" type="text" id="photo_name" value="<?=$row[image_name]?>"></td>
  </tr>
  <tr>
    <td>เลือกภาพ</td>
    <td><input type="file" name="photo_images1" id="photo_images1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['image_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? 	}elseif($_SESSION[login_type]=='2'){ //member
			
$sql="SELECT * FROM image WHERE image_id='$_GET[id]' AND member_id='$_SESSION[login_id]'";
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
      แก้ไขรูปภาพ
        <div style="float:right;">
  <a href="index_a.php?mo=photo&do=delete_photo&id=<?=$row['image_id']?>" onclick="return confirm('ลบรูปภาพ <?=$row['image_name']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<? if($_SESSION[login_type]==1){ ?>
<form action="index_a.php?mo=photo&do=update_photo" method="post" enctype="multipart/form-data" name="user">
<? }else{ ?>
<form action="index.php?mo=photo&do=update_photo" method="post" enctype="multipart/form-data" name="user">
<? } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
     <? if($row['album_id']==1){ ?>
    	<td align="left"><img src="images/activity/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==2){ ?>
    	<td align="left"><img src="images/restaurant/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==3){ ?>
    	<td align="left"><img src="images/upload/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==4){ ?>
    	<td align="left"><img src="images/review/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
    <? if($row['album_id']==5){ ?>
    	<td align="left"><img src="images/articles/<?=$row['image_path']?>" width="200"></td>
	<? } ?>
  </tr>
  <tr>
    <td width="150">เลือกอัลบั้ม</td>
    <td><? $sql1="SELECT * FROM album"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="album_list" id="album_list" disabled>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[album_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
        </select></td>
  </tr>
  <tr>
    <td>เลือกร้าน</td>
    <td><? $sql1="SELECT * FROM store WHERE member_id='$_SESSION[login_id]'"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="store_list" id="store_list">
        <option value="0" selected>ไม่เลือก</option>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[store_id]==$a){ ?><option value="<?=$a?>" selected><?=$c?></option>
        <? }else{?> <option value="<?=$a?>"><?=$c?></option>
        <? }} ?>
      </select></td>
  </tr>
  <tr>
    <td>เลือกรีวิว</td>
    <td><? $sql1="SELECT * FROM review WHERE member_id='$_SESSION[login_id]'"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="review_list" id="review_list">
        <option value="0" selected>ไม่เลือก</option>
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[review_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
      </select></td>
  </tr>
  <tr>
    <td>คำอธิบายภาพ</td>
    <td><input name="photo_name" type="text" id="photo_name" value="<?=$row[image_name]?>"></td>
  </tr>
  <tr>
    <td>เลือกภาพ</td>
    <td><input type="file" name="photo_images1" id="photo_images1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['image_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>