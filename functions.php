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
                    alert('email already taken! Please use another one!')
                </script>";
        return false;
    } else if (mysqli_fetch_assoc($username_result)) {
        echo "<script>
                    alert('Username already taken! Please use another one!')
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
    // -------------------------------------------------------------------------------------
}
