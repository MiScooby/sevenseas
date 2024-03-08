<?php include('includes/header.php');
?>
<link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="assets/css/inner.css">

<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body p-3">
                <table id="" class="dataTableExample table table-bordered  " width="100%">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Req PNR.NO</th>
                            <th>Applicant Name</th> 
                            <th>Applicant Mobile</th>
                            <th>Passport</th> 
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <?php
                        $i = 1;
                        while ($VisaAppliequery = mysqli_fetch_array($VisaAppliequery)) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $VisaAppliequery['name'] ?></td>
                                <td><?= $VisaAppliequery['mobile'] ?></td>
                                <td><?= $VisaAppliequery['email'] ?></td>
                                <td><a href="../passport_data/<?= $VisaAppliequery['passport'] ?>" target="_blank">
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
                                <td><a href="applied-visa-details.php?<?= $VisaAppliequery['service_id'] ?>" class="btn btn-primary">View Details</a></td>
                                
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