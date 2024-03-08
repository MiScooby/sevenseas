<?php include('includes/header.php'); ?> 
<link rel="stylesheet" href="assets/css/inner.css">
<style>

</style>


<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Add Gallery Image</h6>
                <div id="loader" style="display: none;">
                    <div class="lds-dual-ring">
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <form action="javascript:;" id="galleryForms" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Gallery Tag <span>*</span> : </label>
                        <select class="form-control tagging2" required name="gallery_tag">
                            <?php
                            $taglistQ = mysqli_query($con, "SELECT * FROM `gallery_media` GROUP BY gallery_tag");
                            while ($taglist = mysqli_fetch_array($taglistQ)) {
                            ?>
                                <option><?= $taglist['gallery_tag']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="" class="form-label ">Gallery Image <span>*</span></label>
                        <input class="form-control" type="file" name="galleryImg" id="galleryImg"  required="">

                    </div>



                    <div>
                        <input type="hidden" id="gallerytype" name="gallerytype" value="addgallery">
                        <button class="btn btn-primary" type="submit" name="addgallery" id="addgallery">Add Gallery</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<style>

</style>
<div id="snackbar"></div>

<?php include('includes/footer.php'); ?>
<script src="assets/vendors/select2/select2.min.js"></script>
<script src="assets/vendors/dropify/dist/dropify.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/ckeditor.js"></script>
 <script src="js/action.js"></script>