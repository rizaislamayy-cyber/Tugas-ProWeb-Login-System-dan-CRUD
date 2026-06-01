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


if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
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
    <title>Insert</title>
    <link rel="stylesheet" href="insertStyles.css">
</head>


<body>
    <div class="body">
        <div class="insert-container">
            <h1>Insert Data Mahasiswa</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" required size="33">
                </div>
                <br>
                <div class="form-group">
                    <label for="nrp">NRP :</label>
                    <input type="text" name="nrp" id="nrp" required size="33">
                </div>
                <br>
                <div class="form-group">
                    <label for="jurusan">Jurusan :</label>
                    <input type="text" name="jurusan" id="jurusan" required size="33">
                </div>
                <br>
                <button type="submit" name="submit">Insert</button>
            </form>
        </div>
    </div>
</body>

</html>