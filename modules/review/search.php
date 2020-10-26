<div id="content">
<style>
.img_left{ float:left; margin-right:5px; margin-bottom:5px; border:1px dotted #999999; background-color:#f2f2f2; padding:2px;}
.cls{ clear:both;}
.font_map{ font-family:Tahoma, Arial, serif; font-size:13px;}
div#map_canvas { width:100%; height:400px; margin:auto; }
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="javascript/gmap3.js"></script> 
    <script type="text/javascript">
        $(function () {
            $('#map_canvas').gmap3({
                map: {
                    options: {
                        center: [18.800368,98.974543],
                        zoom: 11,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                        },
                    }
                },
                marker: {
                    values: [
<?php
$sql = mysql_query("SELECT store.store_id, store.store_latitude, store.store_longtitude, store.store_image, store.store_name, store.store_address, type_location.type_location_id, type_location.type_location_name, type_location.type_location_image FROM store INNER JOIN type_location ON store.type_location_id = type_location.type_location_id");
$num = mysql_num_rows($sql);
if ($num>0){
	while ($r=mysql_fetch_array($sql))	{
		++$i;
		$i != $num ? $k=',' : $k='';
?>
{latLng:[<?=$r[store_latitude]?>, <?=$r[store_longtitude]?>], data:"<div class='font_map'><img src='images/logo/<?=$r[store_image]?>' width='75' height='75' alt='<?=$r[store_name]?>' class='img_left' /><strong><a href='#' title='<?=$r[store_name]?>' target='_blank'><?=$r[store_name]?></a></strong><br /><br /><?=$r[store_address]?><div class='cls'></div><a href='#' title='<?=$r[store_name]?>' target='_blank'>ดูที่เหลือ</a></div>", options:{icon: "images/icon_map/<?=$r[type_location_image]?>"}}<?=$k?>
<?php
	}
}
?>
                    ],
                    events: {
                        mouseover: function (marker, event, context) {
                            var map = $(this).gmap3("get"),
                                infowindow = $(this).gmap3({
                                    get: {
                                        name: "infowindow"
                                    }
                                });
                            if (infowindow) {
                                infowindow.open(map, marker);
                                infowindow.setContent(context.data);
                            } else {
                                $(this).gmap3({
                                    infowindow: {
                                        anchor: marker,
                                        options: {
                                            content: context.data
                                        }
                                    }
                                });
                            }
                        },
                        closeclick: function () {
                            infowindow.close();
                        },
                        mouseout: function () {
                            var infowindow = $(this).gmap3({
                                get: {
                                    name: "infowindow"
                                }
                            });
                        }
                    }
                }
            });
        });
    </script>
<div id="map_canvas"></div>

</div>
<div class="clear"></div>
<style type="text/css">
	#main-search{ width:100%; float:left;}
	#search{ width:100%; float:left; height: 500px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888; margin-left:-20px;}
	#search > ul { }
	#search > ul > li{ float:left; width:100%; height:150px; background-color:#fff; }
	.search-block{ padding:10px; }
	.search-function > li{ float:left; margin-right:10px; font-size:12px;}
	
</style>
<div id="content">
<?	
	
	$sql_store1="SELECT * FROM store WHERE store_name LIKE '%$_GET[keyword]%'";
	$result_store1=mysql_query($sql_store1) or die(mysql_error());
	$num_store=mysql_num_rows($result_store1) or die (mysql_error());
