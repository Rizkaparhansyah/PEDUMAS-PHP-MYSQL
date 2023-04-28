<?php
require_once "../../config/conn.php";

include "template/header.php" ?>


<div class="p-4 sm:ml-64  dark:bg-gray-800">
    <div class="p-4 rounded-full  dark:border-gray-700 mt-14" style="height:120vh;">
        <div class=" text-3xl font-bold text-gray-500 uppercase mb-5  dark:text-gray-100">Pengaduan</div>
        <div class="flex justify-center items-center flex-wrap sm:flex-nowrap  ">
            <div class="relative overflow-x-auto">

                <div date-rangepicker class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                    </div>
                    <?php if ($_SESSION['level'] == 'Admin') {
                    ?>
                        <div class="relative">
                            <a href="cetak_laporan.php" type="button" class="mt-2 m-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full text-sm px-5 py-3 text-center mr-2 mb-2 ">Cetak</a>
                        </div>

                    <?php
                    } ?>

                </div>


                <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-100">
                    <thead class="border text-xs text-gray-900 uppercase dark:text-gray-100">
                        <tr class="dark:bg-gray-800">
                            <th scope="col" class="border px-6 py-3 ">
                                No
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Isi laporan
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="border px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $tanggal_awal = "2023-04-15";
                        $tanggal_akhir = "2023-04-15";
                        $sql = "SELECT * FROM pengaduan WHERE tgl BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";;
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // Jika ada data, maka tampilkan dalam tabel
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr class="bg-white dark:bg-gray-800 dark:text-gray-100">
                                    <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-100">
                                        <?= $no++ ?>
                                    </th>
                                    <td class="border px-6 py-4">
                                        <?= $row["tgl"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["nama"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["nik"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["isi_laporan"] ?>
                                    </td>

                                    <td class="border px-6 py-4">
                                        <img src="<?= $row['foto'] ?>" class="w-24 h-24 mb-3 object-cover shadow-lg" alt="Image Upload" srcset="">
                                    </td>

                                    <td class="border px-6 py-4">
                                        <?php if ($row["status"] == "SELESAI") { ?>
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-gray-100"><?= $row["status"] ?></span>
                                        <?php } else { ?>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-gray-100"><?= $row["status"] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td class="border px-2 py-1">
                                        <div class="row">
                                            <a href="tanggapan.php?id=<?= $row["id_pengaduan"] ?>" type="button" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-full  px-2 py-1 text-xs  text-center mr-2 mb-2"><i class='text-2xl bx bx-edit-alt'></i></a>
                                            <a href="datamas.php?nik=<?= $row['nik'] ?>" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full px-2 py-1 text-xs  text-center mr-2 mb-2 "><i class='text-2xl bx bx-user'></i></a>
                                        </div>
                                        <div class="row">
                                            <?php if ($row["status"] == "SELESAI") { ?>

                                                <button disabled href="selesai.php?id=<?= $row['id_pengaduan'] ?>" type="button" class="cursor-not-allowed  text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-full px-2 py-1 text-xs  text-center mr-2 mb-2"><i class='text-2xl bx bx-check-double'></i></button>
                                            <?php } else { ?>
                                                <a href="selesai.php?id=<?= $row['id_pengaduan'] ?>" type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-full px-2 py-1 text-xs  text-center mr-2 mb-2"><i class='text-2xl bx bx-check-double'></i></a>
                                            <?php } ?>
                                            <a href="hapus.php?id=<?= $row['id_pengaduan'] ?>" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-full  px-2 py-1 text-xs  text-center mr-2 mb-2"><i class='text-2xl bx bx-trash'></i></a>
                                        </div>


                                    </td>
                                </tr>
                        <?php }
                        } else {
                            // Jika tidak ada data, tampilkan pesan
                            echo "Tidak ada data pengaduan.";
                        }

                        // Menutup koneksi ke database
                        mysqli_close($conn);

                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php" ?>