<div id="content">
<?
	$sql="SELECT * FROM news WHERE news_id='$_GET[id]'";
	$result=mysql_query($sql) or die (mysql_error());
	list($a,$b,$c,$d,$e)=mysql_fetch_row($result);
?>
	<div class="news-headder"><h4><? echo $b;?></h4></div>
    <div class="clear"></div>
    <div class="news-headders"><? echo "โพสเมื่อ: ",$d;?></div>
    <div class="clear" style="height:30px;"></div>
    <div class="news-content"><? echo $c;?></div>
</div>