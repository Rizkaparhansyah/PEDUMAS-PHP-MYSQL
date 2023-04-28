<?php
require_once "../../config/conn.php";

include "template/header.php" ?>

<div class="p-4 sm:ml-64  dark:bg-gray-800  ">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14" style="height:120vh;">
        <div class=" text-3xl font-bold text-gray-500 uppercase mb-5 dark:text-gray-100">PROFILE</div>
        <div class="grid  justify-center items-center flex-wrap sm:flex-nowrap">
            <div class=" flex justify-center items-center">

                <img class="rounded-full  w-48 mb-5 h-48" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/content-gallery-3.png" alt="image description">
            </div>
            <?php if ($_SESSION['level'] == 'Admin') {
            ?>
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-white w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-5 ">Tambah petugas</button>
            <?php
            } ?>

            <div class="relative overflow-x-auto">
                <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-100">
                    <thead class="border text-xs text-gray-900 uppercase dark:text-gray-100">

                        <tr>
                            <th scope="col" class="border px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Telephone
                            </th>
                            <th scope="col" class="border px-6 py-3">
                                Level
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $id = $_SESSION['id_petugas'];
                        $sql = "SELECT * FROM petugas where id_petugas='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // Jika ada data, maka tampilkan dalam tabel
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-6 py-4">
                                        <?= $row["nama_petugas"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["username"] ?>
                                    </td>
                                    <td class="border px-6 py-4">
                                        <?= $row["telp"] ?>
                                    </td>

                                    <td class="border px-6 py-4">
                                        <?= $row["level"] ?>
                                    </td>
                                </tr>
                                <hr>
                        <?php }
                        } else {
                            // Jika tidak ada data, tampilkan pesan
                            echo "Tidak ada data pengaduan.";
                        }

                        // Menutup koneksi ke database

                        ?>
                    </tbody>
                </table>
            </div>
            <?php if ($_SESSION['level'] == 'Admin') {
            ?>
                <div class="text-center text-2xl font-bold text-gray-500 m-5">DATA PETUGAS</div>

                <div class="relative overflow-x-auto">
                    <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-100">
                        <thead class="border text-xs text-gray-900 uppercase dark:text-gray-100">
                            <tr>
                                <th scope="col" class="border px-6 py-3">
                                    No
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
                                <th scope="col" class="border px-6 py-3">
                                    Level
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $sql = "SELECT * FROM petugas";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // Jika ada data, maka tampilkan dalam tabel
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-100">
                                            <?= $no++ ?>
                                        </th>
                                        <td class="border px-6 py-4">
                                            <?= $row["nama_petugas"] ?>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <?= $row["username"] ?>
                                        </td>
                                        <td class="border px-6 py-4">
                                            <?= $row["telp"] ?>
                                        </td>

                                        <td class="border px-6 py-4">
                                            <?= $row["level"] ?>
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
            <?php
            } ?>

        </div>
    </div>
</div>

<?php include "template/footer.php" ?>