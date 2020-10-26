<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){
			
$sql_page="SELECT * FROM store";
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
    <input type='hidden' name='mo' value='restaurants'>
	<input type='hidden' name='do' value='manage_restaurants'>
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
	<input type="button" name="btn" id="btn" value="เพิ่มร้านค้าใหม่" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px;">
</div>

<div class="clear"></div>

<div id='display' style='display:none;'>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มร้านค้าใหม่</th>
  </tr>
  <tr>
    <td colspan="3">
<div id="restaurants_insert">
<form action="index_a.php?mo=restaurants&do=insert_restaurants" method="post" enctype="multipart/form-data" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td height="35" colspan="2"><strong>เกี่ยวกับร้าน</strong></td>
    </tr>
  <tr>
    <td width="100">ชื่อบริษัท</td>
    <td><input type="text" name="res_business" id="res_business"></td>
    </tr>
  <tr>
    <td>ชื่อร้านค้า</td>
    <td><input type="text" name="res_name" id="res_name"></td>
  </tr>
  <tr>
    <td>ที่อยู่ติดต่อ</td>
    <td><textarea name="res_address" id="res_address" style="height:40px;"></textarea></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์</td>
    <td><input name="res_phone" type="text" id="res_phone" size="15"></td>
  </tr>
  <tr>
    <td>อีเมล</td>
    <td><input type="text" name="res_email" id="res_email"></td>
  </tr>
  <tr>
    <td>เว็บไซต์ร้าน</td>
    <td><input type="text" name="res_web" id="res_web" style="width:400px;"> 
    <span class="style6">(<font color="#ff0000"> เช่น http://www.exxxx.com </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>แผนที่ ( หาจาก Google Map )</strong></td>
    </tr>
  <tr>
    <td>ตำแหน่งละติจูด</td>
    <td><input type="text" name="res_lati" id="textfield9">
      <span class="style6">(<font color="#ff0000"> เช่น. 18.820765 </font>)</span></td>
  </tr>
  <tr>
    <td>ตำแหน่งลองติจูด</td>
    <td><input type="text" name="res_long" id="res_long">
      <span class="style6">(<font color="#ff0000"> เช่น. 98.9617490 </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>รายละเอียดร้าน</strong></td>
    </tr>
  <tr>
    <td>ร้านของสมาชิก</td>
    <td><select name="res_mem" id="res_mem" style="height:35px;">
    <? 	$sql_select_store="SELECT member_id,member_user FROM member";
		$result_select_store=mysql_query($sql_select_store) or die (mysql_error());
		while(list($member_id,$member_user)=mysql_fetch_row($result_select_store)){
	?>
      <option value="<?=$member_id; ?>" selected><?=$member_user;?></option>
    <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทร้าน</td>
    <td><select name="res_type_store" id="res_type_store" style="height:35px;">
    <? 	$sql_select_type_store="SELECT * FROM type_store";
		$result_select_type_store=mysql_query($sql_select_type_store) or die (mysql_error());
		while(list($type_store_id,$type_name)=mysql_fetch_row($result_select_type_store)){
	?>
      	<option value="<?=$type_store_id; ?>" selected><?=$type_name;?></option>
    <? } ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทสถานที่</td>
    <td><select name="res_type_location" id="res_type_location" style="height:35px;">
    <? 	$sql_select_type_location="SELECT * FROM type_location";
		$result_select_type_location=mysql_query($sql_select_type_location) or die (mysql_error());
		while(list($type_location_id,$type_location_name,$type_location_image)=mysql_fetch_row($result_select_type_location)){
	?>
      	<option value="<?=$type_location_id; ?>" selected><?=$type_location_name;?></option>
    <? } ?>
    </select></td>
  </tr>
  <tr>
    <td height="35"><strong>รูปภาพ</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>รูปโลโก้ร้าน</td>
    <td><input type="file" name="res_logo" id="res_logo">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:85px สูง85px</strong></font> )</span></td>
  </tr>
  <tr>
    <td>รูปหน้าร้านอาหาร</td>
    <td><input type="file" name="res_res" id="res_res">
      <span class="style6">( <font color="#ff0000">ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:200px สูง200px </strong></font>)</span></td>
  </tr>
  <tr>
    <td>รูปหน้ารีวิว</td>
    <td><input type="file" name="res_review" id="res_review">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:185px สูง:185px</strong></font> )</span></td>
  </tr>
  <tr>
    <td>รูปหน้าหมวดหมู่</td>
    <td><input type="file" name="res_cat" id="res_cat">
      <span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:100px สูง:100px</strong></font> )</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="เพิ่ม" style="width:65px;"></td>
    </tr>
</table>
</form>
</div>
    </td>
  </tr>
</table>
</div>
<?
	echo "<div class='clear'></div>";
			
	$sql_store="SELECT * FROM store ORDER BY store_id DESC LIMIT $start_row , $rowperpage";
	$result_store=mysql_query($sql_store)or die(mysql_error());
	$num=mysql_num_rows($result_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="20" class="header">ลำดับ</th>
    <th class="header">ชื่อร้าน</th>
    <th width="150" class="header">เบอร์ติดต่อ</th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_store);
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td><a href="index.php?mo=restaurants&do=detail&id=<? echo $row['store_id'];?>">
		<? echo $row['store_name']; 
		if($_GET[active]==1){ 
			$sql_max="SELECT max(store_id) FROM store";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['store_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
        </a>
    </td>
    <td align="center"><?=$row['store_tel']?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index_a.php?mo=restaurants&do=edit_restaurants&id=<?=$row['store_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index_a.php?mo=restaurants&do=delete_restaurants&id=<?=$row['store_id']?>" onclick="return confirm('ลบร้านค้า <?=$row['store_name']?> ?')">
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
			echo "<a href='index_a.php?mo=restaurants&do=manage_restaurants&stats=$_GET[stats]&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index_a.php?mo=restaurants&do=manage_restaurants&stats=$_GET[stats]&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index_a.php?mo=restaurants&do=manage_restaurants&stats=$_GET[stats]&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index_a.php?mo=restaurants&do=manage_restaurants&stats=$_GET[stats]&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index_a.php?mo=restaurants&do=manage_restaurants&stats=$_GET[stats]&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>    

    
    </th>
  </tr>
</table>


<? }} ?>
