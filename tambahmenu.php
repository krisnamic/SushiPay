<?php
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
            alert('data berhasil ditambahkan');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
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
      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

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
            <li class="book-a-table text-center">
                <form action="" method="POST">
                    <button class="button logout" type="submit" name="logout" style="background-color:black; border: 0px;"><a>Log out!</a></button>
                </form>
            </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  
  <main>
    <div class="container" style="text-align: center; padding-top: 100px; padding-bottom:20px;">
        <h1>Tambah Menu</h1>
    </div>
    <div class="container">
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
                <a href="admin.php" class="btn btn-default" style="border: 1px solid gray;">Cancel</a>
            </div>
        </form>
    </div>
    </main>

    <!-- ======= Footer ======= -->
  <footer id="footer" style="margin-top: 40px;">
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