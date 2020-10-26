<div id="topbar">
<? 	$sql="SELECT * FROM member WHERE member_id='$_SESSION[login_id]' ";
	$result=mysql_query($sql) or die(mysql_error());
	list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)=mysql_fetch_row($result);
	
?>	<div id="topbar_menu">
		<ul>
			<li><img src="images/web/search_icon.png" width="30" height="30" style="float:left; margin-left:-45px;">
            <?			if($select_search==1){ $sele1="selected";} else{$sele1="";}
						if($select_search==2){ $sele2="selected";} else{$sele2="";}
						if($select_search==3){ $sele3="selected";} else{$sele3="";}
						if($select_search==4){ $sele4="selected";} else{$sele4="";}
			?>
            	<form action="" method="get" name='filter'>
                	<input type='hidden' name='mo' value='review'>
					<input type='hidden' name='do' value='search'>
                	<input name="keyword" type="text" value="<?=$_GET[search]?>" size="60" placeholder=" ค้นหาร้านค้า">
                    <!--<select name="select_search" onChange="document.filter.submit();">
                      <option value="0" <?=$sele0?>>ทั้งหมด</option>
                      <!--<option value="1" <?=$sele1?>>ร้านค้า</option>
                      <option value="2" <?=$sele2?>>แผนที่</option>
                      <option value="3" <?=$sele3?>>สถานที่</option>-->
                    <!--</select>-->
             	</form>
            </li>
			<li><!--<a href="#"><img src="images/web/chat_icon.png" width="30" height="30"></a>--></li>
			<? 	if($_SESSION[login_type]=='1'){?>
            <li><a href="#"><img src="images/web/botton_icon.png" width="30" height="30"></a>
            	<ul class="menu_memu">
                	<li><a href="index.php?mo=member&do=edit_member&id=<?=$_SESSION[login_id];?>">แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a href="index.php?mo=member&do=manage_member">จัดการสิทธิ์ของผู้ใช้</a></li>
                    <li><a href="index.php?mo=restaurants&do=manage_restaurants">จัดการข้อมูลร้านของสมาชิก</a></li>
                    <li><a href="index.php?mo=photo&do=manage_photo">จัดการข้อมูลรูปภาพของสมาชิก</a></li>
                    <li><a href="index.php?mo=photo&do=manage_album">จัดการข้อมูลอัลบัมของสมาชิก</a></li>
                    <li><a href="index.php?mo=news&do=manage_news">จัดการข้อมูลข่าวประชาสัมพันธ์</a></li>
                    <!--<li><a href="index.php?mo=restaurants&do=manage_map">จัดการข้อมูลแผนที่ของสมาชิก</a></li>-->
                    <!--<li><a href="index.php?mo=category&do=manage_category">จัดการข้อมูลประเภทร้านของสมาชิก</a></li>-->
                    <!--<li><a href="index.php?mo=restaurants&do=manage_type_location">จัดการข้อมูลประเภทสถานที่สมาชิก</a></li>-->
                    <li><a href="index.php?mo=promotion&do=manage_promotion">จัดการข้อมูลโปรโมชั่นและคูปอง</a></li>
                    <li><a href="index.php?mo=articles&do=manage_articles">จัดการข้อมูลบทความ</a></li>
                    <li><a href="index.php?mo=alerts&do=manage_alerts">จัดการข้อมูลแจ้งเตือน</a></li>
                    <li><a href="index.php?mo=review&do=manage_review">จัดการข้อมูลรีวิว</a></li>
                    <!--<li><a href="index.php?mo=comment&do=manage_comment">จัดการข้อมูลแสดงความคิดเห็น</a></li>-->
                    <li><a href="index.php?mo=rank&do=manage_rank">จัดการอันดับและสถิติ</a></li>
                    <!--<li><a href="index.php?mo=about&do=manage_about">จัดการหน้าเกี่ยวกับ</a></li>-->
                    <!--<li><a href="index.php?mo=contact&do=manage_contact">จัดการหน้าติดต่อ</a></li>-->
                    
                    <li><a href="index.php?mo=setting&do=manage_setting">จัดการข้อมูลของเว็บไซต์</a></li>
                    <? 	if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
							<li><a href="<?=$logoutUrl?>">ออกจากระบบ</a></li>
                    <?	}else{	?>
                    		<li><a href="index.php?mo=member&do=logout">ออกจากระบบ</a></li>
                    <?	}	?>
                </ul>
            </li>
            <? }
			elseif($_SESSION[login_type]=='2'){ ?>
            <li><a href="#"><img src="images/web/botton_icon.png" width="30" height="30"></a>
            	<ul class="menu_memu">
                	<li><a href="index.php?mo=member&do=edit_member&id=<?=$_SESSION[login_id];?>">แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a href="index.php?mo=restaurants&do=list_restaurants">แก้ไขมูลร้าน</a></li>
                    <li><a href="index.php?mo=promotion&do=list_promotion">แก้ไขโปรโมชั่นประจำร้าน</a></li>
                    <li><a href="index.php?mo=photo&do=list_photo">แก้ไขรูปภาพและอัลบั้ม</a></li>
                    <? 	if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
							<li><a href="<?=$logoutUrl?>">ออกจากระบบ</a></li>
                    <?	}else{	?>
                    		<li><a href="index.php?mo=member&do=logout">ออกจากระบบ</a></li>
                    <?	}	?>
               	</ul>
            </li>
            <? } 
			else{ ?>
            <li><a href="#"><img src="images/web/botton_icon.png" width="30" height="30"></a>
            	<ul class="menu_memu">
                	<li><a href="index.php?mo=member&do=edit_member&id=<?=$_SESSION[login_id];?>">แก้ไขข้อมูลส่วนตัว</a></li>
                    <? 	if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
							<li><a href="<?=$logoutUrl?>">ออกจากระบบ</a></li>
                    <?	}else{	?>
                    		<li><a href="index.php?mo=member&do=logout">ออกจากระบบ</a></li>
                    <?	}	?>
               	</ul>
            </li>
            <? } ?>
            
			<li><? echo $d;?></li>
			<li><img src="images/profile/<? echo $j;?>" width="35" height="35" class="br50"></li>
			<li>
            <!--<a href="#"><img src="images/web/line_icon.png" width="30" height="30">
			<span class="br40 green" >8</span></a>--></li>
			<li><!--<a href="#"><img src="images/web/news_icon.png" width="30" height="30">
			<span class="br40 red">8</span></a>--></li>
			<li><a href="#"><img src="images/web/news_icon.png" width="30" height="30">
			<span class="br40 yello">
            <? 	$sql_alerts="SELECT * FROM alerts WHERE member_id='$_SESSION[login_id]' AND aleats_read='0' ORDER BY alerts_datestart DESC";
				$result_alerts=mysql_query($sql_alerts) or die (mysql_error());
				echo mysql_num_rows($result_alerts);
			?>
            </span></a>
            	<ul class="alerts_messess">
            <? 	while(list($a,$b,$c,$d,$f)=mysql_fetch_row($result_alerts)){ 
				list($aa,$bb,$cc,$dd,$ee,$ff,$gg)=explode("-",substr($d,0,10));
			?>
            	<li><? echo "<a href='index.php?mo=alerts&do=update_alerts&id=$a'>",mb_strimwidth($b, 0,30, "...", "UTF-8")," 
				<div style='float:right;'>$cc-$bb-",($aa+543),"</div></a>"?></li>
            <? } ?>
                </ul>
            </li>
		</ul>
    </div>
</div>