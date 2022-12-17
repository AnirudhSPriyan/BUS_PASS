<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
include('dbconnection.php');

$name=$_POST['name'];
$email=$_POST['email'];
$ktu=$_POST['ktu'];
$boarding=$_POST['boarding'];

$sql="INSERT INTO registered VALUES('$ktu','$name','$email','$boarding',0)";  
if(mysqli_query($conn, $sql)){  
 echo "<p>applied for bus-pass successfully</p>";
  
 $mail = new PHPMailer(true);
  
 try {
     $mail->SMTPDebug = 2;                                       
     $mail->isSMTP();                                            
     $mail->Host       = 'smtp.gmail.com;';                    
     $mail->SMTPAuth   = true;                             
     $mail->Username   = 'anirudhspriyan@cet.ac.in';                 
     $mail->Password   = 'Anirudh@2020';                        
     $mail->SMTPSecure = 'tls';                              
     $mail->Port       = 587;  
   
     $mail->setFrom('anirudhspriyan@cet.ac.in','CET BUS-PASS MANAGEMENT SYSTEM');           
     $mail->addAddress("$email");
        
     $mail->isHTML(true);                                  
     $mail->Subject = 'Application for Bus Pass';
     $mail->Body    = 'Your application for CET bus-pass has been successfully submitted.
                      Please login to check approval status. Approval usually takes 2-3 business days 
                      ';
    //  $mail->AltBody = 'Body in plain text for non-HTML mail clients';
     $mail->send();
     echo "Mail has been sent successfully!";
   } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
 
}
else
{  
  echo "Could not insert record: ". mysqli_error($conn);  
}  
  
echo "<a href='./home.html'>Return to Home Page</a>";
mysqli_close($conn);  
?>