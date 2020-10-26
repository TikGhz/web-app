<div id="content">
<?
	$sql="SELECT * FROM articles WHERE articles_id='$_GET[id]'";
	$result=mysql_query($sql) or die (mysql_error());
	list($a,$b,$c,$d,$e)=mysql_fetch_row($result);
?>
	<div class="articles-headder"><? echo $b;?></div>
    <div class="clear"></div>
    <div class="articles-headder"><? echo "Posted: ",$e;?></div>
    <div class="clear" style="height:30px;"></div>
    <div class="articles-content"><? echo $c;?></div>
</div>