<!-- Content news -->
<div id="content">
	<h4 style="padding-bottom:15px; border-bottom:1px solid #ccc; margin-bottom:20px;">ข่าวจากชมรม <? if($_SESSION[login_type]>'1' || $_SESSION[login_type]<'1'){ 
				echo "ขออภัย คุณไม่มีสิทธิ์เข้าถึงข้อมูลส่วนนี้"; }
			else{ if($_SESSION[login_type]=='1'){?>
            <a href="index.php?mo=news&do=manage_news" style="margin-right:10px; float:right; font-size:11px; font-weight:200;">เพิ่ม </a>
        <?	}}?></h4>
<? 	$sql="SELECT * FROM news ORDER BY news_id DESC LIMIT 0,10";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c,$d,$e)=mysql_fetch_row($result)){
?>
	<div class="news-block">
    		<img src="images/web/arrow.png" width="25" height="25" style="position:absolute; margin-top:7px; margin-left:-15px;">
			<div class="news-title"><? echo $b; ?></div>
            <div class="news-detail"><? echo $c; ?></div>
	</div>
<? } ?>
</div>
<!-- End news -->