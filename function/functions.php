<?php
// koneksi ke database
// di dalam pendeklarasian mysqli_connect dibutuhkan beberapa karakter yaitu nama hostname, username, password, nama database
$conn = mysqli_connect("localhost", "root", "", "sipelma");

function query()
{
    // agar variabel $conn dapat diakses
    global $conn;
    $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
    $result = mysqli_query($conn, $query);
    $rows = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    // disini saya juga mencoba agar website kita aman dari hacker
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jenis"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // query insert data    
    $query = "INSERT INTO mahasiswa VALUES ('$nim', '$nama', '$jk', '$prodi', '$alamat')";
    mysqli_query($conn, $query);

    // setelah dijalankan query nya, saya akan membuat function tambah ini akan mengembalikan angka yg akan saya dapat dari mysqli_affected_rows
    return mysqli_affected_rows($conn);
}


function hapus($nim)
{
    // panggil koneksi
    global $conn;
    // jalankan query nya
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim = '$nim'");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    // panggil koneksi
    global $conn;
    // tangkap ID data
    $nim = htmlspecialchars($data["nim"]);
    // $nim_lama = $data["nim_lama"];
    $nama = htmlspecialchars($data["nama"]);
    $jk = htmlspecialchars($data["jenis"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $alamat = htmlspecialchars($data["alamat"]);
    // jalankan query UPDATE nya
    $query = "UPDATE mahasiswa SET nama = '$nama', jk = '$jk', prodi = '$prodi', alamat = '$alamat' WHERE nim = $nim";
    mysqli_query($conn, $query);

    // setelah dijalankan query nya, saya akan membuat function tambah ini akan mengembalikan angka yg akan saya dapat dari mysqli_affected_rows
    return mysqli_affected_rows($conn);
}


function registrasi($data)
{
    global $conn;
    // stripslashes berfungsi agar user tidak dapat memasukkan karakter seperti simbol, sedangkan strtolower berfungsi memaksa user agar menginputkan username harus berupa huruf kecil semua
    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    // untuk memungkikan user menginputkan password anda tanda kutipnya, dan tanda kutip tersebut akan dimasukkan ke dalam databse secara aman
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);



    // lakukan pengecekkan apabila username tertentu sudah ada di database atau belum
    // caranya kalian harus cek dulu ke dalam query tabel user, ada atau tidak username yang ingin ditambahkan seperti username yang sudah ada sebelumnya
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudaf terdaftar!')</script>";
        return false;
    }


    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
        return false;
    }


    // tambahkan user baru ke database --> password yg sudah ada di database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email',  '$password')");
    return mysqli_affected_rows($conn);
}


function queryPelanggaran()
{
    // agar variabel $conn dapat diakses
    global $conn;
    $query = "SELECT p.id_pelanggaran, m.nim, m.nama, m.prodi, jenis_pelanggaran, tanggal, point FROM pelanggaran p INNER JOIN mahasiswa m ON p.nim = m.nim";
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryListPelanggaran()
{
    // agar variabel $conn dapat diakses
    global $conn;
    $query = "SELECT * FROM pelanggaran, mahasiswa WHERE pelanggaran.nim = mahasiswa.nim ORDER BY id_pelanggaran ASC";
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambahPelanggaran($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    // disini saya juga mencoba agar website kita aman dari hacker
    $nim = htmlspecialchars($data["nim"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $point = htmlspecialchars($data["point"]);

    // query insert data    
    $query = "INSERT INTO pelanggaran VALUES ('','$nim', '$tanggal', '$jenis', '$point')";
    mysqli_query($conn, $query);

    // setelah dijalankan query nya, saya akan membuat function tambah ini akan mengembalikan angka yg akan saya dapat dari mysqli_affected_rows
    return mysqli_affected_rows($conn);
}

function editPelanggaran($data)
{
    // panggil koneksi
    global $conn;
    // tangkap ID data
    $id_pelanggaran = htmlspecialchars($data["id_pelanggaran"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jenis_pelanggaran = htmlspecialchars($data["jenis_pelanggaran"]);
    $point = htmlspecialchars($data["point"]);
    // jalankan query UPDATE nya
    $query = "UPDATE pelanggaran SET tanggal = '$tanggal', jenis_pelanggaran = '$jenis_pelanggaran', point = '$point' WHERE id_pelanggaran = '$id_pelanggaran'";
    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}

function hapusPelanggaran($id_pelanggaran)
{
    // panggil koneksi
    global $conn;
    // jalankan query nya
    mysqli_query($conn, "DELETE FROM pelanggaran WHERE id_pelanggaran = '$id_pelanggaran'");
    return mysqli_affected_rows($conn);
}



function totalBolos()
{
    global $conn;
    $query = "SELECT * FROM pelanggaran WHERE jenis_pelanggaran = 'Bolos'";
    $hitung = mysqli_query($conn, $query);
    return mysqli_num_rows($hitung);
}

function totalNyontek()
{
    global $conn;
    $query = "SELECT * FROM pelanggaran WHERE jenis_pelanggaran = 'Nyontek'";
    $hitung = mysqli_query($conn, $query);
    return mysqli_num_rows($hitung);
}

function totalNgrokok()
{
    global $conn;
    $query = "SELECT * FROM pelanggaran WHERE jenis_pelanggaran = 'Ngrokok'";
    $hitung = mysqli_query($conn, $query);
    return mysqli_num_rows($hitung);
}

function totalTawuran()
{
    global $conn;
    $query = "SELECT * FROM pelanggaran WHERE jenis_pelanggaran = 'Tawuran'";
    $hitung = mysqli_query($conn, $query);
    return mysqli_num_rows($hitung);
}

function totalBullying()
{
    global $conn;
    $query = "SELECT * FROM pelanggaran WHERE jenis_pelanggaran = 'Bullying'";
    $hitung = mysqli_query($conn, $query);
    return mysqli_num_rows($hitung);
}

function queryByNim($nim)
{

    global $conn;
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    $rows = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function queryPelanggaranById($id_pelanggaran)
{

    global $conn;
    $query = "SELECT p.id_pelanggaran, m.nim, m.nama, m.prodi, jenis_pelanggaran, 
    tanggal, point FROM pelanggaran p INNER JOIN mahasiswa m ON p.nim = m.nim WHERE p.id_pelanggaran='$id_pelanggaran'";
    $result = mysqli_query($conn, $query);
    $rows = [];


    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}