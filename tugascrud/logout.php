<?php
session_start();
session_unset();
$_SESSION = [];
session_destroy();
echo "
    <script>
        alert('Logout berhasil!');
        document.location.href = 'login.php';
    </script>";

?>