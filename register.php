<?php

require 'functions.php';

if (isset($_POST["register"])) {
   
  $password = mysqli_real_escape_string($db, $_POST["password"]);
  $password2 = mysqli_real_escape_string($db, $_POST["password2"]);
    if (register($_POST) > 0) {
        echo "<script>
                alert('Registered!');
                window.location.href='login.php';
              </script>";
        /*header("Location: login.php");*/
    } else {
        echo mysqli_error($db);
    }
};

if (isset($_GET["backToLogin"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

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
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
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
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">Restaurantly</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section id="login" class="login">

      <div class="container" data-aos="fade-up" class="login">

        <div class="section-title-checkout">
          <h2>Register</h2>
          <p>Sign Up to SushiPay</p>
        </div>

        <form action="" method="post" autocomplete="off" class="needs-validation php-email-form" novalidate>
          <div class="container-items">

            <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Please input email here!" required>
              <div class="invalid-feedback">Email harus diisi</div>
            </div>

            <div class="form-group">
              <label for="username">Username :</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Please input username here!" required>
              <div class="invalid-feedback">Username harus diisi</div>
            </div>

            <div class="form-group">
              <label for="firstname">First Name :</label>
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Please input firstname here!" required>
              <div class="invalid-feedback">Nama depan harus diisi</div>
            </div>

            <div class="form-group">
              <label for="lastname">Last Name :</label>
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Please input lastname here!" required>
              <div class="invalid-feedback">Nama belakang harus diisi</div>
            </div>

            <div class="form-group">
              <label for="birthdate">Birth Date :</label>
              <input type="date" name="birthdate" class="form-control" id="birthdate" required>
              <div class="invalid-feedback">Tanggal lahir harus diisi</div>
            </div>

            <div class="form-group">
              <label for="gender">Gender</label><br/>
              <input type="radio" name="gender" id="female" value="f" required>
              <label for="gender">Female</label><br/>
              <input type="radio" name="gender" id="male" value="m" required>
              <label for="gender">Male</label>
              <div class="invalid-feedback">Jenis kelamin harus diisi</div>
            </div>

            <div class="form-group">
              <label for="password">Password :</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="**" required>
              <div class="invalid-feedback">Password harus diisi</div>
            </div>

            <div class="form-group">
              <label for="password2">Confirmation password:</label>
              <input type="password" name="password2" class="form-control" id="password2" placeholder="**" required>
              <div class="invalid-feedback">Konfirmasi password harus diisi</div>
            </div>

            <?php
              if(isset($_POST['register'])) {
                if ($password !== $password2) {
                  echo '<div class="alert alert-danger" role="alert">';
                  echo "Password doesn't match";
                  echo '</div>';
                }
              }
            ?>

            <div class="section-title-checkout" style="padding-top: 10px;">
              <h2>Captcha</h2>
            </div>

            <div class="form-group">
               <?php include 'captcha.php' ?>
            </div>

            <div class="form-group" style="padding-top: 15px;">
              <button class="button signup-register" type="submit" name="register">Sign up!</button>
            </div>

          </div>
        </form>

        <form action="" method="GET" class="php-email-form pull-right">
          <button class="button back-register" type="submit" name="backToLogin">Back to login</button>
        </form>

      </div>

    <section>



  </main>


  <!-- ======= Footer ======== -->
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
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  </body>

</html>
