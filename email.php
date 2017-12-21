<?php
 //sending mail
   if(isset($_POST['submit'])) {
 $firstname = $POST_['fnm'];
  $lastname = $POST_['lnm'];
  $email = $_POST['email'];
  $subject = "Application for Dealership recieved";
  $body ="Thank you for applying to a dealership with VihaanInnovatives,Kindly wait for our response,we will reach you shortly";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: shahidrazorbee@gmail.com' . "\r\n";
  mail($email,$subject,$body,$headers);
  $title=$POST_['title'];
    $firstname = $POST_['fnm'];
    $lastname = $POST_['lnm'];
    $company=$POST_['cnm'];
    $address=$POST_['caddress'];
    $state=$POST_['state1'];
    $city=$POST_['city1'];
    $code=$POST_['zcode1'];
    $email = $_POST['email'];
    $mobile=$POST_['mob'];
    $phone=$POST_['phone1'];
    $nature=$POST_['nat'];
    $brand=$POST_['products'];
     if($ownership== 'other')
     {
       $own=$POST_['ownership'];
     }
       else
       {
         $own=$POST_['other'];
       }
     $message=$POST_['message'];
     $to="shahidrazorbee@gmail.com"
    $subject = "Application for Dealership";
    $body ="Name:" .$title.":".$firstname."".$lastname. "\r\n".
    "Company Name:" .$company. "\r\n".
    "Address:" .$address."," .$state. "," .$city. "-" .$code. "\r\n".
    "Mobile:" .$mobile. "\r\n".
    "Phone:" .$phone. "\r\n".
    "Nature of Business:" .$nature. "\r\n".
    "Products Endorsed (Dealers/Distributors):" .$brand. "\r\n".
    "Ownership Structure:" .$own. "\r\n".
    "Message:" .$message. ;
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From:'.$email. "\r\n";
    mail($to,$subject,$body,$headers);
    }
?>
