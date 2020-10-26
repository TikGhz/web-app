<?php
	mysql_connect("localhost","cistrain_nonh","1qaz2wsx") or die(mysql_error());
	mysql_select_db("cistrain_nonh") or die(mysql_error());
	mysql_query("SET character_set_results=utf8") or die(mysql_error());
	mysql_query("SET character_set_client=utf8") or die(mysql_error());
	mysql_query("SET character_set_connection=utf8") or die(mysql_error());
	mysql_query("SET NAMES UTF8") or die(mysql_error());
?>