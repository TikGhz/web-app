<!-- Content Review -->
<div class="section-block">
<div class="column-center">
<? 	
	$sql_page="SELECT * FROM review";
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
    <input type='hidden' name='mo' value='review'>
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
	
	$sql_review="SELECT * FROM review ORDER BY review_id DESC LIMIT $start_row , $rowperpage";
	$result_review=mysql_query($sql_review) or die(mysql_error());
	while(list($review_id,$review_name,$review_detail,$review_date,$review_store_id,$review_member_id,$review_allow)=mysql_fetch_row($result_review)){
if($review_allow==1){
	$sql_store="SELECT store_id,store_business,store_name,img_review FROM store WHERE store_id='$review_store_id'";
	$result_store=mysql_query($sql_store) or die(mysql_error());
	list($store_id,$store_business,$store_name,$img_review)=mysql_fetch_row($result_store);
	
	$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$review_member_id' ";
	$result_member=mysql_query($sql_member) or die(mysql_error());
	list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
	
?>
	<div class="review-block">
			<a href="index.php?mo=restaurants&do=detail&id=<? echo $store_id;?>&#review"><img src="images/review/<?=$img_review;?>" width="185" height="185" style="float:left;"></a>
		<div class="review-info">
                <!--<h3 class="review-business"><? /*echo $store_business;*/?></h3>-->
                <p class="review-name"><? echo $store_name;?></p>
		</div>
        <div class="review-content">
        	<div class="review-detail">
            	<div class="review-top">
                    <div class="avatar-left">
                        <img src="images/profile/<?=$member_image;?>" width="40" height="40">
                    </div>
                    <div class="avatar-header">
                    	<? echo "<a href='index.php?mo=member&do=profile&id=$member_id'>",$member_name,"</a> เขียนรีวิว <a href='index.php?mo=review&do=detail&id=$review_id'>",$review_name,"</a>";?>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="gray-line"></div>
                		<? list($year,$month,$day)=explode("-",substr($review_date,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($review_date,10,14));?>
                        <div class="review-date-left">
						<? echo "รีวิวเมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                        </div>
                <div class="clear"></div>
                <div class="preview-review">
                <? echo mb_strimwidth($review_detail, 0,120, "...", "UTF-8");?>
                </div>
                <div class="preview-review-img">
                    <? 
						$sql_image="SELECT * FROM image WHERE member_id='$review_member_id' AND review_id='$review_id'";
						$result_image=mysql_query($sql_image) or die (mysql_error());
						while(list($im_id,$im_name,$im_path,$im_date,$al_id,$st_id)=mysql_fetch_row($result_image)){
							echo "<img src='images/reviews/",$im_path,"' width='30' height='30'>";
						}
					?>	<span class="detail-review">
                    		<a href="index.php?mo=review&do=detail&id=<?=$review_id?>" style="font-size:12px; color: rgb(0, 140, 218);">อ่านต่อ</a>
                        </span>
                        </div>
				</div>
        </div>
            
	</div>
<? 	}else{}
	} ?>

<?	if($review_allow==1){
	$before_page=$page_id-1;
	$next_page=$page_id+1;
	
echo "<div class='clear'></div>";
echo "<div id='page'>";
	echo "<center>";
			echo "หน้า $page_id จากทั้งหมด $all_pages หน้า ";
		if($page_id!=1){
			echo "<a href='index.php?mo=review&do=index&page_id=1' class='previous-off'>« หน้าแรก</a> ";
			echo "<a href='index.php?mo=review&do=index&page_id=$before_page&rowpage=$_GET[rowpage]' class='previous'>หน้าที่แล้ว</a> ";
		}
			for($i=1;$i<=$all_pages;$i++){
				if($page_id==$i){
					echo "<font class='active'><strong> $i </strong></font>";
				}else{
					echo "<a href='index.php?mo=review&do=index&page_id=$i&rowpage=$_GET[rowpage]'> $i </a>  ";
				}
			}
		if($page_id!=$all_pages){
			echo "<a href='index.php?mo=review&do=index&page_id=$next_page&rowpage=$_GET[rowpage]' class='next'>หน้าถัดไป</a> ";
			echo "<a href='index.php?mo=review&do=index&page_id=$all_pages' class='next-off'>หน้าสุดท้าย »</a> ";
		}

echo "</div>";
	echo "</center>";
	}else{}
?>
</div></div>
<!-- End Review -->