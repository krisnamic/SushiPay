<?php

$db = mysqli_connect("localhost", "root", "", "restaurant_uts");

function register($data)
{
    global $db;
    $email = strtolower(stripslashes($data["email"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $email_result = mysqli_query($db, "SELECT email FROM account WHERE email = '$email'");
    $username_result = mysqli_query($db, "SELECT username FROM account WHERE username = '$username'");
    if (mysqli_fetch_assoc($email_result)) {
        echo "<script>
                    alert('Email already taken! Please use another one.')
                </script>";
        return false;
    } else if (mysqli_fetch_assoc($username_result)) {
        echo "<script>
                    alert('Username already taken! Please use another one.')
                </script>";
        return false;
    }
    echo "tes1";
    //checking password
    $pass_len = strlen($password);
    if ($pass_len < 8) {
        echo "tes2";
        return false;
    }
    if ($password !== $password2) { ?>
        <p id="err">Password doesnt match confirmation!</p>
<?php echo "tes2";
        return false;
    }
    //encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //adding user's data to db
    $firstname = $data["firstname"];
    $lastname = $data["lastname"];
    $birthdate = $data["birthdate"];
    $gender = $data["gender"];

    mysqli_query($db, "INSERT INTO account VALUE('','$username','$email','$password','$firstname','$lastname','$birthdate','$gender','user')");

    return mysqli_affected_rows($db);
}
//----------------------------------------------------------------------------------------------------------
function addMenu($data)
{
    global $db;
    $name = htmlspecialchars($data["name"]);
    $description = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);
    $category = $data["category"];
    //upload gambar
    $picture = upload();
    if (!$picture) {
        return false;
    }
    $query = "INSERT INTO menu
                VALUES
                ('','$name','$description',$price,'$picture',$category);";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function upload()
{
    $namaFile = $_FILES["picture"]["name"];
    $ukuranFile = $_FILES["picture"]["size"];
    $error = $_FILES["picture"]["error"];
    $tmpName = $_FILES["picture"]["tmp_name"];
    // cek apakah tdk ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('Please insert picture first.');
        </script>";
        return false;
    }
    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    //ambil ekstensi file gambar dari nama filenya
    //gunakan explode untuk memecah string menjadi array explode(delimiter,string)
    $ekstensiGambar = explode('.', $namaFile);
    //misalkan nama filenya mhs1.jpg akan menjadi ['mhs1','jpg']
    //ambil elemen terakhir dari array $extensiGambar yang telah diexplode
    //bikin lowercase klo misalnya ada user masukin .JPG, biar ttep kebaca
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    //cek apakah ekstensi yg diupload ada di $ekstensiGambarValid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('This file is not in .jpg/.jpeg/.png format.');
        </script>";
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 900000) { //kisaran 900 KB
        echo "<script>
        alert('File size exceeds the limit.');
        </script>";
    }
    //lolos pengecekan, gambar siap diupload
    //pindain dari tmp nya (tmp adalah tempat gambar smentara setelah diupload)
    //pake move_upload_file(filename,destination)

    //namun, kalo ada user yang mengupload nama file yang sama, maka yang sebelumnya gambarnya akan ketimpa
    //generate nama gambar baru
    $namaFileBaru = uniqid(); //uniqid utk membangkitkan angka string random
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    // var_dump($namafileBaru); die;
    move_uploaded_file($tmpName, 'menu_img/' . $namaFileBaru);
    return $namaFileBaru;
}

function edit($data)
{
    global $db;
    $idMenu = $data["ID_Menu"];
    $name = htmlspecialchars($data["namaMenu"]);
    $description = htmlspecialchars($data["deskripsiMenu"]);
    $price = htmlspecialchars($data["hargaMenu"]);
    $oldpicture = $data["gambarlama"];
    if ($_FILES["picture"]['error'] === 4) {
        $picture = $oldpicture;
    } else {
        $picture = upload();
    }
    $query = "UPDATE menu SET
                namaMenu = '$name',
                deskripsiMenu = '$description',
                hargaMenu = $price,
                gambarMenu = '$picture'
                WHERE ID_Menu = $idMenu";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function delete($data)
{
    global $db;
    $idMenu = $data["delete"];
    mysqli_query($db, "DELETE FROM menu WHERE ID_Menu = $idMenu");
    return mysqli_affected_rows($db);
}

function addShoppingCart($data)
{
    global $db;
    $idmenu = $data["idmenu"];
    $jumlah = $data["jumlah"];
    $gambar = $data["gambar"];
    $deskripsi = $data["desc"];
    $harga = $data["harga"];
    $nama = $data["nama"];
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $iduser = $_SESSION["user_id"];

    $query = "INSERT INTO pesanan(ID_Pesanan, ID_User, tanggalPemesanan, waktuPemesanan) VALUES('',$iduser,'$date','$time');";

    mysqli_query($db, $query);
    $affected = mysqli_affected_rows($db);
    // -------------------------------------------------------------------------------------

    $query_ID_Pesanan = "SELECT ID_Pesanan FROM pesanan WHERE ID_User = $iduser AND tanggalPemesanan = '$date'
    AND waktuPemesanan = '$time'";
    // var_dump($query_ID_Pesanan);
    // echo "<script>alert($query_ID_Pesanan $harga $jumlah $idmenu);</script>";
    $coba = mysqli_query($db, $query_ID_Pesanan);
    $gatau = mysqli_fetch_assoc($coba);
    $x = $gatau["ID_Pesanan"];
    // var_dump($gatau);
    $querydetail = "INSERT INTO detailpesanan(ID_Pesanan, hargaMenu, jumlah, ID_Menu)
    VALUES
    ($x, $harga, $jumlah, $idmenu);";
    // var_dump($querydetail);
    mysqli_query($db, $querydetail);
    // $tes = mysqli_errno($db);
    $tes = mysqli_error($db);
    $affected += mysqli_affected_rows($db);
    return $affected;
    //tes
}
