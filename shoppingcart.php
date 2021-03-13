<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: user.php");
    exit;
}
require "functions.php";
$userid = $_SESSION['user_id'];

$query = "SELECT detailPesanan.hargaMenu, detailPesanan.jumlah, menu.namaMenu, menu.gambarMenu, detailPesanan.hargaMenu * detailPesanan.jumlah 'Total Harga'
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

if (isset($_POST["backtohome"])) {
    header("Location: user.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <button><a href="user.php">back to main menu</a></button>
    <br><br><br> -->
    <form action="" method="POST">
        <button type="submit" name="backtohome">Back to Main Menu</button>
    </form>
    <?php foreach ($result as $res) : ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="./menu_img/<?= $res["gambarMenu"] ?>" width="150px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $res["namaMenu"] ?></h5>
                            <p class="card-text"><?= $res["jumlah"] ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Price : Rp.<?= $res["hargaMenu"] ?></li>
                            <li class="list-group-item">Total Price : Rp.<?= $res["Total Harga"] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>