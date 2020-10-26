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
			
$sql="SELECT * FROM alerts WHERE alerts_id='$_GET[id]'";
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
      แก้ไขข้อมูลแจ้งเตือน
        <div style="float:right;">
  <a href="index.php?mo=alerts&do=delete_alerts&id=<?=$row['alerts_id']?>" onclick="return confirm('ลบแจ้งเตือน <?=$row['alerts_detail']?> ?')"><img src="images/web/delete_icon.png"class="action" title="ลบ"/></a>
</div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=alerts&do=update_alerts" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>ประเภทแจ้งเตือน</td>
    <td>
         <? $sql1="SELECT * FROM type_alerts"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
      <select name="type_alerts_list" id="type_alerts_list">
        <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
        <? if($row[type_alerts_id]==$a){ ?><option value="<?=$a?>" selected><?=$b?></option>
        <? }else{?> <option value="<?=$a?>"><?=$b?></option>
        <? }} ?>
        </select>
      </td>
  </tr>
  <tr>
    <td valign="top">รายละเอียด</td>
    <td><textarea class="ckeditor" name="alerts_detail"><? echo $row[alerts_detail]; ?></textarea></td>
  </tr>
  <tr>
    <td width="150"><input type="hidden" name="id" value="<?=$row['alerts_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<? }} ?>