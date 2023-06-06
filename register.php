<?php

require 'function/functions.php';

// apabila tombol register ditekan
if (isset($_POST["register"])) {
    // maka kita jalankan function register
    if (registrasi($_POST) > 0) {
        // jika benar
        echo "<script>alert('User baru berhasil ditambahkan!'); document.location.href = 'index.php';</script>";
    } else {
        // jika salah
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
        content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body class="fix-menu">

    <!-- cek pesan notifikasi -->
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah!";
        } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
        } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
        }
    }
    ?>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->



    <section class="login p-fixed d-flex text-center bg-primary common-img-bg"
        style="background-image: url(assets/images/bg_pnc.jpg); background-size: cover;">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">


                        <form action="" method="post">

                            <div class="auth-box">
                                <!-- <div class="text-center">
                                    <img src="dashboard/img/logo_pnc.png" alt="logo_pnc"
                                        style="height: 70px; width: 230px;">
                                    <h3 style="background-color: white;"> <b>Sistem Pelanggaran Mahasiswa Politeknik
                                            Negeri Cilacap</b> </h3>
                                </div> -->
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left text-center txt-primary" style="font-size: 30px;">Register
                                        </h3>
                                    </div>
                                </div>
                                <hr />

                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Input Username"
                                        required>
                                    <span class="md-line"></span>
                                </div>

                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Input Email"
                                        required>
                                    <span class="md-line"></span>
                                </div>

                                <div class="input-group">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Input Password" required>
                                    <span class="md-line"></span>
                                </div>

                                <div class="input-group">
                                    <input type="password" name="password2" class="form-control"
                                        placeholder="Konfirmasi Password" required>
                                    <span class="md-line"></span>
                                </div>

                                <div class="row m-t-15 text-left">
                                    <div class="col-sm-3 col-md-12 forgot-phone text-right">
                                        <p class="login-register-text" style="color: black;">Anda sudah punya
                                            akun? <a href="index.php" style="color: blue; font-size: 15px;">
                                                <u>Login</u></a>
                                        </p>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="register"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Register</button>
                                    </div>
                                </div>
                            </div>





                    </div>
                    </form>
                    <!-- end of form -->


                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>