<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' AND $_GET[id]!=""){
			$sql="SELECT * FROM member WHERE member_id='$_GET[id]'";
		}else{
			$sql="SELECT * FROM member WHERE member_id='$_SESSION[login_id]'";
		}
		
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
      แก้ไขข้อมูลส่วนตัว : <?=$row['member_user']?>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<? if($_SESSION[login_type]==1){ ?>
<form action="index_a.php?mo=member&do=update_member&id=<?=$row['member_id']?>" method="post" enctype="multipart/form-data" name="user">
<? }else{ ?>
<form action="index.php?mo=member&do=update_member&id=<?=$row['member_id']?>" method="post" enctype="multipart/form-data" name="user">
<? } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>&nbsp;</td>
    <td><img src="images/profile/<?=$row['member_image']?>" width="100"></td>
  </tr>
  <tr>
    <td width="150">ชื่อเข้าระบบ</td>
    <td><input name="member_user" type="text" id="member_user" value="<?=$row['member_user']?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>รหัสผ่าน</td>
    <td><input name="member_pass" type="password" id="member_pass" value="<?=$row['member_pass']?>" readonly="readonly"/></td>
  </tr>
  <tr>
    <td>ชื่อ</td>
    <td><input name="member_name" type="text" id="member_name" value="<?=$row['member_name']?>"/></td>
  </tr>
  <tr>
    <td>นามสกุล</td>
    <td><input name="member_surename" type="text" id="member_surename" value="<?=$row['member_surename']?>"/></td>
  </tr>
  <tr>
    <td>บัตรประชาชน</td>
    <td><input name="member_idcard" type="text" id="member_idcard" value="<?=$row['member_idcard']?>" maxlength="13"/></td>
  </tr>
  <tr>
    <td>ที่อยู่ปัจจุบัน</td>
    <td><textarea name="member_address" cols="40" id="member_address"><?=$row['member_address']?>
    </textarea></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์ติดต่อ</td>
    <td><input name="member_tel" type="text" id="member_tel" value="<?=$row['member_tel']?>" maxlength="10"/></td>
  </tr>
  <tr>
    <td>อีเมล</td>
    <td><input name="member_email" type="text" id="member_email" value="<?=$row['member_email']?>"/></td>
  </tr>
  <tr>
    <td>รูปประจำตัว</td>
    <td><input type="file" name="ffff" id="ffff"></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['member_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? } ?>