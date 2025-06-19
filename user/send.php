<?php

if(isset($_GET["DrName"]))
{
$demail=$_GET["Email"];
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
$newEmail = $_GET['new_email'];
$name=$_GET['name'];
$date=$_GET['date'];
}


    $to      = $demail;
    $subject = 'Book Appointment';
    $message = "Patient name".$name."Date of appointment".$date;
    $headers = '$newEmail'       . "\r\n" .
                 'Reply-To:'.$to . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $message, $headers)) 
{
      echo "Your Mail is sent successfully."; 
}
  else{
      echo "Your Mail is not sent. Try Again."; 
   
?>