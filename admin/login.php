<?php session_start();
if (isset($_SESSION['adminToken'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>Maisha Infotech - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">

    <!-- endinject -->


    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- End layout styles -->
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page hny_log_bg">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-8 mx-auto">
                        <div class="card">
                            <div class="row align-items-center">
                                <div class="col-md-6 pe-md-0">
                                    <div class="auth-side-wrapper">
                                        <img src="assets/images/login-bg.avif" width="100%" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">Maisha Infotech </span></a>
                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form action="javascript:;" enctype="multipart/form-data" class="forms-sample" id="MainlogInForm" autocomplete="off">
                                            <div class="mb-3">
                                                <label for="userEmail" class="form-label">User ID</label>
                                                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="userPassword" class="form-label">Password</label>
                                                <input type="password" required class="form-control" name="userPassword" id="userPassword" autocomplete="current-password" placeholder="Password">
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-primary mb-2 mb-md-0 text-white" id="loginBtn">Login</button>

                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- core:js -->
    <script src="assets/vendors/core/core.js"></script>
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/sweetalert2/sweetalert2.min.js"></script>
    <script src="js/alert.js"></script>
    <script src="js/action.js"></script>

</body>

</html>