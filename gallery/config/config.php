<?php

$conn = mysqli_connect("localhost","root","","gallery");


function register($data){
    global $conn;

    $Username = $data['Username'];
    $Password = $data['Password'];
    $Email = $data['Email'];
    $NamaLengkap = $data['NamaLengkap'];
    $Alamat = $data['Alamat'];

    $result = mysqli_query($conn, "SELECT Username FROM user WHERE Username = '$Username'");

    //seleksi
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //password hash
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");
    return mysqli_affected_rows($conn);
    
}


function buat_album ($data){
    global $conn;
    $NamaAlbum = $data['NamaAlbum'];
    $Deskripsi = $data['Deskripsi'];
    $TanggalDibuat = date('Y-m-d');
    $User = $data ['UserID'];

    mysqli_query($conn, "INSERT INTO album VALUES('','$NamaAlbum','$Deskripsi','$TanggalDibuat','$User')");
    return mysqli_affected_rows($conn);
}


function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}


function tambah_foto($data){
    global $conn;
    $JudulFoto = $data['JudulFoto'];
    $DeskripsiFoto= $data['DeskripsiFoto'];
    $TanggalUnggah = date("Y-m-d");
    $AlbumID = $data['AlbumID'];
    $UserID = $data['UserID'];

    //foto
      // gambar
      $foto = upload();
      if( !$foto) {
          return false;
      }

    mysqli_query($conn, "INSERT INTO foto VALUES('','$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$foto','$AlbumID','$UserID')");
    return mysqli_affected_rows($conn);
}

?>