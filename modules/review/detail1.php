<div id="content1">
<? 	$sql_review="SELECT * FROM articles WHERE articles_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
				list($a,$b,$c,$d,$e,$f)=mysql_fetch_row($result_review);
			?>
            <div class="people-review-block" name="review" id="review" >
            	<div class="avatar-left">
                	<? 
					$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$f'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
					?>
              <img src="images/profile/<?=$member_image;?>" width="50" height="50">
              <br><? echo $member_name;?>
              </div>
            
            <div class="review-border-full">
                <div class="review-right">
                        <div class="review-header">
                            <a href="index.php?mo=review&do=detail&id=<?=$a?>">
							<? echo "<strong>",$b,"</strong>";?></a>
                            
                        </div>
                        <? list($aa,$bb,$cc,$dd,$ee,$ff,$gg)=explode("-",substr($d,0,10));?>
                        <div class="review-date"><? echo " โพสเมื่อ $cc $bb ",($aa+543); ?></div>
                        <div class="gray-line"></div>
                        <div class="recommend_menu"> เมนูแนะนำ</div>
                        <div class="gray-line"></div>
                        <div class="preview-review-img">
                    <? 
						$sql_image="SELECT * FROM image WHERE member_id='$f' AND review_id='$a'";
						$result_image=mysql_query($sql_image) or die (mysql_error());
						while(list($im_id,$im_name,$im_path,$im_date,$al_id,$st_id)=mysql_fetch_row($result_image)){
							echo "<img src='images/reviews/",$im_path,"' width='210' height='210' style='margin-bottom:10px;'>";
						}
					?>
                        </div>
                        <div class="preview-review-full">
                        	<? echo "<br>",$c;?>
                        </div>
                        
                    </div>
                </div>
            </div>
</div>