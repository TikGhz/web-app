<div id="content1">
<? 				$sql_review="SELECT * FROM promotion WHERE promotion_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
				list($a,$b,$c,$d,$e,$f,$g,$h)=mysql_fetch_row($result_review);
			?>
		<div class="people-review-block" name="review" id="review" >
				<div class="avatar-left">
                	<? 
					$sql_member="SELECT store_id,store_name,store_image FROM store WHERE store_id='$e'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($store_id,$store_name,$store_image)=mysql_fetch_row($result_member);
					?>
              <img src="images/restaurant/<?=$store_image;?>" width="50" height="50">
              <br><? echo "<a href='index.php?mo=restaurants&do=detail&id=$store_id'>",$store_name,"</a>";?>
				</div>
            
            <div class="review-border-full">
                <div class="review-right">
                        <div class="review-header">
                            <a href="index.php?mo=review&do=detail&id=<?=$a?>">
							<? echo "<strong>",$b,"</strong>";?></a>
                            
                        </div>
                        <? list($aa,$bb,$cc)=explode("-",substr($g,0,10));?>
                        <div class="review-date"><? echo " โพสเมื่อ $cc/$bb/",($aa+543); ?></div>
                        <div class="gray-line"></div>
                        <div class="recommend_menu"> โปรโมชั่นแนะนำ</div>
                        <div class="gray-line"></div>
                        <div class="preview-review-img">
                    <? 
						
			echo "<img src='images/activity/",$d,"' width='680' style='margin-bottom:10px;'>";
						
					?>
                        </div>
                        <div class="preview-review-full">
                        	<? echo "<br>",$c;?>
                        </div>
			<div class="gray-line" style="margin-top:20px;"></div>
                </div>
            </div>
		</div>
</div>