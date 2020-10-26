<?
	if($_SESSION[login_status]!="valid_user"){ echo "กรุณาเข้าสุ่ระบบ";
	echo "<script type='text/javascript'>document.location=document.referrer;</script>"; }
	elseif($_SESSION[login_type]!='1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้";
	echo "<script type='text/javascript'>document.location=document.referrer;</script>"; }
	elseif($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; 
	echo "<script type='text/javascript'>document.location=document.referrer;</script>"; }
	else{
		if($_SESSION[login_type]=='1'){
				
	$sql_page="SELECT * FROM member";
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
    <input type='hidden' name='mo' value='member'>
	<input type='hidden' name='do' value='manage_member'>
    <input type='hidden' name='stats' value='<?=$_GET[stats];?>'>
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
    <div style="float:right; margin-top:12px; margin-bottom:-20px; margin-right:10px;">
    <form name="form_stats" method="get">
    <input type='hidden' name='mo' value='member'>
	<input type='hidden' name='do' value='manage_member'>
    <select name='stats' style="padding:5px; float:right" onChange="document.form_stats.submit();">
    <? if($_GET[stats]==""){ $stats0='selected';  ?>
    <? }elseif($_GET[stats]==1){ $stats1='selected';  ?>
    <? }elseif($_GET[stats]==2){ $stats2='selected';  ?>
    <? }elseif($_GET[stats]==3){ $stats3='selected';  ?>
    <? } ?>
      <option value="">ระดับสิทธิ์ทั้งหมด</option>
      <option value="1" <?=$stats1;?>>admin</option>
      <option value="2" <?=$stats2;?>>member</option>
      <option value="3" <?=$stats3;?>>genaral</option>
      <option value="" <?=$stats0;?>>all</option>
    </select>
    <input type='hidden' name='page_id' value='<? if($_GET[page_id]==""){ echo $_GET[page_id]=1;}else{ echo $_GET[page_id];}?>'>
    </form>
    </div>
<?
	echo "<div class='clear'></div>";
				
	if($_GET[stats]!=""){ $sql_type_store="SELECT * FROM member WHERE type_id='$_GET[stats]' ORDER BY member_id DESC LIMIT $start_row , $rowperpage"; }
	else{ $sql_type_store="SELECT * FROM member ORDER BY member_id DESC LIMIT $start_row , $rowperpage"; }
	$result_type_store=mysql_query($sql_type_store)or die(mysql_error());
	$num=mysql_num_rows($result_type_store);
?>


<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th class="header">ยูเซอร์</th>
    <th width="150" class="header">ระดับ</th>
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
    <td><? echo $row['member_user']; 
		if($_GET[active]==1){ 
			$sql_max="SELECT max(member_id) FROM type_store";
			$result_max=mysql_query($sql_max) or die (mysql_error());
			list($max)=mysql_fetch_row($result_max);
				if($row['member_id']==$max){ 
					echo "<img src='images/web/new10.gif' width='30' height='10' alt='new' align='right'>";
				}
		}
		?>
        
    </td>
    <td align="center">
    <? 	$sql_mem="SELECT type_name FROM type_member WHERE type_id='$row[type_id]'"; 
    	$result_mem=mysql_query($sql_mem) or die (mysql_error()); 
		list($type_name)=mysql_fetch_row($result_mem);
		echo $type_name; ?>
    </td>
    <td align="center"><?=substr($row['member_datestart'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index_a.php?mo=member&do=edit_member&id=<?=$row['member_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index_a.php?mo=member&do=delete_member&id=<?=$row['member_id']?>" onclick="return confirm('ลบสมาชิก <?=$row['member_name']?> ?')">
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
			echo "<a href='index_a.php?mo=member&do=manage_member&stats=$_GET[stats]&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index_a.php?mo=member&do=manage_member&stats=$_GET[stats]&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index_a.php?mo=member&do=manage_member&stats=$_GET[stats]&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index_a.php?mo=member&do=manage_member&stats=$_GET[stats]&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index_a.php?mo=member&do=manage_member&stats=$_GET[stats]&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>    
    
    </th>
  </tr>
</table>
<? }} ?>
