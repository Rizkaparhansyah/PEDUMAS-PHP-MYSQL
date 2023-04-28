<?php
session_start();
include '../../config/conn.php';
$id = $_GET['id'];
$sql1 = "DELETE FROM pengaduan WHERE id_pengaduan='$id'";
mysqli_query($conn, $sql1);
header('Location: pengaduan.php');
