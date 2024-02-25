<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../login.php");
 exit;
}

require '../config/config.php';

$Username = $_SESSION['Username'];
$UserID = $_SESSION['UserID'];

if( isset($_POST['buat_album'])){
    if(buat_album($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan album');
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
    <title>Tambah Album</title>
</head>

<body>
    <h1>Tambah Album</h1>
    <form action="" method="post">
        <input type="hidden" name="UserID" value="<?php echo $UserID ?>">
        <p>
            <label for="NamaAlbum">Nama Album</label>
            <input type="text" name="NamaAlbum">
        </p>
        <p>
            <label for="Deskripsi">Deskripsi</label>
            <textarea name="Deskripsi" id="" cols="30" rows="10"></textarea>
        </p>
        <p>
            <button type="submit" name="buat_album">Tambah</button>
        </p>
    </form>
</body>

</html>