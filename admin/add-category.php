<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/inner.css">


<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Add Category</h6>
                <div id="loader" style="display: none;">
                    <div class="lds-dual-ring">
                        <div class="overlay">
                        </div>
                    </div>
                </div>
                <form action="javascript:;" id="blogCatForms" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Category Title <span>*</span> : </label>
                        <input class="form-control form-control-lg" type="text" placeholder="Enter Category Title" name="Categoryname" required="">
                        <div class="invalid-feedback" style="display: block;"></div>
                    </div>



                    <div class="mb-4">
                        <label for="" class="form-label ">Category Image <span>*</span></label>
                        <input class="form-control dropFile" type="file" name="CategoryImg" onchange="catImageFunction(this)" id="CategoryImg" required="">
                        <small class="form-small"> Note : Please upload image size with width between 400px-500px & Height between 400px-500px </small>
                    </div>



                    <div>
                        <input type="hidden" id="formType" name="formType" value="addblogCattype">
                        <button class="btn btn-primary" type="submit" name="addBlogCat" id="addBlogCat">Add Category</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/super-build/ckeditor.js"></script>
<script src="js/blog-action.js"></script>
 