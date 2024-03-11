<?php
include('includes/header.php');
$queryString = $_SERVER['QUERY_STRING'];
$gwetDetails = mysqli_fetch_array(mysqli_query($con, "SELECT av.*, c.country_name FROM applied_visa av, countries c WHERE c.country_code=av.country_code AND av.service_id='$queryString'"));

$dvisaDocsQ = mysqli_query($con, "SELECT * FROM `documents` WHERE `req_id`='$queryString' AND `trash`='0' ");
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
                    <h2 class="jobti" style="font-size: 14px;">Passport Document</h2>

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
                    <h2 class="jobti" style="font-size: 14px;">Upload Document</h2>
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
                    <h2 class="jobti" style="font-size: 14px;">Add payment Detail</h2>
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
                                        <button <?= ($checkPaymetData['status'] == "complete") ? 'disabled' : ''; ?> style="width: 100%; margin-left: 10px;" type="submit" id="AddPaymentBtn" class="btn btn-primary">Save Payment</button>
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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-3">
                <table id="" class="dataTableExample table table-bordered  " width="100%">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Document Name</th>
                            <th>Document File</th>
                            <th>Upload Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <?php
                        $i = 1;
                        while ($dvisaDocs = mysqli_fetch_array($dvisaDocsQ)) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>

                                <td><?= $dvisaDocs['doc_name'] ?></td>
                                <td><a href="../visa_document/<?= $dvisaDocs['doc_file'] ?>" target="_blank">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve" width="35px" height="35px" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <circle style="fill:#999999;" cx="256" cy="256" r="256"></circle>
                                                <polygon style="fill:#FFFFFF;" points="350.44,437.337 120.001,437.337 120.001,74.664 392,74.664 392,395.776 "></polygon>
                                                <g>
                                                    <polygon style="fill:#E21B1B;" points="204.576,273.336 178.904,304.529 168.12,294.032 161,301.752 179.736,319.976 212.472,280.192 "></polygon>
                                                    <polygon style="fill:#E21B1B;" points="204.576,334.024 178.904,365.216 168.12,354.729 161,362.44 179.736,380.664 212.472,340.888 "></polygon>
                                                </g>
                                                <g>
                                                    <rect x="232.629" y="282.669" style="fill:#CCCCCC;" width="118.362" height="8"></rect>
                                                    <rect x="232.629" y="302.554" style="fill:#CCCCCC;" width="118.362" height="8"></rect>
                                                    <rect x="232.629" y="343.36" style="fill:#CCCCCC;" width="118.362" height="8"></rect>
                                                    <rect x="232.629" y="363.244" style="fill:#CCCCCC;" width="118.362" height="8"></rect>
                                                    <rect x="267.367" y="132.787" style="fill:#CCCCCC;" width="83.075" height="23.44"></rect>
                                                    <rect x="267.367" y="200.7" style="fill:#CCCCCC;" width="83.075" height="23.44"></rect>
                                                    <rect x="267.367" y="166.739" style="fill:#CCCCCC;" width="83.075" height="23.44"></rect>
                                                    <circle style="fill:#CCCCCC;" cx="203.828" cy="153.877" r="21.13"></circle>
                                                </g>
                                                <path d="M202.824,224.096L182.4,179.848c0,0-21.408,0.288-21.408,20v24.264L202.824,224.096z"></path>
                                                <path d="M204.8,224.096l20.408-44.248c0,0,21.408,0.288,21.408,20v24.264L204.8,224.096z"></path>
                                                <polygon style="fill:#999999;" points="203.824,182.016 191.08,182.016 203.824,210.224 216.568,182.016 "></polygon>
                                                <polygon style="fill:#CCCCCC;" points="350.44,437.337 350.44,395.776 392,395.776 "></polygon>
                                            </g>
                                        </svg>
                                    </a></td>


                                <td><?= $dvisaDocs['updated_at'] ?></td>
                                <td><a href="javascript:;" class="mx-1 btn btn-danger DocDltBtn" data-id="<?= $dvisaDocs['id'] ?>"><i class="fa fa-md fa-trash"></i> </a> </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script src="js/visa-action.js"></script>