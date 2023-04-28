<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
}
$nik = $_SESSION['nik'];


include "../template/header.php" ?>

<div class="p-4 sm:ml-64 ">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14  ">
        <div class=" text-3xl font-bold text-gray-500 uppercase mb-5 dark:text-gray-100 ">Pengaduan</div>
        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 " type="button">
            Tambah Pengaduan
        </button>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-white">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <th scope="col" class="px-6 py-3">Isi Laporan</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $sql = "SELECT * FROM pengaduan where nik='$nik'";
                    $result = mysqli_query($conn, $sql);

                    // Process data
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="bg-white border-b dark:bg-gray-700 dark:border-gray-700">
                            <td class="px-6 py-4"><?= $no++ ?></td>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['tgl'] ?></td>
                            <td class="px-6 py-4"><?= $row['nik'] ?></td>
                            <td class="px-6 py-4"><?= $row['isi_laporan'] ?></td>
                            <td class="px-2 py-4"><img class="flex justify-center items-center" src="<?= $row['foto'] ?>" width="100" alt="Image Upload" srcset=""></td>
                            <td class="px-6 py-4"> <?php if ($row["status"] == "SELESAI") { ?>
                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-gray-100"><?= $row["status"] ?></span>
                                <?php } else { ?>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-gray-100"><?= $row["status"] ?></span>
                                <?php } ?>
                            </td>
                            <!-- <td class="px-6 py-4"><a href="tanggapan.php?id=<?= $row['id_pengaduan'] ?>" class="bg-gray-900 px-1 py-1 flex justify-center items-center text-white rounded-md "><i class='text-2xl bx bx-search-alt'></i></a></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
include "../template/footer.php";
?>