<!-- Content Articles -->
<div id="content1">

<? 	
	$sql_page="SELECT * FROM articles";
	$result_page=mysql_query($sql_page) or die(mysql_error());
	$all_rows=mysql_num_rows($result_page);
	if($_GET[rowpage]!=""){
		$rowperpage=$_GET[rowpage];
	}else{ $rowperpage=8; }
	
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
    <div style="float:right; margin-top:-17px; margin-bottom:10px; margin-right:7px;">
    <form name="form_row" method="get">
    <input type='hidden' name='mo' value='articles'>
	<input type='hidden' name='do' value='index'>
    <input type='hidden' name='page_id' value='<?=$_GET[page_id];?>'>
    <select name='rowpage' style="padding:5px; float:right" onChange="document.form_row.submit();">
      <option value="8">เลือกจำนวนหน้าที่แสดง</option>
      <option value="12">12</option>
      <option value="16">16</option>
      <option value="20">20</option>
      <option value="24">24</option>
    </select>
    </form>
    </div>
<?
	echo "<div class='clear'></div>";

	$sql="SELECT * FROM articles ORDER BY articles_id DESC LIMIT $start_row , $rowperpage";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c,$d,$articles_date)=mysql_fetch_row($result)){
?>
	<div class="articles-block">
			<a href="index.php?mo=articles&do=detail&id=<? echo $a;?>">
            <img src="images/articles/<? echo $d; ?>" width="375" style="margin-top:5px;"></a>
		<div class="articles-info">
                <h3 class="articles-name">
					<a href="index.php?mo=articles&do=detail&id=<? echo $a;?>" style="color: rgb(0, 140, 218);">
					<? echo $b;?>
                    </a>
                </h3>
                
                <? list($year,$month,$day)=explode("-",substr($articles_date,0,10));?>
                <? list($hour,$minute,$second,$hms)=explode(":",substr($articles_date,10,14));?>
                <div class="articles-date-left" style="margin-left:0px; margin-top:5px;">
					<? echo "โพสเมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                </div>
                <div class="gray-line"></div>
        <div class="clear"></div>
        <div class="articles-detail" style="word-wrap:break-word;">
        	<? echo mb_strimwidth($c, 0,220, "...", "UTF-8");?>
            <a href="index.php?mo=articles&do=detail&id=<? echo $a;?>" style="color: rgb(0, 140, 218);">อ่านต่อ</a>
        </div>
        </div>  
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
			echo "<a href='index.php?mo=articles&do=index&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=articles&do=index&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=articles&do=index&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=articles&do=index&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=articles&do=index&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
	echo "</center>";
?>
</div>
<!-- End Articles -->