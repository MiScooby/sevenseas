<?php include('includes/header.php');
?>

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>

</div>
<style>
    .dataHeadnSec {
        color: #868686;
        font-weight: 500;
        font-size: 12px;
    }

    .card {
        background-color: #fff !important;
    }
</style>
<div class="row">
    <div class="col-12 col-xl-12">

        <div class="row">
            <div class="col-md-12">
                <p class="my-2 mx-2 dataHeadnSec">ENQUIRIES DATA</p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Contact Us Enquiry</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $contactCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Campaign Enquiry</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $contListCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>

                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Normal Enquiry</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $projectQCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="my-2 mx-2 dataHeadnSec">JOB DATA</p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Vacancies</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $jobQCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Candidates</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $getApJobCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="my-2 mx-2 dataHeadnSec">MEDIA DATA</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">Blog Category</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $blogCatQuerCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 grid-margin">
                <div class="card">
                    <div class="card-body" style="cursor: pointer;" >
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-2">ALL Blogs</h6>

                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-7">
                                <h3 class="mb-2"><?= $blogQuerCount ?></h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Total Enquiry</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5">
                                <img src="assets/images/analytics.svg" class="svg_img header_svg" alt="icon">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div> <!-- row -->



<?php include('includes/footer.php'); ?>