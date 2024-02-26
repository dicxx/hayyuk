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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                <div class="card-header">
                <h1>Login</h1>
            </div>
            <div class="card-body">
            <form action="" method="post">
        <p>
            <label for="Username">Username</label>
            <input type="text" name="Username" class="form-control" placeholder="Masukan username anda">
        </p>
        <p>
            <label for="Password">Password</label>
            <input type="password" name="Password" class="form-control" placeholder="****">
        </p>
        <p>
            belum punya akun? Daftar <a href="daftar.php">disini</a> 
        </p>
        <p>
            <button type="submit" name="login" class="btn btn-primary">login</button>
        </p>
             </form>
            </div>
                </div>
           
            </div>
           
        </div>
    </div>
</body>
</html>