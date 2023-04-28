<?php
require_once "../../config/conn.php";
if (isset($_POST['submit'])) {
    $id_pengaduan = $_GET['id'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    $id_petugas = $_SESSION['id_petugas'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (?, ?, ?, ?)";

    // Use prepared statements to bind the values to the query parameters
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssi', $id_pengaduan, $tgl_tanggapan, $tanggapan, $id_petugas);

    // Execute the statement and check for errors
    if (mysqli_query($conn, $sql)) {
        $response = array(
            'status' => 'success',
            'message' => 'Tanggapan berhasil disimpan.'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Tanggapan gagal disimpan.'
        );
        echo json_encode($response);
    }
}
