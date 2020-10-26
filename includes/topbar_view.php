<div id="topbar">
<? 	$sql="SELECT * FROM member WHERE member_id='$_SESSION[login_id]' ";
	$result=mysql_query($sql) or die(mysql_error());
	list($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)=mysql_fetch_row($result);
	
?>	<div id="topbar_menu">
		<ul>
			<li><img src="images/web/search_icon.png" width="30" height="30" style="float:left; margin-left:-45px;">
            <?			if($select_search==1){ $sele1="selected";} else{$sele1="";}
						if($select_search==2){ $sele2="selected";} else{$sele2="";}
						if($select_search==3){ $sele3="selected";} else{$sele3="";}
						if($select_search==4){ $sele4="selected";} else{$sele4="";}
			?>
            	<form action="" method="get" name='filter'>
                	<input type='hidden' name='mo' value='review'>
					<input type='hidden' name='do' value='search'>
                	<input name="keyword" type="text" value="<?=$_GET[search]?>" size="60" placeholder=" ค้นหาร้านค้า">
                    <!--<select name="select_search" onChange="document.filter.submit();">
                      <option value="0" <?=$sele0?>>ทั้งหมด</option>
                      <!--<option value="1" <?=$sele1?>>ร้านค้า</option>
                      <option value="2" <?=$sele2?>>แผนที่</option>
                      <option value="3" <?=$sele3?>>สถานที่</option>-->
                    <!--</select>-->
             	</form>
            </li>
			<li>
            	<a href="index.php?mo=member&do=login">Sign in</a> 
                or
                <a href="index.php?mo=member&do=register">Register</a>
            </li>
		</ul>
    </div>
</div>