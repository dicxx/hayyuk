<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
require '../config/config.php';

$Username = $_SESSION ['Username'];
$UserID = $_SESSION['UserID'];

$hasil = mysqli_query($conn, "SELECT * FROM foto WHERE UserID = '$UserID'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
</head>

<body>
    <h1>selamat datang <?= $Username ?></h1>
    <a href="tambah-album.php">Tambah album</a>
    <a href="tambah-foto.php">Tambah Foto</a>
    <a href="logout.php">logout</a>

    <br><br><br>

    <div class="container">
        <div class="row">
            <?php foreach($hasil as $gambar) : ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="../img/<?= $gambar['LokasiFile'] ?>" class="card-img-top" alt="90900">
                    <div class="card-body">
                        <h5 class="card-title"><?= $gambar['JudulFoto'] ?></h5>
                        <p class= "card-title"><?= $gambar['TanggalUnggah']?></p>
                        <p class="card-text"><?= $gambar['DeskripsiFoto'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>