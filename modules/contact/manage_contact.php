<div id="content">
<? 
	$sql_contact="SELECT * FROM contact";
	$result_contact=mysql_query($sql_contact) or die (mysql_error());
	list($contact_detail,$contact_date)=mysql_fetch_row($result_contact);
?>
<form action="../contact/index.php?mo=contact&do=update_contact" method="post">
<textarea class="ckeditor" name="contact_detail"><? echo $contact_detail; ?></textarea>
<input type="submit" value="บันทึก"/>
</form>
</div>