?>
<div class="gray-line"></div>
<h2>ค้นหาคำว่า "<? if($_GET['keyword']==""){ echo " ";}else{ echo $_GET['keyword'];}?>" พบทั้งสิ้น <? echo $num_store;?> ร้าน</h2>
<div class="gray-line" style=" margin-bottom:20px;"></div>
<div id="main-search">

	<form action="" method="get" name='search_key'>
    	<input type='hidden' name='mo' value='review'>
		<input type='hidden' name='do' value='search'>
		<input name="keyword" type="text" value="<?=$_GET[search]?>" placeholder=" ค้นหาร้านค้า" style="width:93%; height:30px; border:1px solid #e1e1e1;">
	</form>
    <div class="gray-line" style=" margin-top:20px;"></div>
    <!--<div>
    
    	<?
		$sql_store_type="SELECT * FROM type_store";
		$result_store_type=mysql_query($sql_store_type) or die(mysql_error()); 
		echo "ประเภทร้าน";
		?>
        <div class="gray-line" style=" margin-bottom:-10px;"></div>
        <?
		while(list($type_store_id,$type_name)=mysql_fetch_row($result_store_type)){
			echo "<br><a href='index.php?mo=review&do=search&ts_id=$type_store_id'>",$type_name,"</a>";
		}
		?>
    </div>
    <div class="gray-line" style=" margin-top:20px;"></div>
    <div>
		<?
		$sql_type_location="SELECT * FROM type_location";
		$result_type_location=mysql_query($sql_type_location) or die(mysql_error()); 
		echo "ประเภทสถานที่";
		?>
        <div class="gray-line" style=" margin-bottom:-10px;"></div>
        <?
		while(list($type_location_id,$type_location_name)=mysql_fetch_row($result_type_location)){
			echo "<br> <a href='index.php?mo=review&do=search&tl_id=$type_location_id'>",$type_location_name,"</a>";
		}
		?></div>-->
</div>
<div id="search">
	<ul>
    
<?

	$sql_store="SELECT * FROM store WHERE store_name LIKE '%$_GET[keyword]%'";
	$result_store=mysql_query($sql_store) or die(mysql_error());
	while(list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s)=mysql_fetch_row($result_store)){
?>    
	<li>
		<div class="search-block">
        	<div class="margin-block" style="float:left; margin-right:15px;">
        	<a href="index.php?mo=restaurants&do=detail&id=<? echo $a; ?>">
            	<img src="images/restaurant/<? echo $q; ?>" width="120" height="120" style="padding:2px; border:1px solid #ccc; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;">
            </a>
            </div>

            <div class="search-th-name" style="font-size:18px; margin-bottom:5px;">
            	<a href="index.php?mo=restaurants&do=detail&id=<? echo $a; ?>">
                <span class="restaurant-en-name"><? echo $c; ?></span>
                </a>
            </div>
			<p class="restaurant-categoly">
			<?php 	$sql_type_store="SELECT * FROM type_store WHERE type_store_id='$n'";
					$result_type_store=mysql_query($sql_type_store) or die (mysql_error());
					list($type_id,$type_name)=mysql_fetch_row($result_type_store);
					echo "ประเภท : ",$type_name;
			?>
			</p>
            <div class="search-score">
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
				<span class="resthome-rate-star">
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
                <div class="scorerate" style="font-size:13px; margin-bottom:3px; "><?php echo substr($m,0,4);?> / 5.00</div>
            </div>
            <div class="search-icon">
            	<ul class="search-function">
                	<li><a href="index.php?mo=restaurants&do=detail&id=<?=$a?>#review">
                    <span class="search-review"></span>รีวิว
				(<? $sql_review="SELECT * FROM review WHERE store_id='$a'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
                
                <li><a href="index.php?mo=restaurants&do=detail&id=<?=$a?>#comment">
                <span class="search-comment"></span>คอมเม้น
				(<? $sql_review="SELECT * FROM comment WHERE store_id='$a'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
                
                    <li><a href="index.php?mo=photo&do=detail&id=<?=$a?>">
                    <span class="search-photo"></span>จำนวนรูป
				(<? $sql_image="SELECT * FROM image WHERE store_id='$a'";
				$result_image=mysql_query($sql_image) or die (mysql_error());
				echo $num_image=mysql_num_rows($result_image);?>)</a></li>
                    <li><a href="#"><span class="search-chat"></span></a></li>
                </ul>
            </div>
            <div class="search-review" style="float:right;  margin-top:-65px; margin-right:20px;">
            <a href="index.php?mo=review&do=insert&id=<? echo $a;?>">
       	    	<img src="images/web/reviewpic1.png" width="100" height="100"></div>
            </a>
        </div>
	</li>
	<div class="gray-line"></div>
<?	}	?>
	</ul>
</div>
</div>