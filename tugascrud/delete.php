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



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (delete($id) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>