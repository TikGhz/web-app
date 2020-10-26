<div id="content">
	<? 	
	$sql="SELECT * FROM store WHERE store_id='$_GET[id]'";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($store_id,$store_business,$store_name,$store_address,$store_tel,$store_email,$store_website,$store_image,$store_latitude,$store_longtitude,$vote_score,$vote_value,$vote_aveage)=mysql_fetch_row($result)){
?>
<div class="restaurant-detail-block">
	<div class="column-left">
	<h1><? echo $store_business,"<br>",$store_name?></h1>
    	<div class="tab-area">
        	<ul>
            	<li>
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
	
<?php
	//ตรวจสอบคนโหวตซ้ำร้าน
	$sql_vote="SELECT * FROM vote WHERE member_id='$_SESSION[login_id]' AND store_id='$_GET[id]'";
	$result_vote=mysql_query($sql_vote) or die (mysql_error());
	$num_vote=mysql_num_rows($result_vote);
		$sub_vote=substr($vote_aveage,0,1); //ตัดเฉลี่ยให้เหลือตัวหน้าสุด 1 ตัว
		if($sub_vote==1){ $che1="checked";}
		elseif($sub_vote==2){ $che2="checked";}
		elseif($sub_vote==3){ $che3="checked";}
		elseif($sub_vote==4){ $che4="checked";}
		elseif($sub_vote==5){ $che5="checked";}
	if($num_vote>=1){ 
		
	?>	<div class="Clear">
		<input class="star required" type="radio" name="rating" value="1" disabled="disabled" <? echo $che1;?> >
        <input class="star" type="radio" name="rating" value="2" disabled="disabled" <? echo $che2;?> >
        <input class="star" type="radio" name="rating" value="3" disabled="disabled" <? echo $che3;?> >
        <input class="star" type="radio" name="rating" value="4" disabled="disabled" <? echo $che4;?> >
        <input class="star" type="radio" name="rating" value="5" disabled="disabled" <? echo $che5;?> >
        
        <?php $sub_vote_av=substr($vote_aveage,0,4);
		echo "(",$sub_vote_av,")"; ?>
        </div>
<?	}
	else{
?>
<form id="form1" name="form1" method="post" action="index.php?mo=vote&do=insert_vote&id=<?=$_GET[id] ?>">
		<div class="Clear">
        <input class="star" type="radio" name="rating" value="1" <? echo $che1;?>>
        <input class="star" type="radio" name="rating" value="2" <? echo $che2;?>>
        <input class="star" type="radio" name="rating" value="3" <? echo $che3;?>>
        <input class="star" type="radio" name="rating" value="4" <? echo $che4;?>>
        <input class="star" type="radio" name="rating" value="5" <? echo $che5;?>>
        <input type="hidden" name="memberid" value="<?=$_SESSION[login_id]; ?>">
        <input type="hidden" name="storeid" value="<?=$_GET[id]; ?>">
        <?php $sub_vote_av=substr($vote_aveage,0,4);
		echo "(",$sub_vote_av,")"; ?>
        <input type="submit" name="button" id="button" value="vote" />
        </div>
</form>
<?	} ?>
	
                </li>
            	<li><a href="index.php?mo=restaurants&do=detail&id=<?=$_GET[id]?>#data_store" class="active"><span class="general"></span>ข้อมูลร้าน</a></li>
                <li><a href="index.php?mo=photo&do=detail&id=<?=$_GET[id]?>"><span class="gallery"></span>จำนวนรูป
				(<? $sql_image="SELECT * FROM image WHERE store_id='$_GET[id]'";
				$result_image=mysql_query($sql_image) or die (mysql_error());
				echo $num_image=mysql_num_rows($result_image);?>)</a></li>
                
                <li><a href="index.php?mo=restaurants&do=detail&id=<?=$_GET[id]?>#review"><span class="review"></span>รีวิว
				(<? $sql_review="SELECT * FROM review WHERE store_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
                
                <li><a href="index.php?mo=restaurants&do=detail&id=<?=$_GET[id]?>#comment"><span class="comment"></span>คอมเม้น
				(<? $sql_review="SELECT * FROM comment WHERE store_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
            </ul>
            <div class="purple-line"></div>
        </div>
    <div class="restaurant-photo">
    
    	<a href="#"><img src="images/web/<? echo $store_image;?>" style="width:651px; height:391px; float:left;"></a>
        <div class="restaurant-photo-bottom">
        	<!--วนลูป-->
            <div class="pic_suffle" id="little_" style="width:98px;">
                <img src="images/web/<? echo $store_image;?>" style="width:98px; height:97px;">
                <img src="images/web/<? echo $store_image;?>" style="width:98px; height:97px;">
                <img src="images/web/<? echo $store_image;?>" style="width:98px; height:97px;">
                <img src="images/web/<? echo $store_image;?>" style="width:98px; height:97px;">
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="control-area">
        <ul>
            <li><a style="cursor:pointer" class="edit-button"><span class="edit-icon"></span>แก้ไขข้อมูลร้านนี้</a></li>
            <li><a style="cursor:pointer" class="close-button"><span class="close-icon"></span>แจ้งปิด/ซ้ำ</a></li>
            <!--<li><a style="cursor:pointer" class="owner-button"><span class="owner-icon"></span>เป็นเจ้าของร้าน</a></li>-->
        </ul>
    </div>
    <div class="clear"></div>

    </div>
	<!--<div class="column-right"></div>-->	
</div>
<div class="restaurant-detail-block">
	<div class="column-left">
    	
        <div class="clear"></div>
        <div class="restaurant-info" name="data_store" id="data_store">
        	<hr>
            <h4><span class="arrow-left"></span>
	            ข้อมูลร้าน <span class="en-name"><? echo $store_name;?></span>
            </h4>
            <hr>
            <div class="feature-block">
            	<div class="feature-left">
                	<ul>
                    	<li>
                        	<div class="type-title"><span class="title"></span>ร้าน : 
                            <? echo $store_name;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span>ที่อยู่ : 
                            <? echo $store_address;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span>เบอร์ติดต่อ : 
                            <? echo $store_tel;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span>เมลติดต่อ : 
                            <? echo $store_email;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span>เว็บไซต์ : 
                            <? echo $store_website;?>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--<div class="feature-right"></div>-->
                <div class="clear"></div>
            </div>
            <!--<hr>
            <h4><span class="arrow-left"></span>ที่อยู่ th <span class="en-name">en</span></h4>
            <hr>
            <div class="address-block">
            	<ul>
                	<li>
                    	<div class="address-left"><span class="access"></span>Access</div>
                        <div>ร้าน</div>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>-->
            <hr>
            <h4><span class="arrow-left"></span>แผนที่ร้าน 
            	<span class="en-name"><? echo $store_name;?></span>
            </h4>
            <hr>
            <div class="map-block" name="map_view" id="map_view">
            	<div class="access-area"></div>
                <div class="map-area">

<style type="text/css">
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:100%;
	height:400px;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
 <div id="map_canvas"></div>
  
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
<? 
?>
var lati = <?=$store_latitude ?>;
var long = <?=$store_longtitude ?>;
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(lati,long);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0]; 
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 17, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
	};
	map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	var my_Marker = new GGM.Marker({ // สร้างตัว marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!", // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
		icon:"images/icon_map/icon_restaurant.png" //รูป
	});
	
	// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
	GGM.event.addListener(my_Marker, 'dragend', function() {
		var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker		
        $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
	});		

	// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
	GGM.event.addListener(map, 'zoom_changed', function() {
		$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
	});

}
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
	}).appendTo("body");	
});
</script>               </div>
                <div class="clear"></div>
            </div>
            <!--Start People Review-->
            <hr>
            <h4><span class="arrow-left"></span>รีวิวร้าน <span class="en-name"><? echo $store_name;?></span></h4>
            <hr>
            <? 	$sql_review="SELECT * FROM review WHERE store_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
				while(list($a,$b,$c,$d,$e,$f)=mysql_fetch_row($result_review)){
			?>
            <div class="people-review-block" name="review" id="review">
            	<div class="avatar-left"><? echo $b;?></div>
                <div class="review-right">
                	<h5></h5>
                    <div class="preview-comment">
                    	<? echo $c;?>
                    </div>
                    <div class="preview-comment-img">
                    	<? 
						$sql_member="SELECT member_id,member_name FROM member WHERE member_id='$f'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					while(list($member_id,$member_name)=mysql_fetch_row($result_member)){
						echo "โดย : ",$member_name;
					}
						echo " เมื่อ ",$d;?>
                    </div>
                </div>
            </div>
            <? } ?>
            <hr>
            <h4><span class="arrow-left"></span>คอมเม้น <span class="en-name"><? echo $store_name;?></span></h4>
            <hr>
            <? 	$sql_comment="SELECT * FROM comment WHERE store_id='$_GET[id]'";
				$result_comment=mysql_query($sql_comment) or die (mysql_error());
				while(list($a,$b,$c,$d,$e)=mysql_fetch_row($result_comment)){
			?>
            <div class="people-review-block">
            	<div class="avatar-left"><? echo $a;?></div>
                <div class="review-right">
                	<h5></h5>
                    <div class="preview-comment" name="comment" id="comment">
                    	<? echo $b;?>
                    </div>
                    <div class="preview-comment-img">
                    	<? echo "โดย : ",$d," เมื่อ ",$c;?>
                    </div>
                </div>
            </div>
            <? } ?>
            <!--End People Review-->
        </div>
    </div>
    <!--<div class="column-right">2</div>-->
</div>
<?	}?>

</div>