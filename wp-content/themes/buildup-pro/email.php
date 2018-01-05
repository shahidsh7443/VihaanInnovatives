<?php
if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $subject = "Application for Dealership";
  $body ="Thank you for applying to a dealership with VihaanInnovatives,Kindly wait for our response,we will reach you shortly";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: shahidrazorbee@gmail.com' . "\r\n";
  mail($email,$subject,$body,$headers);
  $title =$_POST['title'];
    $firstname = $_POST['fnm'];
    $lastname = $_POST['lnm'];
    $company = $_POST['cnm'];
    $address = $_POST['caddress'];
    $state = $_POST['state1'];
    $city = $_POST['city1'];
    $code = $_POST['zcode1'];
    $mobile = $_POST['mob'];
    $phone = $_POST['phone1'];
    $email = $_POST['email'];
    $nature = $_POST['nat'];
    $brand = $_POST['products'];
    $ownership = $_POST['ownership'];
     if($ownership == 'other')
     {
       $own = $_POST['ownership'];
     }
       else
       {
         $own = $_POST['other'];
       }
     $message=$_POST['message'];
     $to="shahidrazorbee@gmail.com";
    $subject = "Application for Dealership";
    $body = "Name:" .$title. .".". .$firstname."&nbsp;".$lastname. "<br/><br/>Company Name:" .$company. "<br/><br/>Address:" .$address. .",".  .$state. .",".  .$city. ."-". .$code. "<br/><br/>Mobile:" .$mobile. "<br/><br/>Phone:" .$phone. "<br/><br/>Nature of Business:" .$nature. "<br/><br/>Products Endorsed (Dealers/Distributors):" .$brand. "<br/><br/>Ownership Structure:" .$own. "<br/><br/>Message:" .$message. "<br/><br/>Thank you";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From:'.$email. "\r\n";
mail($to,$subject,$body,$headers);
    }
?>
