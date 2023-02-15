<?php
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!!')
            </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar =explode( '.', $namaFile );
    $ekstensiGambar  = strtolower(end($ekstensiGambar) );

    // mengecek sebuah string apakah ada di dalam array
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                        alert('yang anda upload itu bukan gambar melainkan virus')
                </script>
        ";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
      echo "<script>
              alert('ukuran gambar terlau besar');
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
      
}
?>