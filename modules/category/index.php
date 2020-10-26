<!-- Content category -->
<div class="section-block">
<div class="column-center">

<? 	
	$sql_type_store="SELECT * FROM type_store ";
	$result_type_store=mysql_query($sql_type_store) or die(mysql_error());
	$i=0;
	while(list($type_store_id, $type_name)=mysql_fetch_row($result_type_store)){
		$sql_store="SELECT * FROM store WHERE type_store_id='$type_store_id'";
		$result_store=mysql_query($sql_store) or die(mysql_error());
		$num_store=mysql_num_rows($result_store);
	if($num_store==0){}
	else{
?>		
	<div class="category-bl">
<?		$sql_store="SELECT * FROM store WHERE type_store_id='$type_store_id'";
		$result_store=mysql_query($sql_store) or die(mysql_error());
		echo "<a href='index.php?mo=category&do=detail&id=$type_store_id' style='color: rgb(0, 140, 218);'><h3>";
		echo $type_name," (",$num_store,")";
		echo "</h3></a>";

		$sql_store="SELECT store_id,store_business,store_name,store_address,img_cat FROM store WHERE type_store_id='$type_store_id' ORDER BY store_id DESC LIMIT 0,8";
		$result_store=mysql_query($sql_store) or die(mysql_error());
		while(list($store_id,$store_business,$store_name,$store_address,$img_cat)=mysql_fetch_row($result_store)){
	?>
		<div class="category-block">
		<div class="category-list">
				<a href="index.php?mo=restaurants&do=detail&id=<? echo $store_id; ?>"><img src="images/category/<?=$img_cat;?>" width="100" height="100">
			<div class="category-info">
					<h3 class="category-name"><? echo $store_business;?></h3>
                <div class="clear"></div>
                <div class="category-detail"><? echo $store_name;?></div>
			</div>
            	</a>
		</div>  
		</div>
    
	<?	} ?>
	</div>   
<?	if($i==2){ echo "<div class='clear'></div>";}
	$i++;
	} }?>

</div>
</div>
<!-- End category -->