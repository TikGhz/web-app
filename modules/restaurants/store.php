<div class="breadcrumb">
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    </ul>
</div>
<!-- Content -->
<? 	$sql="SELECT * FROM store WHERE store_id='$_GET[restaurant]'";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c)=mysql_fetch_row($result)){
?>
<div class="restaurant-detail-block">
	<div class="column-left">
	<h1><? echo $b,"<br>",$c?></h1>
    <div class="restaurant-photo">
    	<a href="#"><img src="../../images/1" style="width:651px; height:388px;"></a>
        <div class="restaurant-photo-bottom">
        	<!--วนลูป--><div class="pic_suffle" id="little_" style="width:98px; height:98px;">[1][2][3]</div>
        </div>
    </div>
    <div class="control-area">
        <ul>
            <li><a style="cursor:pointer" class="edit-button"><span class="edit-icon"></span>แก้ไขข้อมูลร้านนี้</a></li>
            <li><a style="cursor:pointer" class="close-button"><span class="close-icon"></span>แจ้งปิด/ซ้ำ</a></li>
            <li><a style="cursor:pointer" class="owner-button"><span class="owner-icon"></span>เป็นเจ้าของร้าน</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <hr>
    </div>
	<div class="column-right">2</div>	
</div>
<div class="restaurant-detail-block">
	<div class="column-left">
    	<div class="tab-area">
        	<ul>
            	<li><a href="" class="active"><span class="general"></span>General Info</a></li>
                <li><a href=""><span class="gallery"></span>Gallery (104)</a></li>
                <li><a href=""><span class="review"></span>All Reviews (6)</a></li>
                <li><a href=""><span class="explore"></span>Explore Menu (84)</a></li>
            </ul>
            <div class="purple-line"></div>
        </div>
        <div class="restaurant-info">
        	<hr>
            <h4><span class="arrow-left"></span>th <span class="en-name">en</span></h4>
            <hr>
            <div class="feature-block">
            	<div class="feature-left">
                	<ul>
                    	<li>
                        	<div class="type-title"><span class="title"></span>title</div>
                            <img src="no.png" alt="">
                        </li>
                    </ul>
                </div>
                <div class="feature-right"></div>
                <div class="clear"></div>
            </div>
            <hr>
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
            </div>
            <hr>
            <h4><span class="arrow-left"></span>แผนที่ th <span class="en-name">en</span></h4>
            <hr>
            <div class="map-block">
            	<div class="access-area">ร้าน</div>
                <div class="map-area">
                	<div id="map_canves" style="width: 670px; height: 380px; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;">
                    	<div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                        
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!--Start People Review-->
            <hr>
            <h4><span class="arrow-left"></span>Review<span class="en-name"> en</span></h4>
            <hr>
            <div class="people-review-block">
            	<div class="avatar-left">1</div>
                <div class="review-right">
                	<h5></h5>
                    <div class="preview-comment">
                    	comment
                    </div>
                    <div class="preview-comment-img">
                    	<ul>
                        	<li><a href=""><img src="1.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--End People Review-->
        </div>
    </div>
    <div class="column-right">2</div>
</div>
<?	}?>
