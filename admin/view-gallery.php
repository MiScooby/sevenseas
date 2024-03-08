<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
<link rel="stylesheet" href="assets/vendors/dropify/dist/dropify.min.css">
<link rel="stylesheet" href="assets/css/inner.css">

<style>
    .card-body {
        padding: 10px;
        padding-bottom: 0;
    }

    .card-body img {
        height: 180px;
        width: 100%;
        object-fit: cover;
    }

    .main-wrapper .page-wrapper .page-content {
        flex-grow: 1;
        padding: 25px;
        margin-top: 60px;
        background: #fff;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12 justify-content-between  mb-3 stretch-card align-items-center">

        <h5 class="card-title">Website Gallery</h5>
        <div>
            <a href="add-gallery.php" class="btn btn-primary">Add Gallery</a>
        </div>
    </div>
    <div class="col-md-12 col-xl-12 middle-wrapper">

        <div class="row">

            <?php
            $i = 0;
            $getImageQ = mysqli_query($con, "SELECT * FROM `gallery_media` WHERE `trash`='0' ORDER BY id DESC");
            $getImageCOunt = mysqli_num_rows($getImageQ);
            if ($getImageCOunt > 0) {
                while ($getImage = mysqli_fetch_array($getImageQ)) {
            ?>
                    <div class="col-md-4 grid-margin">
                        <div class="card rounded">
                            <div class="card-body">
                                <img class="img-fluid" src="../media/gallery_media/<?= $getImage['gallery_img'] ?>" alt="">
                            </div>
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="img-xs rounded-circle" src="assets/images/avatar.png" alt="">
                                        <div class="ms-2">
                                            <p>Trooper Trips</p>
                                            <p class="tx-11 text-muted"><?= $getImage['gallery_tag'] ?></p>
                                        </div>
                                    </div>
                                    <a type="button" data-id="<?= $getImage['id'] ?>" class="btn btn-danger glrDltBtn">
                                        <i class="fa fa-md fa-trash"></i>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="text-center">
                    <img src="assets/images/nofound.jpg" width="300px" alt="">
                    <p>Oops ! gallery not uploaded by admin yet...</p>
                </div>
            <?php
            }
            ?>


        </div>
    </div>

</div>

<?php include('includes/footer.php'); ?>
<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/dropify/dist/dropify.min.js"></script>
<script src="js/action.js"></script>