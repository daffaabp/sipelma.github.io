<?php
// hubungkan halaman hapus.php dengan halaman functions.php dengan require
require '../function/functions.php';

// kita ambil terlebih dahulu id nya, yang akan menangkap id dari URL nya
$nim = $_GET["nim"];

// buat function dengan nama "hapus"
if (hapus($nim) > 0) {
    echo "<script>alert('Data Berhasil Dihapus!');document.location.href = '../dashboard/data_mahasiswa.php';</script>";
} else {
    echo "<script>alert('Data Gagal Dihapus!');document.location.href = '../dashboard/data_mahasiswa.php';</script>";
}