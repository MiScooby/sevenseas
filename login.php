<?php include('includes/header.php');
if(isUserLoggedIn()){
    header('Location: account.php');
}
?>
<style>
    .main-header{
        display: none;
    }
    .main-footer{
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
                </div>
            </a>
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
                    <div class="form-items">
                        <h3>Get more things done with Loggin platform.</h3>
                        <p>Access to the most powerfull tool in the entire design and web industry.</p>
                        <!-- <div class="page-links">
                            <a href="login4.html" class="active">Login</a><a href="register4.html">Register</a>
                        </div> -->
                        <form id="loginForm" action="javascript:;" enctype="multipart/form-data" class="anshu_vis_form">
                        <label for="loginEmail">Email address</label>
                            <input class="form-control" type="text" name="loginEmail" placeholder="E-mail Address" required>
                            <label for="loginpswd">Password</label>
                            <input class="form-control" type="password" name="loginPassword" placeholder="Password" required>
                            <div class="form-button">
                                <input type="hidden" name="formType" value="loginForm">
                                <button id="submit" type="submit" id="lgnBtn" class="ibtn">Login</button> <a href="index.php">Forget password?</a>
                            </div>
                        </form>
                        <div class="register">
                            <p>Don't have an account? <span><a href="register.php">Register</a></span>  </p>
                        </div>
                        <!-- <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php')?>