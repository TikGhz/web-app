<?
if($_SESSION[type_member]==admin){}
elseif(button_Setting){InsertSetting("$_POST[flogo]","$_POST[fsite]","$_POST[description]","$_POST[about]","$_POST[contact]","$_POST[advertise1]","$_POST[advertise2]","$_POST[starts1]","$_POST[starts2]");}
else{ echo "คุณไม่มีสิทธิ์เข้าหน้านี้";}

//------------------------------------------------------------
	function ShowAlbum(){
		$sql="SELECT * FROM album";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertAlbum(){
		$sql="INSERT INTO album VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteAlbum(){
		$sql="DELETE FROM album";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateAlbum(){
		$sql="UPDATE album SET album_name=album_name";
		mysql_query($sql) or die(mysql_error());	
	}
//------------------------------------------------------------
	function ShowAlerts(){
		$sql="SELECT * FROM alerts";
		mysql_query($sql) or die(mysql_error());	
	}
	function InsertAlerts(){
		$sql="INSERT INTO alerts VALUES()";
		mysql_query($sql) or die(mysql_error());	
	}
	function DeleteAlerts(){
		$sql="DELETE FROM alerts ";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateAlerts(){
		$sql="UPDATE alerts SET alerts_detail=alerts_detail";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowComment(){
		$sql="SELECT * FROM comment";
		mysql_query($sql) or die(mysql_error());	
	}
	function InsertComment(){
		$sql="INSERT INTO comment VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteComment(){
		$sql="DELETE FROM comment";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateComment(){
		$sql="UPDATE comment SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowImage(){
		$sql="SELECT * FROM image";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertImage(){
		$Image_pix=$_FILES['Image']['name'];
		$Image_tmp=$_FILES['Image']['tmp_name'];
		copy($book_tmp,"../images/$Image_pix");
	
		$sql="INSERT INTO image VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteImage(){
		$sql="DELETE FROM image";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateImage(){
		$sql="UPDATE image SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowMember(){
		$sql="SELECT * FROM member";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertMember(){
		$sql="INSERT INTO member VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteMember(){
		$sql="DELETE FROM member";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateMember(){
		$sql="UPDATE member SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowNews(){
		$sql="SELECT * FROM news";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertNews(){
		$sql="INSERT INTO news VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteNews(){
		$sql="DELETE FROM news";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateNews(){
		$sql="UPDATE news SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowPromotion(){
		$sql="SELECT * FROM promotion";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertPromotion(){
		$sql="INSERT INTO promotion VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeletePromotion(){
		$sql="DELETE FROM promotion";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdatePromotion(){
		$sql="UPDATE promotion SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowSetting($logo,$title,$description,$about,$contact,$advertise1,$advertise2,$starts1,$starts2){
		$sql="SELECT * FROM setting";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertSetting($logo,$title,$description,$about,$contact,$advertise1,$advertise2,$starts1,$starts2){
		$sql="INSERT INTO setting VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteSetting($logo,$title,$description,$about,$contact,$advertise1,$advertise2,$starts1,$starts2){
		$sql="DELETE FROM setting";
		mysql_query($sql) or die(mysql_error());			
	}
	function UpdateSetting($logo,$title,$description,$about,$contact,$advertise1,$advertise2,$starts1,$starts2){
		$sql="UPDATE setting SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowStore(){
		$sql="SELECT * FROM store";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertStore(){
		$sql="INSERT INTO store VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteStore(){
		$sql="DELETE FROM store";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateStore(){
		$sql="UPDATE store SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowTypeAlerts(){
		$sql="SELECT * FROM type_alerts";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertTypeAlerts(){
		$sql="INSERT INTO type_alerts VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteTypeAlerts(){
		$sql="DELETE FROM type_alerts";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateTypeAlerts(){
		$sql="UPDATE type_alerts SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowTypeLocation(){
		$sql="SELECT * FROM type_location";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertTypeLocation(){
		$sql="INSERT INTO type_location VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteTypeLocation(){
		$sql="DELETE FROM type_location";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateTypeLocation(){
		$sql="UPDATE type_location SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowTypeMember(){
		$sql="SELECT * FROM type_member";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertTypeMember(){
		$sql="INSERT INTO type_member VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteTypeMember(){
		$sql="DELETE FROM type_member";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateTypeMember(){
		$sql="UPDATE type_member SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowTypeNews(){
		$sql="SELECT * FROM type_news";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertTypeNews(){
		$sql="INSERT INTO type_news VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteTypeNews(){
		$sql="DELETE FROM type_news";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateTypeNews(){
		$sql="UPDATE type_news SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowTypeStore(){
		$sql="SELECT * FROM type_store";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertTypeStore(){
		$sql="INSERT INTO type_store VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteTypeStore(){
		$sql="DELETE FROM type_store";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateTypeStore(){
		$sql="UPDATE type_store SET";
		mysql_query($sql) or die(mysql_error());
	}
//------------------------------------------------------------
	function ShowVote(){
		$sql="SELECT * FROM vote";
		mysql_query($sql) or die(mysql_error());
	}
	function InsertVote(){
		$sql="INSERT INTO vote VALUES()";
		mysql_query($sql) or die(mysql_error());
	}
	function DeleteVote(){
		$sql="DELETE FROM vote";
		mysql_query($sql) or die(mysql_error());
	}
	function UpdateVote(){
		$sql="UPDATE vote SET";
		mysql_query($sql) or die(mysql_error());
	}
?>