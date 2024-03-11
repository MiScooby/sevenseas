<?php include('includes/header.php');
$id = $_GET['id'];
$Getdata = mysqli_fetch_array(mysqli_query($con, "SELECT pr.*, av.name, av.email, av.mobile, c.country_name FROM payment_req pr, applied_visa av, countries c WHERE av.service_id=pr.req_id AND c.country_code=av.country_code AND pr.req_id='$id'"));
?>

<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">Checkout Details</h1>
        </div>
    </div>
</section>


<section class="course-details">
    <div class="container">
        <div class="row align-items-center flex-xl-row-reverse">

            <div class="col-xl-6 col-lg-6">
                <div class="courses-details__content">
                    <h2 class="mb-3">Your Payment Details </h2>
                    <div class="course-sidebar">
                        <ul class="course-details-info">
                            <li class="course-details-info-link">
                                Name: <span><?=$Getdata['name']?></span>
                            </li>
                            <li class="course-details-info-link">

                                Email: <span><?=$Getdata['email']?></span>
                            </li>
                            <li class="course-details-info-link">
                                Mobile Number: <span><?=$Getdata['mobile']?></span>
                            </li>
                            <li class="course-details-info-link">
                                Country: <span><?=$Getdata['country_name']?></span>
                            </li>
                            
                        </ul>


                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6">
                <div class="">
                    <img src="images/check_bg.png" alt />
                </div>
            </div>

        </div>
        <div class="row course-details-price justify-content-center align-items-center">
            <div class="col-lg-6">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="course-details-price-text">Total price</p>
                        <p class="course-details-price-amount">INR <?=$Getdata['amount']?></p>
                    </div>
                    <a href="javascript:;" class="theme-btn btn-style-one course-details-price-btn"><span class="btn-title">Pay Now</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('includes/footer.php') ?>