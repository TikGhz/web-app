<!-- Content Articles -->
<div id="content">
<script src="javascript/jquery-1.11.0.min.js"></script>
<script src="javascript/lightbox.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<?
	$sql_page="SELECT * FROM image WHERE album_id='$_GET[id]'";
	$result_page=mysql_query($sql_page) or die(mysql_error());
	$all_rows=mysql_num_rows($result_page);
	if($_GET[rowpage]!=""){
		$rowperpage=$_GET[rowpage];
	}else{ $rowperpage=24; }
	
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
    <div style="float:right; position:absolute; margin:-5px 10px 5px 655px; ">
    <form name="form_row" method="get">
    <input type='hidden' name='mo' value='photo'>
	<input type='hidden' name='do' value='details'>
    <input type='hidden' name='id' value='<?=$_GET[id]?>'>
    <input type='hidden' name='page_id' value='<? if($_GET[page_id]!=""){echo $_GET[page_id];}else{ echo 1;}?>'>
    <select name='rowpage' style="padding:5px; float:right" onChange="document.form_row.submit();">
      <option value="24">เลือกจำนวนหน้าที่แสดง</option>
      <option value="28">28</option>
      <option value="32">32</option>
      <option value="36">36</option>
      <option value="40">40</option>
    </select>
    </form>
    </div>
<?
	echo "<div class='clear'></div>";

		$sql="SELECT * FROM album WHERE album_id='$_GET[id]'";
		$result=mysql_query($sql) or die(mysql_error());
		list($a,$b,$c)=mysql_fetch_row($result);
		?> 
        <div class="photo-name"><? echo $b;?></div>
        <div class="gray-line" style="margin-bottom:10px;"></div> 
		<?
		$sql="SELECT * FROM image WHERE album_id='$_GET[id]' ORDER BY image_id DESC LIMIT $start_row , $rowperpage";
		$result=mysql_query($sql) or die(mysql_error());
		while(list($a,$b,$c,$d,$e,$f)=mysql_fetch_row($result)){

?>		
		<div class="photo-block-img">
<!--			<a class="example-image-link" href="images/web/<? echo $c;?>" data-lightbox="example-1">
                <img class="example-image" src="images/web/<? echo $c;?>" alt="image-1" width="390"/></a>-->
		<? 	if($e==1){ ?>
				<a class="example-image-link" href="images/activity/<? echo $c;?>" data-lightbox="example-set" data-title="<? echo $b;?>">
                <img class="example-image" src="images/activity/<? echo $c;?>" alt="" width="185" height="185"></a>
		<? 	} ?>
        <? 	if($e==2){ ?>
				<a class="example-image-link" href="images/restaurant/<? echo $c;?>" data-lightbox="example-set" data-title="<? echo $b;?>">
                <img class="example-image" src="images/restaurant/<? echo $c;?>" alt="" width="185" height="185"></a>
		<? 	} ?>
        <? 	if($e==3){ ?>
				<a class="example-image-link" href="images/upload/<? echo $c;?>" data-lightbox="example-set" data-title="<? echo $b;?>">
                <img class="example-image" src="images/upload/<? echo $c;?>" alt="" width="185" height="185"></a>
		<? 	} ?>
        <? 	if($e==4){ ?>
				<a class="example-image-link" href="images/reviews/<? echo $c;?>" data-lightbox="example-set" data-title="<? echo $b;?>">
                <img class="example-image" src="images/reviews/<? echo $c;?>" alt="" width="185" height="185"></a>
		<? 	} ?>
        <? 	if($e==5){ ?>
				<a class="example-image-link" href="images/articles/<? echo $c;?>" data-lightbox="example-set" data-title="<? echo $b;?>">
                <img class="example-image" src="images/articles/<? echo $c;?>" alt="" width="185" height="185"></a>
		<? 	} ?>
        
		</div>
<? } ?>

<?
	$before_page=$page_id-1;
	$next_page=$page_id+1;
	
echo "<div class='clear'></div>";
echo "<div id='page'>";
	echo "<center>";
			echo "หน้า $page_id จากทั้งหมด $all_pages หน้า ";
		if($page_id!=1){
			echo "<a href='index.php?mo=photo&do=details&id=$_GET[id]&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=photo&do=details&id=$_GET[id]&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=photo&do=details&id=$_GET[id]&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=photo&do=details&id=$_GET[id]&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=photo&do=details&id=$_GET[id]&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
	echo "</center>";
?>
</div>
<!-- End Articles -->