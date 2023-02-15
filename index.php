<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require 'function.php';
$siswa = query("SELECT * FROM siswa");


if( isset($_POST["cari"]) ) {
    $siswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admin</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head >
<style>
body {
        background-image:url(bg2.jpg);
        background-size: 100%;
    }
    .container {
        width: 60%;
        margin: 50px auto;
        background-color:white;
        background-size: 100%;
        padding: 20px;
        border-radius: 20px;
        opacity: 75%;
    }

    @media screen {
        
    }
h1  {
    text-align:center;
}    

</style>
<body>
    <div class="container">
    
    <h1>daftar siswa</h1>

<a class="btn btn-primary" href="tambah.php" role="button">Tambah data siswa</a>
<a class="btn btn-danger" href="logout.php" role="button">logout</a>
<br><br>


<form class="d-flex" action="" method="post">
    <input class="form-control" type="text" name="keyword" size="35" autofocus 
    placeholder="masukan apa yang kamu cari" autocomplete="off"> 
    <button class="btn btn-danger" type="submit" name="cari">Cari!</button>
</form>
<br>

<table class="table table-dark table-hover" border="1" cellpadding="10" cellspacing="0">

<tr>
<th>No.</th>
<th>aksi</th>
<th>gambar</th>
<th>nis</th>
<th>nama</th>
<th>email</th>
<th>jurusan</th>
</tr>
<?php $i =1;?>
<?php foreach( $siswa as $row ):?>
<tr>
<td><?=$i?></td>
<td>
<a href="ubah.php?id=<?= $row["id"];?>"><i class="bi bi-pencil text-success"></i></a>
<a href="hapus.php?id=<?= $row["id"];?>"onclick="return confirm('yakin deckk!!');"><i class="bi bi-trash3-fill text-danger"></i></a>
</td>
<td><img src="img/<?= $row["gambar"];?>"width="50"></td>
<td><?= $row["nis"];?></td>
<td><?= $row["nama"];?></td>
<td><?= $row["email"];?></td>
<td><?= $row["jurusan"];?></td>
</tr>
<?php $i++;?>
<?php endforeach;?>

</table>
    </div>
  
</body>
</html>