<?
	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}
	elseif($_GET[id]==""){
		echo "<script language='javascript'>alert('ขออภัย ไม่มีข้อมูลที่ท่านต้องการ')</script>";
	}
	else{
		if($_SESSION[login_type]=='1' AND $_GET[id]!=""){
			$sql="SELECT * FROM store WHERE store_id='$_GET[id]'";
		}else{
			$sql="SELECT * FROM store WHERE store_id='$_GET[id]' AND member_id='$_SESSION[login_id]'";
		}
		
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
$num=mysql_num_rows($result);
if($num==0){		
	echo "<script language='javascript'>alert('ไม่มีสิ่งที่คุณต้องการ')</script>";
	mysql_close();
	echo "<script type='text/javascript'>window.location='index_a.php';</script>";
}
?>
<!--<div style="width:100%;margin:20px auto 0 auto;text-align:right;">
  <input type="button" value="กลับ" onclick="window.location='user.php'"/>
</div>-->
<table class="data" style="margin-top:30px;" align="center" cellpadding="10" cellspacing="0" >
  <tr>
    <th class="header">
      แก้ไขร้านค้า : <?=$row['store_name']?>
    </th>
  </tr>
  <tr>
    <td colspan="2">
<? if($_SESSION[login_type]==1){ ?>
<form action="index_a.php?mo=restaurants&do=update_restaurants" method="post" enctype="multipart/form-data" name="user">
<? }else{ ?>
<form action="index.php?mo=restaurants&do=update_restaurants" method="post" enctype="multipart/form-data" name="user">
<? } ?>
<table width="90%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td height="35" colspan="2"><strong>เกี่ยวกับร้าน</strong></td>
  </tr>
  <tr>
    <td width="150">ชื่อบริษัท</td>
    <td><input name="res_business" type="text" id="res_business" value="<?=$row['store_business']?>" size="40" ></td>
  </tr>
  <tr>
    <td>ชื่อร้านค้า</td>
    <td><input name="res_name" type="text" id="res_name" value="<?=$row['store_name']?>" size="40"></td>
  </tr>
  <tr>
    <td>ที่อยู่ติดต่อ</td>
    <td><textarea name="res_address" cols="40" id="res_address"><?=$row['store_address']?></textarea></td>
  </tr>
  <tr>
    <td>เบอร์โทรศัพท์</td>
    <td><input name="res_phone" type="text" id="res_phone" value="<?=$row['store_tel']?>"></td>
  </tr>
  <tr>
    <td>อีเมล</td>
    <td><input name="res_email" type="text" id="res_email" value="<?=$row['store_email']?>" size="40"></td>
  </tr>
  <tr>
    <td>เว็บไซต์ร้าน</td>
    <td><input name="res_web" type="text" id="res_web" value="<?=$row['store_website']?>" size="40">
      <span class="style6">(<font color="#ff0000"> เช่น http://www.exxxx.com </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>แผนที่ ( หาจาก Google Map )</strong></td>
  </tr>
  <tr>
    <td colspan="2">
    
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
	var lati = <?=$row[store_latitude]; ?>;
	var long = <?=$row[store_longtitude]; ?>;
        $(function () {
            $('#map_canvas').gmap3({
                map: {
                    options: {
                        center: [lati,long],
                        zoom: 17,
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
    
    </td>
    </tr>
  <tr>
    <td>ตำแหน่งละติจูด</td>
    <td><input name="res_lati" type="text" id="textfield9" value="<?=$row['store_latitude']?>">
      <span class="style6">(<font color="#ff0000"> เช่น. 18.820765 </font>)</span></td>
  </tr>
  <tr>
    <td>ตำแหน่งลองติจูด</td>
    <td><input name="res_long" type="text" id="res_long" value="<?=$row['store_longtitude']?>">
      <span class="style6">(<font color="#ff0000"> เช่น. 98.9617490 </font>)</span></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>รายละเอียดร้าน</strong></td>
  </tr>
  <tr>
    <td>ร้านของสมาชิก</td>
    <td><select name="res_mem" id="res_mem" readonly>
    <? 	$sql_select_member="SELECT member_id,member_user FROM member";
		$result_select_member=mysql_query($sql_select_member) or die (mysql_error());
		while(list($member_id,$member_user)=mysql_fetch_row($result_select_member)){
			if($row['member_id']==$member_id){?> 
            	<option value="<?=$member_id; ?>"><?=$member_user;?></option> <? 
			}
		} ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทร้าน</td>
    <td><select name="res_type_store" id="res_type_store">
      <? 	$sql_select_type_store="SELECT * FROM type_store";
		$result_select_type_store=mysql_query($sql_select_type_store) or die (mysql_error());
		while(list($type_store_id,$type_name)=mysql_fetch_row($result_select_type_store)){
			if($row['type_store_id']==$type_store_id){?> 
            	<option value="<?=$type_store_id; ?>" selected><?=$type_name;?></option> <? 
			}
			else{ ?>
            	<option value="<?=$type_store_id; ?>"><?=$type_name;?></option> <? 
			}
		} ?>
    </select></td>
  </tr>
  <tr>
    <td>ประเภทสถานที่</td>
    <td><select name="res_type_location" id="res_type_location">
      <? 	$sql_select_type_location="SELECT * FROM type_location";
		$result_select_type_location=mysql_query($sql_select_type_location) or die (mysql_error());
		while(list($type_location_id,$type_location_name,$type_location_image)=mysql_fetch_row($result_select_type_location)){
			if($row['type_location_id']==$type_location_id){?> 
            	<option value="<?=$type_location_id; ?>" selected><?=$type_location_name;?></option> <? 
			}
			else{ ?>
            	<option value="<?=$type_location_id; ?>"><?=$type_location_name;?></option> <? 
			}
		} ?>
    </select></td>
  </tr>
  <tr>
    <td height="35" colspan="2"><strong>รูปภาพ</strong></td>
    </tr>
  <tr>
    <td valign="top"><p>รูปโลโก้ร้าน</p>
      <p>&nbsp;</p>
      <p><img src="images/logo/<?=$row[store_image]?>" width="100"></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input type="file" name="res_logo" id="res_logo">
      </p>
      <p><span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:85px สูง85px</strong></font> )</span></p></td>
  </tr>
  <tr>
    <td valign="top"><p>รูปหน้าร้านอาหาร</p>
      <p>&nbsp;</p>
      <p><img src="images/restaurant/<?=$row[img_res]?>" width="100"></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input type="file" name="res_res" id="res_res">
      </p>
      <p><span class="style6">( <font color="#ff0000">ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:200px สูง200px </strong></font>)</span></p></td>
  </tr>
  <tr>
    <td valign="top"><p>รูปหน้ารีวิว</p>
      <p>&nbsp;</p>
      <p><img src="images/review/<?=$row[img_review]?>" width="100"></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input type="file" name="res_review" id="res_review">
      </p>
      <p><span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:185px สูง:185px</strong></font> )</span></p></td>
  </tr>
  <tr>
    <td valign="top"><p>รูปหน้าหมวดหมู่</p>
      <p>&nbsp;</p>
      <p><img src="images/category/<?=$row[img_cat]?>" width="100"></p>
      <p>&nbsp;</p></td>
    <td><p>
      <input type="file" name="res_cat" id="res_cat">
      </p>
      <p><span class="style6">(<font color="#ff0000"> ความกว้างและความสูง ควรเท่ากันและมากกว่า เช่น <strong>กว้าง:100px สูง:100px</strong></font> )</span></p></td>
  </tr>
  <tr>
    <td><input type="hidden" name="id" value="<?=$row['store_id']?>" /></td>
    <td><input class="button" type="submit" value="บันทึก"/></td>
  </tr>
</table>
</form>  
    </td>
  </tr>
</table>
<div style="width:100%;margin:10px auto 0 auto;text-align:left;">
  <!--<input type="button" value="กลับ" onclick="window.location='user.php'"/>-->
</div>
<? } ?>