<?php
require 'function.php';
$mahasiswa = select("SELECT * FROM daftar_mahasiswa");

session_start();
if (!isset($_SESSION['login'])) {
    echo "
        <script>
            document.location.href = 'login.php';
        </script>
    ";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar">

        <ul class="nav-links">
            <li><a href="logout.php">Logout</a></li>
            <li><a href="insert.php">Insert</a></li>
        </ul>
    </nav>
    <div class="body">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="update.php?id=<?= $mhs['id']; ?>">Edit</a>
                         | 
                        <a href="delete.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["nrp"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>