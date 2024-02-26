<?php 
session_start();

if( isset($_SESSION["login"])) {
    header("location:../login.php");
    exit;
}

require 'config/config.php';

if( isset($_POST['daftar'])){
    if(register($_POST) > 0){
        echo "<script>
        alert('anda berhasil mendaftar');
        document.location.href = 'login.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Daftar</title>
</head>
<body>
<br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                <div class="card-header">
                <h1>Daftar</h1>
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
            <label for="Email">Email</label>
            <input type="email" name="Email" class="form-control" placeholder="Masukan email anda">
        </p>
        <p>
            <label for="NamaLengkap">Nama Lengkap</label>
            <input type="text" name="NamaLengkap" class="form-control" placeholder="Masukan nama lengkap anda">
        </p>
        <p>
            <label for="Alamat">Alamat</label>
            <input type="text" name="Alamat" class="form-control" placeholder="Masukan alamat anda">
        </p>
        <p>Sudah punya akun login <a href="login.php">disini</a>
        </p>
        <p>
            <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
        </p>
    </form>
</body>
</html>