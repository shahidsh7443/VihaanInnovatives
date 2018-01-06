<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>
     <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <script type="text/javascript">
$(function(){
	var height1=$('body').height()-513;
	$("footer").css("margin-top",height1);
})
</script>
<![endif]-->
<style>
	#error
	{
	margin-left: 100px;
	position: relative;
	top:30px;
	color:blue;
	font-weight: bold;
	}
</style>
</head>

<body style="background-image: url(bcg1.jpg)">
    <div class="row-fluid">
    	<div class="span12"><div id="dashed"></div></div>
    </div>
    <div class="row-fluid">
    	<div class="span6 offset3"><h2 id="construction">Thank you for Reaching us.</h2></div>
    </div>
    <div class="row-fluid">
    	<div class="span4 offset4" id="panel">
            <div id="white">
            	<p> Thank you for reaching us.<br /><br />We have recieved your email, our support will reach you shortly.<br /><br /><a href="/arrisventures/contact.php"><< Back</a></p>
                <!-- under construction hat -->
            <!--<img id="hat" src="img/thankyou.png" class="hidden-phone"/>-->
            </div>
        </div>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $subject = "Application for Dealership";
  $body ="Thank you for applying for dealership with VihaanInnovatives,Kindly wait for our response,we will reach you shortly";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: shahidrazorbee@gmail.com' . "\r\n";
  $success=mail($email,$subject,$body,$headers);
  if( $success== true ) {
		echo "<script type='text/javascript'>alert('Thank you for applying for Dealership with VihaanInnovatives,we will reach you shortly.');</script>";
		}else {
		echo "<script type='text/javascript'>alert('Unable to send mail');</script>";
  }
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
       $own = $_POST['other'];
     }
       else
       {
         $own = $_POST['ownership'];
       }
     $message=$_POST['message'];
     $to="shahidrazorbee@gmail.com";
    $subject = "Application for Dealership";
    $body = "Name:" .$title. "&nbsp;" .$firstname. "&nbsp;".$lastname. "<br/><br/>Company Name:" .$company. "<br/><br/>Address:" .$address. ","  .$state. ",&nbsp;"  .$city. "-&nbsp;" .$code. "<br/><br/>Mobile:" .$mobile. "<br/><br/>Phone:" .$phone. "<br/><br/>Nature of Business:" .$nature. "<br/><br/>Products Endorsed (Dealers/Distributors):" .$brand. "<br/><br/>Ownership Structure:" .$own. "<br/><br/>Message:" .$message. "<br/><br/>Thank you";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From:'.$email. "\r\n";
$success=mail($to,$subject,$body,$headers);
if( $success== true ) {
		echo "<script type='text/javascript'>alert('Thank you for applying for Dealership with VihaanInnovatives,we will reach you shortly.');</script>";

}else {
		echo "<script type='text/javascript'>alert('Unable to send mail');</script>";
		}
/*header("location: http://projects.razorbee.com/vihaaninnovative/index.php/business/");*/
    }
?>
