<?php
/**
 * This example shows sending a message using a local sendmail binary.
 */

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
$mail->IsHTML(true);

$mail_reservation_status = "";
$mail_subscribe_status = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['reservation'])) {
    // Set your information here
    $title      = 'Mail From Website';
    $mail_from    = $_POST['email'];
    $mail_replay  = $_POST['email'];
    $mail_to      = 'yourmail@gmail.com';
    $subject    = 'PHPMailer sendmail testing';
    $phone     = $_POST['phone'];
    $people      = $_POST['people'];
    $date    = $_POST['date'];
    $time    = $_POST['time'];
    $mail_body    = $phone .'<br/>'.
              $people.'<br/>'.
              $date.'<br/>'.
              $time.'<br/>';

    //Set who the message is to be sent from
    $mail->setFrom($mail_from, $title);
    //Set an alternative reply-to address
    $mail->addReplyTo($mail_replay, $title);
    //Set who the message is to be sent to
    $mail->addAddress($mail_to, 'John Doe');
    //Set the subject line
    $mail->Subject = $subject;
    //Set the body
    $mail->Body = $mail_body;
    if ( !$mail->send() ) {
      $mail_reservation_status = "<br><p class='text-warning'>Mailer Error: " . $mail->ErrorInfo.'</p>';
    } else {
      $mail_reservation_status = "<br><p class='text-success'>Mail Sent Successfully. Thank you!</p>";
    }
  }
  if (isset($_POST['mail-subscribe'])) {
    $title      = 'MailScrible From Website';
    $mail_subscribe  = $_POST['mail-subscribe'];
    $mail_to      = 'yourmail@gmail.com';
    $subject    = 'Mail Subscribe from Website';
    $mail_body    = 'Email Subscribe from website: ' . $mail_subscribe .'<br/>';
    //Set who the message is to be sent to
    $mail->addAddress($mail_to, 'John Doe');
    //Set the subject line
    $mail->Subject = $subject;
    //Set the body
    $mail->Body = $mail_body;
    if ( !$mail->send() ) {
      $mail_subscribe_status = "<br><p class='text-warning'>Mailer Error: " . $mail->ErrorInfo .' </p>';
    } else {
      $mail_subscribe_status = "<br><p class='text-success'>Mail Sent Successfully. Thank you!</p>";
    }
  }
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
    <title>Home</title>
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
    <link rel="stylesheet" href="assets/vendors/dialog/css/dialog.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="assets/fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="assets/css/layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/elements.css">
    <link rel="stylesheet" type="text/css" href="assets/css/extra.css">
    <link rel="stylesheet" type="text/css" href="assets/css/widget.css">
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
  </head>
  <body>
   
    <div id="pagewrap" class="pagewrap">
      <div id="html-content" class="wrapper-content">
      <?php include "./header.php" ?>
        <div class="page-container">
          <div class="top-header top-bg-parallax">
            <div data-parallax="scroll" data-image-src="assets/images/background/her-bg-home.jpg" class="slides parallax-window">
              <div class="slide-content slide-layout-02">
                <div class="container">
          
                    <h3 data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1000" class="slide-title animated">KABABJI JORDAN</h3>
                    <p data-ani-in="fadeInUp" data-ani-out="fadeOutDown" data-ani-delay="1500" class="slide-sub-title animated"><span class="line-before"></span><span class="line-after"></span><span class="text"><span>Quality</span><span>Consistency</span><span>Cleanliness</span></span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- Our Story Section Begin  -->
          <div class="page-content-wrapper">
            <section class="about-us-session padding-top-100 padding-bottom-100">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 colsm-12"><img src="assets/images/pages/our-story.png" alt="" class="img img-responsive wow zoomIn"></div>
                  <div class="col-md-6 col-sm-12">
                    <div class="swin-sc swin-sc-title style-4 margin-bottom-20 margin-top-50">
                      <p class="top-title"><span>Discover</span></p>
                      <h3 class="title">Our Story</h3>
                    </div>
 
                    <p class="des margin-bottom-20 text-center">Years ago, we started as the Kababji franchise in Lebanon, before we decided to develop into our own, emerging into the Jordanian market. Welcomed with open arms and hungry stomachs, with new menu items accommodating to the Jordanian market, we made our way into the Jordanian Restaurant Industry. And so, ten years later, our Kababji Jordan family is still growing with regular clients increasing each month.</p>
                    <div class="swin-btn-wrap center"><a href="about.php" class="swin-btn center form-submit btn-transparent"> <span>	About Us</span></a></div>
                  </div>
                </div>
              </div>
            </section>
