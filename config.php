<?php
    // Menentukan nama host, biasanya "localhost"
    $server = "localhost";

    // Nama pengguna MySQL (Dalam kasus ini, "riis" adalah nama user)
    $user = "riis";

    // Kata sandi untuk pengguna MySQL (Default: kosong untuk root)
    $password = "inibukanpassword"; 

    // Mencoba untuk koneksi ke basis data
    $nama_database = "data_siswa";

    $db = mysqli_connect($server, $user, $password, $nama_database);

    // Memeriksa apakah koneksi berhasil
    if(!$db) {
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
?>