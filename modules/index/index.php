<div id="tiles">
<? 	$sql="SELECT set_advertise1,set_advertise2,set_advertise3,set_advertise4,set_advertise5 FROM setting"; 
	$result=mysql_query($sql) or die(mysql_error());
	$i=0;
	list($set_advertise1,$set_advertise2,$set_advertise3,$set_advertise4,$set_advertise5)=mysql_fetch_row($result);
	?> 
    	<span style="margin-left:0px;">
        <? 	if($_SESSION[login_type]=='1'){?>
        	<div style="position:absolute; float:right; text-align:right; font-size:11px; padding:4px;"><a href="index.php?mo=setting&do=manage_setting">edit</a></div>
		<? 	}
echo "<a class='example-image-link' href='images/adver/$set_advertise1' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/adver/$set_advertise1' alt='' width='200' height='165' ></a>"; ?>
                
        </span>
		<span>
        <? 	if($_SESSION[login_type]=='1'){?>
        	<div style="position:absolute; float:right; text-align:right; font-size:11px; padding:4px;"><a href="index.php?mo=setting&do=manage_setting">edit</a></div>
		<? 	}
		
echo "<a class='example-image-link' href='images/adver/$set_advertise2' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/adver/$set_advertise2' alt='' width='200' height='165' ></a>"; ?>

        </span>
        <span>
        <? 	if($_SESSION[login_type]=='1'){?>
        	<div style="position:absolute; float:right; text-align:right; font-size:11px; padding:4px;"><a href="index.php?mo=setting&do=manage_setting">edit</a></div>
		<? 	}
echo "<a class='example-image-link' href='images/adver/$set_advertise3' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/adver/$set_advertise3' alt='' width='200' height='165' ></a>"; ?>

        </span>
        <span>
        <? 	if($_SESSION[login_type]=='1'){?>
        	<div style="position:absolute; float:right; text-align:right; font-size:11px; padding:4px;"><a href="index.php?mo=setting&do=manage_setting">edit</a></div>
		<? 	}
echo "<a class='example-image-link' href='images/adver/$set_advertise4' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/adver/$set_advertise4' alt='' width='200' height='165' ></a>"; ?>
        </span>
        
</div>
                   
<div class="clear"></div>

<div class="clear"></div>

<div id="low">
	<div id="news">
		<h4>ข่าวจากชมรม<p style="margin-right:10px; float:right; font-size:11px; font-weight:200;">
        <? 	if($_SESSION[login_type]=='1'){?>
            	<a href="index.php?mo=news&do=manage_news">เพิ่ม </a>
        <?	}	?>
            <a href="index.php?mo=news">ดูทั้งหมด</a></p></h4>
        <? 	$sql1="SELECT * FROM news ORDER BY news_id DESC LIMIT 0,5 "; 
			$result1=mysql_query($sql1) or die(mysql_error());
			while(list($a,$b,$c,$d)=mysql_fetch_row($result1)){
				list($aa,$bb,$cc,$dd,$ee,$ff,$gg)=explode("-",substr($d,0,10));
				echo "<span><a href='index.php?mo=news&do=detail&id=$a' style='color: rgb(0, 140, 218);'>",mb_strimwidth($b, 0,60, "... อ่านต่อ", "UTF-8"),"</a> <a style='float:right; margin-right:10px;'>$cc-$bb-",($aa+543),"</a></span>";
			}?>
	</div>
	
    <div id="card">
<?	$sql2="SELECT set_advertise5 FROM setting"; 
	$result2=mysql_query($sql2) or die(mysql_error());
	list($set_advertise5)=mysql_fetch_row($result2);
    	if($_SESSION[login_type]=='1'){?>
        	<div style="position:absolute; float:right; text-align:right; font-size:11px; padding:4px;"><a href="index.php?mo=setting&do=manage_setting">edit</a></div>
		<? 	}
echo "<a class='example-image-link' href='images/adver/$set_advertise5' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/adver/$set_advertise5' alt='' width='360' height='230' ></a>"; ?>

	</div>
</div>
<div>

<div id="content">
	<div id="rank">
		<h4>รายนามสมาชิก</h4>
        <div class="gray-line"></div>
        
        <? 	$sql1="SELECT store_id,store_image FROM store ORDER BY RAND() DESC LIMIT 0,14 "; 
			$result1=mysql_query($sql1) or die(mysql_error());
			while(list($store_id,$store_image)=mysql_fetch_row($result1)){
				echo "<span><a href='index.php?mo=restaurants&do=detail&id=$store_id'>";
				echo "<img src='images/restaurant/$store_image' width='105' height='105' style='margin:5px;'>";
				echo "</a></span>";
			}?>
	</div>
</div>

<div id="content">
	<div id="rank">
		<h4>รูปภาพล่าสุด</h4>
        <div class="gray-line"></div>
        
			<? 
	for($i=0; $i<14; $i++){
			$sql1="SELECT image_id,image_path,album_id,store_id FROM image";
			$sql1.=" GROUP BY store_id ORDER BY RAND() DESC LIMIT 0,1"; 
			$result1=mysql_query($sql1) or die(mysql_error());
			while(list($image_id,$image_path,$album_id)=mysql_fetch_row($result1)){
				
		 	if($album_id==1){ 
echo "<a class='example-image-link' href='images/activity/$image_path' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/activity/$image_path' alt='' width='105' height='105' style='margin:5px;'></a>";
		 	} 
       		if($album_id==2){ 
echo "<a class='example-image-link' href='images/restaurant/$image_path' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/restaurant/$image_path' alt='' width='105' height='105' style='margin:5px;'></a>";
		 	} 
         	if($album_id==3){ 
echo "<a class='example-image-link' href='images/upload/$image_path' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/upload/$image_path' alt='' width='105' height='105' style='margin:5px;'></a>";
		 	}
         	if($album_id==4){ 
echo "<a class='example-image-link' href='images/reviews/$image_path' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/reviews/$image_path' alt='' width='105' height='105' style='margin:5px;'></a>";
		 	} 
         	if($album_id==5){ 
echo "<a class='example-image-link' href='images/articles/$image_path' data-lightbox='example-set' data-title=''>";
echo "<img class='example-image' src='images/articles/$image_path' alt='' width='105' height='105' style='margin:5px;'></a>";
		 	}
				
				echo "</a></span>";
			}
	}	?>
	</div>
