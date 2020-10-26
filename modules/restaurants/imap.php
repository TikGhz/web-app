<div class="section-block">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<style>
.img_left{ float:left; margin-right:5px; margin-bottom:5px; border:1px dotted #999999; background-color:#f2f2f2; padding:2px;}
.cls{ clear:both;}
.font_map{ font-family:Tahoma, Arial, serif; font-size:13px;}
div#map_canvas { width:100%; height:400px; margin:auto; }
</style>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="http://www.cyberthai.net/gmap3.js"></script> 
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