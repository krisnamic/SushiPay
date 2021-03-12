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

if (isset($_POST["change"])) {
    if (edit($_POST) > 0) {
        echo "<script>
        alert('task edited successfuly!');
        document.location.href = 'admin.php';
    </script>";
    } else {
        echo "<script>
        alert('failed to edit task!');
        document.location.href = 'admin.php';
    </script>";
    }
}
if (isset($_POST['delete'])) {
    if (delete($_POST) > 0) {
        echo "<script>
        alert('menu deleted successfuly!');
        document.location.href = 'admin.php';
    </script>";
    } else {
        echo "<script>
        alert('failed to delete task!');
        document.location.href = 'admin.php';
    </script>";
    }
}
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
        <div class="text-right">
            <a href="tambahmenu.php" class="btn btn-primary" style="margin-bottom:20px;"><i class="fas fa-plus-circle">&emsp;</i>Tambah Menu</a>
        </div>
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
                foreach ($result as $res) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $res["namaMenu"]; ?></td>
                        <td><?= $res["hargaMenu"]; ?></td>
                        <td><?= $res["deskripsiMenu"]; ?></td>
                        <td><img src="./menu_img/<?= $res["gambarMenu"] ?>" width="150px"></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $res['ID_Menu']; ?>">
                                Edit
                            </button>
                            <form action="" method="post">
                                <button type="submit" name="delete" id="delete" value="<?= $res['ID_Menu'] ?>">delete</button>
                            </form>
                        </td>
                        <!-- blm bner -->
                        <div class="modal fade" id="edit<?php echo $res['ID_Menu']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-backdrop="false">
                            <!-- data-backdrop=false biar ilangin screen gelap & g bisa diklik  -->
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Edit Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <?php echo $res['ID_Menu']; ?>
                                            <ul>
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
                                                <input type=" hidden" name="ID_Menu" id="ID_Menu" value="<?= $res['ID_Menu'] ?>">
                                                <input type="hidden" name="gambarlama" value="<?= $res["gambarMenu"]; ?>">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="change">Confirm Edit</button>
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