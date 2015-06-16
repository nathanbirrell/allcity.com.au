
<?php 

if(isset($_POST['email'])){

	$from=$_POST["email"];
	// Email Receiver Address
	$receiver="info@yourdomain.com";
	$subject="Newsletter Subscription";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$message="
	<table width='50%' border='0' align='center' cellpadding='0' cellspacing='0'>
	<tr>
	<td colspan='2' align='center' valign='top'><img style=' margin-top: 15px; ' src='http://www.yourdomain.com/images/logo.png' width='135'></td>
	</tr>
	<tr>
	<td width='50%' align='right'>&nbsp;</td>
	<td align='left'>&nbsp;</td>
	</tr>
	<tr>
	<td height='35' align='right' style='border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding-right:5px;'>Email:</td>
	<td align='left' style='border-top:1px solid #dfdfdf; border-bottom:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding-left:5px;'>".$from."</td>
	</tr>
	</table>
	";
	$headers .= 'From: <'.$from.'>' . "\r\n";


   if(mail($receiver,$subject,$message,$headers))  
   {
	   //Success Message	   
      echo "The message has been sent!";
   }
   else
   {
	   //Fail Message	   
      echo "The message could not been sent!";
   }
}

?>

