<?php include('includes/header.php') ?>

<style>
    .sbr-function {
        cursor: pointer;
    }
</style>
<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">Country</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.php">Home</a></li>

                <li>Country</li>
            </ul>
        </div>
    </div>
</section>


<!-- Countries Section -->
<section class="countries-section-two">
    <div class="outer-box ansh-box">
        <div class="bg bg-pattern-3"></div>
        <div class="auto-container">
            <div class="row">

                <div class="title-column col-lg-12 col-md-12 wow fadeInLeft">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="sub-title">countries you can visit</span>
                            <h2>Countries we support <br>for the <span class="color3">VISAS</span></h2>
                            <div class="text">There cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis. our unmatched approach to business and cost effectiveness consulting</div>
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-12 col-md-12 wow fadeInRight" data-wow-delay="300ms">
                    <div class="row">

                        <?php
                        $counrtQ = mysqli_query($con, "SELECT vc.*, c.country_name FROM visa_county vc, countries c WHERE c.country_code=vc.country_code");

                        while ($counrtData = mysqli_fetch_array($counrtQ)) {
                        ?>
                            <div data-country="<?= $counrtData['country_code'] ?>" onclick="handleCountryClick(this, '<?php echo (isUserLoggedIn()) ? 'apply' : 'login'; ?>')" class="country-block-two col-lg-4 col-md-4 col-sm-6 sbr-function">
                                <div class="inner-box">
                                    <div class="flag"><img src="media/country_ico/<?= $counrtData['ico'] ?>" alt=""></div>
                                    <h6 class="title"><?= strtoupper($counrtData['country_name']) ?></h6>
                                </div>
                            </div>


                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-outer">
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>