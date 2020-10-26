<div id="content1">
<? 	$sql_review="SELECT * FROM articles WHERE articles_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
				list($a,$b,$c,$d,$articles_date)=mysql_fetch_row($result_review);
			?>
            <div class="people-review-block" name="review" id="review" >
            
            <div class="articles-border-full">
                <div class="articles-right">
                        <div class="articles-header">
                            <a href="index.php?mo=articles&do=detail&id=<?=$a?>" style="color:#1fbba6;">
							<? echo "<strong style='font-size:20px;'>",$b,"</strong>";?></a>
                            
                        </div>
                        
                        <? list($year,$month,$day)=explode("-",substr($articles_date,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($articles_date,10,14));?>
                        <div class="articles-date-left">
						<? echo "โพสเมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                        </div>
                        
                        <div class="gray-line"></div>
                        <div class="preview-articles-full">
							<? echo "<div style='font-size:14px; margin-top:10px; margin-bottom:10px;'><strong>",$b,"</strong></div>";
                            echo "<img src='images/articles/",$d,"' width='100%' style='margin-bottom:10px;'>";
                        	echo "<div style='word-wrap:break-word;' >",$c,"</div>";?>
                        </div>
                        
                    </div>
                </div>
            </div>
</div>