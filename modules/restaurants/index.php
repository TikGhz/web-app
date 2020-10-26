<!-- Content -->
<div class="section-block">
<? 	
	$sql_page="SELECT * FROM store";
	$result_page=mysql_query($sql_page);
	$all_rows=mysql_num_rows($result_page);
	if($_GET[rowpage]!=""){
		$rowperpage=$_GET[rowpage];
	}else{ $rowperpage=12; }
	
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
    <input type='hidden' name='mo' value='restaurants'>
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
	
	$sql="SELECT * FROM store ORDER BY store_id DESC LIMIT $start_row , $rowperpage";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s)=mysql_fetch_row($result)){
?>
		<div class="restaurant-block">
        	<div class="margin-block">
        	<a href="index.php?mo=restaurants&do=detail&id=<? echo $a; ?>">
            	<img src="images/restaurant/<? echo $q; ?>" width="200" height="200">
            </a>
            <!--<div class="like-area">
                <a style="cursor:pointer" onclick="" class="like-this liked-577 ">
                <span class="like-icon"></span><span class="num-like total-like-577"></span>
                </a>
            </div>-->
            <h3 class="restaurant-th-name">
            	<a href="index.php?mo=restaurants&do=detail&id=<? echo $a; ?>">
                <span class="restaurant-en-name"><? echo $c; ?></span>
                </a>
            </h3>
            <p class="restaurant-categoly">
			<?php 	$sql_type_store="SELECT * FROM type_store WHERE type_store_id='$n'";
					$result_type_store=mysql_query($sql_type_store) or die (mysql_error());
					list($type_id,$type_name)=mysql_fetch_row($result_type_store);
					echo $type_name;
			?>
            </p>
            <div class="restaurant-score">
                <span class="resthome-rate-star">
                <?php $sub_m=substr($m,0,1);?>
                <?php if($sub_m==1){?> 
                				<img src="star-rating/icon_star.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==2){?> 
                				<img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==3){?> 
                				<img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==4){?> 
                				<img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==5){?> 
                				<img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;">
                                <img src="star-rating/icon_star.gif" style="width:15px;"> <? } ?>
                </span>
				<span class="resthome-rate-star" >
                <?php $sub_m=substr($m,0,1);?>
                <?php if($sub_m==5){?>  <? } ?>
                <?php if($sub_m==4){?> 
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==3){?> 
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==2){?> 
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==1){?> 
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;"> <? } ?>
                <?php if($sub_m==0){?>
                				<img src="star-rating/icon_star_bg.gif" style="width:15px;"> 
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;">
                                <img src="star-rating/icon_star_bg.gif" style="width:15px;"> <? } ?>
                                                        
                </span>
                <div class="scorerate"><?php echo substr($m,0,4);?> / 5.00</div>
            </div>
            <div class="restaurant-icon">
            	<ul class="restaurant-function">
                	<li><a href="index.php?mo=restaurants&do=detail&id=<?=$a?>#review"><span class="restaurant-review"></span>รีวิว
				(<? $sql_review="SELECT * FROM review WHERE store_id='$a'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
                
                <li><a href="index.php?mo=restaurants&do=detail&id=<?=$a?>#comment"><span class="restaurant-comment"></span>คอมเม้น
				(<? $sql_review="SELECT * FROM comment WHERE store_id='$a'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
                
                    <li><a href="index.php?mo=photo&do=detail&id=<?=$a?>"><span class="restaurant-photo"></span>จำนวนรูป
				(<? $sql_image="SELECT * FROM image WHERE store_id='$a'";
				$result_image=mysql_query($sql_image) or die (mysql_error());
				echo $num_image=mysql_num_rows($result_image);?>)</a></li>
                    <li><a href="#"><span class="restaurant-chat"></span></a></li>
                </ul>
            </div>
            </div>
        </div>
        <!-- End -->
<? } ?>

<?
	$before_page=$page_id-1;
	$next_page=$page_id+1;
	
echo "<div class='clear'></div>";
echo "<div id='page'>";
	echo "<center>";
			echo "หน้า $page_id จากทั้งหมด $all_pages หน้า ";
		if($page_id!=1){
			echo "<a href='index.php?mo=restaurants&do=index&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=restaurants&do=index&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=restaurants&do=index&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=restaurants&do=index&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=restaurants&do=index&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
	echo "</center>";
?>

</div>