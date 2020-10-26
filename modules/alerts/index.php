<!-- Content news -->
<div id="content">
<? 	if($_SESSION[login_status]!="valid_user"){
		echo "<script language='javascript'>alert('กรุณาเข้าสุ่ระบบ')</script>";
	}else{
		if($_GET[id]){ ?>
<h4 style="padding-bottom:15px; border-bottom:1px solid #ccc; margin-bottom:20px;">ระบบแจ้งเตือน - รายละเอียด </h4>	
<?		$sql="SELECT * FROM alerts WHERE alerts_id='$_GET[id]' ORDER BY alerts_id DESC LIMIT 0,10";
		$result=mysql_query($sql) or die(mysql_error());
		list($a,$b,$c,$d)=mysql_fetch_row($result); ?>
			<div class="news-block">
					<img src="images/web/arrow.png" width="25" height="25" style="position:absolute; margin-top:7px; margin-left:-15px;">
					<div class="news-title"><? echo "<div style='font-size:15px;'>",$b,"</div>"; ?></div>
					<div class="news-detail" style="margin-left:20px;">
						<? list($year,$month,$day)=explode("-",substr($c,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($c,10,14));?>
                        <div class="review-date-left">
						<? echo "เมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                        </div>
                    </div>
			</div>
<?		}else{ ?>
<h4 style="padding-bottom:15px; border-bottom:1px solid #ccc; margin-bottom:20px;">ระบบแจ้งเตือน - หัวข้อ </h4>
<?
			$sql="SELECT * FROM alerts ORDER BY alerts_id DESC LIMIT 0,10";
			$result=mysql_query($sql) or die(mysql_error());
			while(list($a,$b,$c,$d)=mysql_fetch_row($result)){
?>
			<div class="news-block">
					<img src="images/web/arrow.png" width="25" height="25" style="position:absolute; margin-top:7px; margin-left:-15px;">
					<div class="news-title">
                    <a href="index.php?mo=alerts&do=index&id=<?=$a;?>" style="color: rgb(0, 140, 218); font-size:14px;">
                    	<? echo mb_strimwidth($b, 0,80, "...", "UTF-8");?>
                    </a>
                    </div>
					<div class="news-detail" style="margin-left:20px;">
						<? list($year,$month,$day)=explode("-",substr($c,0,10));?>
                        <? list($hour,$minute,$second,$hms)=explode(":",substr($c,10,14));?>
                        <div class="review-date-left">
						<? echo "เมื่อ: $day/$month/",($year+543)," $hour:$minute:$second"; ?>
                        </div>
                    </div>
			</div>
<? 	} }	} ?>
</div>
<!-- End news -->