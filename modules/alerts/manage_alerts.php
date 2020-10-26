<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
	$sql_page="SELECT * FROM promotion";
	$result_page=mysql_query($sql_page);
	$all_rows=mysql_num_rows($result_page);
	if($_GET[rowpage]!=""){
		$rowperpage=$_GET[rowpage];
	}else{ $rowperpage=20; }
	
	$all_pages=ceil($all_rows/$rowperpage);
	$page_id=$_GET[page_id];
	if($page_id){
		 $start_row=($page_id-1)*$rowperpage;
		 $start_row=($page_id*$rowperpage)-$rowperpage;
	}else{
		$page_id=1;
		$start_row=0;
	}
	echo "<div class='clear'></div>";
	?>
        
<div style="float:right; margin-top:12px; margin-bottom:-20px; margin-right:0px;">
    <form name="form_row" method="get">
    <input type='hidden' name='mo' value='promotion'>
	<input type='hidden' name='do' value='manage_promotion'>
    <input type='hidden' name='page_id' value='<? if($_GET[page_id]==""){ echo $_GET[page_id]=1;}else{ echo $_GET[page_id];}?>'>
    <? if($_GET[rowpage]==20){ $sr20='selected';  ?>
    <? }elseif($_GET[rowpage]==40){ $sr40='selected';  ?>
    <? }elseif($_GET[rowpage]==60){ $sr60='selected';  ?>
    <? }elseif($_GET[rowpage]==80){ $sr80='selected';  ?>
    <? }elseif($_GET[rowpage]==100){ $sr100='selected'; } ?>
    <select name='rowpage' style="padding:5px; float:right" onChange="document.form_row.submit();">
      <option value="20" <?=$sr20;?> >เลือกจำนวนหน้าที่แสดง</option>
      <option value="40" <?=$sr40;?> >40</option>
      <option value="60" <?=$sr60;?> >60</option>
      <option value="80" <?=$sr80;?> >80</option>
      <option value="100" <?=$sr100;?> >100</option>
    </select>
    </form>
    </div>
    
<script type="text/javascript">
	function toggle() {
		var ds = document.getElementById("display");
		if(ds.style.display == 'none')
			ds.style.display = 'block';
		else 
			ds.style.display = 'none';
	}
</script>
<div style="float:right; margin-top:12px; margin-bottom:-20px; margin-right:10px;">
	<input type="button" name="btn" id="btn" value="เพิ่มการแจ้งเตือนใหม่" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px;">
</div>

<div class="clear"></div>

<div id='display' style='display:none;'>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มแจ้งเตือนใหม่</th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index.php?mo=alerts&do=insert_alerts" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>ประเภทแจ้งเตือน</td>
    <td>
    	  <? $sql1="SELECT * FROM type_alerts"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
          <select name="type_alerts_list" id="type_alerts_list">
          <? while(list($a,$b,$c)=mysql_fetch_row($result1)){  ?>
            <option value="<?=$a?>"><?=$b?></option>
          <? } ?>
          </select>
    </td>
  </tr>
  <tr>
    <td width="100" valign="top">รายละเอียด</td>
    <td><textarea class="ckeditor" name="alerts_detail"><? echo $about_detail; ?></textarea></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="เพิ่ม"/></td>
    </tr>
</table>
</form>  
    </td>
  </tr>
</table>
</div>

<?
	$sql_type_store="SELECT * FROM alerts ORDER BY alerts_id DESC LIMIT $start_row , $rowperpage";
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">แจ้งเตือน</th>
    <th width="150" class="header">ประเภท</th>
    <th width="150" class="header">วันที่อัพเดท</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_store);
?>
  <tr>
    <td align="center"><?=$i?></td>
    <td><? echo mb_strimwidth($row['alerts_detail'], 0,40, "...", "UTF-8");?> 
    </td>
    <td align="center">
    	<? 
	$sql_type_alerts="SELECT * FROM type_alerts WHERE type_alerts_id='$row[type_alerts_id]'";
	$result_type_alerts=mysql_query($sql_type_alerts)or die(mysql_error());
	while(list($type_alertsid, $type_alertsname)=mysql_fetch_row($result_type_alerts)){
		if($row['type_alerts_id']==$type_alertsid){ echo $type_alertsname; };
	} ?>
    </td>
    <td align="center"><?=substr($row['alerts_datestart'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=alerts&do=edit_alerts&id=<?=$row['alerts_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนข้อมูล"/>
      </a>
      <a href="index.php?mo=alerts&do=delete_alerts&id=<?=$row['alerts_id']?>" onclick="return confirm('ลบแจ้งเตือน <?=$row['alerts_name']?> ?')">
      	<img src="images/web/delete_icon.png"class="action" title="ลบ"/>
      </a>
    </td>
  </tr>
<?
  }
}
else if($num==0){
?>
  <tr>
    <td colspan="5" align="center">ไม่มีข้อมูล</td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="5">จำนวน : <?=$num?>
    <?
	$before_page=$page_id-1;
	$next_page=$page_id+1;
	
echo "<div id='page' style='float:right; font-size:14px;'>";
			echo "หน้า $page_id จากทั้งหมด $all_pages หน้า ";
		if($page_id!=1){
			echo "<a href='index.php?mo=promotion&do=manage_promotion&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=promotion&do=manage_promotion&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=promotion&do=manage_promotion&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=promotion&do=manage_promotion&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=promotion&do=manage_promotion&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>
    </th>
  </tr>
</table>


<? }} ?>
