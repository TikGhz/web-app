<script type="text/javascript">
	function toggle() {
		var ds = document.getElementById("display");
		if(ds.style.display == 'none')
			ds.style.display = 'block';
		else 
			ds.style.display = 'none';
	}
</script>
<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
		echo"<script>window.location='index.php?mo=member&do=login';</script>";
	}else{
$sql="SELECT * FROM member WHERE member_id='$_GET[id]' ";
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
      ข้อมูลส่วนตัว : <?=$row['member_name'];?> <?=$row['member_surename'];?>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=member&do=update_member&id=<?=$row['member_id']?>" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="20%" align="left" valign="top"><img src="images/profile/<?=$row['member_image']?>" width="100">
      <table border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="35">
          <input type="button" name="btn" id="btn" value="ส่งข้อความ" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px; width:100px;">
          </td>
        </tr>
      </table></td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" style="border-left:1px solid #ccc;">
      <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="35" colspan="2">
          ชื่อ : <?=$row['member_name']?> <?=$row['member_surename']?>
        </td>
      </tr>
      <tr>
        <td height="35" colspan="2">ที่อยู่ : <?=$row['member_address']?></td>
      </tr>
      <tr>
        <td>เบอร์ : <?=$row['member_tel']?></td>
        <td height="35">&nbsp;</td>
      </tr>
      <tr>
        <td>เมล : <?=$row['member_email']?></td>
        <td height="35">&nbsp;</td>
      </tr>
</table>
      </td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['member_id']?>" /></td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>


<div id='display' style='display:none;'>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >ส่งข้อความถึง : <?=$row['member_name']?> <?=$row['member_surename']?></th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=alerts&do=insert_alerts" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="100">เรื่อง</td>
    <td><input name="alerts_name" type="text" size="50" placeholder=" เรื่อง : " id="alerts_name"></td>
    </tr>
  <tr>
    <td valign="top">ข้อความ</td>
    <td><textarea name="alerts_detail" style="width:400px; height:40px;" placeholder=" พิมพ์รายละเอียด" id="alerts_detail"></textarea></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['member_id']?>" /></td>
    <td><input type="submit" value="ส่งข้อความ"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
</div>
<? } ?>