<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../login.php");
 exit;
}

require '../config/config.php';

$UserID = $_SESSION['UserID'];

if( isset($_POST['tambah_foto'])){
    if(tambah_foto($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan foto');
        document.location.href = 'index.php';
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
    <title>Tambah Foto</title>
</head>

<body>
    <h1>Tambah Foto</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="UserID" value="<?php echo $UserID ?>">
        <p>
            <label for="JudulFoto">Judul Foto</label>
            <input type="text" name="JudulFoto">
        </p>
        <p>
            <label for="DeskripsiFoto">Deskripsi Foto</label>
            <textarea name="DeskripsiFoto" id="" cols="30" rows="10"></textarea>
        </p>
        <p>
            <label for="foto">Foto</label>
            <input type="file" name="foto">
        </p>
        <p>
            <select name="AlbumID" id="Album">
                <?php
             $result = mysqli_query($conn, "SELECT * FROM album WHERE UserID = '$UserID'");
             while($data = mysqli_fetch_array($result)) {
                ?>
                <option value="<?= $data['AlbumID'] ?>"><?php echo $data['NamaAlbum'] ?></option>
                <?php
             }
                ?>
            </select>
        </p>
        <p>
            <button type="submit" name="tambah_foto">Tambah</button>
        </p>
    </form>
</body>

</html>