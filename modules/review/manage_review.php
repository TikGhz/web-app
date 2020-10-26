<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
	else{
		if($_SESSION[login_type]=='1'){


	$sql_page="SELECT * FROM review";
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
	?>
    <div style="float:right; margin-top:12px; margin-bottom:-20px; margin-right:0px;">
    <form name="form_row" method="get">
    <input type='hidden' name='mo' value='review'>
	<input type='hidden' name='do' value='manage_review'>
    <input type='hidden' name='page_id' value='<? if($_GET[page_id]!=""){echo $_GET[page_id];}else{ echo 1;}?>'>
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
	<input type="button" name="btn" id="btn" value="เพิ่มรีวิวใหม่" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px;">
</div>

<div class="clear"></div>

<div id='display' style='display:none;'>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มรีวิวใหม่</th>
  </tr>
  <tr>
    <td colspan="2">
<form action="index_a.php?mo=review&do=insert_review" method="post" name="user">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>เลือกร้านที่ต้องการรีวิว</td>
    <td><select name="select_review" id="select_promotion">
      <? 	$sql_promotion="SELECT * FROM store";
		$result_promotion=mysql_query($sql_promotion) or die (mysql_error());
		while(list($a,$b,$c)=mysql_fetch_row($result_promotion)){
	?>
      <option value="<?=$a; ?>" selected>
        <?=$c;?>
        </option>
      <? } ?>
    </select></td>
  </tr>
  <tr>
    <td width="130">หัวข้อรีวิว</td>
    <td><input name="review_name" type="text" size="80"></td>
  </tr>
  <tr>
    <td valign="top">รายละเอียด</td>
    <td><textarea class="ckeditor" name="review_detail"></textarea></td>
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
	$sql_type_store="SELECT * FROM review ORDER BY review_id DESC LIMIT $start_row , $rowperpage";
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">ร้าน</th>
    <th class="header">หัวข้อรีวิว</th>
    <th width="70" class="header">อนุมัติ</th>
    <th width="100" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_store);
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td><? 
		$sql_store="SELECT store_id,store_name FROM store WHERE store_id='$row[store_id]'";
		$result_store=mysql_query($sql_store) or die (mysql_query());
		list($store_id1,$store_name1)=mysql_fetch_row($result_store); ?>
        <a href="index.php?mo=restaurants&do=detail&id=<?=$store_id1;?>">
        <?
		echo $store_name1;
		?>
        </a>
    </td>
    <td>
		<a href="index.php?mo=review&do=detail&id=<?=$row['review_id'];?>">
		<? echo $row['review_name']; ?>
        </a>
		<?
		if($_GET[active]==1){ 
			$sql_max="SELECT max(review_id) FROM review";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['review_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
    </td>
    <td align="center">
	<? if($row['review_allow']==1){ $allow=0; echo "อนุมัติแล้ว";}else{ $allow=1; echo "ยังไม่ได้อนุมัติ";}?>
    </td>
    <td align="center" style="background:#f9f9f9">
    <? if($row['review_allow']==1){ ?>
      <a href="index_a.php?mo=review&do=allow_review&id=<?=$row['review_id'];?>&allow=<?=$allow;?>">
      	<img src="images/web/list_delete.png" class="action" title="อนุมัติ" width="16">
      </a>
    <? }else{	?>
	  <a href="index_a.php?mo=review&do=allow_review&id=<?=$row['review_id'];?>&allow=<?=$allow;?>">
      	<img src="images/web/list_accept.png" class="action" title="อนุมัติ" width="16">
      </a>
    <? } ?>
      <a href="index_a.php?mo=review&do=edit_review&id=<?=$row['review_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="อนุมัติ"/>
      </a>
      <a href="index_a.php?mo=review&do=delete_review&id=<?=$row['review_id']?>" onclick="return confirm('ลบรีวิว <?=$row['type_name']?> ?')">
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
			echo "<a href='index_a.php?mo=review&do=manage_review&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index_a.php?mo=review&do=manage_review&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index_a.php?mo=review&do=manage_review&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index_a.php?mo=review&do=manage_review&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index_a.php?mo=review&do=manage_review&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>    

    
    </th>
  </tr>
</table>
    
    </th>
  </tr>
</table>
<? }} ?>
