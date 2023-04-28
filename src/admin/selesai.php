<?php
session_start();
include '../../config/conn.php';
$id = $_GET['id'];
$sql1 = "SELECT * FROM pengaduan WHERE id_pengaduan='$id'";
$result = mysqli_query($conn, $sql1);
$tgl = "";
$nama = "";
$nik = "";
$isi_laporan = "";
$foto = "";
$status = "";
while ($row = mysqli_fetch_assoc($result)) {
    $tgl = $row['tgl'];
    $nama = $row['nama'];
    $nik = $row['nik'];
    $isi_laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
}
if ($status == 'PROSES' || $status == 'PENDING') {
    $sql = "UPDATE pengaduan
SET tgl='$tgl', nama='$nama', nik = '$nik', isi_laporan= '$isi_laporan', foto = '$foto', status = 'SELESAI'
WHERE id_pengaduan='$id'";
    mysqli_query($conn, $sql);
    header('Location: pengaduan.php');
} else {
    echo "Status sudah selesai";
}
