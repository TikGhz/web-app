<!-- Content category -->
<div id="content">

<? 	
	$sql_type_store="SELECT * FROM type_store WHERE type_store_id='$_GET[id]'";
	$result_type_store=mysql_query($sql_type_store) or die(mysql_error());
	while(list($type_store_id, $type_name)=mysql_fetch_row($result_type_store)){
?>	
	<div class="category-full">
<?		$sql_store="SELECT * FROM store WHERE type_store_id='$type_store_id'";
		$result_store=mysql_query($sql_store) or die(mysql_error());
		
		echo "<a href='index.php?mo=category&do=detail&id=$type_store_id' style='color: rgb(0, 140, 218);'><h3>";
		echo $type_name," (",mysql_num_rows($result_store),")";
		echo "</h3></a>";
?> 		
<div class="gray-line"></div> 
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
                        zoom: 12,
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
$sql = mysql_query("SELECT store.store_id, store.store_latitude, store.store_longtitude, store.store_image, store.store_name, store.store_address, type_location.type_location_id, type_location.type_location_name, type_location.type_location_image FROM store INNER JOIN type_location ON store.type_location_id = type_location.type_location_id WHERE store.type_store_id='$_GET[id]'");
$num = mysql_num_rows($sql);
if ($num>0){
	while ($r=mysql_fetch_array($sql))	{
		++$i;
		$i != $num ? $k=',' : $k='';
?>
{latLng:[<?=$r[store_latitude]?>, <?=$r[store_longtitude]?>], data:"<div class='font_map'><img src='images/logo/<?=$r[store_image]?>' width='75' height='75' alt='<?=$r[store_name]?>' class='img_left' /><strong><a href='#' title='<?=$r[store_name]?>' target='_blank'><?=$r[store_name]?></a></strong><br /><br /><?=$r[store_address]?><div class='cls'></div><a href='index.php?mo=restaurants&do=detail&id=<?=$r[store_id]?>' title='<?=$r[store_name]?>' target='_blank'>ดูที่เหลือ</a></div>", options:{icon: "images/icon_map/<?=$r[type_location_image]?>"}}<?=$k?>
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
        
<div class="gray-line"></div> 
<?
		$sql_store="SELECT store_id,store_business,store_name,store_address,img_cat FROM store WHERE type_store_id='$type_store_id' ORDER BY store_id DESC LIMIT 0,8";
		$result_store=mysql_query($sql_store) or die(mysql_error());
		while(list($store_id,$store_business,$store_name,$store_address,$img_cat)=mysql_fetch_row($result_store)){
	?>
		<div class="category-block" style="margin-top:20px;">
		<div class="category-list" style="margin:7px;">
				<a href="index.php?mo=restaurants&do=detail&id=<? echo $store_id; ?>" >
                    <img src="images/category/<?=$img_cat;?>" width="100" height="100">
                    <div class="category-info">
                            <h3 class="category-name"><? echo $store_business;?></h3>
                        <div class="clear"></div>
                        <div class="category-detail"><? echo $store_name;?></div>
                    </div>
            	</a>
		</div>  
		</div>
    
	<?	} ?>
	</div>
<?	} ?>

</div>
<!-- End category -->