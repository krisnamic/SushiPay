<?php
require 'functions.php';
session_start();

if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

//for kicking uninvited guest
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["register"])) {
  header("Location: register.php");
}

if (isset($_GET["register"])) {
  if (empty($username) || empty($password)) {
    header("Location: register.php");
  } else {
    header("Location: register.php");
  }
    exit;
}

//for signing in
if (isset($_POST["login"])) {

    //fetch username & password from user's input
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    //for checking password and username is empty or not
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username/Password harus diisi');</script>";
    }

    $query_id = "SELECT ID FROM account WHERE username = '$username'";
    $result_id = mysqli_query($db, $query_id);

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
                header("Location:admin.php");
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
                header("Location:index.php");
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

  <script src="app.js"></script>
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
                    echo "<button class='button login btn btn-primary' type='submit' name='register'>Sign Up</button> ";
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

    <section id="login" class="login">

      <div class="container" data-aos="fade-up" class="login" style="background-color: white; opacity: 0.98; border-radius: 15px;">

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
              <input type="text" name="username" id="username" class="form-control" placeholder="Input your username or email here" required>
              <div class="invalid-feedback">Username/Email harus diisi</div>
              <?php
                /*if (isset($flag1)) {
                    echo "Username harus diisi";
                }*/
                // if(isset($_POST['login'])) {
                //   if (empty($username)) {
                //     echo '<div class="alert alert-danger" role="alert">';
                //     echo "Username/Email harus diisi";
                //     echo '</div>';
                //   }
                // }
              ?>
            </div>

            <div class="form-group">
              <label for="password">Password : </label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Input your password here" required>
              <div class="invalid-feedback">Password harus diisi</div>
              <?php
                  /*if (isset($flag2)) {
                      echo "Password harus diisi";
                  }*/
                  // if(isset($_POST['login'])) {
                  //   if (empty($password)) {
                  //     echo '<div class="alert alert-danger" role="alert">';
                  //     echo "Password harus diisi";
                  //     echo '</div>';
                  //   }
                  // }
              ?>
            </div>

            <div id="captcha-title"class="section-title-checkout" style="padding-top: 10px;">
              <h2>CAPTCHA</h2>
            </div>

            <div class="form-group">
               <?php include 'captcha.php' ?>
            </div>

            <div class="form-group" style="color: green; display: none;" id="valid">
              <p style="font-size: 20px;">Captcha Done &nbsp;<i class="icofont-check-circled" style="font-size: 20px;"></i></p>
            </div>

            <div class="form-group" style="padding-top: 25px;">
              <button id="login-btn" class="btn btn-primary login" type="submit" name="login">Sign In</button>
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
        document.getElementById("login-btn").disabled = true;
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