</div>
<!--
<div id="rank" style="float:left;">
<?
		$sql_score="SELECT store_id,store_name, store_image, vote_score FROM store";
		$sql_score.=" ORDER BY vote_score DESC LIMIT 0,10";
		$result_score=mysql_query($sql_score)or die(mysql_error());
		$num_score=mysql_num_rows($result_score);
?>
<table class="list1" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <th colspan="3" class="header"><strong>อันดับคะแนนสูงสุด</strong></th>
  </tr>
  <tr>
    <th width="10" class="header"><strong>ลำดับ</strong></th>
    <th class="header"><strong>ร้าน</strong></th>
    <th width="50" class="header"><strong>คะแนน</strong></th>
  </tr>
<?
if($num_score>0){
  for($i=1;$i<=$num_score;$i++){
	  $row_score=mysql_fetch_array($result_score);
?>
  <tr>
    <td align="center"><img src="images/restaurant/<?=$row_score['store_image']?>" width="40" height="40"></td>
    <td align="center"><a href="index.php?mo=restaurants&do=detail&id=<? echo $row_score['store_id']?>" style="color: rgb(0, 140, 218);"><?=$row_score['store_name']?></a></td>
    <td align="center"><?=$row_score['vote_score']?></td>
  </tr>
<?
  }
}
else if($num_score==0){
?>
  <tr>
    <td colspan="4" align="center"><strong>ไม่มีข้อมูล</strong></td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="4"><strong>จำนวน : 
      <?=$num_score?>
    </strong></th>
  </tr>
</table>
</div>

<div id="rank" style="float:left;">
<?
		$sql_people="SELECT store_id, store_name, store_image, vote_value FROM store";
		$sql_people.=" ORDER BY vote_value DESC LIMIT 0,10";
		$result_people=mysql_query($sql_people)or die(mysql_error());
		$num_people=mysql_num_rows($result_people);
?>
<table class="list1" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <th colspan="3" class="header"><strong>อันดับคนโหวตสูงสุด</strong></th>
  </tr>
  <tr>
    <th width="10" class="header"><strong>ลำดับ</strong></th>
    <th class="header"><strong>ร้าน</strong></th>
    <th width="50" class="header"><strong>คะแนน</strong></th>
  </tr>
<?
if($num_people>0){
  for($i=1;$i<=$num_people;$i++){
	  $row_people=mysql_fetch_array($result_people);
?>
  <tr>
    <td align="center"><img src="images/restaurant/<?=$row_people['store_image']?>" width="40" height="40"></td>
    <td align="center"><a href="index.php?mo=restaurants&do=detail&id=<? echo $row_score['store_id']?>" style="color: rgb(0, 140, 218);"><?=$row_people['store_name']?></a></td>
    <td align="center"><?=$row_people['vote_value']?></td>
  </tr>
<?
  }
}
else if($num_people==0){
?>
  <tr>
    <td colspan="4" align="center"><strong>ไม่มีข้อมูล</strong></td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="4"><strong>จำนวน : 
      <?=$num_people?>
    </strong></th>
  </tr>
</table>
</div>

<div id="rank" style="float:left;">
<?
		$sql_aveage="SELECT store_id, store_name, store_image, vote_aveage FROM store";
		$sql_aveage.=" ORDER BY vote_score DESC LIMIT 0,10";
		$result_aveage=mysql_query($sql_aveage)or die(mysql_error());
		$num_aveage=mysql_num_rows($result_aveage);
?>
<table class="list1" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <th colspan="3" class="header"><strong>อันดับเฉลี่ยสูงสุด</strong></th>
  </tr>
  <tr>
    <th width="10" class="header"><strong>ลำดับ</strong></th>
    <th class="header"><strong>ร้าน</strong></th>
    <th width="50" class="header"><strong>คะแนน</strong></th>
  </tr>
<?
if($num_aveage>0){
  for($i=1;$i<=$num_aveage;$i++){
	  $row_aveage=mysql_fetch_array($result_aveage);
?>
  <tr>
    <td align="center"><img src="images/restaurant/<?=$row_aveage['store_image']?>" width="40" height="40"></td>
    <td align="center"><a href="index.php?mo=restaurants&do=detail&id=<? echo $row_score['store_id']?>" style="color: rgb(0, 140, 218);"><?=$row_aveage['store_name']?></a></td>
    <td align="center"><?=$row_aveage['vote_aveage']?></td>
  </tr>
<?
  }
}
else if($num_aveage==0){
?>
  <tr>
    <td colspan="4" align="center"><strong>ไม่มีข้อมูล</strong></td>
  </tr>
<?
}
?>
  <tr>
    <th class="footer" colspan="4"><strong>จำนวน : 
      <?=$num_aveage?>
    </strong></th>
  </tr>
</table>
</div>
</div>-->