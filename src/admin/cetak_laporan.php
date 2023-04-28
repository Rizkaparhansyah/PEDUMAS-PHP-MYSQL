<?php
session_start();

// mengimpor file koneksi.php
include '../../config/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Cetak Laporan</title>
</head>
<!-- onload="print()" -->
<style>
    body {
        font-family: 'Poppins';
    }

    .head {
        text-align: center;
    }

    .garis {
        height: 3px;
        width: 100%;
        background-color: #000;
        margin-top: 10px;
    }

    table,
    th,
    td {
        border: 1px solid;
        padding: 5px;
    }

    td {
        padding: 15px;
    }

    .tcenter {
        display: flex;
        justify-content: center;
    }
</style>

<body onload="print()">
    <div>
        <div>
            <div>
                <h1 class="head">Data Laporan Pengaduan</h1>
                <h1 class="head">Keluarahan Pasanggrahan Baru</h1>
                <div class="head">Jl. Pangeran Kornel, Kabupaten Sumedang, Jawa Barat 45311, Indonesia</div>
            </div>
        </div>
        <div class="garis"></div>
    </div>

    <h1 class="head">Laporan Pengaduan</h1>
    <div>

        <div>
            <div>
                <div class="tcenter">
                    <table>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT * FROM pengaduan";
                            $result = mysqli_query($conn, $sql);

                            // Process data
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr border="1">
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['tgl'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['nik'] ?></td>
                                    <td><?= $row['isi_laporan'] ?></td>
                                    <td><img src="<?= $row['foto'] ?>" width="100" alt="Image Upload" srcset=""></td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>