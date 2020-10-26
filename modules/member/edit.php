<!--<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style type="text/css">
body, td, th {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: #000000;
}
</style>
</head>

<body>-->
<div id="content">
<?
	$sql="SELECT * FROM member ";
?>
<form action="index.php?mo=member&do=" method="post" enctype="multipart/form-data" name="form1">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="txtback">
	<tbody>
		<tr>
			<td height="35" colspan="2" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<div align="center"><span class="style1 style5 style3">* สำหรับท่านที่ เป็นสมาชิกแล้ว กรุณาติดต่อ...</span></div>
            </td>
		</tr>
		<tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6">
                <strong>* Username </strong>
                <br> ( <font color="#ff0000">ตัวอักษรภาษาอังกฤษ หรือตัวเลข <br>
                ความยาวตั้งแต่ 6 ขึ้นไป </font> )
                </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fusername" type="text" id="fusername" value="">&nbsp;
			</td>
		</tr>
    <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* Password </strong>
                <br> ( <font color="#ff0000">ตัวอักษรภาษาอังกฤษ หรือตัวเลข <br> 
                ความยาวตั้งแต่ 6 ขึ้นไป </font> )
                </span>
		  </td>
  <td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fpassword" type="text" id="fpassword" value="">&nbsp;
			</td>
	  </tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* Confirm Password</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="cfpass" type="text" id="cfpass" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* ชื่อ</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fname" type="text" id="fname" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* นามสกุล</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="flastname" type="text" id="flastname" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <span class="style6"><strong>* บัตรประชาชน </strong>
				<br> ( <font color="#ff0000">ควรเป็นตัวเลขเท่านั้น </font> )
              </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fidcard" type="text" id="fidcard" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* ที่อยู่ปัจจุบัน</strong></span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="faddress" type="text" id="faddress" value="">&nbsp;
			</td>
		</tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<span class="style6"><strong>* เบอร์โทรศัพท์ติดต่อ </strong>
                <br> ( <font color="#ff0000">ควรเป็นตัวเลขเท่านั้น </font> )
                </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
            	<input name="fphone" type="text" id="fphone" value="">&nbsp;
			</td>
		</tr>
        <tr>
		  <td height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			<span class="style6"> <strong>* อีเมล </strong>
                <br> ( <font color="#ff0000"> ควรเป็นอีมเล ที่ใช้งานได้จริง</font> ) 
            </span>
			</td>
          <td align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->"><input name="femail" type="text" id="femail" value="">
            &nbsp; </td>
        </tr>
        <tr>
			<td width="284" height="35" align="right" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <span class="style6"><strong>* รูปประจำตัว หรือ โลโก้ร้าน </strong>
				<br> ( <font color="#ff0000"> ควรมี่ขนาดไม่เกิน 200px </font> ) 
              </span>
			</td>
			<td width="259" align="left" valign="middle" style="<!--BORDER-BOTTOM: #7AC0EF 1px solid-->">
			  <input type="file" name="fpix" id="fpix">&nbsp;
			</td>
		</tr>
	</tbody>
</table>
<p align="center"><input type="submit" name="button" id="button" value="ยืนยัน"></p>
</form>
</div>
<!--</body>
</html>-->