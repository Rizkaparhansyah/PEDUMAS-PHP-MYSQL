<?php
$id_pengaduan = $_GET['id'];
require_once "../../config/conn.php";


include "../../logic/tanggapan.php";
include "template/header.php" ?>

<div class="p-4 sm:ml-64  dark:bg-gray-800  ">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-14" style="height:120vh;">
        <a href="pengaduan.php" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 "><i class='text-2xl bx bx-arrow-back'></i></a>
        <!-- Content -->

        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                <div class="flex flex-col justify-center">
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">We invest in the world’s potential</h1>
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more about our app
                        <svg aria-hidden="true" class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                <div>
                    <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">

                        <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <?php
                            $id = $_GET['id'];

                            $sql = "SELECT * from pengaduan where id_pengaduan='$id_pengaduan'";
                            $data = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($data)) { ?>
                                <div class="px-6 py-6">

                                    <img class="w-28 h-28 mb-3 object-cover shadow-lg" src="<?= $result['foto'] ?>" alt="">
                                </div>
                                <div class="flex flex-col justify-between p-4 leading-normal">

                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $result['isi_laporan'] ?></h5>
                                    <p class="mb-2 font-normal text-gray-700 dark:text-gray-400"><?= $result['nama'] ?></p>
                                    <p class="mb-2 font-normal text-gray-700 dark:text-gray-400"><?= $result['tgl'] ?></p>
                                <?php }
                                ?>
                                </div>
                        </a>


                        <?php
                        $query = "SELECT * FROM tanggapan where id_pengaduan='$id_pengaduan' ";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['id_petugas'] != null) { ?>
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg flex justify-end bg-green-50 dark:bg-green-800 dark:text-white">
                                    <?= $row['tanggapan']; ?>
                                </div>
                            <?php } else { ?>
                                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg flex justify-start bg-blue-50 dark:bg-blue-800 dark:text-white">
                                    <?= $row['tanggapan']; ?>
                                </div>
                        <?php }
                        }
                        ?>
                        <div class="" id="tampung_pesan"></div>
                        <form method="POST">
                            <label for="chat" class="sr-only">
                                <div class="flex items-center">
                                    <label for="" class=" dark:text-gray-100">Ditanggapi Tanggal :</label> <input id="tgl" id='tgl' value="<?= date('d-m-Y') ?>" name="tgl_tanggapan" type="text" readonly required class="w-1/2 border-0 dark:bg-gray-700 dark:text-gray-100 px-4 py-2 rounded-md focus:border-0 cursor-none focus:ring-0 " />
                                </div>
                            </label>
                            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="<?= $id_pengaduan ?>">
                                <input type="hidden" name="id_petugas" id="id_petugas" value="<?= $_SESSION['id_petugas'] ?>">
                                <input id="pesan" name="tanggapan" id="tanggapan" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." />
                                <button id="btn" name="submit" type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                    </svg>
                                    <span class="sr-only">Send message</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<?php


include "template/footer.php" ?>