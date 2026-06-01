<?php
require 'function.php';
session_start();
if (!isset($_SESSION['login'])) {
    echo "
        <script>
            document.location.href = 'login.php';
        </script>
    ";
    exit;
}

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$result = select("SELECT * FROM daftar_mahasiswa WHERE id = $id");
if (empty($result)) {
    header('Location: index.php');
    exit;
}

$mhs = $result[0];

if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diperbarui!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diperbarui!');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="insertStyles.css">
</head>


<body>
    <div class="body">
        <div class="insert-container">
            <h1>Update Data Mahasiswa</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" required size="33" value="<?= $mhs['nama']; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="nrp">NRP :</label>
                    <input type="text" name="nrp" id="nrp" required size="33" value="<?= $mhs['nrp']; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="jurusan">Jurusan :</label>
                    <input type="text" name="jurusan" id="jurusan" required size="33" value="<?= $mhs['jurusan']; ?>">
                </div>
                <br>
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>