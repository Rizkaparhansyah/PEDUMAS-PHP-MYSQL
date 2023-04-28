<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pedumas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
