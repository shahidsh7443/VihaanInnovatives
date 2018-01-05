<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<section id="Business" class="business">
<div class="container">
<h2 class="text-center">Dealership form:</h2>
<form style="padding: 20px; background-color: #ededed; border: 1px solid #c1c1c1; font-family: Roboto Condensed;" action="vihaaninnovative/tpl1.php" method="post">
<div class="row">
<div class="col-lg-2">
<div class="form-group">

<label>Title:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-check"></span> </div>
<select class="form-control" name="title" required>
<option selected="selected" disabled="disabled" value="">Select Option</option>
<option value="Mr.">Mr.</option>
<option value="Mrs.">Mrs.</option>
<option value="Ms.">Ms.</option>
</select>

</div>
</div>
</div>
<div class="col-lg-5">
<div class="form-group">

<label for="text">First Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </div>
<input id="fn" class="form-control" name="fnm" type="text" pattern="^[a-zA-Z]*$" placeholder="Enter First Name" required/>

</div>
</div>
</div>
<div class="col-lg-5">
<div class="form-group">

<label for="text">Last Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span> </div>
<input id="ln" class="form-control" name="lnm" type="text" pattern="^[a-zA-Z]*$" placeholder="Enter Last name" required />

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group">

<label for="text">Company Name:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-building"></i> </div>
<input id="cn" class="form-control" name="cnm" type="text" pattern="^[a-zA-Z0-9][-./&+\w\s]*$" placeholder="Enter Company name" required/>

</div>
</div>
</div>
<div class="col-lg-8">
<div class="form-group">

<label for="text">Address:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-address-book"></i></div>
<input id="address" class="form-control" name="caddress" type="text" pattern="^[#]{1}[a-zA-Z0-9]+[\,][a-zA-Z0-9\s]|[a-zA-Z0-9\s,'-]*$" placeholder="Enter Company Address" required/>

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group"><label for="text">State:<span style="color:red;">*</span></label>
<select id="state" class="form-control" name="state1" required>
<option selected="selected" value="Select State" disabled="disabled">Select State</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Puducherry">Puducherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select></div>
</div>
<div class="col-lg-4">
<div class="form-group"><label for="text">City:<span style="color:red;">*</span></label>
<input id="city" class="form-control" name="city1" type="text" pattern="^[a-zA-Z]+$" placeholder="City" required/></div>
</div>
<div class="col-lg-4">
<div class="form-group"><label for="text">Postal/Zip-Code:<span style="color:red;">*</span></label>
<input id="zcode" class="form-control" name="zcode1" type="text" pattern="^[0-9]{6,8}$"placeholder="Enter Postal code" required/></div>
</div>
</div>
<div class="row">
<div class="col-lg-4">
<div class="form-group">
<label for="text">Mobile:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
<input id="mobile" class="form-control" name="mob" type="tel" pattern="^[789]\d{9}$" maxlength="10" placeholder="Enter Valid Mobile number" required/>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
<label for="text">Phone:</label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></div>
<input id="phone" class="form-control" name="phone1" type="text" pattern="^(\+)?[0-9]+(-[0-9]+)?(-[0-9]+)?(-[0-9]+)?$" placeholder="Enter Valid Phonenumber" />
</div>
</div>
</div>
<div class="col-lg-4">
<div class="form-group">
<label for="email">Email:<span style="color:red;">*</span></label>
<div class="input-group">
<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
<input id="Email" class="form-control" name="email" type="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" placeholder="Email" required/>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group"><label for="text">Nature of Business:<span style="color:red;">*</span></label>
<input id="nature" class="form-control" name="nat" type="text" pattern="^[a-zA-Z][a-zA-Z '-&\s]|[a-zA-Z]*$" placeholder="Eg: Seller of Home Appliances/Online Sellers of various products and services etc." required/>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group"><label for="text">Please mention the brand/products for which you are dealers/distributors (if any):<span style="color:red;">*</span></label>
<input id="brands" class="form-control" name="products" type="text" pattern="^[a-zA-Z0-9][\,]|[\&]|[\w]|[\s]|[\-][a-zA-Z0-9] |[a-zA-Z0-9] *$" placeholder="Brands/Products" required/>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<label for="text">Ownership Structure:<span style="color:red;">*</span></label>
<select class="form-control" name="ownership"  id="owner" onchange="if (this.value=='other'){this.form['other'].style.display='inherit'}else {this.form['other'].style.display='none'};" required>
   <option selected="selected" disabled="disabled" value="">
   <strong>Select Option</strong></option>
	<option value="Public Company"> Public Company</option>
	<option value="Private Limited Company">Private Limited Company</option>
	<option value="Proprietorship">Proprietorship</option>
        <option value="Partnership">Partnership</option>
	<option value="other">Others</option>
  </select>
</br>
  <input type="text" class="form-control" name="other" style="display:none;" pattern="^[a-zA-Z][\w\s]$" placeholder="Enter Details" />
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 msg">
<div class="form-group">
<label for="text">Message:</span></label>
<textarea name="message" cols="50" rows="10" class="form-control"></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 hidden-xs hidden-sm"></div>
<div class="col-lg-4">
 <button name="submit" align="center" class="btn btn-lg btn-warning btn-block" type="submit" width="50px" style="margin-top:25px;">Send Query</button>
</div>
<?php
if(isset($_POST['submit'])) {
  $email = $_POST['email'];
  $subject = "Application for Dealership";
  $body ="Thank you for applying to a dealership with VihaanInnovatives,Kindly wait for our response,we will reach you shortly";
  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: shahidrazorbee@gmail.com' . "\r\n";
  $success=mail($email,$subject,$body,$headers);
  /*if( $success== true ) {
		echo "<script type='text/javascript'>alert('Mail Sent successfully');</script>";
		}else {
		echo "<script type='text/javascript'>alert('Unable to send mail');</script>";
  }*/
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
    }
?>

<div class="col-lg-4 hidden-xs hidden-sm"></div>
</div>
</form>
<h4><p><span style="color:red;font-size:30px;">*</span>marked fields indicate that they are mandatory to be filled.</p>
</div>
</section>
