<?
	session_start();
	$module=$_GET['mo'];
	$file=$_GET['do'];
	include("includes/connectserver.php");
	include("fb/fb_connect.php");
	if($_GET[logout]){ ?> 
	<script langauge="JavaScript">
		window.location.reload();
	</script>
	<? }
	$sql_setting="SELECT set_logo,set_title,set_description,set_keyword,set_bottom FROM setting";
	$result_setting=mysql_query($sql_setting) or die (mysql_error());
	list($set_logo,$set_title,$set_description,$set_keyword,$set_bottom)=mysql_fetch_row($result_setting);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><? echo $set_title; ?></title>
<META NAME="KEYWORDS" CONTENT="<? echo $set_keyword; ?>">
<META NAME="DESCRIPTION" CONTENT="<? echo $set_description; ?>">
<link rel="stylesheet" type="text/css" href="css/view1.css">
<script type="text/javascript" src="javascript/jquery-2.0.2.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
$("#main_menu > ul > a").hover(function(){
		$(this).find("a").css("color","#f1f1f1");
		$(this).find(".arrow").css("background-image","url(images/web/arrow-hover.png)");
		$(this).find(".dash").css("background-image","url(images/web/dash-hover.png)");
		$(this).find(".pencil").css("background-image","url(images/web/pencil-hover.png)");
	},function(){
		$(this).find("a").css("color","#95a0aa");
		$(this).find(".arrow").css("background-image","url(images/web/arrow.png)");
		$(this).find(".dash").css("background-image","url(images/web/dash.png)");
		$(this).find(".pencil").css("background-image","url(images/web/pencil.png)");
	});
	$(".review-info").hover(function(){
		$(this).find(".review-name").css("display", "block");
	},function(){
		$(this).find(".review-name").css("display", "none");
	});

});
</script>
</head>

<body>
<div id="container">
	<div id="top">
    	
    </div>
    <div id="min">
        <div id="left">
            <?php include("includes/main_menu.php"); ?>
            <img src="images/web/sponser.jpg" width="230" height="436" border="0" usemap="#Map" style="padding:23px; background-color:#FFF;">
            <map name="Map">
            <area shape="rect" coords="116,353,192,427" href="#" target="_blank"><area shape="rect" coords="35,351,111,425" href="#" target="_blank">
            <area shape="rect" coords="155,265,231,339" href="#" target="_blank"><area shape="rect" coords="78,267,154,341" href="#" target="_blank">
            <area shape="rect" coords="-1,266,75,340" href="#" target="_blank"><area shape="rect" coords="154,185,230,259" href="#" target="_blank">
            <area shape="rect" coords="77,185,153,259" href="#" target="_blank">
            <area shape="rect" coords="0,184,76,258" href="#" target="_blank">
            <area shape="rect" coords="155,95,231,169" href="#" target="_blank">
            <area shape="rect" coords="78,94,154,168" href="#" target="_blank">
            <area shape="rect" coords="-2,95,74,169" href="#" target="_blank">
            <area shape="rect" coords="154,9,230,83" href="#" target="_blank">
            <area shape="rect" coords="77,9,153,83" href="#" target="_blank">
            <area shape="rect" coords="-2,9,74,83" href="http://www.tourismthailand.org" target="_blank">
          </map>
        </div>
        <div id="cen">
            <?php 
				if($_SESSION['login_status']=="valid_user"){ include("includes/topbar.php"); }
				else{ include("includes/topbar_view.php"); }
			?>
            <div class="clear"></div>
            
            <div id="bottombar">
            	<div>
                	<div style="float:left;">
                    	<p style="font-size:39px; font-weight:normal; font-family:'Myriad Pro'; color:#444444; text-shadow: 0.1em 0.1em 0.2em white">Chiangmai Restaurant Club</p>
               		<p style="font-size:16px;">ชมรมภัตตาคารและร้านอาหารจังหวัดเชียงใหม่</p>
                    </div>
                   
                  <div style="float:right;">
                    	<div style="float:left; width:57px; height:57px; background-color:#1fbba6; color:#ffffff;">
                        	<div style=" margin-left:2px; margin-top:2px;">
                            <a href="index.php?mo=review&do=search">
                            <img src="images/web/icon_reviewss.png" width="53" height="53">
                            </a>
                            </div>
                        </div>
<a href="index.php?mo=review&do=search">
<div style="float:left; width:120px; height:55px; background-color:#1fbba6; color:#FFF; margin-top:1px; -moz-box-shadow: 1px 1px 5px #ccc; -webkit-box-shadow: 1px 1px 1px #ccc; box-shadow: 1px 1px 15px #ccc;">
  <h5 style="margin-top:10px; text-align:center;">Search <br> Write A Review</h5>
</div>
</a>
                  </div>
                </div>
                
                <div class="clear"></div>

                <? 	if($module){ ?>
				<div class="breadcrumb">
                    <ul>
		<li class="bread1"><a href="index.php">Home</a></li>
		<li class="bread2"><a href="index.php"><? echo $_GET['mo']; ?></a></li>
	<? 	$sub_letter=substr($_GET['do'], 0, 6);
		$sub_letter2=substr($_GET['do'], 0, 4);
		if($_GET['do']==index || $_GET['do']==""){}
		elseif($sub_letter==manage || $sub_letter==insert || $sub_letter==update || $sub_letter==delete){
	?>	<li class="bread3"><a href="index.php"><? echo $sub_letter; ?></a></li>
	<?	}elseif($sub_letter2==edit || $sub_letter2=="list"){
	?>	<li class="bread3"><a href="index.php"><? echo $sub_letter2; ?></a></li>
    <?	}else{ ?>
			<li class="bread3"><a href="index.php"><? echo $_GET['do']; ?></a></li>
	<?	}	?>
					</ul>
				</div>
                
                <div class="clear"></div>
                <?		if($file==""){require("modules/$module/index.php");}
						else{require("modules/$module/$file.php");}
					}else{require("modules/index/index.php");} ?>
                
            </div>
            
        </div>
	</div>
    <div class="clear"></div>
	<div id="footer">
    	<h3><? echo $set_bottom; ?></h3>
    </div>
</div>
</body>
</html>