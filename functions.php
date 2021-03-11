<?php

function register($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);


    //checking if there is a same username into db
    $result = mysqli_query($db, "SELECT username 
                       FROM users 
                       WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username already taken! Please use another one!')
              </script>";
        return false;
    }


    //checking password return the same password confirmation
    if ($password !== $password2) { ?>
        <p id="err">Password doesnt match confirmation!</p>
<?php return false;
    }


    //encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //adding user's data to db
    mysqli_query($db, "INSERT INTO users VALUE('','$username','$password')");

    return mysqli_affected_rows($db);
} ?>