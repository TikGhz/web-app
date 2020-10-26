<!-- Content -->
<div class="section-block">
<? 	$sql="SELECT * FROM store";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m)=mysql_fetch_row($result)){
?>
		<div class="restaurant-block">
        	<div class="margin-block">
        	<a href="index.php?mo=restaurants&do=detail&id=<? echo $a; ?>">
            	<img src="images/web/<? echo $h; ?>" width="200" height="200">
            </a>
            <!--<div class="like-area">
                <a style="cursor:pointer" onclick="" class="like-this liked-577 ">
                <span class="like-icon"></span><span class="num-like total-like-577"></span>
                </a>
            </div>-->
            <h3 class="restaurant-th-name">
            	<a href="index.php?feed=restaurants&file=store&restaurant=<?=$a;?>">
                <span class="restaurant-en-name"><? echo $c; ?></span>
                </a>
            </h3>
            <p class="restaurant-categoly">สเต๊ก, ร้านอาหาร</p>
            <div class="restaurant-score">
                <span class="resthome-rate-star">
                 <!--// plugin-specific resources //-->
	<script src='star-rating/jquery.js' type="text/javascript"></script>
	<script src='star-rating/jquery.MetaData.js' type="text/javascript" language="javascript"></script>
	<script src='star-rating/jquery.rating.js' type="text/javascript" language="javascript"></script>
 <link href='star-rating/jquery.rating.css' type="text/css" rel="stylesheet"/>
 <!--// documentation resources //-->
 <!--<script src="http://code.jquery.com/jquery-migrate-1.1.1.js" type="text/javascript"></script>-->
 <link type="text/css" href="/@/js/jquery/ui/jquery.ui.css" rel="stylesheet" />
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js" type="text/javascript"></script>
 <link href='documentation/documentation.css' type="text/css" rel="stylesheet"/>
	<script src='documentation/documentation.js' type="text/javascript"></script>

	<div class="Clear">
<?php
	//ตรวจสอบคนโหวตซ้ำร้าน
	$sql_vote="SELECT * FROM vote WHERE member_id='$_SESSION[login_id]' AND store_id='$a'";
	$result_vote=mysql_query($sql_vote) or die (mysql_error());
	$num_vote=mysql_num_rows($result_vote);
		$sub_vote=substr($vote_aveage,0,1); //ตัดเฉลี่ยให้เหลือตัวหน้าสุด 1 ตัว
		if($sub_vote==1){ $che1="checked";}
		elseif($sub_vote==2){ $che2="checked";}
		elseif($sub_vote==3){ $che3="checked";}
		elseif($sub_vote==4){ $che4="checked";}
		elseif($sub_vote==5){ $che5="checked";}
	if($num_vote>=1){ 
		
	?>
		<input class="star required" type="radio" name="rating" value="1" disabled="disabled" <? echo $che1;?> >
        <input class="star" type="radio" name="rating" value="2" disabled="disabled" <? echo $che2;?> >
        <input class="star" type="radio" name="rating" value="3" disabled="disabled" <? echo $che3;?> >
        <input class="star" type="radio" name="rating" value="4" disabled="disabled" <? echo $che4;?> >
        <input class="star" type="radio" name="rating" value="5" disabled="disabled" <? echo $che5;?> >
        
        <?php $sub_vote_av=substr($m,0,3);?>
<?	} ?>

	</div>
                </span>
                <div class="scorerate"><br><? echo $sub_vote_av ?>/ 5.00</div>
            </div>
            <div class="restaurant-icon">
            	<ul class="restaurant-function">
                	<li><a href="#"><span class="restaurant-review"></span>รีวิว (2)</a></li>
                    <li><a href="#"><span class="restaurant-photo"></span>จำนวนรูป (5)</a></li>
                    <li><a href="#"><span class="restaurant-chat"></span></a></li>
                </ul>
            </div>
            </div>
        </div>
        <!-- End -->
<? } ?>
</div>