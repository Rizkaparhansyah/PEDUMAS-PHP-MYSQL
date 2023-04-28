<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $tgl_tanggapan = $_POST['tgl_tanggapan'];
  $tanggapan = $_POST['tanggapan'];
  $id_pengaduan = $_POST['id_pengaduan'];
  $id_petugas = $_POST['id_petugas'];

  // Koneksi ke database
  // Buat query insert data
  $query = "INSERT INTO tanggapan (tgl_tanggapan, tanggapan, id_pengaduan, id_petugas) 
              VALUES ('$tgl_tanggapan', '$tanggapan', '$id_pengaduan', '$id_petugas')";

  // Jalankan query
  $result = mysqli_query($conn, $query);

  // Cek apakah data berhasil ditambahkan atau tidak
  if ($tanggapan != null) {
    if ($result) {
      echo "<script src='../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>";
      echo "<script>
            Swal.showValidationMessage(`Request failed: ${error}`)
            Swal.fire({
              icon: 'success',
              title: 'Tanggapan successful',
              text: 'Selamat anda berhasil Tanggapan!',
            })
          </script>";
    }
  } else {
    echo "<script src='../../node_modules/sweetalert2/dist/sweetalert2.all.min.js'></script>";
    echo "<script>
        Swal.showValidationMessage(`Request failed: ${error}`)
        Swal.fire({
          icon: 'warning',
          title: 'tanggapan Error',
          text: 'Gagal tanggapan!',
        })
      </script>";
  }

  // Tutup koneksi ke database
}
