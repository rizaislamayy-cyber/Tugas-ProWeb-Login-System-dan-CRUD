<?php


$conn = mysqli_connect("localhost", "root", "", "database");

function select($perintahsql){
    global $conn;
    $result = mysqli_query($conn, $perintahsql);
    $wadah = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $wadah[] = $row;
    }
    return $wadah;
}



function insert($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO daftar_mahasiswa VALUES ('', '$nama', '$nrp', '$jurusan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM daftar_mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function update($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "UPDATE daftar_mahasiswa SET nama = '$nama', nrp = '$nrp', jurusan = '$jurusan' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




?>