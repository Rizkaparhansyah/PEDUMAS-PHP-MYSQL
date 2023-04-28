<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
}
include "../template/header.php" ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
        <div class="dark:text-gray-100 text-3xl font-bold text-gray-500 uppercase mb-5">Profile</div>

        <div class="relative overflow-x-auto">
            <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-100">
                <thead class="border text-xs text-gray-900 uppercase dark:text-gray-100">

                    <tr>
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

                    <?php $id = $_SESSION['nik'];
                    $sql = "SELECT * FROM masyarakat where nik='$id'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // Jika ada data, maka tampilkan dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="border px-6 py-4">
                                    <?= $row["nik"] ?>
                                </td>
                                <td class="border px-6 py-4">
                                    <?= $row["nama_awal"] . " " . $row["nama_akhir"]  ?>
                                </td>
                                <td class="border px-6 py-4">
                                    <?= $row["username"] ?>
                                </td>

                                <td class="border px-6 py-4">
                                    <?= $row["telp"] ?>
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


    </div>
</div>

<?php include "../template/footer.php" ?>