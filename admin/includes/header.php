<?php session_start();
error_reporting(0);
include('../connection/config.php');
if (!isset($_SESSION['adminToken'])) {
    header("location:login.php");
}

$InUser1 = $_SESSION['adminToken'];
$AdminUserData = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `ec_employee` WHERE `email`='$InUser1' "));
$AdminUserName = $AdminUserData['first_name'] . ' ' . $AdminUserData['last_name'];

$blogCatQuer = mysqli_query($con, "SELECT * FROM `blog_category`");
$blogCatQuerCount = mysqli_num_rows($blogCatQuer);


$blogQuer = mysqli_query($con, "SELECT * FROM `blogs`");
$blogQuerCount = mysqli_num_rows($blogQuer);

$jobQ = mysqli_query($con, "SELECT * FROM `jobs`");
$jobQCount = mysqli_num_rows($jobQ);

$counrtQ = mysqli_query($con, "SELECT vc.*, c.country_name FROM visa_county vc, countries c WHERE c.country_code=vc.country_code");
$counrtQCount = mysqli_num_rows($counrtQ);

$getApJob = mysqli_query($con, "SELECT * FROM `job_applicants` ORDER BY `id` DESC ");
$getApJobCount = mysqli_num_rows($getApJob);

$contactData = mysqli_query($con, "SELECT * FROM `contact_us` ORDER BY `contact_us`.`id` DESC");
$contactCount = mysqli_num_rows($contactData);

$BlogTagquery = mysqli_query($con, "SELECT * FROM `blog_tags`");
$BlogTagCount = mysqli_num_rows($BlogTagquery);

$VisaAppliequery = mysqli_query($con, "SELECT * FROM `applied_visa`");
$VisaApplieCount = mysqli_num_rows($VisaAppliequery);

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
    <title>Seven Seas - Admin</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- End layout styles -->

    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
 

    
</head>

<body>

 

    <div class="main-wrapper">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="index.php" class="sidebar-brand">
                  <img src="assets/images/logo.png" alt="logo" width="150px">
                </a>

            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item nav-category">Service Control </li>
                    <li class="nav-item">
                        <a class="nav-link" href="visa-applied.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title"> Visa Applied </span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="countries.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title"> Countries </span>
                        </a>
                    </li> 

                    <li class="nav-item nav-category">Website Control </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Contact Us Enquiry</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="vacancies.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Vacancies</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="candidates.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Candidates</span>
                        </a>
                    </li>
 
                    <li class="nav-item">
                        <a class="nav-link" href="blog-category.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Blog Category</span>
                        </a>
                    </li>
                                 
                
              
                    <li class="nav-item">
                        <a class="nav-link" href="view-blog.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Website Blog</span>
                        </a>
                    </li>
              
                    <li class="nav-item">
                        <a class="nav-link" href="view-gallery.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Website Gallery</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="seo-page.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Website Pages - SEO</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="contact-info.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Contact Information</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="social-media.php">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Social Media</span>
                        </a>
                    </li>    

                    <?php
                    if (authChecker('admin', ['access_control'])) {
                    ?>
                        <li class="nav-item nav-category">SECURITY & ACCESS CONTROL</li>
                        <li class="nav-item">
                            <a class="nav-link" href="roles.php">
                                <i class="link-icon" data-feather="tag"></i>
                                <span class="link-title">Roles / Privileges</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#employee" role="button" aria-expanded="false" aria-controls="employee">
                                <i class="link-icon" data-feather="tag"></i>
                                <span class="link-title">Employees</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="employee">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="add-employee.php" class="nav-link">Create Employee</a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="employee-list.php" class="nav-link">Employee List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php
                    }
                    ?>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#employee" role="button" aria-expanded="false" aria-controls="employee">
                            <i class="link-icon" data-feather="tag"></i>
                            <span class="link-title">Employees</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="employee">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="add-employee.php" class="nav-link">Create Employee</a>

                                </li>
                                <li class="nav-item">
                                    <a href="employee-list.php" class="nav-link">Employee List</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                </ul>
            </div>
        </nav>


        <div class="page-wrapper">


            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">

                    <ul class="navbar-nav">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="assets/images/avatar.png" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="assets/images/avatar.png" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder"><?= $AdminUserName ?></p>
                                        <span><?= $AdminUserData['email'] ?></span>

                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">


                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0" onclick="logout()">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">