<!-- Our Story Section End -->

<!-- Slider Section Begin -->
            <div class="page-content-wrapper">
              <section class="ab-timeline-section padding-top-100 padding-bottom-100">
                <div class="container">
                  <div class="swin-sc swin-sc-title style-2">
                    <h3 class="title"><span> Our Branches </span></h3>
                  </div>
                  <div data-item="4" class="swin-sc swin-sc-timeline-2">
                    <div class="main-slider">
                      <div class="slides">
                        <div class="timeline-item item swin-transition">
                          <div class="timeline-item-wrap"><span class="timeline-year swin-transition">Al Fuhais </span></div><img src="assets/images/timeline/branch-1.jpg" alt="Kababji" class="img img-responsive">
                        </div>
                        <div class="timeline-item item swin-transition">
                          <div class="timeline-item-wrap"><span class="timeline-year swin-transition">Mecca Street</span></div><img src="assets/images/timeline/branch-2.jpg" alt="Kababji" class="img img-responsive">
                        </div>
                        <div class="timeline-item item swin-transition">
                          <div class="timeline-item-wrap"><span class="timeline-year swin-transition">Shmesani</span></div><img src="assets/images/timeline/branch-shmesani.jpeg" alt="Kababji" class="img img-responsive">
                        </div>
                        <div class="timeline-item item swin-transition">
                          <div class="timeline-item-wrap"><span class="timeline-year swin-transition">Abdoun</span></div><img src="assets/images/timeline/branch-abdoun.jpeg" alt="Kababji" class="img img-responsive">
                        </div>
                      </div>
                    </div>
                    <div class="nav-slider">
                      <div class="slides">
                        <div class="timeline-content-item">
                      
                          <p class="timeline-heading"><strong>Al Fuhais Branch</strong></p>
                          <div class="timeline-content-detail">
                            <p>Opening Hours: 10:00 AM - 11:00 PM	</br>
                              Bacaloria street	</p>
                          
                          </div>
                        </div>
                        <div class="timeline-content-item">
                          <p class="timeline-heading"><strong>Mecca Street Branch</strong></p>
                          <div class="timeline-content-detail">
                           
                            <p>Opening Hours: 10:00 AM - 1:00 AM	</br>
                              Mecca Street - Opposite Marmara Hotel</p>
                          </div>
                        </div>
                        <div class="timeline-content-item">
                          <p class="timeline-heading"><strong>Shmesani Branch</strong></p>
                          <div class="timeline-content-detail">
                          
                            <p>Opening Hours: 10:00 AM - 11:00 PM	</br>
                            Al-Shmesani - Elia Abu Maddi St. Opposite Grand Millennium Hotel</p>
                          </div>
                        </div>
                        <div class="timeline-content-item">
                          <p class="timeline-heading"><strong>Abdoun Branch</strong></p>
                          <div class="timeline-content-detail">
                           
                            <p>Opening Hours: 10:00 AM - 11:00 PM	</br>
                            Abdoun – 39 Al-Umawieen st. Behind Samsung </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


