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
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #A8A9AD;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Selamat Datang <?= $Username ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah-album.php">+Album</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tambah-foto.php">+Foto</a>
        </li>
      </ul>
    </div>
  </div>
  <a class="btn btn-outline-success" type="submit" href="logout.php">Logout</a>
</nav>

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