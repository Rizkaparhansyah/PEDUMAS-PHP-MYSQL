<?php

include 'config/conn.php';
// Cek apakah user sudah submit form
if (isset($_POST['submit'])) {
  // Menangkap data yang dikirim dari form login
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $unhaspass = mysqli_real_escape_string($conn, $_POST['password']);
  $password = md5($unhaspass);
  // Query untuk mencari user dengan username dan password yang sesuai
  $query = "SELECT * FROM masyarakat WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  // Mengecek apakah terdapat user yang sesuai
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    // Menyimpan nama pengguna ke dalam session
    $row = mysqli_fetch_assoc($result);
    $_SESSION['level'] = '';
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama_awal'] = $row['nama_awal'];
    $_SESSION['nama_akhir'] = $row['nama_akhir'];
    $_SESSION['telp'] = $row['telp'];
    $_SESSION['nik'] = $row['nik'];
    // header('location: src/template/header.php');
    echo "<script>
        Swal.fire({
          icon: 'success',
          title: 'Login successful',
          text: 'Welcome, " . $_SESSION['username'] . "!',
          showConfirmButton: false,
          timer: 1500
        }).then(function() {
          window.location.href = 'src/users/index.php';
        });
      </script>";
  } else {
    echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Login gagal!',
          text: 'Pastikan data benar!',
        })
      </script>";
  }

  mysqli_close($conn);
}
