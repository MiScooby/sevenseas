<?php
include('includes/header.php');
if (isset($_GET['type']) && isset($_GET['id'])) {
    $enquiryType = $_GET['type'];
    $id = $_GET['id'];
    if ($enquiryType == "campaign") {
        $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `campaign` WHERE `id`='$id'"));
        $name = $data['name'];
        $mobile = $data['phone'];
        $email = $data['email'];
        $msg = $data['company'];
        $enquiry_date = $data['date_time'];
        $intIn = "";
    } else if ($enquiryType == "service") {
        $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `project_query` WHERE `id`='$id'"));
        $name = $data['name'];
        $mobile = $data['mobile'];
        $email = $data['email'];
        $msg = $data['query'];
        $intIn = $data['intrested_i'];
        $enquiry_date = $data['enquiry_at'];
    } else if ($enquiryType == "contact") {
        $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `contact_us` WHERE `id`='$id'"));
        $name = $data['name'];
        $mobile = $data['mobile'];
        $email = $data['email'];
        $msg = $data['query'];
        $intIn = $data['interested_in'];
        $enquiry_date = $data['enquiry_at'];
    }
}
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
                        <div class="col-lg-4">
                            <h2 class="jobti"><?= strtoupper($enquiryType) ?> Enquiry <?= $id ?>'s Details </h2>

                            <div class="  mt-4">
                                <div class="mb-3 tags">
                                    <b> Enquiry Type : <?= strtoupper($enquiryType) ?></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b> Enquiry By : <?= $name ?></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b> Contact Number : <?= $mobile ?></b>
                                </div>
                                <div class="mb-3 tags">
                                    <b> Email Id : <?= $email ?></b>
                                </div>
                                <?php
                                if ($intIn != "") {
                                ?>
                                    <div class="mb-3 tags">
                                        <b> Intrested Service : <?= $intIn ?></b>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="mb-3 tags">
                                    <b> Enquiry Date : <?= $enquiry_date ?></b>
                                </div>

                            </div>
                            <p class="m-3"><b> Enquiry message :</b> <?= $msg  ?></p>
                        </div>
                        <div class="col-lg-8">
                            <div class="remark-section">
                                <?php
                                $convQ = mysqli_query($con, "SELECT * FROM `enqiry_remark` WHERE `enquiry_id`='$id' AND `enquiry_type`='$enquiryType' ORDER BY `id` DESC ");
                                $conCount = mysqli_num_rows($convQ);

                                if ($conCount > 0) {

                                ?>
                                    <div class="conversation">
                                        <ul id="conRslt">
                                            <?php
                                            while ($convQdata = mysqli_fetch_array($convQ)) {
                                            ?>
                                                <li class="message-item">

                                                    <div class="content">
                                                        <div class="message">
                                                            <div class="bubble">
                                                                <p><?= $convQdata['remark'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="date-re">
                                                            <span><?= $convQdata['date_time'] ?></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="text-center">
                                        <svg width="64px" height="64px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M660 103.2l-149.6 76 2.4 1.6-2.4-1.6-157.6-80.8L32 289.6l148.8 85.6v354.4l329.6-175.2 324.8 175.2V375.2L992 284.8z" fill="#FFFFFF"></path>
                                                <path d="M180.8 737.6c-1.6 0-3.2 0-4-0.8-2.4-1.6-4-4-4-7.2V379.2L28 296c-2.4-0.8-4-4-4-6.4s1.6-5.6 4-7.2l320.8-191.2c2.4-1.6 5.6-1.6 8 0l154.4 79.2L656 96c2.4-1.6 4.8-0.8 7.2 0l332 181.6c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2l-152.8 88v350.4c0 3.2-1.6 5.6-4 7.2-2.4 1.6-5.6 1.6-8 0l-320-174.4-325.6 173.6c-1.6 0.8-2.4 0.8-4 0.8zM48 289.6L184.8 368c2.4 1.6 4 4 4 7.2v341.6l317.6-169.6c2.4-1.6 5.6-1.6 7.2 0l312.8 169.6V375.2c0-3.2 1.6-5.6 4-7.2L976 284.8 659.2 112.8 520 183.2c0 0.8-0.8 0.8-0.8 1.6-2.4 4-7.2 4.8-11.2 2.4l-1.6-1.6h-0.8l-152.8-78.4L48 289.6z" fill="#6A576D"></path>
                                                <path d="M510.4 179.2l324.8 196v354.4L510.4 554.4z" fill="#121519"></path>
                                                <path d="M510.4 179.2L180.8 375.2v354.4l329.6-175.2z" fill="#121519"></path>
                                                <path d="M835.2 737.6c-1.6 0-2.4 0-4-0.8l-324.8-176c-2.4-1.6-4-4-4-7.2V179.2c0-3.2 1.6-5.6 4-7.2 2.4-1.6 5.6-1.6 8 0L839.2 368c2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2h-4zM518.4 549.6l308.8 167.2V379.2L518.4 193.6v356z" fill="#6A576D"></path>
                                                <path d="M180.8 737.6c-1.6 0-3.2 0-4-0.8-2.4-1.6-4-4-4-7.2V375.2c0-3.2 1.6-5.6 4-7.2l329.6-196c2.4-1.6 5.6-1.6 8 0 2.4 1.6 4 4 4 7.2v375.2c0 3.2-1.6 5.6-4 7.2l-329.6 176h-4z m8-358.4v337.6l313.6-167.2V193.6L188.8 379.2z" fill="#6A576D"></path>
                                                <path d="M510.4 550.4L372 496 180.8 374.4v355.2l329.6 196 324.8-196V374.4L688.8 483.2z" fill="#D6AB7F"></path>
                                                <path d="M510.4 933.6c-1.6 0-3.2 0-4-0.8L176.8 736.8c-2.4-1.6-4-4-4-7.2V374.4c0-3.2 1.6-5.6 4-7.2 2.4-1.6 5.6-1.6 8 0L376 488.8l135.2 53.6 174.4-66.4L830.4 368c2.4-1.6 5.6-2.4 8-0.8 2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2l-324.8 196s-1.6 0.8-3.2 0.8z m-321.6-208l321.6 191.2 316.8-191.2V390.4L693.6 489.6c-0.8 0.8-1.6 0.8-1.6 0.8l-178.4 68c-1.6 0.8-4 0.8-5.6 0L369.6 504c-0.8 0-0.8-0.8-1.6-0.8L188.8 389.6v336z" fill="#6A576D"></path>
                                                <path d="M510.4 925.6l324.8-196V374.4L665.6 495.2l-155.2 55.2z" fill="#121519"></path>
                                                <path d="M510.4 933.6c-1.6 0-2.4 0-4-0.8-2.4-1.6-4-4-4-7.2V550.4c0-3.2 2.4-6.4 5.6-7.2L662.4 488l168-120c2.4-1.6 5.6-1.6 8-0.8 2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2l-324.8 196s-1.6 0.8-3.2 0.8z m8-377.6v355.2l308.8-185.6V390.4L670.4 501.6c-0.8 0.8-1.6 0.8-1.6 0.8l-150.4 53.6z" fill="#6A576D"></path>
                                                <path d="M252.8 604l257.6 145.6V550.4l-147.2-49.6-182.4-126.4z" fill="#121519"></path>
                                                <path d="M32 460l148.8-85.6 329.6 176L352 640.8z" fill="#FFFFFF"></path>
                                                <path d="M659.2 693.6l176-90.4V375.2L692 480.8l-179.2 68-2.4 1.6z" fill="#121519"></path>
                                                <path d="M510.4 550.4l148.8 85.6L992 464.8l-156.8-89.6z" fill="#FFFFFF"></path>
                                                <path d="M352 648.8c-1.6 0-2.4 0-4-0.8l-320-180.8c-2.4-1.6-4-4-4-7.2s1.6-5.6 4-7.2L176.8 368c2.4-1.6 5.6-1.6 8 0l329.6 176c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2L356 648c-0.8 0.8-2.4 0.8-4 0.8zM48 460L352 632l141.6-80.8L180.8 384 48 460z" fill="#6A576D"></path>
                                                <path d="M659.2 644c-1.6 0-2.4 0-4-0.8L506.4 557.6c-2.4-1.6-4-4-4-7.2s1.6-5.6 4-7.2l324.8-176c2.4-1.6 5.6-1.6 8 0l156.8 90.4c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2L663.2 643.2c-1.6 0.8-2.4 0.8-4 0.8zM527.2 550.4l132.8 76L976 464l-141.6-80-307.2 166.4z" fill="#6A576D"></path>
                                            </g>
                                        </svg>
                                        <h5> No Remark Records Entered Yet ..</h5>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <form action="javascript:;" method="post" enctype="multipart/form-data" class="search-form  m-auto" id="remarkForm">
                                <div class="d-flex align-items-center">
                                    <div class="input-group me-2">
                                        <input type="text" name="remark" class="form-control rounded-pill" placeholder="Conversation Remark">
                                        <input type="hidden" name="formType" value="addRemark">
                                        <input type="hidden" name="enquiry_type" value="<?= $enquiryType ?>">
                                        <input type="hidden" name="enquiry_id" value="<?= $id ?>">
                                    </div>
                                    <div>
                                        <button type="submit" id="submitbutton" class="btn btn-primary btn-icon rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>

                </div>



            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
<script src="js/action.js"></script>