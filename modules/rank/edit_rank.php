<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' AND $_GET[id]!=""){
			$sql="SELECT * FROM store WHERE store_id='$_GET[id]'";
		}else{
			$sql="SELECT * FROM store WHERE store_id='$_GET[id]' AND member_id='$_SESSION[login_id]'";
		}
		
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){		
	echo "<script language='javascript'>alert('ไม่มีสิ่งที่คุณต้องการ')</script>";
	mysql_close();
	echo "<script type='text/javascript'>window.location='index.php';</script>";
}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขอันดับและสถิติ
        <div style="float:right;"></div>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=rank&do=update_rank" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td height="35" colspan="2"><strong>จัดอันดับและสถิติ</strong></td>
  </tr>
  <tr>
    <td width="150" height="35">ชื่อร้านค้า</td>
    <td><?=$row['store_name']?></td>
  </tr>
  <tr>
    <td height="35">จำนวนคะแนน</td>
    <td height="35"><input name="score" type="text" id="score" value="<?=$row['vote_score']?>">      
       ( สูงสุด 5 คะแนนต่อ 1 คน เช่น 50 คะแนน )</td>
  </tr>
  <tr>
    <td height="35">จำนวนคนโหวต</td>
    <td height="35"><input name="people" type="text" id="people" value="<?=$row['vote_value']?>">      
       ( 1 คนโหวตสูงสุด 5 คะแนน เช่น 10 คน)</td>
  </tr>
  <tr>
    <td height="35">ค่าเฉลี่ย</td>
    <td height="35"><input name="average" type="text" id="average" value="<?=$row['vote_aveage']?>">
    ( จำนวนคะแนน / จำนวนคนโหวต เช่น 50/10=5)</td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['store_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<div style="width:100%;margin:10px auto 0 auto;text-align:left;">
  <!--<input type="button" value="กลับ" onclick="window.location='user.php'"/>-->
</div>
<? } ?>