<?php
require 'function.php';

if(isset($_POST["submit"])) {
    if (login($_POST) > 0) {
        session_start();
        $_SESSION["login"] = true;
        echo "
            <script>
                alert('Login berhasil!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}





function login($inputPost) {
    global $conn;

    $nama = strtolower(htmlspecialchars(mysqli_escape_string($conn, $inputPost["username"])));
    $password = htmlspecialchars(mysqli_escape_string($conn, $inputPost["password"]));

    $result = select("SELECT * FROM user WHERE username = '$nama'");

    if (empty($result)) {
        echo "
            <script>
                alert('Username tidak ditemukan');
            </script>
        ";
        return 0;
    }

    $row = $result[0];

    if (password_verify($password, $row["password"])) {
        return 1;
    } else {
        echo "
            <script>
                alert('Password salah');
            </script>
        ";
        return 0;
    }
}


?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesLoginRegister.css">
</head>
<body>

    <div class="container">
        <div class="card">
            <h2>Login</h2>

            <form action="" method="post">
                <div class="input-group">
                    <label>Username</label>
                    <input type="text" placeholder="Masukkan username" required name="username">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" placeholder="Masukkan password" required name="password">
                </div>

                <button type="submit" class="btn" name="submit">Login</button>

                <p class="link">
                    Belum punya akun?
                    <a href="register.php">Register</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>