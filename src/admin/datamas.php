<?php
require_once "../../config/conn.php";

include "template/header.php" ?>

<div class="p-4 sm:ml-64 dark:bg-gray-800">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14" style="height:120vh;">
        <div class=" text-3xl font-bold text-gray-500 uppercase mb-5 dark:text-gray-100">DATA MASYARAKAT</div>
        <div class="flex justify-center items-center flex-wrap sm:flex-nowrap  ">
            <div class="relative overflow-x-auto">
                <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-100">
                    <thead class="border text-xs text-gray-900 uppercase dark:text-gray-100">
                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Telephone
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['nik']) && $_GET['nik'] != null) {
                            $nik = $_GET['nik'];
                            $sql = "SELECT * FROM masyarakat where nik='$nik'";
                            $result = mysqli_query($conn, $sql);
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <a href="pengaduan.php" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full text-sm px-3 py-2 text-center mr-2 mb-2 "><i class='text-2xl bx bx-arrow-back'></i></a>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $no++ ?>
                                    </th>
                                    <td class="border px-6 py-4">
                                        <?= $row["nik"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["nama_awal"] . " " . $row["nama_akhir"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["username"] ?>
                                    </td>

                                    <td class="border px-6 py-4">
                                        <?= $row["telp"] ?>
                                    </td>


                                </tr>
                            <?php } ?>

                            <?php } else {
                            $sql = "SELECT * FROM masyarakat";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // Jika ada data, maka tampilkan dalam tabel
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <?= $no++ ?>
                                        </th>
                                        <td class="border px-6 py-4">
                                            <?= $row["nik"] ?>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <?= $row["nama_awal"] . " " . $row["nama_akhir"] ?>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <?= $row["username"] ?>
                                        </td>

                                        <td class="border px-6 py-4">
                                            <?= $row["telp"] ?>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <a href="hapus_user.php?id=<?= $row['nik'] ?>" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-full px-3 py-2 text-xs  text-center mr-2 mb-2">Hapus</a>
                                        </td>


                                    </tr>
                        <?php }
                            } else {
                                // Jika tidak ada data, tampilkan pesan
                                echo "Tidak ada data pengaduan.";
                            }

                            // Menutup koneksi ke database
                            mysqli_close($conn);
                        } ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php" ?>