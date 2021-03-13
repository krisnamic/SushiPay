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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
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
</body>

</html>