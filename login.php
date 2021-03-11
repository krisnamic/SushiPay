<style>
    <?php include 'styles.css'; ?>
</style>
<?php
require 'functions.php';
session_start();

//for kicking uninvited guest
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["register"])) {
    header("location: register.php");
    exit;
}

//for signing in
if(isset($_POST["login"])){

    //fetch username & password from user's input
    $username = mysqli_real_escape_string($db,$_POST["username"]);
    $password = mysqli_real_escape_string($db,$_POST["password"]);


    //for checking password and username is empty or not
    if(empty($username) || empty($password)){
        echo "Username/Password harus diisi";
    }

    $result = mysqli_query($db, "SELECT * 
                        FROM account 
                        WHERE username = '$username'");

    //checking user's username in db === user's username input  
    if(mysqli_num_rows($result) === 1){
        
        //fetch password from user's input
        $row = mysqli_fetch_assoc($result);

        //checking user's password in db === user's password input
        if(password_verify ($password, $row["password"])){

            //checking if admin or user
            if($row['role']=="admin"){
                // create admin session
                $_SESSION['admin'] = true;
                header("location:admin.php");
                exit;
            }

            if($row['role']=="user"){
                // create user session
                $_SESSION['user'] = true;
                header("location:user.php");
                exit;
            }

        }

    $error1 = true;
    }
    $error2 = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <?php if (isset($error1) || isset($error2)) { ?>
            <p id="err-login">Username/Password is wrong!</p>
        <?php } ?>
        <form action="" method="post" autocomplete="off">
            <div class="container-items-login">
                <?php
                if (isset($flag1)) {
                    echo "Username harus diisi";
                }
                ?>

                <div class="box1">
                    <label for="username">Username/Email :</label>
                    <input type="text" name="username" id="username" placeholder="Please input username here!">
                </div>

                <div class="box2">
                    <?php
                    if (isset($flag2)) {
                        echo "Password harus diisi";
                    }
                    ?>
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" placeholder="********">
                </div>

                <div class="box3-login">
                    <button class="button login" type="submit" name="login">Sign in!</button>
                    <button class="button register" type="submit" name="register">Sign up!</button>
                </div>
                <div>
        </form>
    </div>
</body>

</html>