<!-- Slider Section End -->
<!-- Banner Section Begin -->

              <section data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -150px;" class="team-section-02 padding-top-100 padding-bottom-100">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="swin-sc swin-sc-title text-left">
                 
                        <h3 class="title white-color">Off the grill, </br>
                          out of the oven, </br>
                          and straight on its </br>
                          way to you</h3>
                      </div>
                      <div class="swin-sc swin-sc-team-slider-2">
                        <div class="main-slider">
                          <div class="slides">
                            <div class="team-item">
                              <p class="team-description">Order straight from us, and receive your order straight from us. No second-parties, no unknown drivers… nothing standing in the way of your food's freshness!</p>
                              <div class="app-store-btns">
                              <a href="itms-apps://apps.apple.com/sa/app/kababji-jordan/id1592889860?l" target="_blank">  <button class="btn btn-default store-btn" href="">
                              <img src="assets/images/apple-store.png" width="5" /> 
                                </button> </a>
                                <a href="https://play.google.com/store/apps/details?id=com.bitesnbags.kababji&hl=ar&gl=US" target="_blank"> <button class="btn btn-default store-btn" href="">
                                 <img src="assets/images/google-play.png" width="5" /> 
                                </button></a>
                              </div>

                            </div>
                            
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="img-chef"><img src="assets/images/background/mobile.png" alt="" class="img img-responsive"></div>
                  </div>
                </div>
              </section>


<!-- Banner Section End -->

<!-- contact and reserve Section Begin  -->
<div class="page-content-wrapper">
  <section class="about-us-session padding-top-100 padding-bottom-100">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="swin-sc swin-sc-title style-4 margin-bottom-20 margin-top-50">
            <p class="top-title"><span>For reservation & Inquiries</span></p>
            <h3 class="title">Get in Touch</h3>
          </div>

          <p class="des margin-bottom-20 text-center">Contact us for reservations, deliveries, catering and inquiries. Our team is always ready to help!</p>
          <div class="swin-btn-wrap center">
            <a href="contact.php" class="swin-btn center form-submit btn-transparent" style="margin-right: 10px;"> <span>	Contact Us</span></a>
            <a href="https://bitesnbags.com/place/p7fpf9dolv-kababji" target="_blank" class="swin-btn center form-submit btn-transparent"> <span>	Order Online</span></a>
          </div>
        </div>
        <div class="col-md-6 colsm-12"><img src="assets/images/pages/contact-reserve-2.jpg" alt="" class="img img-responsive wow zoomIn" style="width: 50rem;"></div>

      </div>
    </div>
  </section>
<!-- contact and reserve Section End -->


<!-- Gallery Section Begin -->
            <section class="gallery-section-01 padding-top-100">
              <div class="swin-sc swin-sc-title">
                <p class="top-title"><span>Our Gallery</span></p>
                <h3 class="title white-color">Of Unique Dishes</h3>
              </div>
              <div class="swin-sc swin-sc-isotope">
                <div class="grid">
                  <div class="grid-sizer col-sm-1"></div>
                  <div class="grid-item col-sm-3 grid-item-h2">
                    <div class="grid-wrap-item"><a  class="gallery-title title">Spinach</a><a href="assets/images/gallery/gallery-1-1.jpg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-1-1.jpg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                  <div class="grid-item col-sm-4 grid-item-h1">
                    <div class="grid-wrap-item"><a  class="gallery-title title">Sheesh Tawooq</a><a href="assets/images/gallery/gallery-2-2.jpeg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-2-2.jpeg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                  <div class="grid-item col-sm-2 grid-item-h1">
                    <div class="grid-wrap-item"><a class="gallery-title title">Chicago Beefsteak</a><a href="assets/images/gallery/gallery-3-3.jpg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-3-3.jpg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                  <div class="grid-item col-sm-3 grid-item-h2">
                    <div class="grid-wrap-item"><a  class="gallery-title title">Veal Fillet</a><a href="assets/images/gallery/gallery-4-4.jpeg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-4-4.jpeg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                  <div class="grid-item col-sm-2 grid-item-h1">
                    <div class="grid-wrap-item"><a class="gallery-title title">Chicago Beefsteak</a><a href="assets/images/gallery/gallery-6-6.jpg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-6-6.jpg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                  <div class="grid-item col-sm-4 grid-item-h1">
                    <div class="grid-wrap-item"><a class="gallery-title title">Arayes</a><a href="assets/images/gallery/gallery-5-5.jpeg" data-lightbox="image" class="view-lightbox swipebox"><i class="fa fa-search-plus"></i></a>
                      <div class="img-wrap"><img src="assets/images/gallery/gallery-5-5.jpeg" alt="" class="img img-responsive"></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
<!-- Gallery Section end -->

