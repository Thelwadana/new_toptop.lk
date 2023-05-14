<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$cus_name = $_GET['clientname'];
$cus_email = $_GET['clientemail'];
$cus_subject = $_GET['clientsubject'];
$cus_message = $_GET['clientmessage'];


$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 0; 
$mail->SMTPAuth = true;       
$mail->SMTPSecure = 'tls';  
$mail->Port = 587;
$mail->Host = 'smtp.gmail.com'; 
$mail->Username = 'efgweb14@gmail.com';           
$mail->Password = 'mtezacltqqlrhjfl';  


$mail->From = "$cus_name via www.efg.lk";
$mail->FromName = 'Eye For Growth(Pvt) Ltd';
$mail->Subject = "$cus_subject ($cus_name via efg.lk)";
$mail->AddAddress('info@efg.lk', "EFG official");//Provide Company email
$mail->SetFrom($cus_email, "Sent via www.efg.lk : ",$cus_subject);
$mail->AddReplyTo($cus_email, $cus_name);
$companyName="Eye For Growth(Pvt) Ltd";

$content = '<html>
<head>
<style type="text/css">
body table tr {
	font-family: Arial, Helvetica, sans-serif;
}
body table tr {
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
</head>
<body>
<center><img src="http://www.courselanka.byethost7.com/img/ecolanka.png" width="100" alt="logo"><center>
<br>
<table width="100%" height="78" align="center" cellpadding="10">
<tr>
  <td width="649" height="72" bgcolor="#B7EDFF"><div align="" style="width: 100%; padding:5px; font-family: Georgia, "Times New Roman", Times, serif; font-size: 24px; color: #32CD32;">
<p style="color: #663399; font-size: 25px; font-weight: bold;" align="center">'.$companyName.'</p>

<HR>
<p><h3>Customer Name : '.$cus_name.' </h3></p>
<p><h3>Customer Email : '.$cus_email.' </h3></p>
<p><h3>Customer Subject : '.$cus_subject.'</h3></p>
<p><h3>Message : '.$cus_message.' </h3></p>

<p>&nbsp;</p>
<p>Thank you.</p>
<p>System,</p>
<p>www.efg.lk</p>
<P>'.date("Y-m-d").'</p>
<p>&nbsp;</p>
</div></td>
  </tr>
</table>

</body>
</html>';

$mail->MsgHTML($content); 
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error while sending Email. Please try again or Contact : +94776586586 ";
  //var_dump($mail);
} else {
  echo "Email sent successfully";
}
?>