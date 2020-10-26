<?php
	session_start();
	$module=$_GET['mo'];
	$file=$_GET['do'];
	if($_GET[logout]){ ?> 
	<script langauge="JavaScript">
		window.location.reload();
	</script>
	<? }
//connect ฐานข้อมูล
$host = "localhost";
$user = "cistrain_nonh";
$pwd = "1qaz2wsx";
$db = "cistrain_nonh";
global $link;
$link = mysql_connect($host,$user,$pwd) or die ("Could not connect to MySQL");
mysql_query("SET NAMES UTF8",$link);
mysql_select_db($db,$link) or die ("Could not select $db database");

	$store_name = array(); // ตัวแปรแกน x
	$vote_score = array(); //ตัวแปรแกน y
//sql สำหรับดึงข้อมูล จาก ฐานข้อมูล
if($_GET[search]==""){
	$_GET[search]=vote_aveage;
}
	$sql = "SELECT store.store_name, store.$_GET[search] FROM store ORDER BY $_GET[search] DESC LIMIT 0,5";
//จบ sql
$result = mysql_query($sql);
while($row=mysql_fetch_array($result)) {
//array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
 array_push($vote_score,$row[$_GET[search]]);
 array_push($store_name,$row[store_name]);
}
if($_GET[search]==vote_score){ $vote="คะแนนโหวต";}
elseif($_GET[search]==vote_value){ $vote="คนโหวต";}
elseif($_GET[search]==vote_aveage){ $vote="ค่าเฉลี่ย";}

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
  <!--<link rel="stylesheet" type="text/css" href="css/view1.css">-->
  <script type="text/javascript" src="javascript/jquery-2.0.2.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<!--<script src="http://code.highcharts.com/modules/exporting.js"></script>-->     
        <script>
 $(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar' //รูปแบบของ แผนภูมิ ในที่นี้ให้เป็น line
            },
            title: {
                text: 'จำนวนร้านค้า' //
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: ['<?= implode("','", $store_name); //นำตัวแปร array แกน x มาใส่ ในที่นี้คือ เดือน?>']
            },
            yAxis: {
                title: {
                    text: '<? echo "จำนวน",$vote," (ราย)";?>'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'ราย';
                }
            },
   legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 100,
                            borderWidth: 0
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                                name: '<? echo "จำนวน",$vote; ?>',
                                data: [<?= implode(',', $vote_score) // ข้อมูล array แกน y ?>]
                            }]
        });
    });
        </script>
    </head> 
    <body style="width:1000px; margin:0 auto;">
    	<div><? include("includes/main_manage.php"); ?></div>
        <div class="clear"></div>
	<div>
    <?	if($module){	
			if($file==""){	
				require("modules/$module/index.php");
			}else{
				require("modules/$module/$file.php");
				echo "<link rel='stylesheet' type='text/css' href='css/view1.css'>";
			}
		}else{	?>
		<div style="z-index:9999; width: 1000px; position:absolute; margin-left:0px; margin-top:50px;">
                <form name="form_row" method="get">
                <? if($_GET[search]=="vote_score"){ $vote_score='selected';  ?>
                <? }elseif($_GET[search]=="vote_value"){ $vote_value='selected';  ?>
                <? }elseif($_GET[search]=="vote_aveage"){ $vote_aveage='selected'; } ?>
                <select name='search' style="padding:5px; float:right" onChange="document.form_row.submit();">
                  <option value="" <?=$sr20;?> >เลือกข้อมูลแสดง</option>
                  <option value="vote_score" <?=$vote_score;?> >คะแนนโหวต</option>
                  <option value="vote_value" <?=$vote_value;?> >จำนวนคนโหวต</option>
                  <option value="vote_aveage" <?=$vote_aveage;?> >ค่าเฉลี่ย</option>
                </select>
                </form>
		</div>
        <div style="z-index:9998; width: 1000px; position:absolute; margin-left:950px; margin-top:20px;">
                <a href="index.php" style="padding:5px; background-color:#F7F7F7; border:1px solid #999;">Home</a>
		</div>
		<div id="container" style="min-width: 1000px; height: 600px; margin: 0 auto; position:relative;">
		</div>
	<?	}	?>
	</div>
    </body>
</html>