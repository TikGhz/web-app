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
	else{
		if($_SESSION[login_type]=='1'){

	$sql_page="SELECT * FROM image";
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
    <input type='hidden' name='mo' value='photo'>
	<input type='hidden' name='do' value='manage_photo'>
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
	<input type="button" name="btn" id="btn" value="เพิ่มรูปภาพใหม่" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px;">
</div>

<div class="clear"></div>

<div id='display' style='display:none;'>
<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มรูปภาพใหม่</th>
  </tr>
  <tr>
    <td colspan="2"><form action="index_a.php?mo=photo&do=insert_photo" method="post" enctype="multipart/form-data" name="user">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="100">เลือกอัลบั้ม</td>
          <td>
          <? $sql1="SELECT * FROM album"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
          <select name="album_list" id="album_list">
          <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
            <option value="<?=$a?>" selected><?=$b?></option>
          <? } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td>เลือกร้าน</td>
          <td>
          <? $sql1="SELECT * FROM store"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
          <select name="store_list" id="store_list">
          	<option value="0" selected>ไม่เลือก</option>
          <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
            <option value="<?=$a?>"><?=$c?></option>
          <? } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td>เลือกรีวิว</td>
          <td>
          <? $sql1="SELECT * FROM review"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			?>
          <select name="review_list" id="review_list">
          	<option value="0" selected>ไม่เลือก</option>
          <? while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){  ?>
            <option value="<?=$a?>"><?=$b?></option>
          <? } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td>คำอธิบายภาพ</td>
          <td><input type="text" name="photo_name" id="photo_name"></td>
        </tr>
        <tr>
          <td>เลือกภาพ</td>
          <td><input type="file" name="photo_images"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" value="เพิ่มรูปภาพ"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</div>
<?
	echo "<div class='clear'></div>";

$sql="SELECT * FROM image ORDER BY image_id DESC LIMIT $start_row , $rowperpage";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
?>
<table class="list" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th width="50" class="header">ลำดับ</th>
    <th width="200" class="header">รูป</th>
    <th width="186" class="header">ชื่ออัลบั้ม</th>
    <th width="78" class="header">วันที่อัพเดท</th>
    <th width="80" class="header">จัดการ</th>
  </tr>
<?
if($num>0){
  for($i=1;$i<=$num;$i++){$row=mysql_fetch_array($result);
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td align="center">
    <? if($row['album_id']==1){ ?>
    	<a href="index.php?mo=restaurants&do=detail&id=<?=$row['store_id']?>">
    	<img src="images/activity/<?=$row['image_path']?>" width="200">
        </a>
	<? }elseif($row['album_id']==2){ ?>
    	<a href="index.php?mo=restaurants&do=detail&id=<?=$row['store_id']?>">
    	<img src="images/restaurant/<?=$row['image_path']?>" width="200">
        </a>
	<? }elseif($row['album_id']==3){ ?>
    	<a href="index.php?mo=restaurants&do=detail&id=<?=$row['store_id']?>">
    	<img src="images/upload/<?=$row['image_path']?>" width="200">
        </a>
	<? }elseif($row['album_id']==4){ ?>
    	<a href="index.php?mo=restaurants&do=detail&id=<?=$row['store_id']?>">
    	<img src="images/review/<?=$row['image_path']?>" width="200">
        </a>
	<? }elseif($row['album_id']==5){ ?>
    	<a href="index.php?mo=restaurants&do=detail&id=<?=$row['store_id']?>">
    	<img src="images/articles/<?=$row['image_path']?>" width="200">
        </a>
	<? } ?>
    </td>
    <td align="center"><? 
	$sql_album="SELECT * FROM album ORDER BY album_id";
	$result_album=mysql_query($sql_album)or die(mysql_error());
	while(list($albumid, $albumname)=mysql_fetch_row($result_album)){
	echo "<a href='index_a.php?mo=photo&do=details&id=$row[album_id]'>";
	if($row['album_id']==$albumid){ echo $albumname; };
	echo "</a>";
	} ?>
    </td>
    <td align="center"><?=substr($row['image_datestart'],0,16)?></td>
    <td align="center" style="background:#f9f9f9">
      <a href="index_a.php?mo=photo&do=edit_photo&id=<?=$row['image_id']?>">
      	<img src="images/web/edit_icon.png" class="action" title="เปลี่ยนรหัสผ่าน"/>
      </a>
      <a href="index_a.php?mo=photo&do=delete_photo&id=<?=$row['image_id']?>" onclick="return confirm('ลบรูป <?=$row['image_name']?> ?')">
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
			echo "<a href='index_a.php?mo=photo&do=manage_photo&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index_a.php?mo=photo&do=manage_photo&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index_a.php?mo=photo&do=manage_photo&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index_a.php?mo=photo&do=manage_photo&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index_a.php?mo=photo&do=manage_photo&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
?>
    </th>
  </tr>
</table>
<? } }?>