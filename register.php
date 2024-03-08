<?php include('includes/header.php');

if(isUserLoggedIn()){
    header('Location: index.php');
}

?>
<style>
    .main-header {
        display: none;
    }

    .main-footer {
        display: none;
    }

    .page-wrapper {
        height: 100vh;
    }
</style>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.php">
                <div class="logo">
                    <img class="logo-size" src="images/logo.png" alt="">
                    <img class=" logo-size-short" src="images/logo_white.png" alt="">
                </div>
            </a>
            <div class="back_btn-short">
                <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder ansh-img-fld">
                    <img src="images/logo_white.png" alt="">
                    <p>Visa Consultany and Medical for employment visas</p>
                </div>
                <div class="back_btn">
                    <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items padd-ansh">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <!-- <div class="page-links">
                            <a href="login4.html" class="active">Login</a><a href="register4.html">Register</a>
                        </div> -->
                        <form action="javascript:;" id="registrationForm" method="post" enctype="multipart/form-data" class="anshu_vis_form">
                            <label for="loginName">Full Name</label>
                            <input class="form-control" type="text" name="regName" placeholder="Full Name" required>
                            <label for="loginEmail">Email address</label>
                            <input class="form-control" type="text" name="regEmail" placeholder="E-mail Address" required>
                            <label for="logiMobile">Mobile Number</label>
                            <input class="form-control" type="text" oninput="this.value = this.value.replace(/\D+/g, '')" maxlength="10" name="regMobile" placeholder="Mobile Number" required>
                            <label for="loginpswd">Password</label>
                            <input class="form-control" type="password" name="regPassword" placeholder="Password" required>
                            <div class="form-button reg-btn">
                                <input type="hidden" name="formType" value="registrationForm">
                                <button  type="submit" id="regbtn" class="ibtn">Register</button>
                            </div>
                        </form>
                        <form action="javascript:;" style="display: none;" id="otpForm">
                            <div class="form-group">
                                <label for="loginEmail">OTP</label>
                                <input type="number" maxlength="4" class="form-control" id="otp_emai" name="otp_reg" placeholder="Enter Four Digit Code">
                            </div>
                            <input type="hidden" name="formType" value="otpForm">
                            <input type="hidden" name="user_email" id="user_email_otp">
                            <button type="submit" id="otpBtn" class="btn btn-primary">Confirm</button>
                        </form>
                        <div class="other-links">
                            <span>Or Register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>