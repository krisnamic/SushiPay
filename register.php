<?php

require 'functions.php';

if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>
                    alert('Registered!');
                  </script>";
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

    <section id="register" class="register section-bg">

      <div class="container-regist">
        <form action="" method="post" autocomplete="off">
          <div class="container-items">
            <div class="box box1">
              <label for="email">Email :</label>
              <input type="email" name="email" id="email" placeholder="Please input email here!" required>
            </div>
            <div class="box box1">
              <label for="username">Username :</label>
              <input type="text" name="username" id="username" placeholder="Please input username here!" required>
            </div>
            <div class="box box1">
              <label for="firstname">First Name :</label>
              <input type="text" name="firstname" id="firstname" placeholder="Please input firstname here!" required>
            </div>
            <div class="box box1">
              <label for="lastname">Last Name :</label>
              <input type="text" name="lastname" id="lastname" placeholder="Please input lastname here!" required>
            </div>
            <div class="box box1">
              <label for="birthdate">Birth Date :</label>
              <input type="date" name="birthdate" id="birthdate" required>
            </div>
            <div class="box box1">
              <label for="gender">Female</label>
              <input type="radio" name="gender" id="female" value="f" required>
              <label for="gender">Male</label>
              <input type="radio" name="gender" id="male" value="m" required>
            </div>
            <div class=" box box2">
              <label for="password">Password :</label>
              <input type="password" name="password" id="password" placeholder="**" required>
            </div>
            <div class="box box2">
              <label for="password2">Confirmation password:</label>
              <input type="password" name="password2" id="password2" placeholder="**" required>
            </div>
            <div class="box box4">
              <button class="button signup-register" type="submit" name="register">Sign up!</button>
            </div>
          </div>
        </form>
        <form action="" method="GET">
          <button class="button back-register" type="submit" name="backToLogin">Back to login</button>
        </form>
      </div>

    <section>



  </main>


</body>

</html>
