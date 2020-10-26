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
			$sql="SELECT * FROM promotion WHERE promotion_id='$_GET[id]'";	
		}
		elseif( $_SESSION[login_type]=='2'){
			$sql="SELECT * FROM promotion WHERE promotion_id='$_GET[id]' AND member_id='$_SESSION[login_id]'";
		}else{ 
			echo"<script>window.location='index.php';</script>"; 
		}

$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){	echo"<script>window.location='index.php';</script>";}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขโปรโมชั่น : <?=$row['promotion_name']?>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=promotion&do=update_promotion" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
    <td><img src="images/activity/<?=$row['promotion_image']?>" width="200"></td>
  </tr>
  <tr>
    <td width="150">ชื่อโปรโมชั่น</td>
    <td><input type="text" name="promotion_name" value="<?=$row['promotion_name']?>"></td>
  </tr>
  <tr>
    <td>รายละเอียด</td>
    <td><textarea name="promotion_detail" cols="40"><?=$row['promotion_detail']?></textarea></td>
  </tr>
  <tr>
    <td>รูปโปรโมท</td>
    <td><input type="file" name="fpix" id="fpix"></td>
  </tr>
  <tr>
    <td>เลือกร้านค้า</td>
    <td><select name="select_promotion" id="select_promotion">
	<? 	$sql_store="SELECT * FROM store WHERE member_id='$_SESSION[login_id]'";
		$result_store=mysql_query($sql_store) or die (mysql_error());
		while(list($a,$b,$c)=mysql_fetch_row($result_store)){
			
			if($row['store_id']==$a){?> <option value="<?=$a; ?>" selected><?=$c;?></option> <? }
			else{ ?> <option value="<?=$a; ?>"><?=$c;?></option> <? }
	?>
	<? } ?>
    </select></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['promotion_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? } ?>