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
    <title>Daftar</title>
</head>
<body>
    <h1>Daftar</h1>
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
            <label for="Email">Email</label>
            <input type="email" name="Email">
        </p>
        <p>
            <label for="NamaLengkap">Nama Lengkap</label>
            <input type="text" name="NamaLengkap">
        </p>
        <p>
            <label for="Alamat">Alamat</label>
            <input type="text" name="Alamat">
        </p>
        <p>
            <button type="submit" name="daftar">Daftar</button>
        </p>
    </form>
</body>
</html>