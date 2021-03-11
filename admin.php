<?php

session_start();

    if(!isset($_SESSION["admin"])){
        header("Location: login.php");
        exit;
    }

    if(isset($_POST["logout"])){
        $_SESSION = [];
        session_unset();
        session_destroy();
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
</head>
<body>
    <h1>INI HALAMAN USER</h1>
    <form action="" method="POST">
        <button class="button logout" type="submit" name="logout">Log out!</button>
    </form>
</body>
</html>