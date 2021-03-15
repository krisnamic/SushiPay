<?php

session_start();

if (isset($_POST["logout"])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("location: login.php");
    exit;
}

require "functions.php";
$query = "SELECT * FROM kategori";
$result = mysqli_query($db, $query);
// print_r($result["namaKategori"]);

if (isset($_POST["submitdata"])) {
    //cek isi dari post dan enctype
    // var_dump($_POST);
    // var_dump($_FILES); die;

    //cek apakah data berhasil ditambahkan atau tidak
    if (addMenu($_POST) > 0) {
        echo "
        <script>
            alert('Succesfully added data.');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Failed to load data.');
            document.location.href = 'admin.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>(Admin) Website : Restoran UTS IF430</title>
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
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Restaurantly</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo/logo-red.png" onmouseover="this.src='assets/img/logo/logo-white.png';" onmouseout="this.src='assets/img/logo/logo-red.png';" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="book-a-table text-center">
            <form action="" method="POST">
                <?php
                    echo "<button class='button logout btn btn-primary' type='submit' name='logout'>Log out!</button>";
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

  <main>
  <section id="register" class="login" style="padding-bottom: 30px;">
    <div class="container" data-aos="fade-up" class="login"  style="background-color: white; opacity: 0.98; border-radius: 15px;">
    <div class="container" style="text-align: center; padding-top: 100px; padding-bottom:20px;">
        <h1>Tambah Menu</h1>
    </div>
    <div class="container" style="padding-bottom: 40px;">
        <form action="" method="POST" enctype="multipart/form-data" style="border: 1px solid black; padding: 20px; border-radius:10px;">
            <div class="form-group">
                <label for="name">Nama Menu</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Menu">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Menu</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Harga Menu</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Harga Menu" min="1">
            </div>
            <div class="form-group">
                <label for="picture">Gambar Menu</label>
                <input type="file" name="picture" id="picture">
            </div>
            <div class="form-group">
                <label for="category">Kategori Menu</label>
                <select name="category" id="category">
                    <?php
                    foreach ($result as $res) {
                        echo "<option value='", $res["ID_Kategori"], "'>" . $res["namaKategori"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submitdata">Submit</button>
                <a href="admin.php" class="btn btn-primary" style="background-color: #0069D9; color: white; border: 1px solid white;" onmouseover="this.style.color='#0069d9';this.style.backgroundColor='white'; this.style.border='1px solid #0069d9'" onmouseout="this.style.color='white';this.style.backgroundColor='#0069D9'">Cancel</a>
            </div>
        </form>
    </div>
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
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</body>
</html>
