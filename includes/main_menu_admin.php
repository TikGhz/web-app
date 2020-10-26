<script src="javascript/jquery-1.11.0.min.js"></script>
<script src="javascript/lightbox.min.js"></script>
<link href="css/lightbox.css" rel="stylesheet" />
<style type="text/css">
.icon{	width:25px; height:25px; background-repeat: no-repeat; float:left;
		margin-top:18px; margin-left:-40px; }
.dash{	background-image:url(images/web/dash.png); }
.active-dash{ background:url(images/web/dash-hover.png); }

.pencil{	background-image:url(images/web/pencil.png); }
.active-pencil{ background:url(images/web/pencil-hover.png); }
		
.icon-arrow{	width:25px; height:25px; background-repeat: no-repeat; float:right;
				margin-top:19px; margin-right:20px;}
.arrow{	background-image:url(images/web/arrow.png);  } 

.active-arrow{background:url(images/web/arrow-hover.png); }

#main_menu a:link { color: #95a0aa; }
#main_menu a:visited { color: #95a0aa; }
#main_menu a:hover { color: #f1f1f1;; text-decoration:underline; text-shadow: 0px 0px 20px #B8B8B8;}
#main_menu a:active { color:#95a0aa; }

</style>
<div id="logo">
	<img src="images/<? echo $set_logo; ?>" width="276" alt="logo">
