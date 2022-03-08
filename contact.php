<?php
/**
 * This example shows sending a message using a local sendmail binary.
 */

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

// Set PHPMailer to use the sendmail transport
// $mail->isSendmail();
$mail->IsHTML(true);



//new//
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->Debugoutput = 'html';
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; //Set the SMTP port number - likely to be 25, 465 or 587
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; //Set the encryption system to use - ssl (deprecated) or tls
$mail->Username = "info.kababji@gmail.com";
$mail->Password = "kababji@123";



// Google reCAPTCHA API key configuration 
$siteKey     = '6LcR7rkeAAAAAO0sjc1hatmp_fiV1kQ72wH2dGO3'; 
$secretKey     = '6LcR7rkeAAAAAIem0-IMOvbb7HyrljK_H3_B0Xxt'; 
//end//


$mail_reservation_status = "";

//codeat
$postData = $statusMsg = $valErr = '';
$status = 'error';
//codeat



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['reservation'])) {
    // Set your information here
    //codeat
    $postData = $_POST;
    //codeat
    $title      = 'Mail From Website';
    $mail_from    = $_POST['email'];
    $mail_replay  = $_POST['email'];
    $mail_to      = 'info.kababji@gmail.com';
    $subject    = 'New Email from website';
    $username     = $_POST['username'];
    $phone      = $_POST['phone'];
    $message    = $_POST['message'];
    $mail_body    = $username .'<br/>'.
              $phone.'<br/>'.
              $message;

    //Set who the message is to be sent from
    $mail->setFrom($mail_from, $title);
    //Set an alternative reply-to address
    $mail->addReplyTo($mail_replay, $title);
    //Set who the message is to be sent to
    $mail->addAddress($mail_to, 'Abeer Bilal');
    //Set the subject line
    $mail->Subject = $subject;
    //Set the body
    $mail->Body = $mail_body;




//new//
$mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
);

//end//

//codeat
	// Validate reCAPTCHA box
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

    // Verify the reCAPTCHA response
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
    
    // Decode json data
    $responseData = json_decode($verifyResponse);
    
    // If reCAPTCHA response is valid
    if($responseData->success){


          if ( !$mail->send() ) {
            $mail_reservation_status = "<br><p class='text-warning'>Mailer Error: " . $mail->ErrorInfo.'</p>';
          } else {
            $mail_reservation_status = "<br><p class='text-success'>Mail Sent Successfully. Thank you!</p>";
          }


    }else {
      $mail_reservation_status = "<br><p class='text-success'>Robot verification failed, please try again.</p>";  }

    }     
  }else{
    $mail_reservation_status = "<br><p class='text-success'>Please check on the reCAPTCHA box.</p>";  }
  
}
?>





