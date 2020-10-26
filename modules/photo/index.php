<!-- Content Articles -->
<div id="content">
<? 	$sql1="SELECT * FROM album";
	$result1=mysql_query($sql1) or die(mysql_error());
	$num_album=mysql_num_rows($result1);
	while(list($a1,$b1,$c1,$d1)=mysql_fetch_row($result1)){
		
		$i=count($a1);
		$sql="SELECT * FROM image WHERE album_id='$a1' ORDER BY image_datestart DESC LIMIT 0,$i";
		$result=mysql_query($sql) or die(mysql_error());
		list($a,$b,$c,$d,$e,$f,$g,$h,$i)=mysql_fetch_row($result);
		
		if($a1!=$e){}
		else{ 
?>		
		<div class="articles-block">
        <div class="photo-header">
			<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>" style="color:#008CDA;">
			<? echo "รวม",$b1;?>
            </a>
        <p class="articles-posttime">
						<? list($year,$month,$day)=explode("-",substr($c1,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($c1,10,14));?>
                        <div class="review-date-left">
						<? echo "สร้างเมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                        </div>
		</p>
        </div>
        <? 	if($e==1){ ?>
				<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>">
                <img src="images/activity/<?=$c;?>" width="370" ></a>
		<? 	} ?>
        <? 	if($e==2){ ?>
				<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>">
                <img src="images/restaurant/<?=$c;?>" width="370" ></a>
		<? 	} ?>
        <? 	if($e==3){ ?>
				<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>">
                <img src="images/upload/<?=$c;?>" width="370" ></a>
		<? 	} ?>
        <? 	if($e==4){ ?>
				<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>">
                <img src="images/reviews/<?=$c;?>" width="370" ></a>
		<? 	} ?>
        <? 	if($e==5){ ?>
				<a href="index.php?mo=photo&do=details&id=<? echo $a1;?>">
                <img src="images/articles/<?=$c;?>" width="370" ></a>
		<? 	} ?>
				
			<div class="articles-info">
					<h3 class="articles-name">
						<? echo $b1," : ";?>
                        <? $sql_store="SELECT store_id,store_name FROM store WHERE store_id='$f'";?>
                        <? $result_store=mysql_query($sql_store) or die(mysql_error()); ?>
                        <? list($store_id,$store_name)=mysql_fetch_row($result_store); ?>
				<a href="index.php?mo=restaurants&do=detail&id=<? echo $store_id;?>" style="color: #008CDA;">
				<? echo $store_name;?>
				</a>
                    </h3>
					<p class="articles-posttime">
						<? list($year,$month,$day)=explode("-",substr($d,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($d,10,14));?>
              <div class="review-date-left">
						<? echo "อัพล่าสุดเมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
              </div>
					</p>
			</div>
			<div class="clear"></div>
				
		</div>
<? }} ?>
</div>
<!-- End Articles -->