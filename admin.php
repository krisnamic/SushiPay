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
$query = "SELECT * FROM menu";
$result = mysqli_query($db, $query);

if (isset($_POST["change"])) {
    if (edit($_POST) > 0) {
        echo "<script>
        alert('Task edited successfuly.');
        document.location.href = 'admin.php';
    </script>";
    } else {
        echo "<script>
        alert('Failed to edit task.');
        document.location.href = 'admin.php';
    </script>";
    }
}

if (isset($_POST['delete'])) {
    if (delete($_POST) > 0) {
        echo "<script>
        alert('Menu deleted successfully.');
        document.location.href = 'admin.php';
    </script>";
    } else {
        echo "<script>
        alert('Failed to delete task.');
        document.location.href = 'admin.php';
    </script>";
    }
}

// print_r($result["namaMenu"]);
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
          <?php
          if ($loggedin) {
            echo '<li><a href="checkout.php"><i class="icofont-cart-alt" style="font-size: 35px; color:white;"></i></a></li>';
          }
          ?>

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
  <section id="admin" class="login">
    <div class="container" data-aos="fade-up" class="login" style="background-color: white; opacity: 0.98; border-radius: 15px;">

    <h1 style="padding-top: 100px; padding-bottom:20px; text-align: center; font-size: 8vh;">ADMIN</h1>
    <div class="container">
        <div class="text-right">
            <a href="tambahmenu.php" class="btn btn-primary" style="margin-bottom:20px;"><i class="icofont-database-add"></i>&nbsp;&nbsp;Tambah Menu</a>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>ID</th>
                <th>Menu Name</th>
                <th>Price&emsp;&emsp;&emsp;</th>
                <th>Menu Description</th>
                <th>Picture</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($result as $res) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $res["namaMenu"]; ?></td>
                        <td>Rp. <?= number_format($res["hargaMenu"],0,',','.'); ?></td>
                        <td><?= $res["deskripsiMenu"]; ?></td>
                        <td><img src="./menu_img/<?= $res["gambarMenu"] ?>" width="150px"></td>
                        <td>
                            <button type="button" class="btn btn-primary" style="margin-bottom: 5px;background-color: #0069D9; color: white; border: 1px solid white;" onmouseover="this.style.color='#0069d9';this.style.backgroundColor='white'; this.style.border='1px solid #0069d9'" onmouseout="this.style.color='white';this.style.backgroundColor='#0069D9'" data-toggle="modal" data-target="#edit<?php echo $res['ID_Menu']; ?>">
                                Edit
                            </button>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="delete" id="delete" value="<?= $res['ID_Menu'] ?>">Delete</button>
                            </form>
                        </td>
                        <!-- blm bner -->
                        <div class="modal fade" id="edit<?php echo $res['ID_Menu']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-backdrop="false">
                            <!-- data-backdrop=false biar ilangin screen gelap & g bisa diklik  -->
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2" style="font-size: 25px;">Edit Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <ul style="list-style: none;">
                                                <li>
                                                    <label for="namaMenu">Nama Menu :</label>
                                                    <input type="text" name="namaMenu" id="namaMenu" value="<?= $res['namaMenu'] ?>">
                                                </li>
                                                <li>
                                                    <label for="hargaMenu">Harga Menu :</label>
                                                    <input type="number" name="hargaMenu" id="hargaMenu" value="<?= $res['hargaMenu'] ?>">
                                                </li>
                                                <li>
                                                    <label for="deskripsiMenu">Deskripsi Menu :</label>
                                                    <textarea name="deskripsiMenu" id="deskripsiMenu" cols="40" rows="5"><?= $res['deskripsiMenu'] ?></textarea>
                                                </li>
                                                <li>
                                                    <label for="gambarMenu">Gambar Menu</label>
                                                    <input type="file" name="picture" id="picture">
                                                </li>
                                                <input type="hidden" name="ID_Menu" id="ID_Menu" value="<?= $res['ID_Menu'] ?>">
                                                <input type="hidden" name="gambarlama" value="<?= $res["gambarMenu"]; ?>">
                                                <div class="d-flex justify-content-end">
                                                  <button type="submit" class="btn btn-primary" name="change" style="margin-top: 20px;">Confirm Edit</button>
                                                </div>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
              <th>ID</th>
              <th>Menu Name</th>
              <th>Price</th>
              <th>Menu Description</th>
              <th>Picture</th>
              <th>Action</th>
            </tfoot>
        </table>
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
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
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
