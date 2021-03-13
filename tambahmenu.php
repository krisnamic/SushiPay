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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <br><br>
            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-primary" name="submitdata">Submit</button>
                    <a href="admin.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>