<div id="content">
	<? 	
	$sql="SELECT * FROM store WHERE store_id='$_GET[id]'";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($store_id,$store_business,$store_name,$store_address,$store_tel,$store_email,$store_website,$store_image,$store_latitude,$store_longtitude,$vote_score,$vote_value,$vote_aveage,$type_s_id,$mem_id,$type_l_id)=mysql_fetch_row($result)){
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
        <input type="submit" name="button" id="button" value="vote" style="padding:0px;">
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
                
                <li><a href="index.php?mo=review&do=detail&id=<?=$_GET[id]?>#comment"><span class="comment"></span>คอมเม้น
				(<? $sql_review="SELECT * FROM comment WHERE store_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				echo $num_review=mysql_num_rows($result_review);?>)</a></li>
            </ul>
            <div class="purple-line"></div>
        </div>
    <div class="restaurant-photo">
		<? 
		$sql_images="SELECT * FROM image WHERE album_id='2' AND store_id='$_GET[id]' ORDER BY image_datestart ";
		$result_images=mysql_query($sql_images) or die (mysql_error());
		list($im_id,$im_name,$im_path,$im_date,$al_id,$st_id)=mysql_fetch_row($result_images);
		
		if(!$im_path){ ?>
			<a href="">
        	<img src="images/No_Image.svg" style="width:651px; height:391px; float:left;">
        </a>
		<? }else{?>
        
    	<a href="">
        	<img src="images/restaurant/<? echo $im_path;?>" style="width:651px; height:391px; float:left;">
        </a>
        <?	 }	?>
        <div class="restaurant-photo-bottom">
        	<!--วนลูป-->
			<? 	$query_image = "SELECT * FROM image WHERE album_id='2' AND store_id='$_GET[id]' ORDER BY RAND() LIMIT 0,4";
				$resultgg = mysql_query($query_image);
				while ($random = mysql_fetch_array($resultgg)) { ?>
					<div class="pic_suffle" id="little_" style="width:98px;">
                    <? 	if($im_path==$random[image_path]){}else{?>
					<img src="images/restaurant/<? echo $random[image_path];?>" style="width:98px; height:97px;">
                    <?	} ?>
					</div>
			<?	} ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="control-area">

<script type="text/javascript">
	function toggle() {
		var ds = document.getElementById("display");
		if(ds.style.display == 'none')
			ds.style.display = 'block';
		else 
			ds.style.display = 'none';
	}
</script>
        <ul>
            <li>
            <input type="submit" name="Submit2" value="เขียนรีวิว" onclick='location.replace("index.php?mo=review&do=insert&id=<? echo $_GET[id];?>")' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px; width:100px; float:left;">
            </li>
<? if($_SESSION[login_id]==1 || $_SESSION[login_id]==2){ ?>
            <li>
            <input type="button" name="btn" id="btn" value="เพิ่มรูปภาพ" onclick='toggle()' style="background-color:#fff; border:1px solid #A3A3A3; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; height:31px; width:100px; float:left;">
            </li>
            <li>
            <div class="clear"></div>
<div id='display' style='display:none;'>

<table class="data" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header" colspan="3" >เพิ่มรูปภาพใหม่</th>
  </tr>
  <tr>
    <td colspan="2">
    <form action="index.php?mo=photo&do=insert_photo" method="post" enctype="multipart/form-data" name="user">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="100"></td>
          <td>
          </td>
        </tr>
        <tr>
          <td>คำอธิบายภาพ</td>
          <td><input type="text" name="photo_name" id="photo_name"></td>
        </tr>
        <tr>
          <td>เลือกภาพ</td>
          <td><input type="file" name="photo_images"></td>
        </tr>
        <tr>
          <td>
          <input name="album_list" type="hidden" id="album_list" value="2">
          <input name="store_list" type="hidden" id="store_list" value="<?=$_GET[id];?>">
          <input name="review_list" type="hidden" id="review_list" value="0">
          </td>
          <td><input type="submit" value="เพิ่มรูปภาพ"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</div>
<? } ?>
            </li>
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
                        	<div class="type-title"><span class="title"></span><img src="images/icon_store/icon_home.png" width="20" height="20"> <strong>ร้าน :</strong> <? echo $store_name;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span><img src="images/icon_store/icon_address.png" width="20" height="20"> <strong>ที่อยู่ :</strong> <? echo $store_address;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span><img src="images/icon_store/icon_phone.png" width="20" height="20"> <strong>เบอร์ติดต่อ :</strong> <? echo $store_tel;?>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span><img src="images/icon_store/icon_mail.png" width="20" height="20"> <strong>เมลติดต่อ :</strong> <a href="mailto:<? echo $store_email;?>?Subject=Hello%20again" target="_top">
<? echo $store_email;?></a>
                            </div>
                        </li>
                        <li>
                        	<div class="type-title"><span class="title"></span><img src="images/icon_store/icon_web.png" width="20" height="20"> <strong>เว็บไซต์ :</strong> <a href="<? echo $store_website;?>"><? echo $store_website;?></a>
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
	var lati = <?=$store_latitude ?>;
	var long = <?=$store_longtitude ?>;
        $(function () {
            $('#map_canvas').gmap3({
                map: {
                    options: {
                        center: [lati,long],
                        zoom: 14,
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
$sql = mysql_query("SELECT store.store_id, store.store_latitude, store.store_longtitude, store.store_image, store.store_name, store.store_address, type_location.type_location_id, type_location.type_location_name, type_location.type_location_image FROM store INNER JOIN type_location ON store.type_location_id = type_location.type_location_id WHERE store.store_id='$_GET[id]'");
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

               </div>
                <div class="clear"></div>
            </div>
            <!--Start People Review-->
            <hr>
            <h4><span class="arrow-left"></span>รีวิวร้าน <span class="th-name"><? echo $store_name;?></span></h4>
            <hr>
            <? 	$sql_review="SELECT * FROM review WHERE store_id='$_GET[id]'";
				$result_review=mysql_query($sql_review) or die (mysql_error());
				$num_review=mysql_num_rows($result_review);
					if($num_review==0){	//review 0 ?>
                		<div class="review-found" style="padding:20px;">
                        	ไม่มีรีวิวในรายการนี้ค่ะ
                        </div>
			<?		}
				while(list($a,$b,$c,$d,$e,$f,$g)=mysql_fetch_row($result_review)){
					if($g==1){
			?>
            <div class="people-review-block" name="review" id="review">
            	<div class="avatar-left">
                	<? 
					$sql_member="SELECT member_id,member_name,member_image FROM member WHERE member_id='$f'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$member_name,$member_image)=mysql_fetch_row($result_member);
					?>
				<a href='index.php?mo=member&do=profile&id=$member_id'><img src="images/profile/<?=$member_image;?>" width="50" height="50">
				<br><? echo $member_name;?>
                </a>
				</div>
            
            <div class="review-border">
                <div class="review-right">
                        <div class="review-header">
                            <a href="index.php?mo=review&do=detail&id=<?=$a?>">
							<? echo "<strong>",$b,"</strong>";?></a>
                            
                        </div>
                        <? list($aa,$bb,$cc,$dd,$ee,$ff,$gg)=explode("-",substr($d,0,10));?>
                        <div class="review-date"><? echo " รีวิวเมื่อ $cc $bb ",($aa+543); ?></div>
                        <div class="gray-line"></div>
                        <div class="preview-review">
                        	<? echo mb_strimwidth($c, 0,400, "...", "UTF-8");?>
                        </div>
                        <div class="preview-review-img">
                    <? 
						$sql_image="SELECT * FROM image WHERE member_id='$f' AND review_id='$a'";
						$result_image=mysql_query($sql_image) or die (mysql_error());
						while(list($im_id,$im_name,$im_path,$im_date,$al_id,$st_id)=mysql_fetch_row($result_image)){
							echo "<img src='images/reviews/",$im_path,"' width='50' height='50'>";
						}
					?>	<span class="detail-review">
                    		<a href="index.php?mo=review&do=detail&id=<?=$a?>">อ่านต่อ</a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <? }else{} } ?>
            <div class="clear"></div>
            
            <!--comment-->
            
            <hr>
            <h4>
            <span class="arrow-left"></span>คอมเม้น <span class="th-name">
			<? 	$sql_comment="SELECT store_name FROM store WHERE store_id='$_GET[id]'";
				$result_comment=mysql_query($sql_comment) or die (mysql_error());
				list($store_name)=mysql_fetch_row($result_comment);	
				echo "ร้าน",$store_name;?>
            </span>
            </h4>
            <hr>
<? 	
	
	$sql_comment="SELECT * FROM comment WHERE store_id='$_GET[id]'";
	$result_comment=mysql_query($sql_comment) or die (mysql_error());
	$num_comment=mysql_num_rows($result_comment);
	if($num_comment==0){ echo "<div style='padding:10px;'>ไม่มีคอมเม้นในรายการนี้ค่ะ</div>";}
	else
	while(list($cment_id,$cment_detail,$cment_datestart,$cstore_id,$creview_id,$cmem_id)=mysql_fetch_row($result_comment)){

?>
            <div class="people-comment-block" style="margin-left:0px;">
            	<div class="avatar-left">
                	<? 
					$sql_member="SELECT member_id,member_pass,member_name,member_image FROM member WHERE member_id='$cmem_id'";
					$result_member=mysql_query($sql_member) or die (mysql_error());
					list($member_id,$mem_image,$member_name,$member_image)=mysql_fetch_row($result_member);
					echo "<a href='index.php?mo=member&do=profile&id=$member_id'>";
					if($member_image!=""){ ?>
						<img src="images/profile/<?=$member_image;?>" width="50" height="50">
				<? 	}else{	?>
                    <img src="https://graph.facebook.com/<?=$mem_image?>/picture" width="50" height="50">
                <?	}
					echo "</a>";	?>
                
                </div>
                <div class="comment-border" style="float:left; width:610px;">
                	<div class="preview-comment"><? echo $cment_detail;?></div>
                <div class="gray-line"></div>
                    <div class="detail-comment" name="comment" id="comment">
                    	<div class="comment-member">
                        
							<? echo "โดย: <a href='index.php?mo=member&do=profile&id=$member_id'>",$member_name,"</a>";?>
                        </div>
						<? list($year,$month,$day)=explode("-",substr($cment_datestart,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($cment_datestart,10,14));?>
                        <div class="comment-date">
						<? echo " เมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
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
            <div class="comment-border" style="float:left; width:610px;">
                	<div class="preview-comment">
					  <form name="form2" method="post" action="index.php?mo=comment&do=insert_comment">
                      	<input name="id" type="hidden" id="id" value="<?=$_GET[id];?>">
					    <input name="comment_now" type="text" id="comment_now" style="padding:10px;" size="65">
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
            <!--End People Review-->
        </div>
    </div>
    <!--<div class="column-right">2</div>-->
</div>
<?	}?>

</div>