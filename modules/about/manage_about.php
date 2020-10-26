<div id="content">
<? 
	$sql_about="SELECT * FROM about";
	$result_about=mysql_query($sql_about) or die (mysql_error());
	list($about_detail,$about_date)=mysql_fetch_row($result_about);
?>
<form action="index.php?mo=about&do=update_about" method="post">
<textarea class="ckeditor" name="about_detail"><? echo $about_detail; ?></textarea>
<input type="submit" value="บันทึก"/>
</form>
<div id="aside"></div>
<aside></aside>
</div>