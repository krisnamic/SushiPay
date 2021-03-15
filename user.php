<?php

require "functions.php";
$query = "SELECT * FROM menu";
$result = mysqli_query($db, $query);

$querykategori = "SELECT * FROM kategori";
$resultkategori = mysqli_query($db, $querykategori);
session_start();



if (isset($_SESSION["user"])) {
    $loggedin = true;
} else {
    $loggedin = false;
}

if (isset($_POST["logout"])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
if (isset($_POST['login'])) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['pesan'])) {
    if (!isset($_SESSION["user"])) {
        echo "<script>
        alert('anda harus login terlebih dahulu sebelum memesan!');
        document.location.href = 'login.php';
        </script>";
        exit;
    } else {
        if (addShoppingCart($_POST) > 1) {
            echo "<script>
        alert('successfuly added to shopping cart!');
        document.location.href = 'user.php';
        </script>";
        } else {
            echo "<script>
        alert('failed to add shopping cart !');
        document.location.href = 'user.php';
        </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <h1>INI HALAMAN USER</h1>
    <form action="" method="POST">
        <button class="button logout" type="submit" name="logout">Log out!</button>
        <?php
        if ($loggedin) {

            echo "<button class='button login' hidden type='submit' name='login'>login</button> ";
        } else {
            echo "<button class='button login' type='submit' name='login'>login</button> ";
        }
        ?>
        <?php date_default_timezone_set("Asia/Bangkok"); ?>
        <?= date("Y-m-d H:i:s"); ?>
        <br>
        <a href="checkout.php">Go to Shopping Cart</a>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <ul class="portofolio-filters">
                <button data-filter="*" class="btn btn-primary filter-button">All</button>
                <?php foreach ($resultkategori as $resk) :  ?>
                    <button>
                        <li class="btn btn-default filter-button" data-filter="<?= $resk["ID_Kategori"]; ?>"><?= $resk["namaKategori"]; ?></li>
                    </button>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php foreach ($result as $res) : ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card filter <?= $res["ID_Kategori"] ?>" style="width: 18rem;">
                        <a class="btn" data-toggle="modal" data-target="#myModal<?php echo $res['ID_Menu']; ?>"><img class="card-img-top" src="./menu_img/<?= $res["gambarMenu"] ?>" width="150px"></a>
                        <div class="card-body">
                            <a class="btn" data-toggle="modal" data-target="#myModal<?php echo $res['ID_Menu']; ?>">
                                <h5 class="card-title"><?= $res["namaMenu"] ?></h5>
                            </a>
                            <p class="card-text"><?= $res["deskripsiMenu"] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Price : Rp.<?= $res["hargaMenu"] ?></li>
                            <li class="list-group-item" hidden><?= $res["ID_Kategori"] ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal<?php echo $res['ID_Menu']; ?>" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Header</h4>
                        <?php echo $res['ID_Menu']; ?>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <?php var_dump($result);
                            ?>
                            <div class="row-container">
                                <div class="col-container"><img name="gambarMenu" src="./menu_img/<?= $res["gambarMenu"] ?>" alt="<?= $res["gambarMenu"] ?>" width="100%;"></div>
                                <div class="col-container">
                                    <label for="namaMenu">Namamenu</label>
                                    <h1 name="namaMenu"><?= $res['namaMenu']; ?></h1>
                                </div>
                                <div class="col-container">
                                    <p id="deskripsiMenu" name="deskripsiMenu"><?= $res['deskripsiMenu']; ?></p>
                                    <p id="hargaMenu" name="hargaMenu">Rp. <?= $res['hargaMenu']; ?></p>
                                </div>
                                <input type="number" min="1" name="jumlah" id="jumlah">
                                <input type="text" hidden name="gambar" value="<?= $res["gambarMenu"] ?>">
                                <input type="text" hidden name="nama" value="<?= $res["namaMenu"] ?>">
                                <input type="text" hidden name="desc" value="<?= $res["deskripsiMenu"] ?>">
                                <input type="text" hidden name="harga" value="<?= $res["hargaMenu"] ?>">
                                <input type="text" hidden value="<?= $res['ID_Menu']; ?>" name="idmenu">
                                <button type="submit" name="pesan" id="pesan">Pesan</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    </div>
    <script>
        $(document).ready(function() {
            $(".filter-button").click(function() {
                var value = $(this).attr('data-filter');
                if (value == "*") {
                    $('.filter').show('1000');
                } else {
                    $('.filter').not('.' + value).hide('3000');
                    $('.filter').filter('.' + value).show('3000');
                }
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
