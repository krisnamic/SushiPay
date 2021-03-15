<style>
  <?php include 'style.css';
  ?>
</style>
<?php
require 'functions.php';
session_start();

//for kicking uninvited guest
if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

if (isset($_GET["register"])) {
  if (empty($username) || empty($password)) {
    header("location: register.php");
  } else {
    header("location: register.php");
  }
    exit;
}

//for signing in
if (isset($_POST["login"])) {

    //fetch username & password from user's input
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    $query_id = "SELECT ID FROM account WHERE username = '$username'";
    $result_id = mysqli_query($db, $query_id);

    //for checking password and username is empty or not
    if (empty($username) || empty($password)) {
        echo "Username/Password harus diisi";
    }

    $result = mysqli_query($db, "SELECT *
                        FROM account
                        WHERE username = '$username' OR email = '$username'");

    //checking user's username in db === user's username input
    if (mysqli_num_rows($result) === 1) {

        //fetch password from user's input
        $row = mysqli_fetch_assoc($result);

        //checking user's password in db === user's password input
        if (password_verify($password, $row["password"])) {

            //checking if admin or user
            if ($row['role'] == "admin") {
                // create admin session
                $_SESSION['admin'] = true;
                header("location:admin.php");
                exit;
            }

            if ($row['role'] == "user") {
                // create user session
                $_SESSION['user'] = true;
                foreach ($result_id as $r) {
                    $_SESSION['user_id'] = $r['ID'];
                    // $tes = $_SESSION['user_id'];
                    // echo "<script>alert('$tes');</script>";
                }
                header("location:user.php");
                exit;
            }
        }

        $error1 = true;
    }
    $error2 = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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
          <!-- <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#chefs">Chefs</a></li>-->
          <li><a href="checkout.php"><i class="icofont-cart-alt" style="font-size: 35px; color:white;"></i></a></li>
          <li class="book-a-table text-center"><a href="login.php">Login</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <section id="login" class="login">

      <div class="container" data-aos="fade-up" class="login">

        <div class="section-title-checkout">
          <h2 style="font-family: 'Meiryo';">ログイン</h2>
          <p>Sign In to SushiPay</p>
        </div>

        <?php
          /*if (isset($error1) || isset($error2)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<!--<p id="err-login">-->Username/Password is wrong!<!--</p>-->';
            echo '</div>';
          }*/
        ?>

        <?php
          if(isset($_POST['login'])) {
            if ((empty($username) == false) && (empty($password) == false)) {
              if ((isset($error1) || isset($error2))) {
                echo '<div class="alert alert-danger" role="alert">';
                echo "Username/Password is wrong";
                echo '</div>';
              }
            }
          }

        ?>

        <form action="" method="post" autocomplete="off" class="needs-validation php-email-form" novalidate>
          <div class="container-items-login">

            <div class="form-group">
              <label for="username">Username/Email :</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Please input username here!" required>
              <div class="invalid-feedback">Username/Email harus diisi</div>
              <?php
                /*if (isset($flag1)) {
                    echo "Username harus diisi";
                }*/
                if(isset($_POST['login'])) {
                  if (empty($username)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "Username/Email harus diisi";
                    echo '</div>';
                  }
                }
              ?>
            </div>

            <div class="form-group">
              <label for="password">Password : </label>
              <input type="password" name="password" class="form-control" id="password" placeholder="********" required>
              <div class="invalid-feedback">Password harus diisi</div>
              <?php
                  /*if (isset($flag2)) {
                      echo "Password harus diisi";
                  }*/
                  if(isset($_POST['login'])) {
                    if (empty($password)) {
                      echo '<div class="alert alert-danger" role="alert">';
                      echo "Password harus diisi";
                      echo '</div>';
                    }
                  }
              ?>
            </div>

            <div class="form-group">
              <button class="btn btn-primary login" type="submit" name="login">Sign In</button>
            </div>
          </div>
        </form>

        <form action="" method="GET" class="php-email-form">
          <div class="d-inline-flex flex-row align-items-center" style="vertical-align: center;">
            <div class="form-group text-center">
              <span style="color:grey;">Need an account?</span>
            </div>
            <div class="form-group text-center">
              <button class="btn btn-link register" type="submit" name="register" center>
                Sign up!
              </button>
            </div>
          </div>
        </form>
      </div>

    </section>


  </main>

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
