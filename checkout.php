<?php

  session_start();
  if (isset($_POST["logout"])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
  }
  if (!isset($_SESSION["user"])) {
      header("Location: index.php");
      exit;
  }
  if (isset($_SESSION["user"])) {
      $loggedin = true;
  } else {
      $loggedin = false;
  }
  require "functions.php";
  $userid = $_SESSION['user_id'];

  $query = "SELECT detailPesanan.hargaMenu, detailPesanan.jumlah, menu.namaMenu, menu.gambarMenu, detailPesanan.hargaMenu * detailPesanan.jumlah 'Total Harga', pesanan.waktuPemesanan, pesanan.tanggalPemesanan
  FROM detailPesanan
  JOIN menu
  ON detailPesanan.ID_menu = menu.ID_Menu
  JOIN pesanan
  ON detailPesanan.ID_Pesanan = pesanan.ID_Pesanan
  JOIN account
  ON pesanan.ID_User = account.ID
  WHERE account.ID = $userid;";
  $result = mysqli_query($db, $query);
  $tes = mysqli_affected_rows($db);

  $total = 0;
  foreach ($result as $res) :
    $total += $res["Total Harga"];
  endforeach;

  if (isset($_POST["backtohome"])) {
      header("Location: index.php");
  }

?>
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

    <!-- ======= Book A Table Section ======= -->
    <section id="checkout" class="checkout">
      <div class="container" data-aos="fade-up">

        <div class="section-title-checkout">
          <h2>チェックアウト</h2>
          <p>Shopping Cart</p>
        </div>

        <div class="d-inline-flex align-items-start bd-highlight mb-3">
          <div class="col-lg-8 row checkout-container d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($result as $res) : ?>
              <div class="col-lg-12 checkout-item filter-starters">
                <img src="./menu_img/<?= $res["gambarMenu"] ?>" class="checkout-img" alt="">
                <div class="checkout-content">
                  <a href="#"><?= $res["namaMenu"] ?></a><span>Total: Rp.<?= number_format($res["Total Harga"],0,',','.') ?></span>
                </div>
                <div class="checkout-desc" style="font-size: 17px;">
                  <?= "Price " . "&nbsp;&nbsp;&emsp;&emsp;" . " : Rp." . number_format($res["hargaMenu"],0,',','.') ?><br/>
                  <?= "Quantity " . "&nbsp;&emsp;: " . $res["jumlah"] ?><br/>
                  <?= "Order Date : " . $res["tanggalPemesanan"] ?><br/>
                  <?= "Order Time : " . $res["waktuPemesanan"] ?>
                </div>
              </div>
            <?php endforeach; ?>



          </div>

          <div id="order-summary" class="col-lg-4 row checkout-container align-items-center" data-aos="fade-up" data-aos-delay="200" style="width: 200px; margin-top: 40px; margin-left: 40px;">

            <div class="order-summary-title col-lg-12">
              <h2>Order Summary</h2>
              <hr/>
            </div>

            <?php foreach ($result as $res) : ?>
              <div class="col-lg-12 d-flex justify-content-between">
                <p><?= $res["namaMenu"] ?></p>
                <p><?= number_format($res["Total Harga"],0,',','.') ?></p>
              </div>
            <?php endforeach; ?>

            <!-- tambahin php looping -->

            <div class="col-lg-12">
              <hr/>
            </div>

            <div class="col-lg-12 d-flex justify-content-between">
              <p>Total Cost:</p>
              <p>Rp.<?= number_format($total,0,',','.') ?></p>
            </div>

            <!-- <ul class="list-unstyled text-center">
              <li class="btn-checkout text-center"></li>
            </ul> -->
            <div class="col-lg-12 d-flex justify-content-end">
              <button type="button" class="btn-checkout animated fadeInUp scrollto" data-toggle="modal" data-target="#myModal" style="background-color: #11110d; border: 0px; padding:0; padding-bottom: 15px;">
                <a>Checkout</a>
              </button>
            </div>
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
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