</div>
<div id="main_menu">
<?	if($_SESSION[login_type]=='1'){	//admin?>
	
	<ul>
    	<?	if($_GET[mo]==home || $_GET[mo]==''){ ?>
				<a href="index.php" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>หน้าแรก
                    <span class="active-arrow icon-arrow"></span>
					</li>
				</a>
    	<? }else{ ?>
				<a href="index.php">
					<li>
					<span class="dash icon"></span>หน้าแรก
					<span class="arrow icon-arrow"></span>
					</li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==member && $_GET['do']==edit_member){ ?>
				<a href="index.php?mo=member&do=edit_member&id=<?=$_SESSION[login_id];?>" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>แก้ไขข้อมูลส่วนตัว
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=member&do=edit_member&id=<?=$_SESSION[login_id];?>">
                    <li>
                    <span class="dash icon"></span>แก้ไขข้อมูลส่วนตัว
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==member && $_GET['do']==manage_member){ ?>
				<a href="index.php?mo=member&do=manage_member" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการสิทธิ์ของผู้ใช้
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=member&do=manage_member">
                    <li>
                    <span class="dash icon"></span>จัดการสิทธิ์ของผู้ใช้
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==restaurants && $_GET['do']==manage_restaurants){ ?>
				<a href="index.php?mo=restaurants&do=manage_restaurants" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลร้าน
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=restaurants&do=manage_restaurants">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลร้าน
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==photo && $_GET['do']==manage_photo){ ?>
				<a href="index.php?mo=photo&do=manage_photo" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลรูปภาพ
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=photo&do=manage_photo">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลรูปภาพ
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==photo && $_GET['do']==manage_album){ ?>
				<a href="index.php?mo=photo&do=manage_album" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลอัลบั้ม
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=photo&do=manage_album">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลอัลบั้ม
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==news && $_GET['do']==manage_news){ ?>
				<a href="index.php?mo=news&do=manage_news" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการประชาสัมพันธ์
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=news&do=manage_news">
                    <li>
                    <span class="dash icon"></span>จัดการประชาสัมพันธ์
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==promotion && $_GET['do']==manage_promotion){ ?>
				<a href="index.php?mo=promotion&do=manage_promotion" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการโปรโมชั่น
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=promotion&do=manage_promotion">
                    <li>
                    <span class="dash icon"></span>จัดการโปรโมชั่น
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        <?	if($_GET[mo]==articles && $_GET['do']==manage_articles){ ?>
				<a href="index.php?mo=articles&do=manage_articles" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลบทความ
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=promotion&do=manage_promotion">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลบทความ
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        <?	if($_GET[mo]==alerts && $_GET['do']==manage_alerts){ ?>
				<a href="index.php?mo=alerts&do=manage_alerts" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลแจ้งเตือน
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=alerts&do=manage_alerts">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลแจ้งเตือน
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        <?	if($_GET[mo]==review && $_GET['do']==manage_review){ ?>
				<a href="index.php?mo=review&do=manage_review" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลรีวิว
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=review&do=manage_review">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลรีวิว
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        <?	if($_GET[mo]==rank && $_GET['do']==manage_rank){ ?>
				<a href="index.php?mo=rank&do=manage_rank" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการอันดับและสถิติ
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=rank&do=manage_rank">
                    <li>
                    <span class="dash icon"></span>จัดการอันดับและสถิติ
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        <?	if($_GET[mo]==setting && $_GET['do']==manage_setting){ ?>
				<a href="index.php?mo=setting&do=manage_setting" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>จัดการข้อมูลเว็บไซต์
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=setting&do=manage_setting">
                    <li>
                    <span class="dash icon"></span>จัดการข้อมูลเว็บไซต์
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
	</ul>
	
<?	}else{ ?>
	<ul>
    	<?	if($_GET[mo]==home || $_GET[mo]==''){ ?>
				<a href="index.php" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Home
                    <span class="active-arrow icon-arrow"></span>
					</li>
				</a>
    	<? }else{ ?>
				<a href="index.php">
					<li>
					<span class="dash icon"></span>Home
					<span class="arrow icon-arrow"></span>
					</li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==about){ ?>
				<a href="index.php?mo=about" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>About
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=about">
                    <li>
                    <span class="dash icon"></span>About
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==restaurants){ ?>
				<a href="index.php?mo=restaurants" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Restaurants
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=restaurants">
                    <li>
                    <span class="dash icon"></span>Restaurants
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==review){ ?>
				<a href="index.php?mo=review" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Review
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=review">
                    <li>
                    <span class="dash icon"></span>Review
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==photo){ ?>
				<a href="index.php?mo=photo" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Photo
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=photo">
                    <li>
                    <span class="dash icon"></span>Photo
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==articles){ ?>
				<a href="index.php?mo=articles" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Articles
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=articles">
                    <li>
                    <span class="dash icon"></span>Articles
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==category){ ?>
				<a href="index.php?mo=category" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Category
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=category">
                    <li>
                    <span class="dash icon"></span>Category
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
        
        <?	if($_GET[mo]==contact){ ?>
				<a href="index.php?mo=contact" class="active-color">
                    <li class="active-manu">
                    <span class="active-dash icon"></span>Contact Us
                    <span class="active-arrow icon-arrow"></span>
                    </li>
				</a>
        <? }else{ ?>
				<a href="index.php?mo=contact">
                    <li>
                    <span class="dash icon"></span>Contact Us
                    <span class="arrow icon-arrow"></span>
                    </li>
				</a>
        <? } ?>
	</ul>
<?	}	?>
	<div id="promotion_list">
 <?php 	$sql_promotion="SELECT * FROM promotion WHERE DATEDIFF(NOW(),promotion_end )<0 ORDER BY RAND() LIMIT 0,2";
		//$sql_promotion="SELECT * FROM promotion ORDER BY RAND() LIMIT 0,2";
		$result_promotion=mysql_query($sql_promotion) or die (mysql_error()); ?>
    
    	<div id="content" style="float:left; width:200px; height:auto; margin:10px; margin-bottom:10px;">
        <div class="gray-line" style="margin-top:-10px;"></div>
        <h3>Promotion New</h3>
        <div class="gray-line""></div>
	<?	while(list($promo_id,$promo_name,$promo_detail,$promo_image,$sto_id,$mem_id)=mysql_fetch_row($result_promotion)){?>
        <a class="example-image-link" href="images/activity/<? echo $promo_image;?>" data-lightbox="example-set" data-title="">
		<img class="example-image" src="images/activity/<? echo $promo_image;?>" alt="" width="200"></a>
    <?	}	?>
        </div>
        
		
  	</marquee>
    </div>
</div>