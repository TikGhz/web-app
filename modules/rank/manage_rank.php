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
	?>
    <div style="float:right; margin-top:12px; margin-bottom:-20px; margin-right:0px;">
    <form name="form_row" method="get">
    <input type='hidden' name='mo' value='rank'>
	<input type='hidden' name='do' value='manage_rank'>
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
<?
	echo "<div class='clear'></div>";		
	if($_GET[score]!=""){
		$sql_type_store="SELECT store_id,store_name,vote_score,vote_value,vote_aveage FROM store";
		$sql_type_store.=" ORDER BY vote_score $_GET[score]";
		$sql_type_store.=" LIMIT $start_row , $rowperpage";
	}elseif($_GET[people]!=""){
		$sql_type_store="SELECT store_id,store_name,vote_score,vote_value,vote_aveage FROM store";
		$sql_type_store.=" ORDER BY vote_value $_GET[people]";
		$sql_type_store.=" LIMIT $start_row , $rowperpage";
	}elseif($_GET[average]!=""){
		$sql_type_store="SELECT store_id,store_name,vote_score,vote_value,vote_aveage FROM store";
		$sql_type_store.=" ORDER BY vote_aveage $_GET[average]";
		$sql_type_store.=" LIMIT $start_row , $rowperpage";
	}else{
		$sql_type_store="SELECT store_id,store_name,vote_score,vote_value,vote_aveage FROM store";
		$sql_type_store.=" ORDER BY store_id DESC LIMIT $start_row , $rowperpage";
	}
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">ร้าน</th>
    <th width="100" class="header">
    <? if($_GET[score]=='ASC'){ ?> 
		<a href="index.php?mo=rank&do=manage_rank&score=DESC" style="color:#00F;">จำนวนคะแนน</a>
	<? }elseif($_GET[score]=='DESC'){ ?>
    	<a href="index.php?mo=rank&do=manage_rank&score=ASC" style="color:#F00;">จำนวนคะแนน</a>
    <? }else{ ?>
    	<a href="index.php?mo=rank&do=manage_rank&score=ASC">จำนวนคะแนน</a>
    <? } ?>
    </th>
    <th width="100" class="header">
    <? if($_GET[people]=='ASC'){ ?> 
	  <a href="index.php?mo=rank&do=manage_rank&people=DESC" style="color:#00F;">จำนวนคนโหวต</a>
	<? }elseif($_GET[people]=='DESC'){ ?>
   	  <a href="index.php?mo=rank&do=manage_rank&people=ASC" style="color:#F00;">จำนวนคนโหวต</a>
    <? }else{ ?>
    	<a href="index.php?mo=rank&do=manage_rank&people=ASC">จำนวนคนโหวต</a>
    <? } ?>
    </th>
    <th width="100" class="header">
    <? if($_GET[average]=='ASC'){ ?> 
	  <a href="index.php?mo=rank&do=manage_rank&average=DESC" style="color:#00F;">ค่าเฉลี่ย</a>
	<? }elseif($_GET[average]=='DESC'){ ?>
   	  <a href="index.php?mo=rank&do=manage_rank&average=ASC" style="color:#F00;">ค่าเฉลี่ย</a>
    <? }else{ ?>
    	<a href="index.php?mo=rank&do=manage_rank&average=ASC">ค่าเฉลี่ย</a>
    <? } ?>
    </th>
    <th width="150" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){
	  $row=mysql_fetch_array($result_type_store);
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td><? echo $row['store_name']; ?></td>
    <td align="center"><? echo $row['vote_score']; ?></td>
    <td align="center"><? echo $row['vote_value']; ?></td>
    <td align="center"><? echo $row['vote_aveage']; ?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index.php?mo=rank&do=edit_rank&id=<?=$row['store_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index.php?mo=rank&do=delete_rank&id=<?=$row['store_id']?>" onclick="return confirm('ลบหมวดหมู่ <?=$row['type_name']?> ?')">
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
    <td colspan="7" align="center">ไม่มีข้อมูล</td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="7">จำนวน : <?=$num?>
<?
	$before_page=$page_id-1;
	$next_page=$page_id+1;
	
echo "<div id='page' style='float:right; font-size:14px;'>";
			echo "หน้า $page_id จากทั้งหมด $all_pages หน้า ";
		if($page_id!=1){
			echo "<a href='index.php?mo=rank&do=manage_rank&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=rank&do=manage_rank&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=rank&do=manage_rank&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=rank&do=manage_rank&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=rank&do=manage_rank&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>
    </th>
  </tr>
</table>
<? }} ?>
