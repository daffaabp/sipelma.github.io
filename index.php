<?php
session_start();

// if (!isset($_SESSION['username'])) {
//    header("Location:index.php");
// }

require 'function/functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["login"])) {
     // menangkap data username dan passwordnya dari POST
     $username = $_POST["username"];
     $password = $_POST["password"];

     // kita akna mengecek satu" mulai dari username
     $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

     // cek username --> mysqli_num_rows artinya untuk menghitung ada berapa baris yang dikembalikan dari fungsi SELECT
     // jika ada pasti nilainya 1, jika tidak ada maka nilainya 0
     if (mysqli_num_rows($result) === 1) {

          // cek password --> ambil dulu passwordnya dari Databased, berdasarkan usernamenya
          $row = mysqli_fetch_assoc($result);
          // lalu gunakan function "password_verify" --> untuk mengembalikan password yg acak
          if (password_verify($password, $row["password"])) {
               // jika benar, maka perbolehkan user untuk masuk ke dalam sistem
               header("Location: index.php");
               exit;
          }
     }

     $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <title>Login SI-PELMA</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="CodedThemes">
   <meta name="keywords"
      content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
   <meta name="author" content="CodedThemes">
   <!-- Favicon icon -->
   <link rel="icon" href="./dashboard/img/icon_pnc.png" type="image/x-icon">
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


                  <form action="cek_login.php" method="post">

                     <div class="auth-box">
                        <div class="text-center">
                           <img src="dashboard/img/logo_pnc.png" alt="logo_pnc" style="height: 70px; width: 230px;">
                           <h3 style="background-color: white;"> <b>Sistem Pelanggaran Mahasiswa
                                 Politeknik
                                 Negeri Cilacap</b> </h3>
                        </div>
                        <div class="row m-b-20">
                           <div class="col-md-12">
                              <h3 class="text-left txt-primary" style="font-size: 30px;">Login
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
                           <input type="password" name="password" class="form-control" placeholder="Password" required>
                           <span class="md-line"></span>
                        </div>

                        <div class="row m-t-25 text-left">
                           <div class="col-sm-7 col-xs-12">
                              <div class="checkbox-fade fade-in-primary">
                                 <label>
                                    <input type="checkbox" value="">
                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                    <span class="text-inverse">Remember me</span>
                                 </label>
                              </div>
                           </div>
                           <div class="col-sm-3 col-md-12 forgot-phone text-right">
                              <p class="login-register-text" style="color: black;">Anda belum punya
                                 akun? <a href="register.php" style="color: blue; font-size: 15px;">
                                    <u>Register</u></a>
                              </p>

                           </div>
                        </div>
                        <div class="row m-t-30">
                           <div class="col-md-12">
                              <button type="submit" name="login"
                                 class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign
                                 in</button>
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