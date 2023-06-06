<?php
// hubungkan halaman hapus.php dengan halaman functions.php dengan require
require '../function/functions.php';

// kita ambil terlebih dahulu id nya, yang akan menangkap id dari URL nya
$id_pelanggaran = $_GET["id_pelanggaran"];

// buat function dengan nama "hapus"
if (hapusPelanggaran($id_pelanggaran) > 0) {
    echo "<script>alert('Data Berhasil Dihapus!');document.location.href = '../dashboard/list_pelanggaran.php';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!');document.location.href = '../dashboard/list_pelanggaran.php';</script>";
}