<?php

require "functions.php";
$query = "SELECT * FROM menu";
$result = mysqli_query($db, $query);
session_start();

// if(!isset($_SESSION["user"])){
//     header("Location: login.php");
//     exit;
// }

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
</head>

<body>
    <h1>INI HALAMAN USER</h1>
    <form action="" method="POST">
        <button class="button logout" type="submit" name="logout">Log out!</button>
        <button class="button login" type="submit" name="login">login</button>
    </form>
    <?php foreach ($result as $res) : ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="./menu_img/<?= $res["gambarMenu"] ?>" width="150px">
                        <a href=""></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $res["namaMenu"] ?></h5>
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
    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>