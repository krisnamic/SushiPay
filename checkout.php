<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Website : Restoran UTS IF430</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:300,300i,400,400i,600,600i,700,700i|Varela:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v1.2.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> +1 5589 55488 55
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 11:00 AM - 23:00 PM</span>
      </div>
      <div class="languages">
        <ul>
          <li>En</li>
          <li><a href="#">De</a></li>
        </ul>
      </div>
    </div>
  </div> -->

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Restaurantly</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo mr-auto"><img src="assets/img/logo/logo-red.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <!-- <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#chefs">Chefs</a></li>-->
          <li><a href="checkout.html"><i class="icofont-cart-alt" style="font-size: 35px; color:white;"></i></a></li>
          <li class="book-a-table text-center"><a href="">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Book A Table Section ======= -->
    <section id="checkout" class="checkout">
      <div class="container" data-aos="fade-up">

        <div class="section-title-checkout">
          <h2>チェックアウト</h2>
          <p>Shopping Cart</p>
        </div>

        <div class="d-inline-flex align-items-start bd-highlight mb-3">
          <div class="col-lg-8 row checkout-container d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-12 checkout-item filter-starters">
              <img src="assets/img/menu/lobster-bisque.jpg" class="checkout-img" alt="">
              <div class="checkout-content">
                <a href="#">Lobster Bisque</a><span>Total: $5.95</span>
              </div>
              <div class="checkout-desc">
                Lorem, deren, trataro, filede, nerada
              </div>
            </div>

            <div class="col-lg-12 checkout-item filter-specialty">
              <img src="assets/img/menu/bread-barrel.jpg" class="checkout-img" alt="">
              <div class="checkout-content">
                <a href="#">Bread Barrel</a><span>Total: $6.95</span>
              </div>
              <div class="checkout-desc">
                Lorem, deren, trataro, filede, nerada
              </div>
            </div>

            <div class="col-lg-12 checkout-item filter-starters">
              <img src="assets/img/menu/cake.jpg" class="checkout-img" alt="">
              <div class="checkout-content">
                <a href="#">Crab Cake</a><span>Total: $6.95</span>
              </div>
              <div class="checkout-desc">
                <p>Quantity: test</p>
              </div>
            </div>

          </div>

          <div id="order-summary" class="col-lg-4 row checkout-container align-items-center" data-aos="fade-up" data-aos-delay="200" style="width: 200px; margin-top: 40px; margin-left: 40px;">

            <div class="order-summary-title col-lg-12">
              <h2>Order Summary</h2>
              <hr/>
            </div>

            <div class="col-lg-12 d-flex justify-content-between">
              <p>Total Cost:</p>
              <p>$9.99</p>
            </div>

            <div class="col-lg-12 d-flex justify-content-between">
              <p>Total Cost:</p>
              <p>$9.99</p>
            </div>

            <!-- tambahin php looping -->

            <div class="col-lg-12">
              <hr/>
            </div>

            <div class="col-lg-12 d-flex justify-content-between">
              <p>Total Cost:</p>
              <p>$9.99</p>
            </div>

            <!-- <ul class="list-unstyled text-center">
              <li class="btn-checkout text-center"></li>
            </ul> -->
            <button type="button" class="btn-checkout animated fadeInUp scrollto" data-toggle="modal" data-target="#myModal" style="background-color: #11110d; border: 0px;">
              <a>Checkout</a>
            </button>
          </div>
        </div>
      </div>

    </section><!-- End Book A Table Section -->


  </main><!-- End #main -->

  <div class="container" style="color: #1a1814;">
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="text-align: center; border-radius: 10px;">

          <!-- Modal Header -->
          <div class="modal-header" style="text-align: center; display: block; align-items: center;">
            <h4 class="modal-title">Terima kasih!</h4>
          </div>

          <!-- Modal body -->
          <div class="modal-body" style="margin-top: 30px; margin-bottom: 30px;">
            <h5>Pesanan berhasil dilakukan</h5>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:  #fa3d16;">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Restaurantly</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
