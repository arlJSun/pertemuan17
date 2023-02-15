<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require 'function.php';
if( isset($_POST["submit"]) ){
 

   if( tambah($_POST) > 0 ) {
    echo "
    <script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'index.php';
    </script>";
   } else {
    echo "<script>
            alert('data gagal di tambahkan!');
            document.location.href = 'index.php';
          </script>
          ";
   }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data siswa</title>
</head>
<style>
    body {
        background-image:url(bg.jpg);
        background-size: 100%;
    }
    .container {
        width: 60%;
        margin: 50px auto;
        background-image:url(bg.jpg);
        background-size: 100%;
        padding: 20px;
        border-radius: 20px;
        opacity: 75%;
    }
    label {
        display: block;
        line-height: 30px;
        
    }
</style>
<body>
    <div class="container">

        <h1>tambah data siswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
           <ul>
            <li>
                <label for="nis">NIS :</label>
                <input type="text" name="nis" id="nis" required>
            </li>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">jurusan :</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah data</button>
            </li>
           </ul>
    
        </form>
    </div>
</body>
</html>