<?php
session_start();
if (isset($_POST['submit'])) {

  include 'config/conn.php';
  $nama_awal = $_POST['nama_awal'];
  $nama_akhir = $_POST['nama_akhir'];
  $nik = $_POST['nik'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $pass_conf = md5($_POST['password_confirmation']);
  $telp = $_POST['telp'];

  //membuat query untuk memasukkan data ke dalam tabel
  if ($password == $pass_conf) {
    $sql = "INSERT INTO masyarakat (nik,nama_awal,nama_akhir,username, password,telp) VALUES ('$nik', '$nama_awal', '$nama_akhir', '$username', '$password','$telp')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Register successful',
          text: 'Selamat anda berhasil Register!',
        })
      </script>";
    }
  } else {
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Register gagal!',
      text: 'Pastikan data benar!',
    })
  </script>";
  }
}

mysqli_close($conn);
