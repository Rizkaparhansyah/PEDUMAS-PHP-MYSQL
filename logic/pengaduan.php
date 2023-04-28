<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tgl = $_POST['tgl'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $isi_laporan = $_POST['isi_laporan'];
  $image = $_FILES['foto']['name'];
  $temp = $_FILES['foto']['tmp_name'];
  $path = "../../assets/image/" . $image;
  move_uploaded_file($temp, $path);

  //membuat query untuk memasukkan data ke dalam tabel
  if ($tgl != "" && $nama != "" && $nik != "" && $isi_laporan != "") {
    $sql = "INSERT INTO pengaduan (tgl,nama,nik,isi_laporan,foto,status) VALUES ('$tgl', '$nama', '$nik','$isi_laporan', '$path', 'PROSES')";
    if (mysqli_query($conn, $sql)) {
      echo "<script src='../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>";
      echo "<script>
      Swal.showValidationMessage(`Request failed: ${error}`);
        Swal.fire({
          icon: 'success',
          title: ' successful',
          text: 'Berhasil tambah pengaduan!',
        }).then(function() {
          window.location.href = 'pengaduan.php';
        });
      </script>";
    } else {
      echo "<script src='../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>";
      echo "<script>
      Swal.showValidationMessage(`Request failed: ${error}`);
        Swal.fire({
          icon: 'error',
          title: 'Login gagal!',
          text: 'Pastikan data benar!',
        })
      </script>";
    }
  }
}
