<?php
include('includes/header.php');
$queryString = $_SERVER['QUERY_STRING'];
$gwetDetails = mysqli_fetch_array(mysqli_query($con, "SELECT av.*, c.country_name FROM applied_visa av, countries c WHERE c.country_code=av.country_code AND av.service_id='$queryString'"));
?>
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/inner.css">
<style>

</style>
<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">



                <!--start product detail-->

                <div class="p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="jobti"><?= $gwetDetails['name'] ?> - <?= strtoupper($gwetDetails['country_name']) ?> Visa 's Details </h2>

                            <div class=" d-flex mt-4">
                                <div class="mb-3 tags">
                                    <b> Applicant Name : <br> <span> <?= $gwetDetails['name'] ?></span></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b> Applicant Email : <br> <span> <?= $gwetDetails['email'] ?></span></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b>Applicant Number : <br> <span> <?= $gwetDetails['mobile'] ?></span></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b> Applied Country : <br> <span> <?= $gwetDetails['country_name'] ?></span></b>
                                </div>

                                <div class="mb-3 tags">
                                    <b> Enquiry Date : <br> <span> <?= $gwetDetails['created_at'] ?></span></b>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!--start product detail-->

                <div class="p-3">
                    <h2 class="jobti">Passport Document</h2>

                    <img src="../passport_data/<?= $gwetDetails['passport']; ?>" width="100%" height="300px" alt="">
                </div>



            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!--start product detail-->

                <div class="p-3">
                    <h2 class="jobti">Upload Document</h2>
                    <form action="javascript:;" class="p-0" id="AddblogForms" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <input class="form-control dropFile" type="file" name="blogImg" accept="application/pdf" id="blogImg" required="">
                            <small class="form-small"> Note : Please upload image size with width between 400px-500px & Height between 400px-500px </small>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" >Document Name</label>
                            <input class="form-control" type="text" placeholder="Enter the document name" name="docName" required="">                            
                        </div>
                        <button type="submit" id="docUploadBtn" class="btn btn-primary">Upload Document</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script src="js/action.js"></script>