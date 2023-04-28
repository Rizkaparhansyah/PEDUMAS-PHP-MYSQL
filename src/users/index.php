<?php

session_start();

// mengimpor file koneksi.php
include '../../config/conn.php';

$nik = $_SESSION['nik'];
// menghitung jumlah semua data pengaduan
$hasil = mysqli_query($conn, "SELECT * FROM pengaduan where nik='$nik'")->num_rows;

// menghitung jumlah data pengaduan dengan status "PROSES"
$hasil1 = mysqli_query($conn, "SELECT * FROM pengaduan WHERE status='PROSES' and nik='$nik'")->num_rows;

// menghitung jumlah data pengaduan dengan status "SELESAI"
$hasil2 = mysqli_query($conn, "SELECT * FROM pengaduan WHERE status='SELESAI' and nik='$nik' ")->num_rows;

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') {
    header("Location: ../admin");
}
include "../template/header.php" ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14 ">
        <div class=" text-3xl font-bold text-gray-500 uppercase mb-5  dark:text-gray-100">Dashboard</div>
        <div class="flex justify-center items-center flex-wrap sm:flex-nowrap  ">
            <div class="flex w-full flex-col justify-between items-center  h-48 ml-2 mb-4 rounded bg-white shadow-xl dark:bg-gray-700">
                <p class="text-2xl text-gray-700 font-semibold dark:text-white">Total pengaduan</p>
                <p class="text-7xl text-gray-900 font-semibold dark:text-white"><?= $hasil ?></p>
                <div class="bg-gray-500 py-2 w-full rounded-b-xl"></div>
            </div>
            <div class="flex w-full flex-col justify-between items-center  h-48 ml-2 mb-4 rounded bg-white shadow-xl dark:bg-gray-700">
                <p class="text-2xl text-gray-700 font-semibold dark:text-white">Pengaduan Proses</p>
                <p class="text-7xl text-gray-900 font-semibold dark:text-white"><?= $hasil1 ?></p>
                <div class="bg-green-500 py-2 w-full rounded-b-xl"></div>
            </div>
            <div class="flex w-full flex-col justify-between items-center  h-48 ml-2 mb-4 rounded bg-white shadow-xl dark:bg-gray-700">
                <p class="text-2xl text-gray-700 font-semibold dark:text-white">Pengaduan selesai</p>
                <p class="text-7xl text-gray-900 font-semibold dark:text-white"><?= $hasil2 ?></p>
                <div class="bg-blue-500 py-2 w-full rounded-b-xl"></div>
            </div>
        </div>
    </div>
</div>

<?php include "../template/footer.php" ?>