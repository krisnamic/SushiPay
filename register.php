<?php

require 'functions.php';

if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

if (isset($_POST['login'])) {
    header("Location: login.php");
    exit;
}

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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Restaurantly</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo/logo-red.png" onmouseover="this.src='assets/img/logo/logo-white.png';" onmouseout="this.src='assets/img/logo/logo-red.png';" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <?php
          if ($loggedin) {
            echo '<li><a href="checkout.php"><i class="icofont-cart-alt" style="font-size: 35px; color:white;"></i></a></li>';
          }
          ?>

          <li class="book-a-table text-center">
            <form action="" method="POST">
                <?php
                if ($loggedin) {
                    echo "<button class='button logout btn btn-primary' type='submit' name='logout'>Log out!</button>";
                } else {
                    echo "<button class='button login btn btn-primary' type='submit' name='login'>Login</button> ";
                }
                ?>
                <!-- <br>
                <a href="shoppingcart.php">Go to Shopping Cart</a> -->
            </form>
          </li>
          <!-- <li class="book-a-table text-center"><a href="login.php">Login</a></li> -->
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <section id="register" class="login" style="padding-bottom: 30px;">

      <div class="container" data-aos="fade-up" class="login"  style="background-color: white; opacity: 0.98; border-radius: 15px;">

        <div class="section-title-checkout">
          <h2>サインアップ</h2>
          <p>Sign Up to SushiPay</p>
        </div>

        <form action="" method="post" autocomplete="off" class="needs-validation php-email-form" novalidate>
          <div class="container-items d-flex flex-column">

            <div class="col-lg-12 form-group">
              <label for="email">Email :</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Please input email here!" required>
              <div class="invalid-feedback">Email harus diisi</div>
            </div>

            <div class="col-lg-12 form-group">
              <label for="username">Username :</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Please input username here!" required>
              <div class="invalid-feedback">Username harus diisi</div>
            </div>

            <div class="d-flex">
              <div class="col-lg-6 form-group">
                <label for="firstname">First Name :</label>
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Please input firstname here!" required>
                <div class="invalid-feedback">Nama depan harus diisi</div>
              </div>

              <div class="col-lg-6 form-group">
                <label for="lastname">Last Name :</label>
                <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Please input lastname here!" required>
                <div class="invalid-feedback">Nama belakang harus diisi</div>
              </div>
            </div>


            <div class="col-lg-12 form-group">
              <label for="birthdate">Birth Date :</label>
              <input type="date" name="birthdate" class="form-control" id="birthdate" required>
              <div class="invalid-feedback">Tanggal lahir harus diisi</div>
            </div>

            <!-- <div class="col-lg-12 form-group">
              <label for="gender">Gender :</label><br/>
              <input type="radio" name="gender" id="female" value="f" required>
              <label for="gender">Female</label>
              <input type="radio" name="gender" id="male" value="m" required>
              <label for="gender">Male</label>
              <div class="invalid-feedback">Jenis kelamin harus diisi</div>
            </div> -->

            <div class="col-lg-12 form-group">
              <label for="gender">Gender :</label><br/>

              <select class="custom-select" id="gender" name="gender">
                <option value="f">Female</option>
                <option value="m">Male</option>
              </select>

              <!-- <input type="radio" name="gender" id="female" value="f" required>
              <label for="gender">Female</label>
              <input type="radio" name="gender" id="male" value="m" required>
              <label for="gender">Male</label>
              <div class="invalid-feedback">Jenis kelamin harus diisi</div> -->
            </div>

            <div class="d-flex">
              <div class="col-lg-6 form-group">
                <label for="password">Password :</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Please input password here!" required>
                <div class="invalid-feedback">Password harus diisi</div>
              </div>

              <div class="col-lg-6 form-group">
                <label for="password2">Confirmation password:</label>
                <input type="password" name="password2" class="form-control" id="password2" placeholder="Please input password confirmation here!" required>
                <div class="invalid-feedback">Konfirmasi password harus diisi</div>
              </div>
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

            <div class="col-lg-12 form-group">
              <button class="btn btn-primary signup-register" type="submit" name="register">Sign Up</button>
            </div>

          </div>
        </form>

        <form action="" method="GET" class="php-email-form">
          <!-- <div class="d-flex">
            <button class="btn btn-link back-register" type="submit" name="backToLogin">Back to login</button>
          </div> -->

          <div class="container-items d-flex flex-column">
            <div class="col-lg-12 d-inline-flex flex-row align-items-center" style="vertical-align: center;">
              <div class="form-group text-center">
                <span style="color:grey;">Already has an account?</span>
              </div>
              <div class="form-group text-center">
                <button class="btn btn-link back-register" type="submit" name="backToLogin">Sign in!</button>
              </div>
            </div>
          </div>

        </form>

      </div>

    <section>



  </main>


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <a href="index.php" class="logo mr-auto"><img src="assets/img/logo/logo-red.png" alt="" class="img-fluid" width="200"></a>

              <p style="padding-top: 15px;">
                Jl. Scientia Boulevard, Gading,<br>
                Kec. Serpong, Tangerang, Banten 15227<br><br>
                <strong>Phone:</strong> +62 2239 7773 4893<br>
                <strong>Email:</strong> uts.pemweb@student.umn.ac.id<br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#menu">Menu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="checkout.php">Checkout</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="login.php">Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="register.php">Sign Up</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Hot Products</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a style="cursor: pointer;">Mix Karaage Set</a></li>
              <li><i class="bx bx-chevron-right"></i> <a style="cursor: pointer;">Shrimp Bomb</a></li>
              <li><i class="bx bx-chevron-right"></i> <a style="cursor: pointer;">Kakiage Original</a></li>
              <li><i class="bx bx-chevron-right"></i> <a style="cursor: pointer;">Karaage Spicy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a style="cursor: pointer;">California Roll</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Subscribe to Our Newsletter</h4>
            <p>Subscribe to get our latest products and hot promo of our products!</p>
            <form action="" method="">
              <input type="email" name="email"><input type="submit" value="Subscribe" onclick="location.href='mailto:uts.pemweb@student.umn.ac.id';">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SushiPay</span></strong>. All Rights Reserved
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
