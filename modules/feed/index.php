<!-- Content -->
<div class="section-block">
<? 	$sql="SELECT * FROM store";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c)=mysql_fetch_row($result)){
?>
		<div class="restaurant-block">
        	<div class="margin-block">
        	<a href="index.php?mo=restaurants&do=detail&id=1">
            	<img src="../../images/1" width="200" height="200">
            </a>
            <!--<div class="like-area">
                <a style="cursor:pointer" onclick="" class="like-this liked-577 ">
                <span class="like-icon"></span><span class="num-like total-like-577"></span>
                </a>
            </div>-->
            <h3 class="restaurant-th-name">
            	<a href="index.php?feed=restaurants&file=store&restaurant=<?=$a;?>"><? echo $b; ?><br><span class="restaurant-en-name"><? echo $c; ?></span></a>
            </h3>
            <p class="restaurant-categoly">สเต๊ก, ร้านอาหาร</p>
            <div class="restaurant-score">
                <span class="resthome-rate-star">
                                <img src="small-star-active.png">
                                <img src="small-star-active.png">
                                <img src="small-star-active.png">
                                <img src="small-star-active.png">
                                <img src="small-star-deactive.png">                        
                </span>
                <div class="scorerate">4.00 / 5.0</div>
            </div>
            <div class="restaurant-icon">
            	<ul class="restaurant-function">
                	<li><a href="#"><span class="restaurant-review"></span>2</a></li>
                    <li><a href="#"><span class="restaurant-photo"></span>5</a></li>
                    <li><a href="#"><span class="restaurant-chat"></span>1</a></li>
                </ul>
            </div>
            </div>
        </div>
        <!-- End -->
<? } ?>
</div>