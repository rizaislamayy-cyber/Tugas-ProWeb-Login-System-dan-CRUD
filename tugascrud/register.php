<?php
require 'function.php';

function register($inputPost){
    global $conn;
    
    $nama = strtolower(htmlspecialchars(mysqli_escape_string($conn, $inputPost["username"])));
    $password = htmlspecialchars(mysqli_escape_string($conn, $inputPost["password"]));
    $konfirmasiPassword = htmlspecialchars(mysqli_escape_string($conn, $inputPost["confirmPassword"]));

    if ($password !== $konfirmasiPassword) {
        echo "
            <script>
                alert('Confirm password tidak sesuai');
            </script>
        ";
        return false;
    }

    $result = select("SELECT * FROM user WHERE username = '$nama'");

    if (!empty($result)) {
        echo "
            <script>
                alert('Username sudah digunakan');
            </script>
        ";
        return false;
    }


    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES ('', '$nama', '$passwordHash')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        echo "
            <script>
                alert('Registrasi berhasil!');
                document.location.href = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Registrasi gagal!');
                document.location.href = 'register.php';
            </script>
        ";
    }
}




?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="stylesLoginRegister.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <h2>Register</h2>

            <form action="" method="post">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" placeholder="Masukkan nama lengkap" required name="username">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" placeholder="Masukkan password" required name="password">
                </div>

                <div class="input-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi password" required name="confirmPassword">
                </div>

                <button type="submit" class="btn" name="submit">Daftar</button>

                <p class="link">
                    Sudah punya akun?
                    <a href="login.php">Login</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>