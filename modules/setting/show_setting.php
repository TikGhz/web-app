<? 	$sql="SELECT * FROM setting";
	$result=mysql_query($sql) or die(mysql_error());
	while(list($a,$b,$c,$d,$e,$f,$g,$h,$i)=mysql_fetch_row($result)){
?>
	<div class="setting_block">
			<a href="#"><img src="images/<? echo $a;?>"></a>
            <h3 class="articles-name"><? echo "Title = ",$b;?></h3>
            <p class="articles-posttime"><? echo "Description =",$c;?></p>
            <p class="articles-posttime"><? echo "Keyword =",$d;?></p>
            <p class="articles-posttime"><? echo "Contact =",$e;?></p>
            <p class="articles-posttime"><? echo "Advertise1 =",$f;?></p>
            <p class="articles-posttime"><? echo "Advertise2 =",$g;?></p>
            <p class="articles-posttime"><? echo "Starts1 =",$h;?></p>
            <p class="articles-posttime"><? echo "Starts2 =",$i;?></p>
	</div>
<? } ?>