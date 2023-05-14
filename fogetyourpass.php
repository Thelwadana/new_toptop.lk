<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<html>
    <head>
        <title>Password Recovery using PHP and MySQL</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <h2>Forgot Password</h2>   

                    <?php
                        require_once('connection.php');
                        if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                           
                            
                            //$output = '';

                            //$expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                           // $expDate = date("Y-m-d H:i:s", $expFormat);
                           // $key = md5(time());
                           // $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                           // $key = $key . $addKey;

                            //Insert Temp Table
                           // mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");
                           // $output.='<p>Please click on the following link to reset your password.</p>';

                            //replace the site url
                           // $output.='<p><a href="http://localhost/tutorial/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/tutorial/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                          //  $body = $output;
                          //  $subject = "Password Recovery";
                          //  $email_to = $email;

                            //autoload the PHPMailer
$cus_name = "Nirmal";
$cus_email = $_POST["email"];
$cus_subject = 'test';
$cus_message = 'test';


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
                    }
                    
                    ?>
                    <form method="post" action="" name="reset">
                        

                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                        </div>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>
