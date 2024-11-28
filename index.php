<?php
    // Menghubungkan file config dengan index
    include("config.php");
    session_start(); // Mulai sesi
?>

<!DOCTYPE html>
<html>
<head>
    <title> Data Siswa | SMK Negeri 4 Tanjungpinang</title>
    <style>
        /* Styling untuk tabel */
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <h2 class="text-center text-primary">Data Siswa</h2>

    <!-- Tampilkan Notifikasi Jika Ada -->
     <?php if (isset($_SESSION['notifikasi'])): ?>
        <p> <?php echo $_SESSION['notifikasi']; ?></p>

        <!-- Hapus notifikasi setelah ditampilkan -->
         <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>L/P</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th> <a href="form-tambah.php">Tambah Data</a></th>
        </tr>
     </thead>
     <tbody>
        <?php
        $no = 1; //data dari 1

        //Variabel untuk menjalankan query SQL
        $query = $db->query("SELECT * FROM tb_siswa");

        /* Perulangan while akan terus berjalan selama kode masih bernilai true */
        while ($siswa = $query->fetch_assoc()) {
            /* Fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array */
        ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $siswa['nis'] ?></td>
            <td><?php echo $siswa['namaLengkap'] ?></td>
            <td><?php echo $siswa['jenis_kelamin'] ?></td>
            <td><?php echo $siswa['tempat_lahir'] ?></td>
            <td><?php echo $siswa['tanggal_lahir'] ?></td>
            <td><?php echo $siswa['alamat'] ?></td>
            <td align="centre">
                <!-- URL ke halaman edit data dengan menggunakan parameter id pada kolom table -->
            <a href="form-edit.php?id=<?php echo $siswa['id'] ?>">Edit</a>

            <!-- URL untuk menghapus data dengan menggunakan parameter id pada kolom table dan alert confimasi hapus data-->
            <a onclick="return confirm('Anda yakin ingin mengahapus data?')" href="hapus.php?id=<?php echo $siswa['id'] ?>"> Hapus </a>
        </td>
        </tr>
        <?php
        } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
        ?>
     </tbody>
    </table>
    <!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->

    <p>Total: <?php echo mysqli_num_rows($query) ?>
    </body>
</html>
                