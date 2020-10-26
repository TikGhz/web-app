<div id="content">
<? 
	$sql_about="SELECT * FROM about";
	$result_about=mysql_query($sql_about) or die (mysql_error());
	list($about_detail,$about_date)=mysql_fetch_row($result_about);
	echo $about_detail; 
?>
</div>