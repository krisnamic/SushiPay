<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["logout"])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
require "functions.php";
$query = "SELECT * FROM menu";
$result = mysqli_query($db, $query);
// print_r($result["namaMenu"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>
    <h1>INI HALAMAN Admin</h1>
    <form action="" method="POST">
        <button class="button logout" type="submit" name="logout">Log out!</button>
    </form>
    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>Nomor</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($result as $res) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $res["namaMenu"] . "</td>";
                    echo "<td>" . $res["hargaMenu"] . "</td>";
                    echo "<td>" . $res["deskripsiMenu"] . "</td>";
                    // echo "<td>" . $res["gambarMenu"] . "</td>";
                    echo "<td>" . "<img src='./menu_img/" . $res["gambarMenu"] . "' width='150px;'>" . "</td>";
                    echo "<td style='font-size:15px;'><div><a href='delete.php?id=" . $res["namaMenu"] . "'" . "><span class='glyphicon glyphicon-remove-sign'></span></a></div><a href='edit.php?id=" . $res["namaMenu"] . "'" . "><div class='glyphicon glyphicon-wrench'></div></a></td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</body>

</html>