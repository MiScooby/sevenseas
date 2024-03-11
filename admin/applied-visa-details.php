<?php
include('includes/header.php');
$queryString = $_SERVER['QUERY_STRING'];
$gwetDetails = mysqli_fetch_array(mysqli_query($con, "SELECT av.*, c.country_name FROM applied_visa av, countries c WHERE c.country_code=av.country_code AND av.service_id='$queryString'"));
?>
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/inner.css">
<style>
    .sbr-pay-field {
        display: flex;
        position: relative;
    }

    .sbr-pay-field span {
        position: absolute;
        height: 45px;
        width: 60px;
        text-align: center;
        line-height: 40px;
        border-right: 1px solid #e9ecef;
        background: #e9ecef;
        font-size: 12px;
        font-weight: 800;
    }
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
                    <form action="javascript:;" class="p-0" id="AddDcomt" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                            <input class="form-control dropFile" type="file" name="docImage" accept="application/pdf" id="blogImg" required="">
                            <small class="form-small"> Note : Please upload image size with width between 400px-500px & Height between 400px-500px </small>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Document Name</label>
                            <input class="form-control" type="text" placeholder="Enter the document name" name="docName" required="">
                        </div>
                        <input type="hidden" name="formType" value="DocUploadType">
                        <input type="hidden" name="reqId" value="<?= $queryString ?>">
                        <button type="submit" id="docUploadBtn" class="btn btn-primary">Upload Document</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!--start product detail-->

                <div class="p-3">
                    <h2 class="jobti">Add payment Detail</h2>
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <form action="javascript:;" class="p-0" id="AddPayment" method="post" enctype="multipart/form-data">

                                <div class="mb-2">
                                    <label class="form-label">Total Payment</label>
                                    <div class="sbr-pay-field">
                                        <?php
                                        $checkPaymet = mysqli_query($con, "SELECT * FROM `payment_req` WHERE `req_id`='$queryString'");
                                        $checkPaymetCount =  mysqli_num_rows($checkPaymet);
                                        $paymentAmnt = "";
                                        if ($checkPaymetCount > 0) {
                                            $checkPaymetData =  mysqli_fetch_array($checkPaymet);

                                            $paymentAmnt = $checkPaymetData['amount'];
                                        }
                                        ?>
                                        <span>INR</span>
                                        <input class="form-control" style="width: 600px;     text-align: center; padding-left: 70px;" type="text" placeholder="Enter the Total Payment" value="<?= $paymentAmnt ?>" name="PayAmount" required="">
                                        <input type="hidden" name="formType" value="AddPayment">
                                        <input type="hidden" name="reqId" value="<?= $queryString ?>">
                                        <button <?=($checkPaymetData['status'] == "complete")?'disabled':'';?> style="width: 100%; margin-left: 10px;" type="submit" id="AddPaymentBtn" class="btn btn-primary">Save Payment</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-sm-6 text-center">
                            <small>No Payment Recived yet...</small>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script src="js/visa-action.js"></script>