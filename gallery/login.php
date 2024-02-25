<?php
session_start();

if( isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
require 'config/config.php';

if ( isset($_POST["login"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE Username = '$Username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($Password, $row["Password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["Username"] = $Username;
            $_SESSION["UserID"] = $row["UserID"];

            header("location: app/index.php?pesan=login");
            exit;
        }
    }

    $error = true;
}

if( isset($error)){
  echo "<script> alert('Username / password anda salah!'); </script>";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <p>
            <label for="Username">Username</label>
            <input type="text" name="Username">
        </p>
        <p>
            <label for="Password">Password</label>
            <input type="password" name="Password">
        </p>
        <p>
            <button type="submit" name="login">Login</button>
        </p>
        <p>
            <a href="daftar.php">Daftar</a>
        </p>
    </form>
</body>
</html>