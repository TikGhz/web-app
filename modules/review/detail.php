<div id="content1">
<? 				$sql_review="SELECT * FROM review WHERE review_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
				list($a,$b,$c,$d,$e,$f,$g)=mysql_fetch_row($result_review);
				if($g==1){
			?>
            <div class="people-review-block" name="review" id="review" >
            	<div class="avatar-left">
                	<? 
					$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$f'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
					?>
              <img src="images/profile/<?=$member_image;?>" width="50" height="50">
              <br><? echo "<a href='index.php?mo=member&do=profile&id=$member_id'>",$member_name,"</a>";?>
              </div>
            
            <div class="review-border-full">
                <div class="review-right">
                        <div class="review-header">
                            <a href="index.php?mo=review&do=detail&id=<?=$a?>">
							<? echo "<strong>",$b,"</strong>";?></a>
                            
                        </div>
                        <? list($aa,$bb,$cc,$dd,$ee,$ff,$gg)=explode("-",substr($d,0,10));?>
                        <div class="review-date"><? echo " รีวิวเมื่อ $cc $bb ",($aa+543); ?></div>
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
			<hr style="margin-top:20px;">
            <h4 style="padding: 10px;">
            <span class="arrow-left"></span>คอมเม้น <span class="th-name">
			<? 	$sql_comment="SELECT store_name FROM store WHERE store_id='$e'";
				$result_comment=mysql_query($sql_comment) or die (mysql_error());
				list($store_name)=mysql_fetch_row($result_comment);	
				echo "ร้าน",$store_name;?>
            </span>
            </h4>
            <hr>
<? 	
	
	$sql_comment="SELECT * FROM comment WHERE review_id='$_GET[id]'";
	$result_comment=mysql_query($sql_comment) or die (mysql_error());
	while(list($cment_id,$cment_detail,$cment_datestart,$cstore_id,$creview_id,$cmem_id)=mysql_fetch_row($result_comment)){

?>
            <div class="people-comment-block">
            	<div class="avatar-left">
                	<? 
					$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$cmem_id'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
					?>
              		<img src="images/profile/<?=$member_image;?>" width="50" height="50">
                </div>
                <div class="comment-border" style="float:left; width:560px;">
                	<div class="preview-comment"><? echo $cment_detail;?></div>
                <div class="gray-line"></div>
                    <div class="detail-comment" name="comment" id="comment">
                    	<div class="comment-member">
							<? echo "โดย: ",$member_name;?>
                        </div>
						<? list($year,$month,$day)=explode("-",substr($cc,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($cc,10,14));?>
                        <div class="comment-date">
						<? echo " เมื่อ: $day-$month-",($year+543)," $hour:$minute:$second"; ?>
                        </div>
                    </div>
                    <div class="preview-comment-img">
                    
                    </div>
                    
                </div>
            </div>
            <? } ?>
            <div class="comment-now-block" style="margin-top:20px; margin-left:10px;">
            <? 	if($_SESSION[login_status]!="valid_user"){	//comment login?>
            		
            <?	}else{	?>
            <div class="avatar-left">
            <?		$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$_SESSION[login_id]'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
			?>
            	<img src="images/profile/<?=$member_image;?>" width="50" height="50">
            </div>
            <div class="comment-border" style="float:left; width:560px;">
                	<div class="preview-comment">
					  <form name="form2" method="post" action="index.php?mo=comment&do=insert_comment">
                      	<input name="id" type="hidden" id="id" value="<?=$_GET[id];?>">
					    <input name="comment_now" type="text" id="comment_now" style="padding:10px;" size="55">
					    <input type="submit" name="button2" id="button2" value="comment" style="padding:10px;">
                      </form>
                	</div>
                <div class="gray-line"></div>
                    <div class="detail-comment" name="comment" id="comment">
                    	<div class="comment-member">
                        
							<? echo "โดย: ",$member_name;?>
                        </div>
                    </div>
                    <div class="preview-comment-img">
                    
                    </div> 
				</div>
                <?	}	?> 
            </div>
                    </div>
                </div>
            </div>
            <? 	}	?>
</div>