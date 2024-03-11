<?php include('./connection/config.php');
if (isUserLoggedIn()) {
    $loginI = $_SESSION['user_id'];
    $GetLoginUser = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `user` WHERE `email`='$loginI'"));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Seven Seas </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

</head>

<body>
    <div class="page-wrapper">



        <header class="main-header header-style-three">


            <div class="header-lower">

                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo"><a href="index.php"><img src="images/logo_white.png " alt="" title=""></a></div>
                    </div>

                    <div class="nav-outer">
                        <nav class="nav main-menu">
                            <ul class="navigation">
                                <li class="current dropdown"><a href="index.php">Home</a>

                                </li>
                                <li class="dropdown"><a href="javascript:;">About Company</a>
                                    <ul>
                                        <li><a href="about.php">About us</a></li>
                                        <li><a href="about.php#testimonial">Testimonial</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="javascript:;"> Services </a>
                                    <ul>
                                        <li><a href="visa.php">Visa</a></li>
                                        <li><a href="medical.php">Medical </a></li>
                                        <li><a href="attestation.php">Attestation</a></li>
                                        <li><a href="travel_insurance.php">Travel insurance </a></li>
                                        <li><a href="tickets.php">Tickets</a></li>
                                        <li><a href="hostels.php">Hotels</a></li>




                                    </ul>
                                </li>
                                <li><a href="countries.php">Countries</a>

                                </li>
                                <li class="dropdown"><a href="javascript:;">Trade association </a>
                                    <ul>
                                        <li><a href="javascript:;">IATA</a></li>
                                        <li><a href="javascript:;">TAAI</a></li>
                                        <li><a href="javascript:;">TAFI</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Get in touch </a></li>

                            </ul>
                        </nav>

                        <div class="outer-box">
                            <a href="tel:+91-9999130118" class="info-btn">
                                <img class="icon" src="images/icons/icon-phone.png" alt="">
                                <small class="title">Call Anytime</small>
                                <strong class="text">+ 91-9999130118</strong>
                            </a>

                            <a href="<?= (isUserLoggedIn()) ? 'account.php' : 'login.php'; ?>" class="theme-btn btn-style-one"><span class="btn-title"><span class="fa fa-user"></span> <?= (isUserLoggedIn()) ? '' . $GetLoginUser['name'] . '' : 'User Login'; ?> </span></a>
                            <button class="theme-btn btn-style-one" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Pay Online</button>


                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mobile-menu">
                <div class="menu-backdrop"></div>

                <nav class="menu-box">
                    <div class="upper-box">
                        <div class="nav-logo"><a href="index.php"><img src="images/logo_white.png" alt="" title=""></a></div>
                        <div class="close-btn"><i class="icon fa fa-times"></i></div>
                    </div>
                    <ul class="navigation clearfix">

                    </ul>
                    <ul class="contact-list-one">
                        <li>

                            <div class="contact-info-box">
                                <i class="icon lnr-icon-phone-handset"></i>
                                <span class="title">Call Now</span>
                                <a href="tel:+92880098670">+91-9999130118</a>
                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-envelope1"></span>
                                <span class="title">Send Email</span>
                                <a href="mailto:visa.sevenseas@gmail.com"><span class="__cf_email__" data-cfemail="a6cec3cad6e6c5c9cbd6c7c8df88c5c9cb">visa.sevenseas@gmail.com</span></a>
                            </div>
                        </li>
                        <li>

                            <div class="contact-info-box">
                                <span class="icon lnr-icon-clock"></span>
                                <span class="title">Address</span>
                                15A/44 B-8, W E A Partap Chamber-2, Saraswati Marg, Karol Bagh, New Delhi-110005
                            </div>
                        </li>
                    </ul>
                    <ul class="social-links">
                        <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </nav>
            </div>

            <div class="search-popup">
                <span class="search-back-drop"></span>
                <button class="close-search"><span class="fa fa-times"></span></button>
                <div class="search-inner">
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <input type="search" name="search-field" value="" placeholder="Search..." required="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="sticky-header">
                <div class="auto-container">
                    <div class="inner-container">

                        <div class="logo">
                            <a href="index.php" title=""><img src="images/logo.png" alt="" title=""></a>
                        </div>

                        <div class="nav-outer">

                            <nav class="main-menu">
                                <div class="navbar-collapse show collapse clearfix">
                                    <ul class="navigation clearfix">

                                    </ul>
                                </div>
                            </nav>

                            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">


                    <div class="sec-title m-0">
                        <h2 class="m-0">Pay Online visa</h2>
                    </div>


                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <form id="payment_check_form" action="javascript:;" method="post">
                        <div class="row">
                            <p class="srb-pra">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, enim a. Laborum molestiae nihixsl voluptatibus ab atque eius! Illum facere beatae eius, provident obcaecati voluptatum reiciendis amet</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Request Id *</label>
                                    <input name="reqId" class="form-control" type="text" placeholder="Registration ID">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Register Email Id *</label>
                                    <input name="reqEmail" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <input name="formType" value="payment_check_form" type="hidden" />
                            <button type="submit" id="payButton" class="theme-btn btn-style-one text-white"><span class="btn-title text-white">Proceed To Pay </span></button>

                        </div>
                    </form>



                </div>
                <div class="payment-copyright text-center">
                    <p>© 2024 Payment.All Rights reserved. <a href="javascript:;">Privacy Policy</a></p>
                </div>
            </div>
        </header>