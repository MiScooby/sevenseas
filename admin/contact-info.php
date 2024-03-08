<?php include('includes/header.php');
 $getContactInfo = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `contact_info`"));
?>
<link rel="stylesheet" href="assets/css/inner.css">
<div class="row justify-content-center">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">CHANGE CONTACT DETAILS OF THE WEBSITE</h6>

                <form class="forms-sample" id="ContactInfo" action="javascript:;" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Address :</label>
                                <input type="text" class="form-control" value="<?=$getContactInfo['address']?>" name="adrs" required placeholder="Enter Ads Heading">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Email :</label>
                                <input type="text" class="form-control" value="<?=$getContactInfo['email']?>" name="email" required placeholder="Enter Ads Heading">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Mobile :</label>
                                <input type="text" oninput="this.value = this.value.replace(/\D+/g, '')" class="form-control" value="<?=$getContactInfo['mobile']?>" name="mob" required placeholder="Enter Sub Heading">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Telephone :</label>
                                <input type="text" class="form-control" value="<?=$getContactInfo['tele']?>" name="tele" required placeholder="Enter Sub Heading">
                            </div>
                        </div>

                        
                    </div>

                    <div class="text-center">
                        <input type="hidden" name="formType" value="ContactInfo"> 
                        <input type="hidden" name="infoId" value="<?=$getContactInfo['id']?>"> 
                        <button type="submit" class="btn btn-primary me-2 w-50" id="ContactInfoBtn">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>



<?php include('includes/footer.php'); ?>
<script src="js/web.js"></script>