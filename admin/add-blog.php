<?php include('includes/header.php');
$blogCatQuer = mysqli_query($con, "SELECT * FROM `blog_category` WHERE `status`='active' ");
$blogTag = mysqli_query($con, "SELECT * FROM `blog_tags`");
?>
<link rel="stylesheet" href="assets/css/inner.css">


<div class="row justify-content-center">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Add Blog</h6>
        <div id="loader" style="display: none;">
          <div class="lds-dual-ring">
            <div class="overlay">
            </div>
          </div>
        </div>
        <form action="javascript:;" id="AddblogForms" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Blog Title <span>*</span> : </label>
            <input class="form-control form-control-lg" type="text" placeholder="Enter Blog Title" name="bloGname" required="">
            <div class="invalid-feedback" style="display: block;"></div>
          </div>

          <div class="mb-3">
            <label class="form-label">Blog Category <span>*</span> : </label>
            <div class="input-field">
              <select class="js-example-basic-single form-select ct" name="blogCategory"  data-width="100%" required>
                <option></option>
                <?php

                while ($blogCatQuerR = mysqli_fetch_array($blogCatQuer)) {
                ?>
                  <option value="<?= $blogCatQuerR['id'] ?>"><?= $blogCatQuerR['cat_name'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>

          </div>

          <div class="mb-3">
            <label class="form-label">Blog Keywords <span>*</span> : </label>
            <div class="input-field">
              <select class="form-select tagging2" name="blogKeyword[]" multiple  data-width="100%" required>
                <option></option>
                <?php

                while ($blogTagR = mysqli_fetch_array($blogTag)) {
                ?>
                  <option value="<?= $blogTagR['id'] ?>"><?= $blogTagR['tag_name'] ?></option>
                <?php
                }
                ?>

              </select>
            </div>

          </div>

          <div class="mb-4">
            <label for="" class="form-label ">Blog Image <span>*</span></label>
            <input class="form-control dropFile" type="file" name="blogImg" onchange="blogImageFunction(this)" id="blogImg" required=""> 
            <small class="form-small"> Note : Please upload image size with width between 400px-500px & Height between 400px-500px </small>
          </div>
          <div class="mb-4">
            <label class="form-label">Blog Content <span>*</span> : </label>
            <textarea id="myDesc_two" name="blogContent" class="editor"></textarea>
          </div>



          <div>
            <input type="hidden" id="formType" name="formType" value="addblogtype">
            <button class="btn btn-primary" type="submit" name="addBlog" id="addBlog">Add Blog</button>
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