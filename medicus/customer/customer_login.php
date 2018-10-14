<?php
session_start();
include("../assets/includes/connection.php");
include("../assets/function/function.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Customer Login</title>

	<?php include "assets/includes/header.php" ?>

	<main class="site-main page-spacing">
		<!-- Page Banner -->
		<div class="page-banner container-fluid no-padding">
			<div class="page-banner-content">
				<h3>Login / register</h3>
				<p>We are happy to become a your friend !</p>
			</div>
		</div><!-- Page Banner /- -->
		<!-- Login Page 2 -->
		<div class="login-page-1 login-page-2 container-fluid no-padding">
			<div class="padding-100"></div>
			<div class="left-background"></div>
			<!-- Container -->
			<div class="container">
				<div class="col-md-4 col-sm-6 col-xs-6">
					<form action="customer_login.php" class="login-form login-form-1" method="post">

            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" class="form-control" name="c_email" required>

            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="c_pass" required>
            </div>
            <div class="text-center">
                <button name="login" class="btn btn-primary" value="Login">
              <i class="fas fa-sign-in-alt"></i> Sign In
           </button>

            </div>
        </form>
        <?php

                if(isset($_POST['login'])){

                $customer_email = $_POST['c_email'];

                $customer_pass = $_POST['c_pass'];

                $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

                $run_customer = mysqli_query($con,$select_customer);

                $get_ip = getRealUserIp();

                $check_customer = mysqli_num_rows($run_customer);

                $select_cart = "select * from cart where ip_add='$get_ip'";

                $run_cart = mysqli_query($con,$select_cart);

                $check_cart = mysqli_num_rows($run_cart);

                if($check_customer==0){

                echo "<script>alert('password or email is wrong')</script>";

                exit();

                }

                if($check_customer==1 AND $check_cart==0){

                $_SESSION['customer_email']=$customer_email;

                echo "<script>alert('You are Logged In')</script>";

                echo "<script>window.open('my_account.php?profile','_self')</script>";

                }
                else {

                $_SESSION['customer_email']=$customer_email;

                echo "<script>alert('You are Logged In')</script>";

                echo "<script>window.open('../checkout.php','_self')</script>";

                } 


                }

        ?>

				</div>
				<div class="col-md-8 col-sm-6 col-xs-6 right-bg">
					<form method="post" action="customer_login.php" class="login-form login-form-1 login-form-2" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="">Full Name</label>

                                <input type="text" class="form-control" name="c_name" required placeholder="Enter Your Name">

                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="c_email" required placeholder="Enter Your Email">

                            </div>

                        </div>
                        <?php
                        $ipn = getRealUserIp();
             
 $json  = file_get_contents("http://api.ipstack.com/$ipn?access_key=a6df04d294a0fb365fe76ad6b58723cf");
 $json  =  json_decode($json ,true);
 $countryip =  $json['country_name'];
$regionss= $json['region_name'];
 $cityss = $json['city'];
 $zip_codes = $json['zip'];
      ?>



                            <div class="form-group">
                                <div class="col-md-6">

                                    <label for="">Password</label>
                                    <input type="password" id="pass" class="form-control" name="c_pass" required placeholder="Enter Password">
                                </div>

                                <div class="col-md-6">

                                    <label for="">Confirm Password</label>
                                    <input type="password" id="cpass" class="form-control" name="conf_pass" required placeholder="Enter Password Again">
                                </div>


                            </div>
                            <p id="text"></p>


                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control" name="c_country" value="<?php echo $countryip;?>" required placeholder="Enter Your County">

                                </div>

                                <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="c_city" value="<?php echo $cityss; ?>" required placeholder="Enter Your City">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Enter Mobile No</label>
                                    <input type="text" class="form-control" name="c_contact" required placeholder="Enter Mobile No">
                                </div>
                                <!--<div class="col-md-6">
                                    <label for="">Gender</label>
                                    <input type="text" class="form-control" name="c_gender" required placeholder="Enter Your Gender">

                                </div>-->

                                <div class="col-md-6">
                                    <label for="">Gender</label>
                                    <select class="form-control" name="c_gender">
  <option>Male</option>
  <option>Female</option>
  <option>Other</option>
</select>

                                </div>

                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="">Address</label>
                                    <input type="text" class="form-control" name="c_address" required placeholder="Enter Your Address">

                                </div>


                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control" value="<?php echo $zip_codes; ?>" name="c_zipcode" required placeholder="Enter Your Zipcode">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="c_image" required>

                                </div>



                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="text-center">
                                <button id="submit" type="submit" name="register" class="btn btn-primary">
                             <i class="fas fa-user-plus"></i> Sign Up
                             
                         </button>
                            </div>
                    </form>
                    
<?php

 if(isset($_POST['register'])){ $c_name = $_POST['c_name']; $c_email = $_POST['c_email']; $c_pass = $_POST['c_pass']; $c_country = $_POST['c_country']; $c_city = $_POST['c_city']; $c_contact = $_POST['c_contact']; $c_gender = $_POST['c_gender']; $c_address = $_POST['c_address']; $c_zipcode = $_POST['c_zipcode']; $c_image = $_FILES['c_image']['name']; $c_image_tmp =$_FILES['c_image']['tmp_name'];

        $c_ip = getRealUserIp(); 

        move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
                               
                               $get_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
                               $run_email = mysqli_query($con, $get_email);
                               $check_email = mysqli_num_rows($run_email);
                               if($check_email == 1){
                                   echo "<script>alert('This Email is already registered ! please choose another email')</script>";
                                   exit();
                                   
                               }
                               
                               $customer_confirm_code = mt_rand();
$subject = "Shopcart Email Confirmation Message";
$from = "mahbubur.riad@gmail.com";
$message = "
<h2>
Hey $c_name,
</h2>


We received a request to set your email to $c_email. If this is correct, please confirm by clicking the button below. If you don’t know why you got this email, please tell us straight away so we can fix this for you.

<p>
Information That save in our database
</p>

<table style='border:2px solid black;'>
  <tr>
    <th>Name</th>
    <td>$c_name</td>
    </tr>
    <tr>
    <th>E-mail</th> 
    <td>$c_email</td> 
    </tr>
    <tr>
    <th>Pass</th>
     <td>$c_pass</td> 
    </tr>
    <tr>
    <th>Country</th>
    <td>$c_country</td>
    </tr>
    <tr>
    <th>City</th>
    <td>$c_city</td>
    </tr>
    <tr>
    <th>Contact</th>
    <td>$c_contact</td>
    </tr>
    <tr>
    <th>Zipcode</th>
    <td>$c_zipcode</td>
    </tr>
    <tr>
    <th>Gender</th>
    <td>$c_gender</td>
    </tr>
    <tr>
    <th>Address</th>
    <td>$c_address</td>
    </tr>
    </tr>
    

</table>
<br>
<br>

<a style='background-color: #af0c42; text-decoration: none; padding: 10px; font-size: 130%; color: white; margin-top:20px;' href='http://shopcartbd.cf/customer/my_account.php?$customer_confirm_code'>
Click Here To Confirm Email
</a>
";
$headers = "From: $from \r\n";
$headers .= "Content-type: text/html\r\n";
mail($c_email,$subject,$message,$headers);
                               

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_gender,customer_zipcode,customer_address,customer_image,customer_ip, customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact', '$c_gender','$c_zipcode','$c_address','$c_image','$c_ip', '$customer_confirm_code')";


                $run_customer = mysqli_query($con,$insert_customer);
                $sel_cart = "select * from cart where ip_add='$c_ip'";
                $run_cart = mysqli_query($con,$sel_cart);
                $check_cart = mysqli_num_rows($run_cart);

                if($check_cart>0){
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been Registered Successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
                }

                else{
                $_SESSION['customer_email']=$c_email;
                echo "<script>alert('You have been Registered Successfully')</script>";
                echo "<script>window.open('customer/my_account.php?profile','_self')</script>";
                }




        }

        ?>
				</div>
			</div><!-- Container /- -->
			<div class="padding-100"></div>
		</div><!-- Login Page 2 -->
	</main>


	<!--footer one start-->
	<footer class="container-fluid no-left-padding no-right-padding">
		<div class="container footer-1">
			<div class="row">
				<aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ftr-widget ftr-widget-about">
					<div class="footer-logo"> 
						<a href="#"><img class="logo" src="images/logo-white.png" alt="Logo Footer"> Shield Theme</a>
					</div>
					<p>Shield Theme is a multpurpose HTML Template which is the perfect solution for business, online shop websites</p>
					<ul>
						<li><i class="icon_pin"></i> 1234 New Design St, Melbourne Australia </li>
						<li><i class="icon_mail_alt"></i> <a href="mailto:hello@example.com">hello@example.com</a> </li>
						<li><i class="icon_phone"></i> <a href="tel:00918547632521">(0091) 8547 632521</a> </li>
					</ul>
				</aside>
				<aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ftr-widget ftr-widget-tag">
					<h4 class="ftr-widget-title"> Popular Tags </h4>
					<div class="tags">
						<a href="#">Amazing</a>
						<a href="#">Shield</a>
						<a href="#">Themes</a>
						<a href="#">Clean</a>
						<a href="#">Wordpress</a>
						<a href="#">Creative</a>
						<a href="#">Multipurpose</a>
						<a href="#">Retina Ready</a>
						<a href="#">Twitter</a>
						<a href="#">Responsive</a>
					</div>
				</aside>
				<aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ftr-widget ftr-widget-rnt-post">
					<h4 class="ftr-widget-title"> Recent Posts </h4>
					<ul>
						<li><a href="#">How you can impact your customers.</a> </li>
						<li><a href="#">Shield in all about quality.</a> </li>
						<li><a href="#">Is your website user friendly?</a> </li>
						<li><a href="#">Shield Theme offer weekly updates &amp; more.</a> </li>
						<li><a href="#">Your customer should love your web.</a> </li>
						<li><a href="#">Make your site smooth and stunning. </a> </li>
					</ul>
				</aside>
				<aside class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ftr-widget ftr-widget-newsletter">
					<h4 class="ftr-widget-title">Maling List</h4>
					<p>Sign up for our mailing list to get latest updates and offers.</p>
					<!-- Begin MailChimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="//onistaweb.us10.list-manage.com/subscribe/post?u=10590ad9370c662d14679fd55&amp;id=eb5b66e30f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter" target="_blank" novalidate>
							<div id="mc_embed_signup_scroll">						
								<div class="mc-field-group">
									<input type="email" value="" name="EMAIL" placeholder="Enter your email" id="mce-EMAIL">
									<button type="submit"  name="subscribe" id="mc-embedded-subscribe" class="button btn no-padding"> <i class="arrow_right"></i> </button>
								</div>
								<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>
								<div style="position: absolute; left: -5000px;">
									<input type="text" name="b_10590ad9370c662d14679fd55_eb5b66e30f" tabindex="-1" value="">
								</div>					
							</div>
						</form>
					</div><!--End mc_embed_signup-->
					<ul>
						<li><a href="#"><i class="social_twitter"></i></a></li>
						<li><a href="#"><i class="social_googleplus"></i></a></li>
						<li><a href="#"><i class="social_pinterest"></i></a></li>
						<li><a href="#"><i class="social_rss"></i></a></li>
						<li><a href="#"><i class="social_facebook"></i></a></li>
						<li><a href="#"><i class="social_dribbble"></i></a></li>
					</ul>
				</aside>
			</div>
		</div><!-- Container /- -->
		<div class="copyright">
			<div class="container">
				<p>Copyrights &copy; 2016 by <span><a href="#">Shield</a></span>. All Rights Reserved </p>
				<a class="backto-top" id="back-to-top" href="#"><i class="fa fa-long-arrow-up"></i></a>
			</div>
		</div>
	</footer>

	<!-- JQuery v1.11.3 -->
	<script type='text/javascript' src='https://s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><!-- MailChimp -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Library JS -->
	<script src="libraries/lib.js"></script>
	<script src="js/mailchip.js"></script>
	<script src="libraries/jquery.countdown.min.js"></script>
	<script src="libraries/jquery.knob.js"></script>
	<script src="libraries/lightslider/lightslider.min.js"></script>
	
	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDW40y4kdsjsz714OVTvrw7woVCpD8EbLE"></script>
	
	<!-- Library - Theme JS -->	
	<script src="js/functions.js"></script>

</body>
</html>