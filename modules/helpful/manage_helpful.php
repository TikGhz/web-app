<div id="content">
<? 
	$sql_helpful="SELECT * FROM helpful";
	$result_helpful=mysql_query($sql_helpful) or die (mysql_error());
	list($helpful_detail,$helpful_date)=mysql_fetch_row($result_helpful);
?>
<form action="../helpful/index.php?mo=helpful&do=update_helpful" method="post">
<textarea class="ckeditor" name="helpful_detail"><? echo $helpful_detail; ?></textarea>
<input type="submit" value="บันทึก"/>
</form>
</div>