<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kababji Restaurant Jordan">
    <meta name="keywords" content="Kababji, Kababji Jordan, Order online Kebab, catering jordan, catering, Shawerma Jordan, Kabab Sandwich Jordan, Sheesh Tauk Jordan, Knafeh Jordan, Um Ali Jordan, Mashawi Jordan, Beef Shawerma Jordan, Chicken Shawerma Jordan, Shawarma Jordan, Shish Taouk Jordan">
    <meta name="author" content="Kababji Jordan">

    <title>Contact</title>
    <link rel="icon" href="/favicon.ico">
    <!-- Bootstrap CSS-->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!-- IE 9-->
    <!-- Vendors-->
    <link rel="stylesheet" href="assets/vendors/flexslider/flexslider.min.css">
    <link rel="stylesheet" href="assets/vendors/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick.min.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick-theme.min.css">
    <link rel="stylesheet" href="assets/vendors/animate.min.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/pageloading/css/component.min.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="assets/fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/elements.css">
    <link rel="stylesheet" type="text/css" href="assets/css/extra.css">
    <link rel="stylesheet" type="text/css" href="assets/css/widget.css">
    <link id="colorpattern" rel="stylesheet" type="text/css" href="assets/css/color/colordefault.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <!-- Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Script Loading Page-->
    <script src="assets/vendors/html5shiv.js"></script>
    <script src="assets/vendors/respond.min.js"></script>
    <script src="assets/vendors/pageloading/js/snap.svg-min.js"></script>
    <script src="assets/vendors/pageloading/sidebartransition/js/modernizr.custom.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <div id="pagewrap" class="pagewrap">
      <div id="html-content" class="wrapper-content">
      <?php include "./header-inner.php" ?>
      <div class="page-container">
          <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-contact">
            <div class="container">
              <div class="title-wrapper">
                <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Contact Us</div>
                <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
                <div data-top="transform: translateY(0px);opacity:1;" data--20-top="transform: translateY(5px);" data--50-top="transform: translateY(15px);opacity:0.8;" data--120-top="transform: translateY(30px);opacity:0;" data-anchor-target=".page-title" class="subtitle">Let's Get in Touch</div>
              </div>
            </div>
          </div>
          <section class="ct-info-section padding-top-100 padding-bottom-100">
            <div class="container">
              <div class="row">
                <div class="col-md-8 col-sm-12">
                  <div class="swin-sc swin-sc-title style-2 text-left">
                    <p class="title"><span>Get In Touch</span></p>
                  </div>
                  <div class="reservation-form style-02">
                    <div class="swin-sc swin-sc-contact-form light mtl style-full">
	                      <form action="#" method="POST">
	                        <div class="form-group">
	                          <div class="input-group">
	                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
	                            <input type="text" placeholder="Username" name="username" class="form-control">
	                          </div>
	                        </div>
	                        <div class="form-group">
	                          <div class="input-group">
	                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
	                            <input type="email" placeholder="Email" name="email" class="form-control" required>
	                          </div>
	                        </div>
	                        <div class="form-group">
	                          <div class="input-group">
	                            <div class="input-group-addon">
	                              <div class="fa fa-phone"></div>
	                            </div>
	                            <input type="text" placeholder="Phone" name="phone" class="form-control">
	                          </div>
	                        </div>
	                        <div class="form-group">
	                          <textarea placeholder="Message" name="message" class="form-control"></textarea>
	                        </div>

                        
                          <div class="form-group captcha">
                        <!-- Google reCAPTCHA box -->
                        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                      </div>

              


	                        <div class="form-group">
                            <input type="hidden" name="reservation">
	                          <div class="swin-btn-wrap"><button type="submit" class="swin-btn center form-submit"><span>Send</span></button></div>
                            <?php if ($mail_reservation_status != '') {
                              echo $mail_reservation_status;
                            } ?>
	                        </div>
	                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="swin-sc swin-sc-title style-2 text-left">
                    <p class="title"><span>Contact Info</span></p>
                  </div>
                  <div class="swin-sc swin-sc-contact">
                    <div class="media item">
                      <div class="media-left">
                        <div class="wrapper-icon"><a href="https://goo.gl/maps/Ng4jvLQ8EqzrPX159" target="_blank" ><i class="icons fa fa-map-marker"></i></a></div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading title">Main Branch</h4>
                        <div class="description">Main Branch Mecca Street Opposite Marmara Hotel</div>
                      </div>
                    </div>
                    <div class="media item">
                      <div class="media-left">
                        <div class="wrapper-icon"><a href="tel:+96265561065"  ><i class="icons fa fa-phone"></i></a></div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading title">Phone Number</h4>
                        <div class="description">(06) 556 1065</div>
                      </div>
                    </div>
                    <div class="media item">
                      <div class="media-left">
                        <div class="wrapper-icon"><a href="mailto:admin@ncss.jo"><i class="icons fa fa-envelope"></i></a></div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading title">EMail Address</h4>
                        <div class="description">
                          <p>admin@ncss.jo</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
<!-- Footer Start -->
<?php include "./footer.html" ?>
<!-- Footer End -->
      </div>
      <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
        <div class="loader-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
            <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
          </svg>
          <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
          <div class="sk-circle sk-circle-out">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
        </div>
      </div>
      <div id="live-setting" class="hidden-sm hidden-xs"><a id="open-popup"><i class="fa fa-cogs"></i></a>
        <form id="popup">
          <h5 class="live-title">Live Setting</h5>
          <div class="popup-inner">
            <div class="box-setting">
              <p>Pattern Color Variable</p>
              <div class="color-setting">
                <ul class="list-unstyled">
                  <li class="colordefault"><span>Default</span><a></a></li>
                  <li class="color01"><span>Pizza + Bread</span><a></a></li>
                  <li class="color02"><span>Wine</span><a></a></li>
                  <li class="color03"><span>Coffee</span><a></a></li>
                  <li class="color04"><span>Vegetable</span><a></a></li>
                  <li class="color05"><span>Cream</span><a></a></li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- jQuery-->
    <script src="assets/vendors/jquery-1.10.2.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Vendors-->
    <script src="assets/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="assets/vendors/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/jquery-countTo/jquery.countTo.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/parallax/parallax.min.js"></script>
    <script src="assets/vendors/gmaps/gmaps.min.js"></script>
    <script src="assets/vendors/audiojs/audio.min.js"></script>
    <script src="assets/vendors/vide/jquery.vide.min.js"></script>
    <script src="assets/vendors/pageloading/js/svgLoader.min.js"></script>
    <script src="assets/vendors/pageloading/js/classie.min.js"></script>
    <script src="assets/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
    <script src="assets/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/vendors/wowjs/wow.min.js"></script>
    <script src="assets/vendors/skrollr.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/jquery-cookie/js.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <!-- Own script-->
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/elements.js"></script>
    <script src="assets/js/widget.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-102426561-1', 'auto');
      ga('send', 'pageview');
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdXpLSJ3Ibdu-Phs9QOvpqb9d1DtPf7wQ"></script>
    <script src="assets/js/map.js"></script>
  </body>
</html>