<!-- two boxes Section begin -->
<section class="product-sesction-03 padding-bottom-100">
  <div class="container">
    <div class="row margin-top-100">
      <div class="col-md-6 col-xs-12">
        <div class="swin-sc swin-sc-banner item wow fadeInLeft">
          <div class="banner-featured-img"><img src="assets/images/catering-banner-4.jpg" alt="Kababji" class="img img-responsive">
            <div class="banner-content">
              <div class="banner-title">CATERING</div>
              <div class="banner-subtitle">OUR CATERING SERVICES </br> FOR ALL TYPES OF OCCASIONS</div><a href="catering.php" class="swin-btn"><span>Read More</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12">
        <div class="swin-sc swin-sc-banner right item wow fadeInRight">
          <div class="banner-featured-img"><img src="assets/images/menu-banner-2.jpg" alt="Kababji" class="img img-responsive">
            <div class="banner-content">
              <div class="banner-title">MENU</div>
              <div class="banner-subtitle">GO THROUGH OUR MENU </br> AND ORDER ONLINE INSTANTLY</div><a  href="https://bitesnbags.com/place/p7fpf9dolv-kababji" target="_blank" class="swin-btn"><span>Go to Menu</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- two boxes Section end -->

          </div>
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
    </div>
    <div id="add-to-cart-dialog" class="add-to-card-dialog dialog">
      <div class="dialog__overlay"></div>
      <div class="dialog__content">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-5">
              <div class="dialog-product-img"><img src="assets/images/product/product-full-02.jpg" alt="Kababji" class="img img-responsive"></div>
            </div>
            <div class="col-md-7">
              <div class="dialog-product-title">The Cracker Barrel's Country Boy Breakfast</div>
              <div class="dialog-product-price">$25.0</div>
              <div class="product-quanlity">
                <div class="input-group">
                  <input type="text" name="quanlity" placeholder="" value="1" class="form-control"><a href="javascript:void(0)" class="quanlity-plus"><i class="fa fa-plus"></i></a><a href="javascript:void(0)" class="quanlity-minus"><i class="fa fa-minus"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="dialog-product-options">
                <p class="option-title">More Options</p>
                <div class="form-check">
                  <input id="productQuantity1" type="radio" name="productOption" value="option1" checked="" class="form-check-input">
                  <label for="productQuantity1" class="form-check-label">Aliquip ex ea commodo consequat</label>
                </div>
                <div class="form-check">
                  <input id="productQuantity2" type="radio" name="productOption" value="option2" checked="" class="form-check-input">
                  <label for="productQuantity2" class="form-check-label">Quis ullam laboris nisi ut aliquip ex ea commodo</label>
                </div>
                <div class="form-check">
                  <input id="productQuantity3" type="radio" name="productOption" value="option3" checked="" class="form-check-input">
                  <label for="productQuantity3" class="form-check-label">Commodo consequat aliquip</label>
                </div>
              </div>
              <div class="dialog-product-options">
                <p class="option-title">Other options</p>
                <div class="form-check">
                  <input id="productOption2" type="checkbox" name="" value="option3" checked="" class="form-check-input">
                  <label for="productOption2" class="form-check-label">Ullam laboris nisi ut aliquip ex ea commodo</label>
                </div>
                <div class="form-check">
                  <input id="productOption3" type="checkbox" name="" value="option3" class="form-check-input">
                  <label for="productOption3" class="form-check-label">Ut enim ad minim veniam</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="dialog-button-group"><a href="product-cart.html" class="swin-btn btn-transparent"><span>View Cart</span></a><a data-toggle="dialog" data-target="#add-to-cart-dialog" class="swin-btn open-toast"><span>Order Now</span></a></div>
        </div>
      </div>
    </div>
    <div class="add-to-card-toast toast">
      <div class="toast_content">
        <div role="alert" class="alert alert-success">
          <button type="button" aria-label="Close" class="close close-toast"><span aria-hidden="true">×</span></button><strong>Order Successfully!</strong> This message will disappearance in 5 seconds
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    <!-- Own script-->
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/elements.js"></script>
    <script src="assets/js/widget.js"></script>
  </body>
</html>