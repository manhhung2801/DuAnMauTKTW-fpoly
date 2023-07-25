
<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../public/dashboard/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../public/dashboard/assets/img/favicon.png">
  <title>
    Sign-Up
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../public/dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../public/dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../public/dashboard/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- bootstrap 5 -->
  <link id="pagestyle" href="../../public/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign Up</h4>
                </div>
              </div>
              <div class="card-body">
                <?php
                    if(isset($_SESSION["warning"])){
                      ?>
                        <div class="alert alert-warning" role="alert">
                          <?=$_SESSION["warning"];?>
                        </div>
                      <?php
                      unset($_SESSION["warning"]);
                    }
                    if(isset($_SESSION["successfully"])){
                      ?>
                        <div class="alert alert-success" role="alert">
                          <?=$_SESSION["successfully"];?>
                        </div>
                      <?php
                      unset($_SESSION["successfully"]);
                    }
                ?>
                <form role="form" action="../../app/Controller/adminController.php" method="POST" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="admin_fullname" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="admin_email" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="admin_phone" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="admin_password" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Check Password</label>
                    <input type="password" name="check_admin_password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="sign-up-admin" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign up</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../dashboard/sign-in.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../../public/dashboard/assets/js/core/popper.min.js"></script>
  <script src="../../public/dashboard/assets/js/core/bootstrap.min.js"></script>
  <script src="../../public/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../public/dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../public/dashboard/assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <!-- bootstrap 5 js  -->
  <script src="../../public/dashboard/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>