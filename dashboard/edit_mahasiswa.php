<!-- Cek apakah tombol Button sudha pernah di klik atau belum -->
<?php
session_start();
if (!isset($_SESSION['username'])) {
     header("Location:../index.php");
}
// hubungkan terlebih dahulu ke halaman function menggunakan require
require '../function/functions.php';

// ambil data d URL
$nim = $_GET["nim"];

// query data mahasiswa berdasarkan id nya
$mhs = queryByNim($nim);

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
     // ambil data dari tiap element dalam form
     // $nama = $_POST["nama"];
     // $nrp = $_POST["nrp"];
     // $email = $_POST["email"];
     // $jurusan = $_POST["jurusan"];
     // $gambar = $_POST["gambar"];

     // query insert data    
     // $query = "INSERT INTO mahasiswa VALUES ('', '$nama', $nrp,'$email', '$jurusan', '$gambar')";
     // mysqli_query($conn, $query);

     // cek apakah data berhasil ditambahkan atau tidak
     // if (mysqli_affected_rows($conn) > 0) {
     //     echo "berhasil";
     // } else {
     //     echo "gagal!";
     //     echo "<br>";
     //     echo mysqli_error($conn);
     // }

     // cek apakah data berhasil ditambahkan atau tidak
     if (ubah($_POST) > 0) {
          // echo "Data Berhasil Ditambahkan!";
          echo "<script>alert('Data Berhasil Diubah!');document.location.href = '../dashboard/data_mahasiswa.php';</script>";
     } else {
          // echo "Data Gagal Ditambahkan!";
          echo "<script>alert('Data Gagal Diubah!');document.location.href = '../dashboard/data_mahasiswa.php';</script>";
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"> <img src="img/icon_pnc.png" alt="pnc" style="width: 60px; height: 60px;">
                        SI-PELMA</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><span><?php echo 'Hi, ' . $_SESSION['username'] . '!' ?></span></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>


                    <a href="data_mahasiswa.php" class="nav-item nav-link active"><i
                            class="fa fa-keyboard me-2"></i>Data
                        Mahasiswa</a>
                    <a href="tambah_pelanggaran.php" class="nav-item nav-link" style="font-size: 14px;"><i
                            class="fa fa-table me-2"></i>Tambah
                        Pelanggaran</a>
                    <a href="list_pelanggaran.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>List
                        Pelanggaran</a>
                    <a href="grafik.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Grafik</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span
                                class="d-none d-lg-inline-flex"><span><?php echo 'Hi, ' . $_SESSION['username'] . '!' ?></span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="../index.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4" style="text-align: center;">Edit Data Mahasiswa</h3>
                            <div class="table-responsive">
                                <?php
                                        foreach ($mhs as $row) {
                                             # code...

                                        ?>
                                <form action="" method="post">
                                    <div class="mb-2">
                                        <label for="exampleInputNim" class="form-label">NIM :</label>
                                        <input type="number" class="form-control" name="nim" id="exampleInputNim"
                                            required value="<?= $row["nim"]; ?>">
                                    </div>

                                    <div class="mb-2">
                                        <label for="exampleInputNama" class="form-label">Nama :</label>
                                        <input type="text" class="form-control" name="nama" id="exampleInputNama"
                                            required value="<?= $row["nama"]; ?>">
                                    </div>

                                    <div class="mb-2">
                                        <label for="exampleInputJenis" class="form-label">Jenis Kelamin
                                            :</label>
                                        <input type="text" class="form-control" name="jenis" id="exampleInputJenis"
                                            required value="<?= $row["jk"]; ?>">
                                    </div>

                                    <div class="mb-2">
                                        <label for="exampleInputProdi" class="form-label">Prodi :</label>
                                        <input type="text" class="form-control" name="prodi" id="exampleInputProdi"
                                            required value="<?= $row["prodi"]; ?>">
                                    </div>

                                    <div class="mb-2">
                                        <label for="exampleInputAlamat" class="form-label">Alamat :</label>
                                        <input type="text" class="form-control" name="alamat" id="exampleInputAlamat"
                                            required value="<?= $row["alamat"]; ?>">
                                    </div>

                                    <br>
                                    <a href="./data_mahasiswa.php" type="button" name="kembali"
                                        class="btn btn-secondary"><i class="fas fa-angle-double-left"></i>
                                        Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary float-end"><i
                                            class="fas fa-save"></i> Ubah Data!</button>
                                </form>
                                <?php
                                        }
                                        ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>