<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM user where username='$username' && password ='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:dashboard/dashboard.php");
    echo "<script>alert('Login Berhasil !!!');document.location.href = '../dashboard/dashboard.php';</script>";
} else {
    echo "<script>alert('Username atau Password Salah !!!');document.location.href = 'index.php';</script>";
}