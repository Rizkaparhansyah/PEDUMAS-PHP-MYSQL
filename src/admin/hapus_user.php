<?php
session_start();
include '../../config/conn.php';
$id = $_GET['id'];
$sql1 = "DELETE FROM masyarakat WHERE nik='$id'";
mysqli_query($conn, $sql1);
header('Location: datamas.php');
